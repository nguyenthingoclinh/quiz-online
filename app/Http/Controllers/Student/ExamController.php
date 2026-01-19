<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamParticipant;
use App\Models\QuestionAnswer;
use App\Models\QuestionBank;
use App\Models\StudentAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Dashboard - danh sách bài thi
     */
    public function index()
    {
        $studentId = Auth::id();

        $exams = Exam::query()
            ->withCount('questions')
            ->where(function ($q) {
                $q->whereNull('start_at')
                  ->orWhere('start_at', '<=', now());
            })
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($exam) use ($studentId) {

                $participant = ExamParticipant::where('exam_id', $exam->id)
                    ->where('student_id', $studentId)
                    ->first();

                $exam->participant = $participant; // null | object
                return $exam;
            });

        return view('dashboard', compact('exams'));
    }

    /**
     * Bắt đầu làm bài
     */
    public function start(Exam $exam)
    {
        $studentId = Auth::id();

        // Không cho làm lại
        $exists = ExamParticipant::where('exam_id', $exam->id)
            ->where('student_id', $studentId)
            ->whereIn('status', ['doing', 'submitted', 'graded'])
            ->exists();

        // abort_if($exists, 403, 'Bạn đã tham gia bài thi này');

        if ($exists) {
            return redirect()->route('student.exams.do', [
                'participant' => ExamParticipant::where('exam_id', $exam->id)
                    ->where('student_id', $studentId)
                    ->whereIn('status', ['doing', 'submitted', 'graded'])
                    ->first(),
            ]);
        }

        $participant = ExamParticipant::create([
            'exam_id'    => $exam->id,
            'student_id' => $studentId,
            'start_time' => now(),
            'status'     => 'doing',
        ]);

        return redirect()->route('student.exams.do', $participant);
    }

    /**
     * Màn hình làm bài
     */
    public function do(ExamParticipant $participant)
    {
        abort_if($participant->student_id !== Auth::id(), 403);

        abort_if($participant->status !== 'doing', 403, 'Bài thi đã kết thúc');

        $participant->load([
            'exam.questions.question.answers'
        ]);

        return view('exam.take', compact('participant'));
    }

    /**
     * Lưu tạm đáp án
     */
    public function cacheAnswer(Request $request, ExamParticipant $participant)
    {
        abort_if($participant->student_id !== Auth::id(), 403);

        $cacheKey = "exam_answers_{$participant->id}";

        Cache::put(
            $cacheKey,
            $request->answers,
            now()->addHours(3)
        );

        return response()->json(['status' => 'ok']);
    }

    public function getCache(ExamParticipant $participant)
    {
        abort_if($participant->student_id !== Auth::id(), 403);

        return response()->json(
            Cache::get("exam_answers_{$participant->id}", [])
        );
    }

    public function submit(ExamParticipant $participant)
    {
        abort_if($participant->student_id !== Auth::id(), 403);
        abort_if($participant->status !== 'doing', 403);

        $cacheKey = "exam_answers_{$participant->id}";
        $answers = Cache::get($cacheKey, []);

        // Load trước đáp án đúng
        $answerIds = collect($answers)->pluck('selected_answer_id');

        $correctAnswers = QuestionAnswer::whereIn('id', $answerIds)
            ->get()
            ->keyBy('id');

        DB::transaction(function () use ($participant, $answers, $correctAnswers) {

            $totalScore = 0;

            foreach ($answers as $item) {

                $answer = $correctAnswers[$item['selected_answer_id']] ?? null;

                if (!$answer) continue;

                $isCorrect = (bool) $answer->is_correct;
                $score = $isCorrect ? 1 : 0;

                $totalScore += $score;

                StudentAnswer::updateOrCreate(
                    [
                        'participant_id' => $participant->id,
                        'question_id'    => $item['question_id'],
                    ],
                    [
                        'answer' => json_encode([
                            'selected_answer_id'      => $item['selected_answer_id'],
                            'selected_answer_content' => $item['selected_answer_content'],
                            'is_correct'              => $isCorrect
                        ], JSON_UNESCAPED_UNICODE),
                        'score' => $score
                    ]
                );
            }

            $participant->update([
                'status'      => 'submitted',
                'submit_time' => now(),
                'total_score' => $totalScore
            ]);
        });

        Cache::forget($cacheKey);

        return redirect()->route('student.exams.result', $participant);
    }

    public function result(ExamParticipant $participant)
    {
        abort_if($participant->student_id !== Auth::id(), 403);

        $participant->load([
            'exam.questions.question.answers',
            'answers',
        ]);

        $totalQuestions = $participant->exam->questions->count();
        $correct = $participant->answers->where('score', 1)->count();

        $score = round(
            ($correct / $totalQuestions) * 10,
            2
        );

        $timeSpent = Carbon::parse($participant->start_time)
            ->diffInSeconds($participant->submit_time);

        return view('exam.result', compact(
            'participant',
            'totalQuestions',
            'correct',
            'score',
            'timeSpent'
        ));
    }
}

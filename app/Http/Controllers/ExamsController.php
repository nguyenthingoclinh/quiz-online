<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\QuestionAnswer;
use App\Models\QuestionBank;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $now = Carbon::now();

        $exams = Exam::query()
            ->where('created_by', Auth::id())
            ->withCount('questions')
            ->orderByDesc('created_at')
            ->paginate(10);

        $totalExams = Exam::where('created_by', Auth::id())->count();

        $activeExams = Exam::where('created_by', Auth::id())
            ->whereRaw(
                "DATE_ADD(start_at, INTERVAL duration MINUTE) >= ?",
                [$now]
            )
            ->count();

        $endedExams = Exam::where('created_by', Auth::id())
            ->whereRaw(
                "DATE_ADD(start_at, INTERVAL duration MINUTE) < ?",
                [$now]
            )
            ->count();

        $draftExams = Exam::where('created_by', Auth::id())
            // ->where('status', 'draft')
            ->count();

        return view('teacher.exams.index', compact(
            'exams',
            'totalExams',
            'activeExams',
            'endedExams',
            'draftExams'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'subject'   => 'required|string',
            'duration'  => 'required|integer|min:1',
            'questions' => 'required|array|min:1',

            'questions.*.content'   => 'required|string',
            'questions.*.answer_a'  => 'required|string',
            'questions.*.answer_b'  => 'required|string',
            'questions.*.answer_c'  => 'required|string',
            'questions.*.answer_d'  => 'required|string',
            'questions.*.correct'   => 'required|in:A,B,C,D',
        ]);

        DB::transaction(function () use ($request) {

            /** ================== TẠO ĐỀ THI ================== */
            $exam = Exam::create([
                'title'       => $request->title,
                'description' => $request->description,
                'subject'     => $request->subject,
                'grade'       => $request->grade,
                'duration'    => (int) $request->duration,
                'pass_score'  => floor(count($request->questions) * 0.5),
                'start_at'    => $request->start_date
                    ? now()->parse($request->start_date)
                    : null,
                'created_by'  => Auth::id(),
            ]);

            /** ================== CÂU HỎI + ĐÁP ÁN ================== */
            foreach ($request->questions as $q) {

                $question = QuestionBank::create([
                    'content'    => $q['content'],
                    'created_by' => Auth::id(),
                ]);

                ExamQuestion::create([
                    'exam_id'     => $exam->id,
                    'question_id' => $question->id,
                ]);

                foreach (['a', 'b', 'c', 'd'] as $opt) {
                    QuestionAnswer::create([
                        'question_id' => $question->id,
                        'content'     => $q["answer_$opt"],
                        'is_correct'  => strtoupper($opt) === $q['correct'],
                    ]);
                }
            }
        });

        return redirect()
            ->route('api.exams.create')
            ->with('success', 'Tạo đề thi thành công');
    }

    public function show(Exam $exam)
    {
        abort_if($exam->created_by !== Auth::id(), 403);

        $exam->load([
            'questions.question.answers'
        ]);

        return view('teacher.exams.show', compact('exam'));
    }

    public function edit(Exam $exam)
    {
        abort_if($exam->created_by !== Auth::id(), 403);

        $exam->load([
            'questions.question.answers'
        ]);

        return view('teacher.exams.edit', compact('exam'));
    }


    public function update(Request $request, Exam $exam)
    {
        abort_if($exam->created_by !== Auth::id(), 403);

        $request->validate([
            'title'     => 'required|string|max:255',
            'subject'   => 'required',
            'duration'  => 'required|integer|min:1',
            'questions' => 'required|array|min:1',
        ]);

        DB::transaction(function () use ($request, $exam) {

            $exam->update([
                'title'       => $request->title,
                'description' => $request->description,
                'subject'     => $request->subject,
                'grade'       => $request->grade,
                'duration'    => $request->duration,
                'start_at'    => $request->start_date,
            ]);

            $oldQuestionIds = $exam->questions()->pluck('question_id');

            QuestionAnswer::whereIn('question_id', $oldQuestionIds)->delete();

            $exam->questions()->delete();

            QuestionBank::whereIn('id', $oldQuestionIds)->delete();

            foreach ($request->questions as $q) {

                $question = QuestionBank::create([
                    'content'    => $q['content'],
                    'created_by'=> Auth::id(),
                ]);

                ExamQuestion::create([
                    'exam_id'     => $exam->id,
                    'question_id' => $question->id,
                ]);

                foreach (['a','b','c','d'] as $opt) {
                    QuestionAnswer::create([
                        'question_id' => $question->id,
                        'content'     => $q["answer_$opt"],
                        'is_correct'  => strtoupper($opt) === ($q['correct'] ?? ''),
                    ]);
                }
            }
        });

        return redirect()
            ->route('teacher.users.exams')
            ->with('success', 'Cập nhật bộ đề thành công');
    }



    public function destroy(Exam $exam)
    {
        abort_if($exam->created_by !== Auth::id(), 403);

        DB::transaction(function () use ($exam) {

            $questionIds = $exam->questions()->pluck('question_id');

            QuestionAnswer::whereIn('question_id', $questionIds)->delete();

            $exam->questions()->delete();

            QuestionBank::whereIn('id', $questionIds)->delete();

            $exam->delete();
        });

        return redirect()
            ->route('teacher.users.exams')
            ->with('success', 'Đã xóa bộ đề');
    }
}

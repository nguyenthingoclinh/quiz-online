<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = QuestionBank::where('created_by', Auth::id())
            ->selectRaw("
                COUNT(*) as total,
                SUM(difficulty = 'easy') as easy,
                SUM(difficulty = 'medium') as medium,
                SUM(difficulty = 'hard') as hard
            ")
            ->first();

        $questions = QuestionBank::with([
                'answers',
                'exams'
            ])
            ->where('created_by', Auth::id())
            ->orderByDesc('id')
            ->paginate(10);

        return view('teacher.questions.qna', compact(
            'questions',
            'stats'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\QuestionBank  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionBank $question)
    {
        abort_if($question->created_by !== Auth::id(), 403);

        $question->load('answers');

        return view('teacher.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionBank  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionBank $question)
    {
        abort_if($question->created_by !== Auth::id(), 403);

        $request->validate([
            'content'    => 'required|string',
            'difficulty' => 'required|in:easy,medium,hard',
            'answers'    => 'required|array|size:4',
            'correct'    => 'required|in:0,1,2,3',
        ]);

        DB::transaction(function () use ($request, $question) {

            $question->update([
                'content'    => $request->content,
                'difficulty' => $request->difficulty,
            ]);

            $question->answers()->delete();

            foreach ($request->answers as $index => $content) {
                QuestionAnswer::create([
                    'question_id' => $question->id,
                    'content'     => $content,
                    'is_correct'  => (int)$request->correct === $index,
                ]);
            }
        });

        return redirect()
            ->route('teacher.questions.qna')
            ->with('success', 'Cập nhật câu hỏi thành công');
    }

    // Lưu tạo mới
    public function store(Request $request)
    {
        $request->validate([
            'content'    => 'required|string',
            'difficulty' => 'required|in:easy,medium,hard',
            'answers'    => 'required|array|size:4',
            'correct'    => 'required|in:0,1,2,3',
        ]);

        DB::transaction(function () use ($request) {

            // 1. tạo question
            $question = QuestionBank::create([
                'content'    => $request->content,
                'difficulty' => $request->difficulty,
                'created_by' => Auth::id(),
            ]);

            // 2. tạo answers
            foreach ($request->answers as $index => $content) {
                QuestionAnswer::create([
                    'question_id' => $question->id,
                    'content'     => $content,
                    'is_correct'  => (int)$request->correct === $index,
                ]);
            }
        });

        return redirect()
            ->route('teacher.questions.qna')
            ->with('success', 'Đã tạo câu hỏi mới');
    }

    public function exportCsv()
    {
        $questions = QuestionBank::with('answers')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=questions.csv',
        ];

        $callback = function () use ($questions) {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'id',
                'content',
                'difficulty',
                'answer_a',
                'answer_b',
                'answer_c',
                'answer_d',
                'correct',
            ]);

            foreach ($questions as $q) {
                $answers = $q->answers->values();

                $correctIndex = $answers->search(fn ($a) => $a->is_correct);
                $correctLabel = ['A','B','C','D'][$correctIndex] ?? '';

                fputcsv($file, [
                    $q->id,
                    $q->content,
                    $q->difficulty,
                    $answers[0]->content ?? '',
                    $answers[1]->content ?? '',
                    $answers[2]->content ?? '',
                    $answers[3]->content ?? '',
                    $correctLabel,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = fopen($request->file('file')->getRealPath(), 'r');
        $header = fgetcsv($file);

        DB::transaction(function () use ($file, $header) {

            while (($row = fgetcsv($file)) !== false) {
                $data = array_combine($header, $row);

                // 1. tạo question
                $question = QuestionBank::create([
                    'content'    => $data['content'],
                    'difficulty' => $data['difficulty'],
                    'created_by' => Auth::id(),
                ]);

                // 2. map đáp án
                $answers = [
                    'A' => $data['answer_a'],
                    'B' => $data['answer_b'],
                    'C' => $data['answer_c'],
                    'D' => $data['answer_d'],
                ];

                foreach ($answers as $label => $content) {
                    QuestionAnswer::create([
                        'question_id' => $question->id,
                        'content'     => $content,
                        'is_correct'  => strtoupper($data['correct']) === $label,
                    ]);
                }
            }
        });

        fclose($file);

        return back()->with('success', 'Import câu hỏi thành công');
    }

}

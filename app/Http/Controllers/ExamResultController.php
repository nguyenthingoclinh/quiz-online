<?php

namespace App\Http\Controllers;

use App\Models\ExamParticipant;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index(Request $request)
    {
        $query = ExamParticipant::query()
            ->whereIn('status', ['submitted', 'graded'])
            ->with([
                'student:id,full_name,username',
                'exam:id,title,duration,pass_score',
                'answers'
            ]);

        $participants = $query
            ->orderByDesc('submit_time')
            ->paginate(10);

        $pass_score = $participants[0]->exam->pass_score;

        // Stats
        $stats = [
            'total'        => $participants->total(),
            'avg_score'    => round($participants->avg('total_score'), 1),
            'max_score'    => $participants->max('total_score'),
            'pass_rate'    => round(
                $participants->where('total_score', '>=', $pass_score)->count()
                / max(1, $participants->count()) * 100
            ),
        ];

        return view('teacher.results.index', compact(
            'participants',
            'stats'
        ));
    }
}

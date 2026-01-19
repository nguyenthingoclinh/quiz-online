@extends('layouts.dashboard')

@section('title', 'Kết quả bài thi')
@section('page-title', 'Kết quả bài thi')

@section('content')
    <div class="result-container">

        <!-- Result Card -->
        <div class="result-card">

            <!-- Header -->
            <div class="result-header">
                <div class="result-icon">✓</div>
                <h1 class="result-title">Hoàn thành bài thi!</h1>
                <p class="result-subtitle">{{ $participant->exam->title }}</p>
            </div>

            <!-- Body -->
            <div class="result-body">
                <div class="score-grid">

                    <div class="score-box score-blue">
                        <div class="score-number">{{ $score }}</div>
                        <p class="score-label">Điểm số</p>
                    </div>

                    <div class="score-box score-green">
                        <div class="score-number">{{ $correct }}/{{ $totalQuestions }}</div>
                        <p class="score-label">Câu trả lời đúng</p>
                    </div>

                    <div class="score-box score-purple">
                        <div class="score-number">
                            {{ gmdate('i:s', $timeSpent) }}
                        </div>
                        <p class="score-label">Thời gian làm bài</p>
                    </div>

                </div>

                <div class="result-actions">
                    <a href="{{ route('dashboard') }}" class="btn-primary">
                        Về Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Review -->
        <div class="review-card">
            <h2 class="review-title">Chi tiết câu trả lời</h2>

            <div class="space-y-4">

                @foreach ($participant->exam->questions as $i => $examQuestion)
                    @php
                        $question = $examQuestion->question;
                        $studentAnswer = $participant->answers->firstWhere('question_id', $question->id);

                        $studentData = $studentAnswer ? json_decode($studentAnswer->answer, true) : null;

                        $correctAnswer = $question->answers->firstWhere('is_correct', 1);

                        $isCorrect = $studentAnswer && $studentAnswer->score == 1;
                    @endphp

                    <div class="review-item {{ $isCorrect ? 'review-correct' : 'review-wrong' }}">
                        <div class="flex items-start">
                            <div class="review-icon {{ $isCorrect ? 'icon-correct' : 'icon-wrong' }}">
                                {{ $isCorrect ? '✓' : '✗' }}
                            </div>

                            <div class="review-content">
                                <div class="review-header">
                                    <h3 class="review-question">Câu {{ $i + 1 }}</h3>
                                    <span class="{{ $isCorrect ? 'review-status-correct' : 'review-status-wrong' }}">
                                        {{ $isCorrect ? 'Đúng' : 'Sai' }}
                                    </span>
                                </div>

                                <p class="text-gray-700 mb-3">
                                    {{ $question->content }}
                                </p>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <span class="text-sm text-gray-600">Đáp án của bạn:</span>
                                        <span class="answer-tag {{ $isCorrect ? 'answer-correct' : 'answer-wrong' }}">
                                            {{ $studentData['selected_answer_content'] ?? '' }}
                                        </span>
                                    </div>

                                    <div>
                                        <span class="text-sm text-gray-600">Đáp án đúng:</span>
                                        <span class="answer-tag answer-correct">
                                            {{ $correctAnswer->content }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

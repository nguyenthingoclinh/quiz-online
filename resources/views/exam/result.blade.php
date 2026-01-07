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
            <p class="result-subtitle">Kiểm tra giữa kỳ - Toán học</p>
        </div>

        <!-- Body -->
        <div class="result-body">
            <div class="score-grid">

                <div class="score-box score-blue">
                    <div class="score-number">8.5</div>
                    <p class="score-label">Điểm số</p>
                </div>

                <div class="score-box score-green">
                    <div class="score-number">25/30</div>
                    <p class="score-label">Câu trả lời đúng</p>
                </div>

                <div class="score-box score-purple">
                    <div class="score-number">45:30</div>
                    <p class="score-label">Thời gian làm bài</p>
                </div>

            </div>

            <div class="result-actions">
                <a href="{{ route('dashboard') }}" class="btn-primary">
                    Về Dashboard
                </a>
                <button class="btn-secondary">
                    Xem chi tiết đáp án
                </button>
            </div>
        </div>
    </div>

    <!-- Review -->
    <div class="review-card">
        <h2 class="review-title">Chi tiết câu trả lời</h2>

        <div class="space-y-4">

            <!-- Correct -->
            <div class="review-item review-correct">
                <div class="flex items-start">
                    <div class="review-icon icon-correct">✓</div>
                    <div class="review-content">
                        <div class="review-header">
                            <h3 class="review-question">Câu 1</h3>
                            <span class="review-status-correct">Đúng</span>
                        </div>

                        <p class="text-gray-700 mb-3">
                            Tính giá trị của biểu thức <strong>2x + 3y</strong>
                        </p>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-sm text-gray-600">Đáp án của bạn:</span>
                                <span class="answer-tag answer-correct">A. 31</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Đáp án đúng:</span>
                                <span class="answer-tag answer-correct">A. 31</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wrong -->
            <div class="review-item review-wrong">
                <div class="flex items-start">
                    <div class="review-icon icon-wrong">✗</div>
                    <div class="review-content">
                        <div class="review-header">
                            <h3 class="review-question">Câu 2</h3>
                            <span class="review-status-wrong">Sai</span>
                        </div>

                        <p class="text-gray-700 mb-3">
                            Phương trình nào có nghiệm x = 3?
                        </p>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-sm text-gray-600">Đáp án của bạn:</span>
                                <span class="answer-tag answer-wrong">B</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600">Đáp án đúng:</span>
                                <span class="answer-tag answer-correct">D</span>
                            </div>
                        </div>

                        <div class="explain-box">
                            <strong>Giải thích:</strong>
                            4x = 12 → x = 3
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

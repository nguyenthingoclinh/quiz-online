@extends('layouts.app')

@section('title', 'Làm bài thi')

@section('content')
<div class="exam-page">
    <div class="exam-container">

        <!-- ===== HEADER ===== -->
        <div class="exam-header">
            <div class="exam-header-top">
                <div>
                    <h1 class="exam-title">Kiểm tra giữa kỳ - Toán học</h1>
                    <p class="exam-subtitle">30 câu hỏi • 60 phút</p>
                </div>

                <div class="timer-box">
                    <div class="timer-display">
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span id="timer" class="timer-time">59:45</span>
                        </div>
                        <p class="timer-label">Thời gian còn lại</p>
                    </div>

                    <button class="submit-btn">Nộp bài</button>
                </div>
            </div>

            <!-- Progress -->
            <div class="progress-wrapper">
                <div class="progress-info">
                    <span>Đã trả lời: <b>5/30</b></span>
                    <span>Tiến độ: <b class="text-blue-600">17%</b></span>
                </div>
                <div class="progress-bar-bg">
                    <div class="progress-bar" style="width:17%"></div>
                </div>
            </div>
        </div>

        <!-- ===== MAIN LAYOUT ===== -->
        <div class="exam-grid">

            <!-- ===== QUESTIONS ===== -->
            <div class="exam-main">

                <!-- ===== QUESTION 1 ===== -->
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">Câu 1</h3>
                        <span class="badge-answered">Đã trả lời</span>
                    </div>

                    <p class="question-text">
                        Tính giá trị của biểu thức: <strong>2x + 3y</strong> với x = 5 và y = 7
                    </p>

                    <div class="answer-list">
                        <label class="answer-option answer-selected">
                            <input type="radio" name="q1" checked class="answer-radio">
                            <span class="answer-text">A. 31</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q1" class="answer-radio">
                            <span class="answer-text">B. 25</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q1" class="answer-radio">
                            <span class="answer-text">C. 28</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q1" class="answer-radio">
                            <span class="answer-text">D. 35</span>
                        </label>
                    </div>
                </div>

                <!-- ===== QUESTION 2 ===== -->
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">Câu 2</h3>
                        <span class="badge-unanswered">Chưa trả lời</span>
                    </div>

                    <p class="question-text">
                        Phương trình nào sau đây có nghiệm x = 3?
                    </p>

                    <div class="answer-list">
                        <label class="answer-option answer-default">
                            <input type="radio" name="q2" class="answer-radio">
                            <span class="answer-text">A. 2x + 1 = 5</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q2" class="answer-radio">
                            <span class="answer-text">B. 3x - 2 = 7</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q2" class="answer-radio">
                            <span class="answer-text">C. x + 5 = 10</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q2" class="answer-radio">
                            <span class="answer-text">D. 4x = 12</span>
                        </label>
                    </div>
                </div>

                <!-- ===== QUESTION 3 ===== -->
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">Câu 3</h3>
                        <span class="badge-unanswered">Chưa trả lời</span>
                    </div>

                    <p class="question-text">
                        Giá trị của √16 + √25 là:
                    </p>

                    <div class="answer-list">
                        <label class="answer-option answer-default">
                            <input type="radio" name="q3" class="answer-radio">
                            <span class="answer-text">A. 9</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q3" class="answer-radio">
                            <span class="answer-text">B. 11</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q3" class="answer-radio">
                            <span class="answer-text">C. 41</span>
                        </label>

                        <label class="answer-option answer-default">
                            <input type="radio" name="q3" class="answer-radio">
                            <span class="answer-text">D. √41</span>
                        </label>
                    </div>
                </div>

                <!-- ===== NAVIGATION ===== -->
                <div class="question-nav">
                    <button class="btn-prev" disabled>← Câu trước</button>
                    <button class="btn-next">Câu tiếp →</button>
                </div>
            </div>

            <!-- ===== SIDEBAR ===== -->
            <div class="exam-sidebar">
                <div class="sidebar-box">
                    <h3 class="sidebar-title">Danh sách câu hỏi</h3>

                    <div class="question-nav-grid">
                        <button class="nav-btn-answered">1</button>
                        <button class="nav-btn-answered">2</button>
                        <button class="nav-btn-answered">3</button>
                        <button class="nav-btn-answered">4</button>
                        <button class="nav-btn-answered">5</button>

                        <button class="nav-btn-unanswered">6</button>
                        <button class="nav-btn-unanswered">7</button>
                        <button class="nav-btn-unanswered">8</button>
                        <button class="nav-btn-unanswered">9</button>
                        <button class="nav-btn-unanswered">10</button>

                        <button class="nav-btn-unanswered">11</button>
                        <button class="nav-btn-unanswered">12</button>
                        <button class="nav-btn-unanswered">13</button>
                        <button class="nav-btn-unanswered">14</button>
                        <button class="nav-btn-unanswered">15</button>

                        <button class="nav-btn-unanswered">16</button>
                        <button class="nav-btn-unanswered">17</button>
                        <button class="nav-btn-unanswered">18</button>
                        <button class="nav-btn-unanswered">19</button>
                        <button class="nav-btn-unanswered">20</button>

                        <button class="nav-btn-unanswered">21</button>
                        <button class="nav-btn-unanswered">22</button>
                        <button class="nav-btn-unanswered">23</button>
                        <button class="nav-btn-unanswered">24</button>
                        <button class="nav-btn-unanswered">25</button>

                        <button class="nav-btn-unanswered">26</button>
                        <button class="nav-btn-unanswered">27</button>
                        <button class="nav-btn-unanswered">28</button>
                        <button class="nav-btn-unanswered">29</button>
                        <button class="nav-btn-unanswered">30</button>
                    </div>

                    <div class="legend">
                        <div class="legend-item">
                            <div class="legend-answered"></div>
                            <span>Đã trả lời</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-unanswered"></div>
                            <span>Chưa trả lời</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
let timeLeft = 59 * 60 + 45;
const timer = document.getElementById('timer');

setInterval(() => {
    if (timeLeft > 0) {
        timeLeft--;
        const m = Math.floor(timeLeft / 60);
        const s = timeLeft % 60;
        timer.textContent = `${m}:${s.toString().padStart(2, '0')}`;
    }
}, 1000);
</script>
@endsection

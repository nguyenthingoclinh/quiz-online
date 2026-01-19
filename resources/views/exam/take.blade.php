@extends('layouts.app')

@section('title', 'Làm bài thi')

@section('content')
    <div class="exam-page">
        <div class="exam-container">

            <!-- ===== HEADER ===== -->
            <div class="exam-header">
                <div class="exam-header-top">
                    <div>
                        <h1 class="exam-title">{{ $participant->exam->title }}</h1>
                        <p class="exam-subtitle">{{ $participant->exam->questions->count() }} câu hỏi •
                            {{ $participant->exam->duration }} phút</p>
                    </div>

                    <div class="timer-box">
                        <div class="timer-display">
                            <input type="hidden" id="server_now" value="{{ now()->timestamp }}">
                            <input type="hidden" id="exam_start_time" value="{{ $participant->start_time->timestamp }}">
                            <input type="hidden" id="exam_duration" value="{{ $participant->exam->duration }}">

                            <div class="flex items-center space-x-2">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span id="timer" class="timer-time">59:45</span>
                            </div>
                            <p class="timer-label">Thời gian còn lại</p>
                        </div>

                        <form id="exam-submit-form" method="POST"
                            action="{{ route('student.exams.submit', $participant) }}">
                            @csrf

                            <button type="submit" class="submit-btn" id="submitBtn">
                                Nộp bài
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Progress -->
                <div class="progress-wrapper">
                    <div class="progress-info">
                        <span>
                            Đã trả lời:
                            <b>
                                <span id="answered-count">0</span> /
                                {{ $participant->exam->questions->count() }}
                            </b>
                        </span>
                        <span>
                            Tiến độ:
                            <b class="text-blue-600">
                                <span id="answered-percent">0</span>%
                            </b>
                        </span>
                    </div>
                    <div class="progress-bar-bg">
                        <div id="progress-bar" class="progress-bar" style="width:0%"></div>
                    </div>
                </div>
            </div>

            <!-- ===== MAIN LAYOUT ===== -->
            <div class="exam-grid">

                <!-- ===== QUESTIONS ===== -->
                <div class="exam-main">
                    @foreach ($participant->exam->questions as $index => $eq)
                        @php $question = $eq->question; @endphp

                        <div class="question-card" id="question-{{ $question->id }}">
                            <div class="question-header">
                                <h3 class="question-title">Câu {{ $index + 1 }}</h3>
                                <span
                                    id="badge-question-{{ $question->id }}"
                                    class="badge-unanswered"
                                >
                                    Chưa trả lời
                                </span>
                            </div>

                            <p class="question-text">
                                {{ $question->content }}
                            </p>

                            <div class="answer-list">
                                @foreach ($question->answers as $answer)
                                    <label
                                        class="answer-option answer-default"
                                        data-question-id="{{ $question->id }}"
                                        data-answer-id="{{ $answer->id }}"
                                    >
                                        <input
                                            type="radio"
                                            name="question_{{ $question->id }}"
                                            class="answer-radio"
                                        >
                                        <span class="answer-text">
                                            {{ $answer->content }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- ===== SIDEBAR ===== -->
                <div class="exam-sidebar">
                    <div class="sidebar-box">
                        <h3 class="sidebar-title">Danh sách câu hỏi</h3>

                        <div class="question-nav-grid">
                            @foreach ($participant->exam->questions as $i => $q)
                                <button id="nav-question-{{ $q->question->id }}" class="nav-btn-unanswered"
                                    onclick="document
                                    .getElementById('question-{{ $q->question->id }}')
                                    .scrollIntoView({ behavior: 'smooth', block: 'start' })">
                                    {{ $i + 1 }}
                                </button>
                            @endforeach
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
    const startTimeInput = document.getElementById('exam_start_time');
    const durationInput  = document.getElementById('exam_duration');
    const serverNowInput = document.getElementById('server_now');

    const EXAM_START_TIME = parseInt(startTimeInput.value) * 1000; // ms
    const EXAM_DURATION_MS = parseInt(durationInput.value) * 60 * 1000;

    let serverNow = parseInt(serverNowInput.value) * 1000;

    let clientStart = Date.now();

    const timer = document.getElementById('timer');

    function updateTimer() {
        const now = serverNow + (Date.now() - clientStart);

        const endTime = EXAM_START_TIME + EXAM_DURATION_MS;
        let remainingMs = endTime - now;

        if (remainingMs <= 0) {
            timer.textContent = "00:00";
            autoSubmitExam();
            return;
        }

        const totalSeconds = Math.floor(remainingMs / 1000);
        const m = Math.floor(totalSeconds / 60);
        const s = totalSeconds % 60;

        timer.textContent = `${m}:${s.toString().padStart(2, '0')}`;
    }
    updateTimer();
    setInterval(updateTimer, 1000);

    function autoSubmitExam() {
        // tránh submit nhiều lần
        if (window.__submitted) return;
        window.__submitted = true;

        alert('Hết thời gian làm bài. Bài thi sẽ được nộp tự động.');

        submitForm.submit();
    }

    // answer selection
    const totalQuestions = {{ $participant->exam->questions->count() }};
    const answers = {};

    const answeredCountEl = document.getElementById('answered-count');
    const answeredPercentEl = document.getElementById('answered-percent');
    const progressBarEl = document.getElementById('progress-bar');

    document.querySelectorAll('.answer-option').forEach(option => {
        option.addEventListener('click', () => {

            const questionId = option.dataset.questionId;
            const answerId = option.dataset.answerId;
            const answerText = option.querySelector('.answer-text').innerText;

            // clear selected answers of same question
            document
                .querySelectorAll(`[data-question-id="${questionId}"]`)
                .forEach(el => el.classList.remove('answer-selected'));

            option.classList.add('answer-selected');

            // save answer
            answers[questionId] = {
                question_id: questionId,
                selected_answer_id: answerId,
                selected_answer_content: answerText
            };

            // badge question
            const badge = document.getElementById(`badge-question-${questionId}`);
            badge.classList.remove('badge-unanswered');
            badge.classList.add('badge-answered');
            badge.innerText = 'Đã trả lời';

            // sidebar button
            const navBtn = document.getElementById(`nav-question-${questionId}`);
            navBtn.classList.remove('nav-btn-unanswered');
            navBtn.classList.add('nav-btn-answered');

            updateProgress();
            cacheAnswer();
        });
    });

    function updateProgress() {
        const answered = Object.keys(answers).length;
        const percent = Math.round((answered / totalQuestions) * 100);

        answeredCountEl.innerText = answered;
        answeredPercentEl.innerText = percent;
        progressBarEl.style.width = percent + '%';
    }

    function cacheAnswer() {
        fetch('{{ route("student.exams.cache.get", $participant) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                answers: Object.values(answers)
            })
        });
    }
</script>
<script>
    fetch('{{ route("student.exams.cache", $participant) }}')
        .then(res => res.json())
        .then(data => {
            window.answerStore = data || {};
            restoreUIFromStore();
        });

    function restoreUIFromStore() {
        Object.values(window.answerStore).forEach(item => {
            const option = document.querySelector(
                `[data-question-id="${item.question_id}"][data-answer-id="${item.selected_answer_id}"]`
            );
            if (option) option.click();
        });
    }
</script>
@endsection

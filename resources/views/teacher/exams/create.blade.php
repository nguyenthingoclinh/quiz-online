@extends('teacher.dashboard')

@section('title', 'Tạo bộ đề mới')
@section('page-title', 'Tạo bộ đề mới')

@section('content')

@if (session('success'))
    <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('api.teacher.exams.store') }}" method="POST" class="exam-form">
    @csrf

    <div class="exam-grid">
        <!-- ================= MAIN ================= -->
        <div class="exam-main">

            <!-- ===== Thông tin cơ bản ===== -->
            <div class="card">
                <h2 class="card-title">
                    <svg class="icon-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01
                                 M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Thông tin cơ bản
                </h2>

                <div class="form-group">
                    <label class="form-label">
                        Tên bộ đề <span class="required">*</span>
                    </label>
                    <input type="text" name="title" required
                           class="form-input"
                           placeholder="VD: Kiểm tra giữa kỳ - Toán học">
                </div>

                <div class="form-group">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" rows="3"
                              class="form-textarea"
                              placeholder="Mô tả ngắn về bộ đề..."></textarea>
                </div>

                <div class="form-grid-2">
                    <div>
                        <label class="form-label">
                            Môn học <span class="required">*</span>
                        </label>
                        <select name="subject" required class="form-select">
                            <option value="">Chọn môn học</option>
                            <option value="math">Toán học</option>
                            <option value="physics">Vật lý</option>
                            <option value="chemistry">Hóa học</option>
                            <option value="biology">Sinh học</option>
                            <option value="english">Tiếng Anh</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">Lớp / Khối</label>
                        <select name="grade" class="form-select">
                            <option value="">Chọn lớp</option>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- ===== Cài đặt thời gian ===== -->
            <div class="card">
                <h2 class="card-title">
                    <svg class="icon-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3
                                 m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Cài đặt thời gian
                </h2>

                <div class="form-grid-2">
                    <div>
                        <label class="form-label">
                            Thời gian làm bài (phút) <span class="required">*</span>
                        </label>
                        <input type="number" name="duration" min="1" required class="form-input">
                    </div>

                    <div>
                        <label class="form-label">Ngày bắt đầu</label>
                        <input type="datetime-local" name="start_date" class="form-input">
                    </div>
                </div>
            </div>

            <!-- ===== Danh sách câu hỏi ===== -->
            <div class="card">
                <div class="card-header flex justify-between items-center">
                    <h2 class="card-title">Danh sách câu hỏi</h2>

                    <div class="flex gap-2">
                        <button type="button" class="btn-secondary" onclick="openQuestionBank()">
                            📚 Chọn từ bộ đề
                        </button>

                        <button type="button" class="btn-primary" onclick="addQuestion()">
                            + Thêm câu hỏi
                        </button>
                    </div>
                </div>

                <div id="questions-container" class="question-list">
                    <!-- Question 1 -->
                    <div class="question-item">
                        <div class="question-header">
                            <h3 class="question-title">Câu 1</h3>
                            <button type="button" class="btn-remove" onclick="removeQuestion(this)">
                                ✕
                            </button>
                        </div>

                        <label class="form-label">
                            Nội dung câu hỏi <span class="required">*</span>
                        </label>
                        <textarea name="questions[0][content]" required
                                  class="form-textarea"></textarea>

                        <div class="answer-group">
                            <label class="form-label">Đáp án A *</label>
                            <div class="answer-row">
                                <input type="radio" name="questions[0][correct]" value="A">
                                <input type="text" name="questions[0][answer_a]" required class="answer-input">
                            </div>
                        </div>

                        <div class="answer-group">
                            <label class="form-label">Đáp án B *</label>
                            <div class="answer-row">
                                <input type="radio" name="questions[0][correct]" value="B">
                                <input type="text" name="questions[0][answer_b]" required class="answer-input">
                            </div>
                        </div>

                        <div class="answer-group">
                            <label class="form-label">Đáp án C *</label>
                            <div class="answer-row">
                                <input type="radio" name="questions[0][correct]" value="C">
                                <input type="text" name="questions[0][answer_c]" required class="answer-input">
                            </div>
                        </div>

                        <div class="answer-group">
                            <label class="form-label">Đáp án D *</label>
                            <div class="answer-row">
                                <input type="radio" name="questions[0][correct]" value="D">
                                <input type="text" name="questions[0][answer_d]" required class="answer-input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= SIDEBAR ================= -->
        <aside class="exam-sidebar">
            <div class="card sidebar-sticky">
                <h3 class="sidebar-title">Xuất bản</h3>

                <button type="submit" name="status" value="published"
                        class="btn-primary w-full">
                    Xuất bản ngay
                </button>

                <button type="submit" name="status" value="draft" disabled
                        class="btn-secondary w-full cursor-not-allowed">
                    Lưu nháp
                </button>

                {{-- <div class="sidebar-settings flex flex-wrap gap-4 mt-4">
                    <label class="checkbox-row flex gap-2 items-center">
                        <input type="checkbox" name="shuffle_questions">
                        Xáo trộn câu hỏi
                    </label>

                    <label class="checkbox-row flex gap-2 items-center">
                        <input type="checkbox" name="shuffle_answers">
                        Xáo trộn đáp án
                    </label>

                    <label class="checkbox-row flex gap-2 items-center">
                        <input type="checkbox" name="show_results" checked>
                        Hiển thị kết quả
                    </label>

                    <label class="checkbox-row flex gap-2 items-center">
                        <input type="checkbox" name="allow_review" checked>
                        Cho phép xem lại
                    </label>
                </div> --}}
            </div>
        </aside>
    </div>
</form>

<script>
let questionCount = 1;

function addQuestion() {
    const container = document.getElementById('questions-container');
    const index = questionCount;

    const html = `
        <div class="question-item">
            <div class="question-header">
                <h3 class="question-title">Câu ${index + 1}</h3>
                <button type="button" class="btn-remove" onclick="removeQuestion(this)">✕</button>
            </div>

            <label class="form-label">Nội dung câu hỏi *</label>
            <textarea name="questions[${index}][content]" required class="form-textarea"></textarea>

            ${['A','B','C','D'].map(l => `
                <div class="answer-group">
                    <label class="form-label">Đáp án ${l} *</label>
                    <div class="answer-row">
                        <input type="radio" name="questions[${index}][correct]" value="${l}">
                        <input type="text" name="questions[${index}][answer_${l.toLowerCase()}]"
                               required class="answer-input">
                    </div>
                </div>
            `).join('')}
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
    questionCount++;
}

function removeQuestion(btn) {
    const list = document.getElementById('questions-container');
    if (list.children.length > 1) {
        btn.closest('.question-item').remove();
        updateNumbers();
    } else {
        alert('Phải có ít nhất 1 câu hỏi!');
    }
}

function updateNumbers() {
    document.querySelectorAll('.question-title').forEach((el, i) => {
        el.textContent = `Câu ${i + 1}`;
    });
}
</script>
@endsection

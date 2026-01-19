@extends('layouts.dashboard')

@section('title', 'Danh sách bài thi')
@section('page-title', 'Danh sách bài thi')

@section('content')

<!-- ===== FILTERS ===== -->
<div class="exam-filter-box">
    <div class="flex flex-wrap items-center gap-4">
        <div class="flex-1 min-w-[200px]">
            <input
                type="text"
                placeholder="Tìm kiếm bài thi..."
                class="exam-search-input"
            >
        </div>

        <select class="exam-select">
            <option>Tất cả môn học</option>
            <option>Toán học</option>
            <option>Vật lý</option>
            <option>Hóa học</option>
            <option>Tiếng Anh</option>
        </select>

        <select class="exam-select">
            <option>Tất cả trạng thái</option>
            <option>Chưa làm</option>
            <option>Đã làm</option>
            <option>Hết hạn</option>
        </select>
    </div>
</div>

<!-- ===== EXAM GRID ===== -->
<div class="exam-grid">

    <!-- ===== CARD: AVAILABLE ===== -->
    <div class="exam-card">
        <div class="exam-card-header">
            <span class="exam-badge exam-badge-success">Có thể làm</span>

            <h3 class="exam-title">Kiểm tra giữa kỳ - Toán học</h3>
            <p class="exam-desc">Chương 1-5: Đại số và Hình học</p>

            <div class="exam-meta">
                <div class="exam-meta-item">⏱ 60 phút</div>
                <div class="exam-meta-item">❓ 30 câu hỏi</div>
                <div class="exam-meta-item">📅 Hạn: 25/12/2025</div>
            </div>
        </div>

        <div class="exam-card-footer">
            <a href="{{ route('student.exams.do', 1) }}" class="exam-btn-primary">
                Bắt đầu làm bài
            </a>
        </div>
    </div>

    <!-- ===== CARD: COMPLETED ===== -->
    <div class="exam-card">
        <div class="exam-card-header">
            <span class="exam-badge exam-badge-info">Đã hoàn thành</span>

            <h3 class="exam-title">Ôn tập - Tiếng Anh</h3>
            <p class="exam-desc">Grammar & Vocabulary Unit 1-3</p>

            <div class="exam-meta">
                <div class="exam-meta-item">⏱ 45 phút</div>
                <div class="exam-meta-item">❓ 25 câu hỏi</div>
                <div class="exam-meta-item">
                    <strong class="text-green-600">Điểm: 9.0</strong>
                </div>
            </div>
        </div>

        <div class="exam-card-footer">
            <button class="exam-btn-secondary">
                Xem kết quả
            </button>
        </div>
    </div>

    <!-- ===== CARD: IN PROGRESS ===== -->
    <div class="exam-card exam-card-warning">
        <div class="exam-card-header">
            <span class="exam-badge exam-badge-warning">Đang làm</span>

            <h3 class="exam-title">Kiểm tra - Vật lý</h3>
            <p class="exam-desc">Cơ học và Nhiệt học</p>

            <div class="exam-meta">
                <div class="exam-meta-item">⏱ 90 phút</div>
                <div class="exam-meta-item">❓ 40 câu hỏi</div>
                <div class="exam-meta-item">
                    <span class="text-yellow-600 font-semibold">15 / 40 câu</span>
                </div>

                <div class="exam-progress">
                    <div class="exam-progress-bar" style="width: 37.5%"></div>
                </div>
            </div>
        </div>

        <div class="exam-card-footer exam-card-footer-warning">
            <button class="exam-btn-warning">
                Tiếp tục làm bài
            </button>
        </div>
    </div>

    <!-- ===== CARD: EXPIRED ===== -->
    <div class="exam-card exam-card-disabled">
        <div class="exam-card-header">
            <span class="exam-badge exam-badge-danger">Hết hạn</span>

            <h3 class="exam-title">Kiểm tra - Hóa học</h3>
            <p class="exam-desc">Nguyên tố và Hợp chất</p>

            <div class="exam-meta">
                <div class="exam-meta-item">⏱ 45 phút</div>
                <div class="exam-meta-item">❓ 20 câu hỏi</div>
                <div class="exam-meta-item exam-meta-danger">
                    📅 Hết hạn: 20/12/2025
                </div>
            </div>
        </div>

        <div class="exam-card-footer">
            <button class="exam-btn-disabled" disabled>
                Đã hết hạn
            </button>
        </div>
    </div>

    <!-- ===== CARD: UPCOMING ===== -->
    <div class="exam-card">
        <div class="exam-card-header">
            <span class="exam-badge exam-badge-purple">Sắp diễn ra</span>

            <h3 class="exam-title">Thi cuối kỳ - Sinh học</h3>
            <p class="exam-desc">Tổng hợp kiến thức học kỳ 1</p>

            <div class="exam-meta">
                <div class="exam-meta-item">⏱ 120 phút</div>
                <div class="exam-meta-item">❓ 50 câu hỏi</div>
                <div class="exam-meta-item exam-meta-purple">
                    📅 Mở: 28/12/2025
                </div>
            </div>
        </div>

        <div class="exam-card-footer exam-card-footer-purple">
            <button class="exam-btn-disabled" disabled>
                Chưa mở
            </button>
        </div>
    </div>

</div>
@endsection

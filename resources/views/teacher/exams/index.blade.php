@extends('teacher.dashboard')

@section('title', 'Quản lý bộ đề')
@section('page-title', 'Quản lý bộ đề')

@section('content')

<!-- Header -->
<div class="exams-header">
    <div class="exams-filter">
        <input type="text" placeholder="Tìm kiếm bộ đề..." class="exams-input">
        <select class="exams-select">
            <option>Tất cả môn học</option>
            <option>Toán học</option>
            <option>Vật lý</option>
            <option>Hóa học</option>
            <option>Tiếng Anh</option>
        </select>
    </div>

    <a href="{{ route('teacher.exams.create') }}" class="btn-create">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>
        Tạo bộ đề mới
    </a>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stats-card">
        <p class="text-sm text-gray-600">Tổng bộ đề</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">24</p>
    </div>

    <div class="stats-card">
        <p class="text-sm text-gray-600">Đang hoạt động</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
    </div>

    <div class="stats-card">
        <p class="text-sm text-gray-600">Nháp</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
    </div>

    <div class="stats-card">
        <p class="text-sm text-gray-600">Đã kết thúc</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">4</p>
    </div>
</div>

<!-- Table -->
<div class="table-wrapper">
    <div class="table-header">
        <h2 class="table-title">Danh sách bộ đề</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="table-head">
                <tr>
                    <th class="table-th">Tên bộ đề</th>
                    <th class="table-th">Môn học</th>
                    <th class="table-th">Số câu</th>
                    <th class="table-th">Thời gian</th>
                    <th class="table-th">Trạng thái</th>
                    <th class="table-th text-right">Thao tác</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr class="table-row">
                    <td class="table-cell font-semibold">Kiểm tra giữa kỳ - Toán</td>
                    <td class="table-cell">
                        <span class="badge bg-blue-100 text-blue-700">Toán học</span>
                    </td>
                    <td class="table-cell">30</td>
                    <td class="table-cell">60 phút</td>
                    <td class="table-cell">
                        <span class="badge bg-green-100 text-green-700">Đang hoạt động</span>
                    </td>
                    <td class="table-cell">
                        <div class="action-group">
                            <button class="action-btn text-blue-600 hover:bg-blue-50">Xem</button>
                            <button class="action-btn text-yellow-600 hover:bg-yellow-50">Sửa</button>
                            <button class="action-btn text-red-600 hover:bg-red-50">Xóa</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <p class="text-sm text-gray-600">Hiển thị 1–3 trong 24 bộ đề</p>
        <div class="flex space-x-2">
            <button class="page-btn">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
        </div>
    </div>
</div>

@endsection

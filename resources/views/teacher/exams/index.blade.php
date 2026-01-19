@extends('teacher.dashboard')

@section('title', 'Quản lý bộ đề')
@section('page-title', 'Quản lý bộ đề')

@section('content')

<!-- Header -->
<div class="exams-header mb-0">
    <div class="exams-filter">
        {{-- <input type="text" placeholder="Tìm kiếm bộ đề..." class="exams-input">
        <select class="exams-select">
            <option>Tất cả môn học</option>
            <option>Toán học</option>
            <option>Vật lý</option>
            <option>Hóa học</option>
            <option>Tiếng Anh</option>
        </select> --}}
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stats-card">
        <p class="text-sm text-gray-600">Tổng bộ đề</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalExams }}</p>
    </div>

    <div class="stats-card">
        <p class="text-sm text-gray-600">Đang hoạt động</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $activeExams }}</p>
    </div>

    {{-- <div class="stats-card">
        <p class="text-sm text-gray-600">Nháp</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
    </div> --}}

    <div class="stats-card">
        <p class="text-sm text-gray-600">Đã kết thúc</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $endedExams }}</p>
    </div>
</div>

@if (session('success'))
    <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>
@endif
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
                    <th class="table-th">Lớp</th>
                    <th class="table-th">Số câu</th>
                    <th class="table-th">Điểm đạt</th>
                    <th class="table-th">Thời gian</th>
                    <th class="table-th text-center">Ngày bắt đầu</th>
                    <th class="table-th text-center">Thao tác</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($exams as $exam)
                    <tr class="hover:bg-gray-50">
                        <td class="table-cell font-semibold">{{ $exam->title }}</td>
                        <td class="table-cell">
                            <span class="badge bg-blue-100 text-blue-700">{{ $exam->subject }}</span>
                        </td>
                        <td class="table-cell">{{ $exam->grade }}</td>
                        <td class="table-cell">{{ $exam->questions_count }}</td>
                        <td class="table-cell">{{ $exam->pass_score }}</td>
                        <td class="table-cell">{{ $exam->duration }} phút</td>
                        <td class="table-cell text-center flex gap-2">
                            {{ $exam->start_at }}
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('api.exams.show', $exam) }}" class="text-blue-600">Xem</a>
                            <a href="{{ route('api.exams.edit', $exam) }}" class="text-yellow-600">Sửa</a>

                            <form action="{{ route('api.exams.destroy', $exam) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600"
                                        onclick="return confirm('Xóa bộ đề này?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t flex justify-between items-center">
        <span class="text-sm text-gray-600">
            Hiển thị {{ $exams->firstItem() }}–{{ $exams->lastItem() }} / {{ $exams->total() }}
        </span>

        {{ $exams->links() }}
    </div>
</div>

@endsection

@extends('layouts.admin')

@section('title', 'Quản lý học sinh')
@section('page-title', 'Quản lý học sinh')

@section('content')
    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-2">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            {{-- <div class="relative flex-1 min-w-[280px]">
            <input
                type="text"
                placeholder="Tìm kiếm học sinh theo tên, email, mã HS..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
            >
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
            <option value="">Tất cả lớp</option>
            <option value="10">Lớp 10</option>
            <option value="11">Lớp 11</option>
            <option value="12">Lớp 12</option>
        </select>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
            <option value="">Trạng thái</option>
            <option value="active">Đang học</option>
            <option value="suspended">Bị khóa</option>
            <option value="graduated">Đã tốt nghiệp</option>
        </select> --}}
        </div>

        <a href="{{ route('api.admin.students.create') }}"
            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center justify-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Thêm học sinh mới
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Tổng học sinh</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalStudents }}</p>
                    <p class="text-sm text-green-600 mt-2">
                        <span class="font-semibold">+{{ $newStudentsThisMonth }}</span> học sinh mới trong tháng
                    </p>
                </div>
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Đang hoạt động</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">987</p>
                <p class="text-sm text-blue-600 mt-2">
                    <span class="font-semibold">94%</span> tổng số
                </p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Mới tháng này</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">58</p>
                <p class="text-sm text-purple-600 mt-2">
                    <span class="font-semibold">5.5%</span> tăng trưởng
                </p>
            </div>
            <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
        </div>
    </div> --}}

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Điểm trung bình</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">7.8</p>
                    <p class="text-sm text-green-600 mt-2">
                        <span class="font-semibold">+0.3</span> so với kỳ trước
                    </p>
                </div>
                <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Students Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Danh sách học sinh</h2>
                <p class="text-sm text-gray-600 mt-1">Quản lý thông tin học sinh trong hệ thống</p>
            </div>
            <div class="flex items-center space-x-2">
                {{-- 1. Form Import CSV --}}
                <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <input type="file" name="file" id="fileInput" class="hidden" accept=".csv, .xlsx"
                        onchange="document.getElementById('importForm').submit()">

                    <button type="button" onclick="document.getElementById('fileInput').click()"
                        class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Import Excel/CSV">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </button>
                </form>

                {{-- 2. Export CSV --}}
                <a href="{{ route('students.export') }}"
                    class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition inline-block" title="Export CSV">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>

                {{-- 3. Show PDF --}}
                {{-- <a href="{{ route('api.admin.students.print') }}" target="_blank" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition inline-block" title="In danh sách">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
            </a> --}}
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Học
                            sinh</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mã HS
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Lớp
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Liên hệ
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Trạng
                            thái</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Thao
                            tác</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($students as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="min-w-11 min-h-11 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        {{ strtoupper(substr($student->full_name, 0, 2)) }}
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-semibold text-gray-900">{{ $student->full_name }}</p>
                                        <p class="text-xs text-gray-500">
                                            Ngày tạo: {{ $student->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="text-sm font-mono font-semibold">
                                    HS{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                                    ---
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <p class="text-gray-900 font-medium">{{ $student->email }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                                    Đang học
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('api.admin.students.show', $student) }}" class="text-blue-600">Xem</a>
                                <a href="{{ route('api.admin.students.edit', $student) }}"
                                    class="text-yellow-600">Sửa</a>

                                <form action="{{ route('api.admin.students.destroy', $student) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Xóa sinh viên này?')">
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
                Hiển thị {{ $students->firstItem() }}–{{ $students->lastItem() }} / {{ $students->total() }}
            </span>

            {{ $students->links() }}
        </div>
    </div>
    <!-- End Students Table -->

@endsection

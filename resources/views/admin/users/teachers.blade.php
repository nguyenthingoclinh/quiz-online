@extends('layouts.admin')

@section('title', 'Quản lý giáo viên')
@section('page-title', 'Quản lý giáo viên')

@section('content')

    <!-- ================= HEADER ACTIONS ================= -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-2">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            {{-- <div class="relative flex-1 min-w-[300px]">
            <input
                type="text"
                placeholder="Tìm kiếm giáo viên theo tên, email, mã GV..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div> --}}

            {{-- <select class="px-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500">
            <option value="">Tất cả môn học</option>
            <option>Toán học</option>
            <option>Vật lý</option>
            <option>Hóa học</option>
            <option>Sinh học</option>
            <option>Tiếng Anh</option>
            <option>Ngữ văn</option>
        </select>

        <select class="px-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500">
            <option value="">Trạng thái</option>
            <option>Đang dạy</option>
            <option>Nghỉ phép</option>
            <option>Tạm ngưng</option>
        </select> --}}
        </div>

        <a href="{{ route('api.admin.teachers.create') }}"
            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold
            rounded-lg shadow-lg hover:shadow-xl transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Thêm giáo viên mới
        </a>
    </div>

    <!-- ================= STATS CARDS ================= -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

        <!-- Tổng giáo viên -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Tổng giáo viên</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalLecturers }}</p>
                    <p class="text-sm text-green-600 mt-2">
                        <span class="font-semibold">+{{ $newLecturersThisMonth }}</span> giáo viên mới trong tháng
                    </p>
                </div>
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M7 20H2v-2
                                 a3 3 0 015.356-1.857M12 10a3 3 0 110-6 3 3 0 010 6z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Đang giảng dạy -->
        {{-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-600">Đang giảng dạy</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">165</p>
                <p class="text-sm text-blue-600 mt-2">88% tổng số</p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div> --}}

        <!-- Tổng lớp học -->
        {{-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-600">Tổng lớp học</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">45</p>
                <p class="text-sm text-gray-600 mt-2">
                    Trung bình <span class="font-semibold">3.7</span> lớp / GV
                </p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 21h18V8H3v13zM7 3h10v5H7z"/>
                </svg>
            </div>
        </div>
    </div> --}}

        <!-- Đề thi -->
        {{-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-600">Đề thi đã tạo</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">342</p>
                <p class="text-sm text-gray-600 mt-2">
                    Trung bình <span class="font-semibold">18</span> đề / GV
                </p>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7
                             a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div> --}}

    </div>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif
    <!-- ================= TABLE ================= -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="p-6 border-b flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold">Danh sách giáo viên</h2>
                <p class="text-sm text-gray-600">Quản lý thông tin giáo viên trong hệ thống</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left"><input type="checkbox"></th>
                        <th class="px-6 py-4 text-left">Giáo viên</th>
                        <th class="px-6 py-4 text-left">Mã GV</th>
                        <th class="px-6 py-4 text-left">Môn dạy</th>
                        <th class="px-6 py-4 text-left">Liên hệ</th>
                        <th class="px-6 py-4 text-center">Số lớp</th>
                        <th class="px-6 py-4 text-left">Trạng thái</th>
                        <th class="px-6 py-4 text-center">Thao tác</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($teachers as $teacher)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <input type="checkbox" value="{{ $teacher->id }}">
                            </td>

                            <td class="px-6 py-4 font-semibold">
                                {{ $teacher->full_name }}
                            </td>

                            <td class="px-6 py-4 font-mono">
                                GV{{ str_pad($teacher->id, 3, '0', STR_PAD_LEFT) }}
                            </td>

                            <td class="px-6 py-4">
                                —
                            </td>

                            <td class="px-6 py-4">
                                <p>{{ $teacher->email }}</p>
                            </td>

                            <td class="text-center px-6 py-4 font-bold">
                                {{ $teacher->exams()->count() }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">
                                    Đang dạy
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('api.admin.teachers.show', $teacher) }}" class="text-blue-600">Xem</a>
                                <a href="{{ route('api.admin.teachers.edit', $teacher) }}" class="text-yellow-600">Sửa</a>

                                <form action="{{ route('api.admin.teachers.destroy', $teacher) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Xóa giáo viên này?')">
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
                Hiển thị {{ $teachers->firstItem() }}–{{ $teachers->lastItem() }} / {{ $teachers->total() }}
            </span>

            {{ $teachers->links() }}
        </div>

    </div>

@endsection

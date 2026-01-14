@extends('layouts.teacher')

@section('title', 'Teacher Dashboard')
@section('page-title', 'Chào mừng trở lại, Giáo viên!')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- My Exams -->
    <div class="stats-card card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Đề thi của tôi</p>
                <p class="text-3xl font-bold text-gray-900">24</p>
                <p class="text-sm text-green-600 mt-2">
                    <span class="font-semibold">+3</span> đề mới tuần này
                </p>
            </div>
            <div class="stats-icon bg-purple-100">
                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- My Students -->
    <div class="stats-card card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Học sinh</p>
                <p class="text-3xl font-bold text-gray-900">156</p>
                <p class="text-sm text-blue-600 mt-2">
                    Trong <span class="font-semibold">5</span> lớp
                </p>
            </div>
            <div class="stats-icon bg-blue-100">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Submissions -->
    <div class="stats-card card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Lượt thi tháng này</p>
                <p class="text-3xl font-bold text-gray-900">847</p>
                <p class="text-sm text-green-600 mt-2">
                    <span class="font-semibold">+18%</span> so với tháng trước
                </p>
            </div>
            <div class="stats-icon bg-green-100">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Average Score -->
    <div class="stats-card card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Điểm TB lớp</p>
                <p class="text-3xl font-bold text-gray-900">7.8</p>
                <p class="text-sm text-yellow-600 mt-2">
                    <span class="font-semibold">+0.3</span> điểm so với trước
                </p>
            </div>
            <div class="stats-icon bg-yellow-100">
                <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Active Exams -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-900">Bài thi đang hoạt động</h2>
            <a href="{{ route('teacher.users.exams') }}" class="text-sm text-purple-600 hover:text-purple-700 font-semibold">
                Xem tất cả →
            </a>
        </div>
        <div class="p-6 space-y-4">
            <!-- Exam Item 1 -->
            <div class="border-2 border-gray-200 rounded-xl p-4 hover:border-purple-300 hover:bg-purple-50 transition cursor-pointer">
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center flex-1">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="font-semibold text-gray-900">Kiểm tra giữa kỳ - Toán học</h3>
                            <div class="flex items-center space-x-4 mt-1 text-sm text-gray-600">
                                <span>30 câu • 60 phút</span>
                                <span>Lớp 10A1, 10A2</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="badge badge-success">Đang diễn ra</span>
                        <p class="text-sm text-gray-600 mt-2">45 học sinh đã thi</p>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                    <div class="text-sm text-gray-600">
                        Hạn: <span class="font-medium">30/12/2025</span>
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm text-blue-600 hover:bg-blue-50 rounded-lg transition">Xem kết quả</button>
                        <button class="px-3 py-1 text-sm text-purple-600 hover:bg-purple-50 rounded-lg transition">Chỉnh sửa</button>
                    </div>
                </div>
            </div>

            <!-- Exam Item 2 -->
            <div class="border-2 border-gray-200 rounded-xl p-4 hover:border-purple-300 hover:bg-purple-50 transition cursor-pointer">
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center flex-1">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="font-semibold text-gray-900">Ôn tập - Đại số</h3>
                            <div class="flex items-center space-x-4 mt-1 text-sm text-gray-600">
                                <span>25 câu • 45 phút</span>
                                <span>Lớp 10A3</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="badge badge-success">Đang diễn ra</span>
                        <p class="text-sm text-gray-600 mt-2">28 học sinh đã thi</p>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                    <div class="text-sm text-gray-600">
                        Hạn: <span class="font-medium">28/12/2025</span>
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm text-blue-600 hover:bg-blue-50 rounded-lg transition">Xem kết quả</button>
                        <button class="px-3 py-1 text-sm text-purple-600 hover:bg-purple-50 rounded-lg transition">Chỉnh sửa</button>
                    </div>
                </div>
            </div>

            <!-- Exam Item 3 -->
            <div class="border-2 border-gray-200 rounded-xl p-4 hover:border-purple-300 hover:bg-purple-50 transition cursor-pointer">
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center flex-1">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="font-semibold text-gray-900">Kiểm tra 15 phút - Hình học</h3>
                            <div class="flex items-center space-x-4 mt-1 text-sm text-gray-600">
                                <span>15 câu • 15 phút</span>
                                <span>Lớp 10A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="badge badge-warning">Sắp mở</span>
                        <p class="text-sm text-gray-600 mt-2">Mở vào 28/12</p>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                    <div class="text-sm text-gray-600">
                        Hạn: <span class="font-medium">29/12/2025</span>
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm text-purple-600 hover:bg-purple-50 rounded-lg transition">Chỉnh sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Quick Stats -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="font-bold text-gray-900 mb-4">Hoạt động hôm nay</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Bài nộp mới</span>
                    <span class="text-lg font-bold text-gray-900">24</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Cần chấm</span>
                    <span class="text-lg font-bold text-orange-600">8</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Câu hỏi từ HS</span>
                    <span class="text-lg font-bold text-blue-600">3</span>
                </div>
            </div>
        </div>

        <!-- My Classes -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900">Lớp học của tôi</h3>
                <a href="{{ route('teacher.classes') }}" class="text-sm text-purple-600 hover:text-purple-700 font-semibold">Xem →</a>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-900">Lớp 10A1</p>
                        <p class="text-xs text-gray-600">32 học sinh</p>
                    </div>
                    <span class="text-sm font-semibold text-purple-600">ĐTB: 8.2</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-900">Lớp 10A2</p>
                        <p class="text-xs text-gray-600">30 học sinh</p>
                    </div>
                    <span class="text-sm font-semibold text-blue-600">ĐTB: 7.8</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-900">Lớp 10A3</p>
                        <p class="text-xs text-gray-600">28 học sinh</p>
                    </div>
                    <span class="text-sm font-semibold text-green-600">ĐTB: 7.5</span>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="font-bold text-gray-900 mb-4">Hoạt động gần đây</h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-900">Nguyễn Văn A đã hoàn thành bài thi</p>
                        <p class="text-xs text-gray-500">5 phút trước</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-900">Bài thi mới được tạo</p>
                        <p class="text-xs text-gray-500">1 giờ trước</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-900">Trần Thị B đã nộp bài</p>
                        <p class="text-xs text-gray-500">2 giờ trước</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Performance Chart -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-gray-900">Hiệu suất học sinh theo tháng</h2>
        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
            <option>Tất cả lớp</option>
            <option>Lớp 10A1</option>
            <option>Lớp 10A2</option>
            <option>Lớp 10A3</option>
        </select>
    </div>
    <div class="h-64 flex items-end justify-between space-x-2">
        <div class="flex flex-col items-center flex-1">
            <div class="w-full bg-purple-600 rounded-t-lg hover:bg-purple-700 transition cursor-pointer" style="height: 65%"></div>
            <span class="text-xs text-gray-600 mt-2">T7</span>
        </div>
        <div class="flex flex-col items-center flex-1">
            <div class="w-full bg-purple-600 rounded-t-lg hover:bg-purple-700 transition cursor-pointer" style="height: 70%"></div>
            <span class="text-xs text-gray-600 mt-2">T8</span>
        </div>
        <div class="flex flex-col items-center flex-1">
            <div class="w-full bg-purple-600 rounded-t-lg hover:bg-purple-700 transition cursor-pointer" style="height: 75%"></div>
            <span class="text-xs text-gray-600 mt-2">T9</span>
        </div>
        <div class="flex flex-col items-center flex-1">
            <div class="w-full bg-purple-600 rounded-t-lg hover:bg-purple-700 transition cursor-pointer" style="height: 80%"></div>
            <span class="text-xs text-gray-600 mt-2">T10</span>
        </div>
        <div class="flex flex-col items-center flex-1">
            <div class="w-full bg-purple-600 rounded-t-lg hover:bg-purple-700 transition cursor-pointer" style="height: 85%"></div>
            <span class="text-xs text-gray-600 mt-2">T11</span>
        </div>
        <div class="flex flex-col items-center flex-1">
            <div class="w-full bg-purple-700 rounded-t-lg hover:bg-purple-800 transition cursor-pointer" style="height: 90%"></div>
            <span class="text-xs text-gray-600 mt-2 font-semibold">T12</span>
        </div>
    </div>
</div>
@endsection

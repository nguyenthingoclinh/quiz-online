@extends('layouts.teacher')

@section('title', 'Ngân hàng câu hỏi')
@section('page-title', 'Ngân hàng câu hỏi')

@section('content')
<!-- Header Actions -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        <div class="relative flex-1 min-w-[280px]">
            <input 
                type="text" 
                placeholder="Tìm kiếm câu hỏi theo nội dung, môn học..." 
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
            >
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white">
            <option value="">Tất cả môn học</option>
            <option value="math">Toán học</option>
            <option value="physics">Vật lý</option>
            <option value="chemistry">Hóa học</option>
            <option value="biology">Sinh học</option>
        </select>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white">
            <option value="">Mức độ</option>
            <option value="easy">Dễ</option>
            <option value="medium">Trung bình</option>
            <option value="hard">Khó</option>
        </select>
    </div>
    
    <button class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center justify-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Thêm câu hỏi mới
    </button>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Tổng câu hỏi</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">256</p>
            </div>
            <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Câu hỏi dễ</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">98</p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Câu hỏi TB</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">112</p>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Câu hỏi khó</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">46</p>
            </div>
            <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Questions List -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Danh sách câu hỏi</h2>
            <p class="text-sm text-gray-600 mt-1">Quản lý ngân hàng câu hỏi của bạn</p>
        </div>
        <div class="flex items-center space-x-2">
            <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Import Excel">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
            </button>
            <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Export Excel">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="divide-y divide-gray-200">
        <!-- Question Item 1 -->
        <div class="p-6 hover:bg-gray-50 transition">
            <div class="flex items-start justify-between mb-3">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Toán học</span>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Dễ</span>
                        <span class="text-xs text-gray-500">ID: Q001</span>
                    </div>
                    <p class="text-gray-900 font-medium mb-3">
                        Tính giá trị của biểu thức: <strong>2x + 3y</strong> với x = 5 và y = 7
                    </p>
                    
                    <div class="grid grid-cols-2 gap-2 mb-3">
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-2">✓</span>
                            <span class="text-gray-700">A. 31</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">B</span>
                            <span class="text-gray-500">B. 25</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">C</span>
                            <span class="text-gray-500">C. 28</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">D</span>
                            <span class="text-gray-500">D. 35</span>
                        </div>
                    </div>

                    <div class="flex items-center text-xs text-gray-500 space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tạo: 15/12/2025
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Dùng trong 3 đề
                        </span>
                    </div>
                </div>

                <div class="flex items-center space-x-2 ml-4">
                    <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition" title="Chỉnh sửa">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Sao chép">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </button>
                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Xóa">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Question Item 2 -->
        <div class="p-6 hover:bg-gray-50 transition">
            <div class="flex items-start justify-between mb-3">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Toán học</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Trung bình</span>
                        <span class="text-xs text-gray-500">ID: Q002</span>
                    </div>
                    <p class="text-gray-900 font-medium mb-3">
                        Phương trình nào sau đây có nghiệm x = 3?
                    </p>
                    
                    <div class="grid grid-cols-2 gap-2 mb-3">
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">A</span>
                            <span class="text-gray-500">A. 2x + 1 = 5</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">B</span>
                            <span class="text-gray-500">B. 3x - 2 = 7</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">C</span>
                            <span class="text-gray-500">C. x + 5 = 10</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-2">✓</span>
                            <span class="text-gray-700">D. 4x = 12</span>
                        </div>
                    </div>

                    <div class="flex items-center text-xs text-gray-500 space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tạo: 18/12/2025
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Dùng trong 2 đề
                        </span>
                    </div>
                </div>

                <div class="flex items-center space-x-2 ml-4">
                    <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </button>
                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Question Item 3 -->
        <div class="p-6 hover:bg-gray-50 transition">
            <div class="flex items-start justify-between mb-3">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Toán học</span>
                        <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Khó</span>
                        <span class="text-xs text-gray-500">ID: Q003</span>
                    </div>
                    <p class="text-gray-900 font-medium mb-3">
                        Giải phương trình: <strong>x² - 5x + 6 = 0</strong>
                    </p>
                    
                    <div class="grid grid-cols-2 gap-2 mb-3">
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">A</span>
                            <span class="text-gray-500">A. x = 1; x = 6</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-2">✓</span>
                            <span class="text-gray-700">B. x = 2; x = 3</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">C</span>
                            <span class="text-gray-500">C. x = -2; x = -3</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <span class="w-6 h-6 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center text-xs font-bold mr-2">D</span>
                            <span class="text-gray-500">D. Vô nghiệm</span>
                        </div>
                    </div>

                    <div class="p-3 bg-blue-50 rounded-lg mb-3">
                        <p class="text-sm text-gray-700">
                            <strong class="text-blue-700">Giải thích:</strong> Phương trình có dạng ax² + bx + c = 0. 
                            Phân tích: (x - 2)(x - 3) = 0 → x = 2 hoặc x = 3
                        </p>
                    </div>

                    <div class="flex items-center text-xs text-gray-500 space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tạo: 20/12/2025
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Dùng trong 1 đề
                        </span>
                    </div>
                </div>

                <div class="flex items-center space-x-2 ml-4">
                    <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </button>
                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination-->
    <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <!-- Showing info -->
        <div class="text-sm text-gray-600">
            Hiển thị <span class="font-medium text-gray-900">1</span> – 
            <span class="font-medium text-gray-900">10</span> 
            trong tổng số <span class="font-medium text-gray-900">256</span> câu hỏi
        </div>

        <!-- Pagination buttons -->
        <div class="flex items-center space-x-1">
            <!-- Previous -->
            <button
                class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition disabled:opacity-50 disabled:cursor-not-allowed"
                disabled
            >
                Trước
            </button>

            <!-- Pages -->
            <button class="px-3 py-2 text-sm font-semibold text-white bg-purple-600 border border-purple-600 rounded-lg">
                1
            </button>
            <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                2
            </button>
            <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                3
            </button>

            <span class="px-2 text-gray-500">...</span>

            <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                26
            </button>

            <!-- Next -->
            <button
                class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition"
            >
                Sau
            </button>
        </div>
    </div>
</div>

@endsection
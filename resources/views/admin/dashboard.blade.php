@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Tổng quan')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Users -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Tổng người dùng</p>
                <p class="text-3xl font-bold text-gray-900">1,247</p>
                <p class="text-sm text-green-600 mt-2">
                    <span class="font-semibold">+12%</span> so với tháng trước
                </p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Exams -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Tổng bộ đề</p>
                <p class="text-3xl font-bold text-gray-900">342</p>
                <p class="text-sm text-green-600 mt-2">
                    <span class="font-semibold">+18</span> đề mới tuần này
                </p>
            </div>
            <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Questions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Ngân hàng câu hỏi</p>
                <p class="text-3xl font-bold text-gray-900">8,456</p>
                <p class="text-sm text-blue-600 mt-2">
                    <span class="font-semibold">+234</span> câu hỏi mới
                </p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3
                           0 1.4-1.278 2.575-3.006 2.907
                           -.542.104-.994.54-.994 1.093
                           m0 3h.01M21 12a9 9 0 11-18 0
                           9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Submissions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Lượt thi tháng này</p>
                <p class="text-3xl font-bold text-gray-900">12,847</p>
                <p class="text-sm text-green-600 mt-2">
                    <span class="font-semibold">+28%</span> tăng trưởng
                </p>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12
                           a2 2 0 002 2h10
                           a2 2 0 002-2V7
                           a2 2 0 00-2-2h-2
                           M9 5a2 2 0 002 2h2
                           a2 2 0 002-2"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-6 bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg p-8 text-white">
    <h2 class="text-2xl font-bold mb-6">Thao tác nhanh</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.users.students') }}"
           class="bg-white/10 hover:bg-white/20 rounded-xl p-4 transition flex items-center">
            <span class="font-semibold">Thêm người dùng</span>
        </a>

        <a href="{{ route('api.exams.create') }}"
           class="bg-white/10 hover:bg-white/20 rounded-xl p-4 transition flex items-center">
            <span class="font-semibold">Tạo bộ đề</span>
        </a>

        <a href="{{ route('admin.questions') }}"
           class="bg-white/10 hover:bg-white/20 rounded-xl p-4 transition flex items-center">
            <span class="font-semibold">Quản lý câu hỏi</span>
        </a>

        <a href="{{ route('admin.reports.overview') }}"
           class="bg-white/10 hover:bg-white/20 rounded-xl p-4 transition flex items-center">
            <span class="font-semibold">Xem báo cáo</span>
        </a>
    </div>
</div>
@endsection

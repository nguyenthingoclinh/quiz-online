@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Card 1: Tổng bài thi -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Tổng bài thi</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 2: Đã hoàn thành -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Đã hoàn thành</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 3: Điểm trung bình -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Điểm trung bình</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">8.5</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 4: Xếp hạng -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Xếp hạng</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">#15</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Bài thi có thể làm -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">Bài thi có thể làm</h2>
            </div>
            <div class="p-6 space-y-4">
                @forelse ($exams as $exam)
                    @php
                        $participant = $exam->participant;
                    @endphp

                    <div class="border-2 border-gray-100 rounded-xl p-4 hover:border-blue-200 hover:bg-blue-50 transition">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">
                                    {{ $exam->title }}
                                </h3>

                                <div class="flex items-center space-x-4 mt-2 text-sm text-gray-600">
                                    <span class="flex items-center">
                                        ⏱ {{ $exam->duration }} phút
                                    </span>

                                    <span class="flex items-center">
                                        ❓ {{ $exam->questions_count }} câu
                                    </span>
                                </div>
                            </div>

                            {{-- Badge trạng thái --}}
                            @if (!$participant)
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                    Chưa làm
                                </span>
                            @elseif ($participant->status === 'doing')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                                    Đang làm
                                </span>
                            @else
                                <span class="px-3 py-1 bg-gray-200 text-gray-600 text-xs font-semibold rounded-full">
                                    Đã nộp
                                </span>
                            @endif
                        </div>

                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                @if ($exam->start_at)
                                    Mở từ: <span class="font-medium">{{ $exam->start_at }}</span>
                                @else
                                    Luôn mở
                                @endif
                            </div>

                            {{-- Action --}}
                            @if (!$participant)
                                <form method="POST" action="{{ route('student.exams.start', $exam) }}">
                                    @csrf
                                    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg">
                                        Bắt đầu
                                    </button>
                                </form>
                            @elseif ($participant->status === 'doing')
                                <a href="{{ route('student.exams.do', $participant) }}"
                                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded-lg">
                                    Tiếp tục
                                </a>
                            @else
                                <button disabled
                                        class="px-4 py-2 bg-gray-300 text-gray-600 text-sm font-semibold rounded-lg cursor-not-allowed">
                                    Đã hoàn thành
                                </button>
                            @endif
                        </div>
                    </div>

                @empty
                    <div class="text-center text-gray-500 py-10">
                        Hiện chưa có bài thi nào khả dụng
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Sidebar: Recent Activity -->
    <div class="space-y-6">
        <!-- Lịch sử gần đây -->
        {{-- <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">Lịch sử gần đây</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">Toán học - Chương 3</p>
                        <p class="text-xs text-gray-500">Điểm: 9.0 • 2 giờ trước</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">Hóa học - Bài 5</p>
                        <p class="text-xs text-gray-500">Điểm: 8.5 • 1 ngày trước</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">Văn học - Kiểm tra</p>
                        <p class="text-xs text-gray-500">Điểm: 7.0 • 2 ngày trước</p>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Thông báo -->
        {{-- <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">Thông báo</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm text-gray-900">Bài kiểm tra Toán học sẽ mở vào 26/12/2025</p>
                        <p class="text-xs text-gray-500 mt-1">1 giờ trước</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 bg-gray-300 rounded-full mt-2 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm text-gray-900">Kết quả bài thi Văn đã được công bố</p>
                        <p class="text-xs text-gray-500 mt-1">3 giờ trước</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection

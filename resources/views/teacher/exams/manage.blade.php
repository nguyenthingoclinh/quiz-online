@extends('layouts.teacher')

@section('title', 'Quản lý đề thi')
@section('page-title', 'Quản lý đề thi của tôi')

@section('content')

<!-- ================= HEADER ACTIONS ================= -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        <div class="relative flex-1 min-w-[280px]">
            <input
                type="text"
                placeholder="Tìm kiếm đề thi..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg
                       focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
            >
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>

        <select class="px-4 py-2.5 border border-gray-300 rounded-lg
                       focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white">
            <option value="">Tất cả trạng thái</option>
            <option value="active">Đang hoạt động</option>
            <option value="draft">Nháp</option>
            <option value="ended">Đã kết thúc</option>
        </select>

        <select class="px-4 py-2.5 border border-gray-300 rounded-lg
                       focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white">
            <option value="">Sắp xếp</option>
            <option value="newest">Mới nhất</option>
            <option value="oldest">Cũ nhất</option>
            <option value="most_submissions">Nhiều lượt thi nhất</option>
        </select>
    </div>

    <!--<a href="{{ route('api.exams.create') }}"
       class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white
              font-semibold rounded-lg shadow-lg hover:shadow-xl transition
              transform hover:-translate-y-0.5 flex items-center justify-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>
        Tạo đề thi mới
    </a>-->
</div>

<!-- ================= STATS ================= -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    @php
        $stats = [
            ['label'=>'Tổng đề thi','value'=>24,'color'=>'purple'],
            ['label'=>'Đang hoạt động','value'=>12,'color'=>'green'],
            ['label'=>'Nháp','value'=>8,'color'=>'yellow'],
            ['label'=>'Tổng lượt thi','value'=>847,'color'=>'blue'],
        ];
    @endphp

    @foreach($stats as $s)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <p class="text-sm font-medium text-gray-600">{{ $s['label'] }}</p>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $s['value'] }}</p>
    </div>
    @endforeach
</div>

<!-- ================= EXAMS GRID ================= -->
<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">

    <!-- ===== CARD 1: ACTIVE ===== -->
    <div class="bg-white rounded-xl shadow-sm border-2 border-gray-200
                hover:border-purple-300 hover:shadow-lg transition overflow-hidden">

        <div class="p-6">
            <h3 class="font-bold text-lg text-gray-900 mb-1">
                Kiểm tra giữa kỳ - Toán
            </h3>
            <p class="text-sm text-gray-600 mb-4">Lớp 10A1, 10A2</p>

            <div class="space-y-2 text-sm text-gray-600 mb-4">
                <div>📘 30 câu hỏi</div>
                <div>⏱ 60 phút</div>
                <div>👥 45 lượt thi</div>
            </div>

            <div class="flex items-center justify-between pt-3 border-t">
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                             bg-green-100 text-green-700">
                    ● Đang hoạt động
                </span>
                <span class="text-xs text-gray-500">Hạn: 30/12/2025</span>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t flex justify-between">
            <div class="flex gap-2">
                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">📊</button>
                <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg">✏️</button>
                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">📄</button>
            </div>
            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">🗑</button>
        </div>
    </div>

    <!-- ===== CARD 2: DRAFT ===== -->
    <div class="bg-white rounded-xl shadow-sm border-2 border-gray-200
                hover:border-purple-300 hover:shadow-lg transition overflow-hidden">

        <div class="p-6">
            <h3 class="font-bold text-lg text-gray-900 mb-1">
                Ôn tập - Đại số
            </h3>
            <p class="text-sm text-gray-600 mb-4">Lớp 10A3</p>

            <div class="space-y-2 text-sm text-gray-600 mb-4">
                <div>📘 25 câu hỏi</div>
                <div>⏱ 45 phút</div>
                <div>👥 0 lượt thi</div>
            </div>

            <div class="flex items-center justify-between pt-3 border-t">
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                             bg-yellow-100 text-yellow-700">
                    ● Nháp
                </span>
                <span class="text-xs text-gray-500">Chưa xuất bản</span>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t flex justify-between">
            <div class="flex gap-2">
                <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg">
                    ✏️ Tiếp tục
                </button>
                <button class="px-4 py-2 bg-purple-600 hover:bg-purple-700
                               text-white text-sm font-semibold rounded-lg">
                    Xuất bản
                </button>
            </div>
            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">🗑</button>
        </div>
    </div>

    <!-- ===== CARD 3: ENDED ===== -->
    <div class="bg-white rounded-xl shadow-sm border-2 border-gray-200
                hover:border-purple-300 hover:shadow-lg transition overflow-hidden opacity-75">

        <div class="p-6">
            <h3 class="font-bold text-lg text-gray-900 mb-1">
                Kiểm tra 15 phút - Hình học
            </h3>
            <p class="text-sm text-gray-600 mb-4">Lớp 10A1</p>

            <div class="space-y-2 text-sm text-gray-600 mb-4">
                <div>📘 15 câu hỏi</div>
                <div>⏱ 15 phút</div>
                <div>👥 32 lượt thi</div>
            </div>

            <div class="flex items-center justify-between pt-3 border-t">
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                             bg-gray-100 text-gray-700">
                    ● Đã kết thúc
                </span>
                <span class="text-xs text-red-600">Hết hạn: 20/12/2025</span>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t flex justify-between">
            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                📊 Xem kết quả
            </button>
        </div>
    </div>

</div>

@endsection

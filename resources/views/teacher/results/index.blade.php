@extends('layouts.teacher')

@section('title', 'Kết quả thi')
@section('page-title', 'Kết quả thi')

@section('content')
    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            {{-- <div class="relative flex-1 min-w-[280px]">
            <input
                type="text"
                placeholder="Tìm kiếm học sinh, bài thi..."
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
            >
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white">
            <option value="">Tất cả bài thi</option>
            <option value="1">Kiểm tra giữa kỳ - Toán</option>
            <option value="2">Ôn tập - Đại số</option>
            <option value="3">Kiểm tra 15 phút</option>
        </select>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white">
            <option value="">Tất cả lớp</option>
            <option value="10a1">Lớp 10A1</option>
            <option value="10a2">Lớp 10A2</option>
            <option value="10a3">Lớp 10A3</option>
        </select> --}}
        </div>

        <button
            class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition flex items-center justify-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Xuất báo cáo
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Tổng bài đã chấm</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total'] }}</p>
                </div>
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Điểm TB lớp</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['avg_score'] }}</p>
                </div>
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Tỷ lệ đạt</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['pass_rate'] }}%</p>
                </div>
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Điểm cao nhất</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['max_score'] }}</p>
                </div>
                <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Kết quả chi tiết</h2>
                <p class="text-sm text-gray-600 mt-1">Danh sách kết quả thi của học sinh</p>
            </div>
            <div class="flex items-center space-x-2">
                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Lọc">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                </button>
                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="In">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Học
                            sinh</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bài thi
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Lớp
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Điểm
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Số câu
                            đúng</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Thời
                            gian</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ngày
                            thi</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Thao
                            tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($participants as $p)
                        @php
                            $correct = $p->answers->sum('score');
                            $total = $p->exam->questions_count ?? $p->answers->count();
                            $percent = $total ? round(($correct / $total) * 100) : 0;
                        @endphp

                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <p class="font-semibold">{{ $p->student->full_name }}</p>
                                <p class="text-xs text-gray-500">{{ $p->student->username }}</p>
                            </td>

                            <td class="px-6 py-4">
                                <p class="font-medium">{{ $p->exam->title }}</p>
                                <p class="text-xs text-gray-500">
                                    {{ $total }} câu • {{ $p->exam->duration }} phút
                                </p>
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-100 rounded-full">
                                    {{ $p->student->class ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 font-bold">
                                {{ number_format($p->total_score, 1) }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $correct }}/{{ $total }}
                                ({{ $percent }}%)
                            </td>

                            <td class="px-6 py-4 text-sm">
                                {{ gmdate('i:s', strtotime($p->submit_time) - strtotime($p->start_time)) }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                {{ $p->submit_time->format('d/m/Y H:i') }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('teacher.results', $p) }}"
                                    class="text-blue-600 hover:underline">
                                    Xem
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t flex justify-between items-center">
            <span class="text-sm text-gray-600">
                Hiển thị {{ $participants->firstItem() }}–{{ $participants->lastItem() }} / {{ $participants->total() }}
            </span>

            {{ $participants->links() }}
        </div>
    </div>

@endsection

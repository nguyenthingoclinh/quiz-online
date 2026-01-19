@extends('layouts.teacher')

@section('title', 'Ngân hàng câu hỏi')
@section('page-title', 'Ngân hàng câu hỏi')

@section('content')
<!-- Header Actions -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        {{-- <div class="relative flex-1 min-w-[280px]">
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
        </select> --}}
    </div>

    <a href="{{ route('api.questions.create') }}"
        class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center justify-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Thêm câu hỏi mới
    </a>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Tổng câu hỏi</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats->total }}</p>
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
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats->easy }}</p>
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
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats->medium }}</p>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Câu hỏi khó</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats->hard }}</p>
            </div>
            <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
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
            <a href="{{ route('questions.export') }}" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition" title="Import Excel">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
            </a>

            <form
                action="{{ route('questions.import') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <label class="cursor-pointer p-2 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <input
                        type="file"
                        name="file"
                        accept=".csv"
                        class="hidden"
                        onchange="this.form.submit()"
                    >
                </label>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="mx-3 mb-4 rounded bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="divide-y divide-gray-200">
        @foreach ($questions as $q)
            <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex items-start justify-between mb-3">

                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-2">
                            <span
                                @class([
                                    'px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700' => $q->difficulty === 'easy',
                                    'px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700' => $q->difficulty === 'medium',
                                    'px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700' => $q->difficulty === 'hard',
                                ])>
                                {{ ucfirst($q->difficulty) }}
                            </span>

                            <span class="text-xs text-gray-500">ID: Q{{ $q->id }}</span>
                        </div>

                        <p class="text-gray-900 font-medium mb-3">
                            {{ $q->content }}
                        </p>

                        {{-- Answers --}}
                        <div class="grid grid-cols-2 gap-2 mb-3">
                            @foreach ($q->answers as $i => $a)
                                <div class="flex items-center text-sm">
                                    <span class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold mr-2
                                        {{ $a->is_correct ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-600' }}">
                                        {{ $a->is_correct ? '✓' : chr(65 + $i) }}
                                    </span>
                                    <span class="{{ $a->is_correct ? 'text-gray-800' : 'text-gray-500' }}">
                                        {{ chr(65 + $i) }}. {{ $a->content }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        {{-- Meta --}}
                        <div class="flex items-center text-xs text-gray-500 space-x-4">
                            <span>🕒 {{ $q->created_at->format('d/m/Y') }}</span>
                            <span>📄 Dùng trong {{ $q->exams->count() }} đề</span>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center space-x-2 ml-4">
                        <a href="{{ route('api.questions.edit', $q) }}" class="p-2 text-yellow-600 hover:bg-purple-50 rounded-lg">
                            Sửa
                        </a>

                        <form method="POST" action="{{ route('api.questions.destroy', $q) }}"
                            onsubmit="return confirm('Xóa câu hỏi này?')">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination-->
    <div class="px-6 py-4 border-t">
        {{ $questions->links() }}
    </div>
</div>

@endsection

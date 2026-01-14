@extends('teacher.dashboard')

@section('title', 'Chi tiết bộ đề')
@section('page-title', 'Chi tiết bộ đề')

@section('content')

<div class="card mb-6">
    <h2 class="text-2xl font-bold mb-2">{{ $exam->title }}</h2>

    <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
        <p><b>Môn học:</b>
            @php
                $subjects = [
                    'math' => 'Toán học',
                    'physics' => 'Vật lý',
                    'chemistry' => 'Hóa học',
                    'biology' => 'Sinh học',
                    'english' => 'Tiếng Anh',
                ];
            @endphp
            {{ $subjects[$exam->subject] ?? $exam->subject }}
        </p>

        <p><b>Lớp:</b> {{ $exam->grade ? 'Lớp '.$exam->grade : '—' }}</p>

        <p><b>Thời gian làm bài:</b> {{ $exam->duration }} phút</p>

        <p><b>Ngày bắt đầu:</b>
            {{ $exam->start_at ? $exam->start_at : 'Chưa đặt' }}
        </p>

        <p class="col-span-2">
            <b>Mô tả:</b>
            {{ $exam->description ?: 'Không có mô tả' }}
        </p>
    </div>
</div>

<hr class="my-6">

<h3 class="text-lg font-semibold mb-4">
    Danh sách câu hỏi ({{ $exam->questions->count() }} câu)
</h3>

@if ($exam->questions->isEmpty())
    <p class="text-gray-500 italic">Chưa có câu hỏi nào.</p>
@else
    @foreach ($exam->questions as $i => $examQuestion)
        <div class="mb-6 p-4 border rounded">
            <b>Câu {{ $i + 1 }}:</b>
            {{ $examQuestion->question->content }}

            <ul class="ml-6 mt-2">
                @foreach ($examQuestion->question->answers as $answer)
                    <li class="{{ $answer->is_correct ? 'text-green-600 font-bold' : '' }}">
                        {{ $answer->content }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif

<div class="mt-8 flex gap-3">
    <a href="{{ route('api.exams.edit', $exam) }}" class="btn-primary flex items-center gap-2">
        ✏️ Sửa bộ đề
    </a>

    <form method="POST"
          action="{{ route('api.exams.destroy', $exam) }}"
          onsubmit="return confirm('Bạn chắc chắn muốn xóa bộ đề này?')">
        @csrf
        @method('DELETE')
        <button class="btn-danger">
            🗑 Xóa
        </button>
    </form>
</div>

@endsection

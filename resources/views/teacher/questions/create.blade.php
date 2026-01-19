@extends('layouts.teacher')

@section('title', 'Thêm câu hỏi')

@section('content')
    <form method="POST" action="{{ route('api.questions.store') }}" class="max-w-3xl bg-white p-6 rounded-xl shadow">
        @csrf

        {{-- Nội dung --}}
        <div class="mb-4">
            <label class="font-semibold">Nội dung câu hỏi</label>
            <textarea name="content" class="w-full mt-1 p-3 border rounded-lg" rows="4" required>{{ old('content') }}</textarea>
        </div>

        {{-- Độ khó --}}
        <div class="mb-4">
            <label class="font-semibold">Độ khó</label>
            <select name="difficulty" class="w-full mt-1 p-2 border rounded-lg" required>
                <option value="">-- Chọn độ khó --</option>
                <option value="easy">Dễ</option>
                <option value="medium">Trung bình</option>
                <option value="hard">Khó</option>
            </select>
        </div>

        {{-- Đáp án --}}
        <div class="mb-4">
            <label class="font-semibold">Đáp án (chọn 1 đáp án đúng)</label>

            @foreach (['A', 'B', 'C', 'D'] as $i => $label)
                <div class="flex items-center gap-3 mt-2">
                    <input type="radio" name="correct" value="{{ $i }}" required>

                    <input type="text" name="answers[]" class="flex-1 p-2 border rounded-lg"
                        placeholder="Đáp án {{ $label }}" required>
                </div>
            @endforeach
        </div>

        {{-- Actions --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('teacher.questions.qna') }}" class="px-4 py-2 border rounded-lg">
                Hủy
            </a>

            <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg">
                Tạo câu hỏi
            </button>
        </div>
    </form>
@endsection

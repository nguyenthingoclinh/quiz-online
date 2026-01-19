@extends('layouts.teacher')

@section('title', 'Chỉnh sửa câu hỏi')

@section('content')
    <form method="POST" action="{{ route('api.questions.update', $question) }}"
        class="max-w-3xl bg-white p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        {{-- Nội dung --}}
        <div class="mb-4">
            <label class="font-semibold">Nội dung câu hỏi</label>
            <textarea name="content" class="w-full mt-1 p-3 border rounded-lg" rows="4" required>{{ old('content', $question->content) }}</textarea>
        </div>

        {{-- Độ khó --}}
        <div class="mb-4">
            <label class="font-semibold">Độ khó</label>
            <select name="difficulty" class="w-full mt-1 p-2 border rounded-lg" required>
                <option value="easy" {{ $question->difficulty === 'easy' ? 'selected' : '' }}>Dễ</option>
                <option value="medium" {{ $question->difficulty === 'medium' ? 'selected' : '' }}>Trung bình</option>
                <option value="hard" {{ $question->difficulty === 'hard' ? 'selected' : '' }}>Khó</option>
            </select>
        </div>

        {{-- Đáp án --}}
        <div class="mb-4">
            <label class="font-semibold">Đáp án</label>

            @foreach ($question->answers as $i => $answer)
                <div class="flex items-center gap-3 mt-2">
                    <input type="radio" name="correct" value="{{ $i }}"
                        {{ $answer->is_correct ? 'checked' : '' }} required>

                    <input type="text" name="answers[]" value="{{ $answer->content }}"
                        class="flex-1 p-2 border rounded-lg" required>
                </div>
            @endforeach
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('teacher.questions.qna') }}" class="px-4 py-2 border rounded-lg">
                Hủy
            </a>

            <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg">
                Lưu
            </button>
        </div>
    </form>
@endsection

@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-bold mb-4">Sửa học sinh</h2>

    {{-- error show --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('api.admin.students.update', $student) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <input name="full_name" value="{{ $student->full_name }}" class="w-full border p-2 rounded">
        <input name="email" value="{{ $student->email }}" class="w-full border p-2 rounded">


        <button class="px-4 py-2 bg-yellow-600 text-white rounded">
            Cập nhật
        </button>
    </form>
</div>

@endsection

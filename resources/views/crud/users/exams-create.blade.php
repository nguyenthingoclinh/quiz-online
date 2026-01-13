@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-bold mb-4">Thêm giáo viên</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('api.admin.teachers.store') }}" class="space-y-4">
        @csrf
        <input name="full_name" placeholder="Họ tên" class="w-full border p-2 rounded">
        <input name="new_username" placeholder="Tên đăng nhập" class="w-full border p-2 rounded">
        <input name="email" placeholder="Email" class="w-full border p-2 rounded">
        <input name="new_password" placeholder="Mật khẩu" class="w-full border p-2 rounded">

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Lưu
        </button>
    </form>
</div>

@endsection

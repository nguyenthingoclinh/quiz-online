@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-bold mb-4">Chi tiết giáo viên</h2>

    <p><b>Họ tên:</b> {{ $teacher->full_name }}</p>
    <p><b>Email:</b> {{ $teacher->email }}</p>
    <p><b>Username:</b> {{ $teacher->username }}</p>
</div>

@endsection

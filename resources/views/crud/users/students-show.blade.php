@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-bold mb-4">Chi tiết học sinh</h2>

    <p><b>Họ tên:</b> {{ $student->full_name }}</p>
    <p><b>Email:</b> {{ $student->email }}</p>
    <p><b>Username:</b> {{ $student->username }}</p>
</div>

@endsection

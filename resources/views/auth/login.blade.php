@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<div class="login-wrapper">
    <div class="login-container">

        <div class="text-center mb-8">
            <div class="login-logo">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h2 class="login-title">Đăng nhập</h2>
        </div>

        <div class="login-card">
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded border border-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text"
                           name="username"
                           value="{{ old('username') }}"
                           required
                           class="login-input @error('username') border-red-500 @enderror"
                           placeholder="Nhập tên đăng nhập">

                    {{-- Show validation --}}
                    @error('username')
                        <p class="mt-1 text-sm text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password"
                           name="password"
                           required
                           class="login-input @error('password') border-red-500 @enderror"
                           placeholder="Nhập mật khẩu">

                    @error('password')
                        <p class="mt-1 text-sm text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="login-remember">
                        <span class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
                    </label>

                    <a href="#" class="login-link">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="login-btn">
                    Đăng nhập
                </button>
            </form>
        </div>

        <p class="login-footer">
            Hệ thống thi trắc nghiệm trực tuyến
        </p>

    </div>
</div>

@endsection

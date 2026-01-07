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
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div>
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" name="email" required
                           class="login-input"
                           placeholder="Nhập tên đăng nhập">
                </div>

                <div>
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" required
                           class="login-input"
                           placeholder="Nhập mật khẩu">
                </div>

                <div class="flex items-center justify-between">
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
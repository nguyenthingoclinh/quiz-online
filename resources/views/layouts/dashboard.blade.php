<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Hệ thống thi trắc nghiệm')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="app-body">
<div class="app-wrapper">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-inner">

            <!-- Logo -->
            <div class="sidebar-logo">
                <div class="logo-box">
                    <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <span class="logo-text">QuizOnline</span>
            </div>

            <!-- Menu -->
            <nav class="sidebar-menu">
                <a href="{{ route('dashboard') }}" class="sidebar-link active">Trang chủ</a>
                <a href="{{ route('exam.index') }}" class="sidebar-link">Bài thi</a>
                <a href="{{ route('history') }}" class="sidebar-link">Lịch sử</a>
                <a href="{{ route('profile') }}" class="sidebar-link">Hồ sơ</a>
            </nav>

            <!-- User info -->
            <div class="sidebar-user flex items-center justify-between">
                <div class="flex items">
                    <div class="user-avatar">{{ Str::upper(substr(Auth::user()->full_name, 0, 2)) }}</div>
                    <div class="user-info">
                        <p class="user-name">{{ Auth::user()->full_name }}</p>
                        <p class="user-email">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-blue-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>

        </div>
    </aside>

    <!-- Main -->
    <div class="main-area">

        <!-- Header -->
        <header class="main-header">
            <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>

            <button class="notify-btn">
                <span class="notify-dot"></span>
            </button>
        </header>

        <!-- Content -->
        <main class="page-content">
            @yield('content')
        </main>

    </div>

</div>
</body>
</html>
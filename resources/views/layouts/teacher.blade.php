<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teacher Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="teacher-body">
<div class="teacher-wrapper">

    <!-- Sidebar -->
    <aside class="teacher-sidebar">
        <div class="teacher-sidebar-inner">

            <!-- Logo -->
            <div class="teacher-logo">
                <div class="teacher-logo-icon">
                    <svg class="icon-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <p class="teacher-logo-title">Teacher Panel</p>
                    <p class="teacher-logo-sub">Giảng viên</p>
                </div>
            </div>

            <!-- Menu -->
            <nav class="teacher-menu">
                <a href="{{ route('teacher.dashboard') }}"
                   class="teacher-link {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('teacher.users.exams') }}"
                   class="teacher-link {{ request()->routeIs('teacher.exams.*') ? 'active' : '' }}">
                    Quản lý đề thi
                </a>

                <a href="{{ route('teacher.questions.qna') }}" class="teacher-link">
                    Ngân hàng câu hỏi
                </a>

                <a href="{{ route('teacher.students') }}" class="teacher-link">
                    Học sinh của tôi
                </a>

                <a href="{{ route('teacher.results') }}" class="teacher-link">
                    Kết quả thi
                </a>

                <a href="{{ route('teacher.reports') }}" class="teacher-link">
                    Thống kê & Báo cáo
                </a>

                <a href="{{ route('teacher.classes') }}" class="teacher-link">
                    Lớp học
                </a>

                <div class="teacher-divider"></div>

                <a href="{{ route('teacher.materials') }}" class="teacher-link">
                    Tài liệu
                </a>

                <a href="{{ route('teacher.settings') }}" class="teacher-link">
                    Cài đặt
                </a>
            </nav>

            <!-- User -->
            <div class="sidebar-user flex items-center justify-between">
                <div class="flex items">
                    <div class="teacher-avatar">{{ Str::upper(substr(Auth::user()->full_name, 0, 2)) }}</div>
                    <div class="teacher-user-info">
                        <p class="teacher-user-name">{{ Auth::user()->full_name }}</p>
                        <p class="teacher-user-email">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-blue-200 hover:text-white">
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
    <div class="teacher-main">

        <!-- Header -->
        <header class="teacher-header">
            <h1 class="teacher-page-title">@yield('page-title', 'Dashboard')</h1>

            <div class="teacher-header-actions">
                <a href="{{ route('api.exams.create') }}" class="teacher-btn-primary">
                    Tạo đề mới
                </a>
            </div>
        </header>

        <!-- Content -->
        <main class="teacher-content">
            @yield('content')
        </main>

    </div>

</div>
</body>
</html>

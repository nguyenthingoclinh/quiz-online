<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-blue-900 to-blue-800 text-white flex-shrink-0 overflow-y-auto">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-blue-700">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold text-lg">Admin Panel</span>
                            <p class="text-xs text-blue-200">Quản trị hệ thống</p>
                        </div>
                    </div>
                </div>

                <!-- Menu -->
                <nav class="flex-1 py-6 px-3">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 mb-1 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-800' }} transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <!-- Người dùng -->
                    <div class="mb-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-800 transition" onclick="toggleSubmenu('users')">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <span class="font-medium">Người dùng</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" id="users-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="users-submenu" class="hidden ml-4 mt-1 space-y-1">
                            <a href="{{ route('admin.users.students') }}" class="block px-4 py-2 rounded-lg text-sm text-blue-200 hover:bg-blue-800 transition">
                                Học sinh
                            </a>
                            <a href="{{ route('admin.users.teachers') }}" class="block px-4 py-2 rounded-lg text-sm text-blue-200 hover:bg-blue-800 transition">
                                Giáo viên
                            </a>
                            {{-- <a href="{{ route('admin.users.admins') }}" class="block px-4 py-2 rounded-lg text-sm text-blue-200 hover:bg-blue-800 transition">
                                Quản trị viên
                            </a> --}}
                        </div>
                    </div>

                    <!-- Bộ đề thi -->
                    <a href="{{ route('admin.exams') }}" class="flex items-center px-4 py-3 mb-1 rounded-lg text-blue-100 hover:bg-blue-800 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="font-medium">Bộ đề thi</span>
                    </a>

                    <!-- Câu hỏi -->
                    <a href="{{ route('admin.questions') }}" class="flex items-center px-4 py-3 mb-1 rounded-lg text-blue-100 hover:bg-blue-800 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium">Ngân hàng câu hỏi</span>
                    </a>

                    <!-- Môn học -->
                    <a href="{{ route('admin.subjects') }}" class="flex items-center px-4 py-3 mb-1 rounded-lg text-blue-100 hover:bg-blue-800 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="font-medium">Môn học</span>
                    </a>

                    <!-- Kết quả thi -->
                    <a href="{{ route('admin.results') }}" class="flex items-center px-4 py-3 mb-1 rounded-lg text-blue-100 hover:bg-blue-800 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        <span class="font-medium">Kết quả thi</span>
                    </a>

                    <!-- Báo cáo & Thống kê -->
                    <div class="mb-1">
                        <button class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-800 transition" onclick="toggleSubmenu('reports')">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                <span class="font-medium">Báo cáo</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" id="reports-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="reports-submenu" class="hidden ml-4 mt-1 space-y-1">
                            <a href="{{ route('admin.reports.overview') }}" class="block px-4 py-2 rounded-lg text-sm text-blue-200 hover:bg-blue-800 transition">
                                Tổng quan
                            </a>
                            <a href="{{ route('admin.reports.exams') }}" class="block px-4 py-2 rounded-lg text-sm text-blue-200 hover:bg-blue-800 transition">
                                Thống kê bài thi
                            </a>
                            <a href="{{ route('admin.reports.students') }}" class="block px-4 py-2 rounded-lg text-sm text-blue-200 hover:bg-blue-800 transition">
                                Thống kê học sinh
                            </a>
                        </div>
                    </div>

                    <!-- Cài đặt -->
                    <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-3 mb-1 rounded-lg text-blue-100 hover:bg-blue-800 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-medium">Cài đặt</span>
                    </a>
                </nav>

                <!-- User info -->
                <div class="border-t border-blue-700 p-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ Str::upper(substr(Auth::user()->full_name, 0, 2)) }}
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-semibold">{{ Auth::user()->full_name }}</p>
                            <p class="text-xs text-blue-200">{{ Auth::user()->email }}</p>
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
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
                <h1 class="text-xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>

                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input
                            type="text"
                            placeholder="Tìm kiếm..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-64"
                        >
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Notifications -->
                    <button class="relative text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id + '-submenu');
            const icon = document.getElementById(id + '-icon');

            submenu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>

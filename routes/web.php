<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GUEST (CHƯA LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => view('auth.login'))->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // ADMIN
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Admin Routes view
        Route::prefix('admin')->name('admin.')->group(function () {
            // Dashboard
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            // Users Management
            Route::get('/users/students', function () {
                return 'Quản lý học sinh';
            })->name('users.students');

            Route::get('/users/teachers', [AdminController::class, 'teachers'])->name('users.teachers');

            Route::get('/users/admins', function () {
                return 'Quản lý admin';
            })->name('users.admins');

            // Exams
            Route::get('/exams', function () {
                return 'Quản lý bộ đề';
            })->name('exams');

            // Questions
            Route::get('/questions', function () {
                return 'Ngân hàng câu hỏi';
            })->name('questions');

            // Subjects
            Route::get('/subjects', function () {
                return 'Quản lý môn học';
            })->name('subjects');

            // Results
            Route::get('/results', function () {
                return 'Kết quả thi';
            })->name('results');

            // Reports
            Route::get('/reports/overview', function () {
                return 'Báo cáo tổng quan';
            })->name('reports.overview');

            Route::get('/reports/exams', function () {
                return 'Thống kê bài thi';
            })->name('reports.exams');

            Route::get('/reports/students', function () {
                return 'Thống kê học sinh';
            })->name('reports.students');

            // Settings
            Route::get('/settings', function () {
                return 'Cài đặt hệ thống';
            })->name('settings');
        });

        // Admin Routes API
        Route::prefix('api/admin')->name('api.admin.')->group(function () {
            Route::get('/teachers/create', [AdminController::class, 'create'])->name('teachers.create');
            Route::post('/teachers', [AdminController::class, 'store'])->name('teachers.store');

            Route::get('/teachers/{teacher}', [AdminController::class, 'show'])->name('teachers.show');
            Route::get('/teachers/{teacher}/edit', [AdminController::class, 'edit'])->name('teachers.edit');
            Route::put('/teachers/{teacher}', [AdminController::class, 'update'])->name('teachers.update');
            Route::delete('/teachers/{teacher}', [AdminController::class, 'destroy'])->name('teachers.destroy');
        });
    });

    // GIẢNG VIÊN
    Route::middleware(['auth', 'role:giang_vien,admin'])->group(function () {
        // Teacher Routes
        Route::prefix('teacher')->name('teacher.')->group(function () {
            // Dashboard
            Route::get('/dashboard', function () {
                return view('teacher.dashboard');
            })->name('dashboard');

            // Exams
            Route::get('/exams', function () {
                return view('teacher.exams.index');
            })->name('exams.index');

            Route::get('/exams/create', function () {
                return view('teacher.exams.create');
            })->name('exams.create');

            Route::post('/exams', function () {
                return redirect()->route('teacher.exams.index');
            })->name('exams.store');

            // Questions
            Route::get('/questions', function () {
                return view('teacher.questions.qna');
            })->name('questions');

            // Students
            Route::get('/students', function () {
                return 'Danh sách học sinh';
            })->name('students');

            // Results
            Route::get('/results', function () {
                return view('teacher.results.index');
            })->name('results');

            // Reports
            Route::get('/reports', function () {
                return 'Báo cáo & thống kê';
            })->name('reports');

            // Classes
            Route::get('/classes', function () {
                return 'Quản lý lớp học';
            })->name('classes');

            // Materials
            Route::get('/materials', function () {
                return 'Tài liệu';
            })->name('materials');

            // Settings
            Route::get('/settings', function () {
                return 'Cài đặt';
            })->name('settings');
        });
    });

    // SINH VIÊN
    Route::middleware(['auth', 'role:sinh_vien'])->group(function () {
        // Route::get('/student', fn () => view('student.dashboard'))
        // ->name('student.dashboard');

        Route::get('/history', function () {
            return view();
        })->name('history');

        Route::get('/profile', function () {
            return 'Hồ sơ - Sẽ làm sau';
        })->name('profile');

        // Exams
        Route::get('/exam', function () {
            return view('exam.index');
        })->name('exam.index');

        Route::get('/exam/take/{id}', function ($id) {
            return view('exam.take');
        })->name('exam.take');

        Route::get('/exam/result/{id}', function ($id) {
            return view('exam.result');
        })->name('exam.result');
    });
});

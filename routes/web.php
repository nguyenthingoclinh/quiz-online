<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (! Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role->value) {
        'admin'      => redirect()->route('admin.dashboard'),
        'giang_vien' => redirect()->route('teacher.dashboard'),
        'sinh_vien'  => redirect()->route('dashboard'),
        default      => abort(403),
    };
});

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
            Route::get('/users/students', [AdminController::class, 'students'])->name('users.students');

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

        Route::get('/export-students', [StudentsController::class, 'exportCsv'])->name('students.export');
        Route::post('/import-students', [StudentsController::class, 'importCsv'])->name('students.import');
    });

    // GIẢNG VIÊN
    Route::middleware(['auth', 'role:giang_vien,admin'])->group(function () {
        // Teacher Routes
        Route::prefix('teacher')->name('teacher.')->group(function () {
            // Dashboard
            Route::get('/dashboard', function () {
                return view('teacher.dashboard');
            })->name('dashboard'); // mới làm giao diện - chưa làm chức năng

            // Exams
            Route::get('/exams', [ExamsController::class, 'index'])->name('users.exams');

            // Questions
            Route::get('/questions', [QuestionController::class, 'index'])->name('questions.qna');

            // Students
            Route::get('/students', [AdminController::class, 'studentsTeacher'])->name('students');

            // Results
            // Route::get('/results', function () {
            //     return view('teacher.results.index');
            // })->name('results');
            Route::get('/results', [ExamResultController::class, 'index'])->name('results');

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

        Route::get('/export-questions', [QuestionController::class, 'exportCsv'])->name('questions.export');
        Route::post('/import-questions', [QuestionController::class, 'importCsv'])->name('questions.import');
    });

    // SINH VIÊN
    Route::middleware(['auth', 'role:sinh_vien,admin'])->group(function () {
        Route::get('/dashboard', [ExamController::class, 'index'])->name('dashboard');

        Route::get('/history', function () {
            return 'Lịch sử - Sẽ làm sau';
        })->name('history');

        Route::get('/profile', function () {
            return 'Hồ sơ - Sẽ làm sau';
        })->name('profile');

        // Exams
        Route::get('/exam', function () {
            return view('exam.index');
        })->name('exam.index');

        Route::prefix('exams')->name('student.exams.')->middleware('auth')->group(function () {
            Route::post('/{exam}/start', [ExamController::class, 'start'])->name('start');
            Route::get('/participant/{participant}', [ExamController::class, 'do'])->name('do');
            Route::post('/{participant}/cache', [ExamController::class, 'cacheAnswer'])->name('cache');
            Route::get('/{participant}/cache', [ExamController::class, 'getCache'])->name('cache.get');

            Route::post('/{participant}/submit', [ExamController::class, 'submit'])->name('submit');
            Route::get('/{participant}/result', [ExamController::class, 'result'])->name('result');
        });
    });

    // Admin Routes API
    Route::prefix('api/admin')->name('api.admin.')->group(function () {
        Route::get('/teachers/create', function () {return view('crud.users.teachers-create');})->name('teachers.create');
        Route::post('/teachers', [TeachersController::class, 'store'])->name('teachers.store');
        Route::get('/teachers/{teacher}', [TeachersController::class, 'show'])->name('teachers.show');
        Route::get('/teachers/{teacher}/edit', [TeachersController::class, 'edit'])->name('teachers.edit');
        Route::put('/teachers/{teacher}', [TeachersController::class, 'update'])->name('teachers.update');
        Route::delete('/teachers/{teacher}', [TeachersController::class, 'destroy'])->name('teachers.destroy');

        Route::get('/students/create', function () {return view('crud.users.students-create');})->name('students.create');
        Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
        Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
        Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
        Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
        Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
    });

    // exam Routes API
    Route::prefix('api/exams')->name('api.exams.')->group(function () {
        Route::get('/create', function () {return view('teacher.exams.create');})->name('create');
        Route::post('/create', [ExamsController::class, 'store'])->name('store');
        Route::get('/{exam}', [ExamsController::class, 'show'])->name('show');
        Route::get('/{exam}/edit', [ExamsController::class, 'edit'])->name('edit');
        Route::put('/{exam}', [ExamsController::class, 'update'])->name('update');
        Route::delete('/{exam}', [ExamsController::class, 'destroy'])->name('destroy');


    });

    // question Routes API
    Route::prefix('api/questions')->name('api.questions.')->group(function () {
        Route::get('/create', function () {return view('teacher.questions.create');})->name('create');
        Route::post('/create', [QuestionController::class, 'store'])->name('store');
        Route::get('/{question}/edit', [QuestionController::class, 'edit'])->name('edit');
        Route::put('/{question}', [QuestionController::class, 'update'])->name('update');
        Route::delete('/{question}', [QuestionController::class, 'destroy'])->name('destroy');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbcController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    // Xử lý đăng nhập (tạm thời redirect)
    return redirect()->route('dashboard');
})->name('login.post');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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

    Route::get('/exams/manage', function () {
        return view('teacher.exams.manage');
    })->name('exams.manage');
    
    Route::post('/exams', function () {
        return redirect()->route('teacher.exams.index');
    })->name('exams.store');
    
    // Questions
    Route::get('/questions', function () {
        return view('teacher.questions.qna');
    })->name('questions.qna');
    
    // Students
    Route::get('/students', function () {
        return 'Danh sách học sinh';
    })->name('students');
    
    // Results
    Route::get('/results', function () {
        return view('teacher.results.index');
    })->name('results.index');
    
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

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Users Management
    Route::get('/users/students', function () {
        return view('admin.users.students');
    })->name('users.students');
    
    Route::get('/users/teachers', function () {
        return view('admin.users.teachers');
    })->name('users.teachers');
    
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

//Route::get('/login', [AbcController::class, 'login'])->name('login');

/*Route::middleware('auth')->group(function () {
    Route::get('/abc', [AbcController::class, 'abc'])->name('abc');


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';*/

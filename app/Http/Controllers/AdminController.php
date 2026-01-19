<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * For students
     * @return \Illuminate\View\View
     */
    public function students()
    {
        $totalStudents = User::where('role', UserRole::STUDENT)->count();

        $newStudentsThisMonth = User::where('role', UserRole::STUDENT)
        ->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])
        ->count();

        $students = User::where('role', UserRole::STUDENT)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.users.students', compact('totalStudents', 'newStudentsThisMonth', 'students'));
    }

    /**
     * Show teachers
     * @return \Illuminate\View\View
     */
    public function teachers()
    {
        $totalLecturers = User::where('role', UserRole::LECTURER)->count();

        $newLecturersThisMonth = User::where('role', UserRole::LECTURER)
        ->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])
        ->count();

        $teachers = User::where('role', UserRole::LECTURER)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.users.teachers', compact('totalLecturers', 'newLecturersThisMonth', 'teachers'));
    }

    /**
     * For students teacher
     * @return \Illuminate\View\View
     */
    public function studentsTeacher()
    {
        $totalStudents = User::where('role', UserRole::STUDENT)->count();

        $newStudentsThisMonth = User::where('role', UserRole::STUDENT)
        ->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])
        ->count();

        $students = User::where('role', UserRole::STUDENT)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('teacher.users.students', compact('totalStudents', 'newStudentsThisMonth', 'students'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function teachers()
    {
        $totalLecturers = User::where('role', UserRole::LECTURER)->count();

        $teachers = User::where('role', UserRole::LECTURER)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.users.teachers', compact('totalLecturers', 'teachers'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    // Màn tạo mới
    public function create()
    {
        return view('crud.users.students-create');
    }

    // Lưu tạo mới
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'new_username'  => 'required|string|unique:users,username',
            'new_password'  => 'required|string|min:6',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'username'  => $request->new_username,
            'password'  => Hash::make($request->new_password),
            'role'      => UserRole::STUDENT,
        ]);

        return redirect()
            ->route('admin.users.students')
            ->with('success', 'Đã thêm sinh viên mới');
    }

    // Xem chi tiết
    public function show(User $student)
    {
        abort_if($student->role !== UserRole::STUDENT, 404);

        return view('crud.users.students-show', compact('student'));
    }

    // Màn sửa
    public function edit(User $student)
    {
        abort_if($student->role !== UserRole::STUDENT, 404);

        return view('crud.users.students-edit', compact('student'));
    }

    // Update
    public function update(Request $request, User $student)
    {
        abort_if($student->role !== UserRole::STUDENT, 404);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $student->id,
        ]);

        $student->update($request->only('full_name', 'email'));

        return redirect()
            ->route('admin.users.students')
            ->with('success', 'Cập nhật thành công');
    }

    // Xóa
    public function destroy(User $student)
    {
        abort_if($student->role !== UserRole::STUDENT, 404);

        $student->delete();

        return back()->with('success', 'Đã xóa sinh viên');
    }
}

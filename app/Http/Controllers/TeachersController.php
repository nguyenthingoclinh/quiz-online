<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
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
            'role'      => UserRole::LECTURER,
        ]);

        return redirect()
            ->route('admin.users.teachers')
            ->with('success', 'Đã thêm giáo viên mới');
    }

    // Xem chi tiết
    public function show(User $teacher)
    {
        abort_if($teacher->role !== UserRole::LECTURER, 404);

        return view('crud.users.teachers-show', compact('teacher'));
    }

    // Màn sửa
    public function edit(User $teacher)
    {
        abort_if($teacher->role !== UserRole::LECTURER, 404);

        return view('crud.users.teachers-edit', compact('teacher'));
    }

    // Update
    public function update(Request $request, User $teacher)
    {
        abort_if($teacher->role !== UserRole::LECTURER, 404);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $teacher->id,
        ]);

        $teacher->update($request->only('full_name', 'email'));

        return redirect()
            ->route('admin.users.teachers')
            ->with('success', 'Cập nhật thành công');
    }

    // Xóa
    public function destroy(User $teacher)
    {
        abort_if($teacher->role !== UserRole::LECTURER, 404);

        $teacher->delete();

        return back()->with('success', 'Đã xóa giáo viên');
    }
}

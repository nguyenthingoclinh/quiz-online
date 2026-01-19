<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
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

    // Export CSV
    public function exportCsv()
    {
        $students = User::where('role', UserRole::STUDENT)->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=students.csv',
        ];

        $callback = function () use ($students) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['id', 'full_name', 'email', 'username', 'created_at']);

            foreach ($students as $s) {
                fputcsv($file, [
                    $s->id,
                    $s->full_name,
                    $s->email,
                    $s->username,
                    $s->created_at,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Import CSV
    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $file = fopen($request->file('file')->getRealPath(), 'r');

        $header = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($header, $row);

            User::create([
                'full_name' => $data['full_name'],
                'email'     => $data['email'],
                'username'  => $data['username'],
                'password'  => Hash::make($data['password']),
                'role'      => UserRole::STUDENT,
            ]);
        }

        fclose($file);

        return back()->with('success', 'Import học sinh thành công');
    }

}

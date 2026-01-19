<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Get users by role
     * GET /users?role=giang_vien
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersByRole(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:admin,giang_vien,sinh_vien',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        $roleEnum = match ($request->role) {
            'admin' => UserRole::ADMIN,
            'giang_vien' => UserRole::LECTURER,
            'sinh_vien' => UserRole::STUDENT,
        };

        $users = User::where('role', $roleEnum)
            ->paginate($request->per_page ?? 10);

        return response()->json($users);
    }

    /**
     * Create a new user
     * POST /users
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'username'   => 'required|string|unique:users,username',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6',
            'full_name'  => 'required|string',
            'role'       => 'required|string|in:admin,giang_vien,sinh_vien',
        ]);

        $roleEnum = match ($request->role) {
            'admin' => UserRole::ADMIN,
            'giang_vien' => UserRole::LECTURER,
            'sinh_vien' => UserRole::STUDENT,
        };

        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'full_name' => $request->full_name,
            'password'  => Hash::make($request->password),
            'role'      => $roleEnum,
        ]);

        return response()->json([
            'message' => 'Tạo user thành công',
            'data' => $user,
        ], 201);
    }

    /**
     * Count users by role
     * GET /users/sum?role=giang_vien
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sumUsersByRole(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:admin,giang_vien,sinh_vien',
        ]);

        $roleEnum = match ($request->role) {
            'admin' => UserRole::ADMIN,
            'giang_vien' => UserRole::LECTURER,
            'sinh_vien' => UserRole::STUDENT,
        };

        $count = User::where('role', $roleEnum)->count();

        return response()->json([
            'role' => $request->role,
            'total' => $count,
        ]);
    }
}

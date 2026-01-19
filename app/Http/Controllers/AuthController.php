<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors([
                    'username' => 'Tên đăng nhập không chính xác.',
                    'password' => 'Mật khẩu không chính xác.',
                ])
                ->withInput($request->only('username'));
        }

        // successful authentication
        $request->session()->regenerate();

        $user = Auth::user();

        // notify success message
        $successMsg = 'Đăng nhập thành công! Chào mừng trở lại.';

        return match ($user->role) {
            UserRole::ADMIN    => redirect()->route('admin.dashboard')->with('success', $successMsg),
            UserRole::LECTURER => redirect()->route('teacher.dashboard')->with('success', $successMsg),
            UserRole::STUDENT  => redirect()->route('dashboard')->with('success', $successMsg),
            default            => redirect('/')->with('success', $successMsg),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

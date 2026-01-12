<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $allowedRoles = collect($roles)->map(function ($role) {
            return match ($role) {
                'admin' => UserRole::ADMIN,
                'giang_vien' => UserRole::LECTURER,
                'sinh_vien' => UserRole::STUDENT,
                default => null,
            };
        })->filter()->toArray();

        if (! in_array($request->user()->role, $allowedRoles, true)) {
            abort(403, 'Bạn không có quyền truy cập trang này.');
        }

        return $next($request);
    }
}

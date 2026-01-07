<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return $next($request);
        }

        $role = $request->user()->role;

        if ($request->is('login')) {
            return $this->redirectByRole($role);
        }

        return $next($request);
    }

    protected function redirectByRole(int $role)
    {
        // role 0,1 → dashboard
        if (in_array($role, [0, 1])) {
            return redirect()->route('dashboard');
        }

        // role 2 → home
        if ($role === 2) {
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }
}

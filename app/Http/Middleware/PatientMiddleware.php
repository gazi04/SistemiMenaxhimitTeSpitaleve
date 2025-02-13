<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PatientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('patient')->user();

        if ($user && $user->id_number[0] === 'P' &&  $user->hasVerifiedEmail()) {
            return $next($request);
        }

        return redirect()->route('verification.notice');
        return redirect('/login');
    }
}

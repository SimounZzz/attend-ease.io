<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (in_array($request->path(), ['logout', 'get-data', 'set-card-id'])) {
            return $next($request);
        }

        if (session()->has('id') && session()->has('role')) {
            $role = session()->get('role');

            if(in_array($request->path(), ['latest-log', '/'])){
                return $next($request);
            }
    
            if ($role == 'Admin' && $request->path() != 'login' && strpos($request->path(), 'admin/') !== 0) {
                // dd('Redirecting to admin-home from', $request->path());
                return redirect()->route('admin-home');
            }
    
            if ($role == 'Staff' && $request->path() != 'login' && strpos($request->path(), 'staff/') !== 0) {
                // dd('Redirecting to staff-home from', $request->path());
                return redirect()->route('staff-home');
            }
    
            if ($role == 'Student' && $request->path() != 'login' && strpos($request->path(), 'student/') !== 0) {
                // dd('Redirecting to student-home from', $request->path());
                return redirect()->route('student-home');
            }
    
            if ($role == 'Faculty' && $request->path() != 'login' && strpos($request->path(), 'faculty/') !== 0) {
                // dd('Redirecting to professor-home from', $request->path());
                return redirect()->route('professor-home');
            }
            
            if ($role && $request->path() == 'login') {
                if($role == 'Faculty'){
                    $role = 'Professor';
                }
                return redirect()->route(strtolower($role) . '-home');
            }
        }
    
        if (!session()->has('id') && !session()->has('role') && !in_array($request->path(), ['login', '/', 'student/signup', 'faculty/signup', 'student/submit-signup', 'faculty/submit-signup', 'get-data', 'set-card-id'])) {
            return redirect()->route('login')->with('not_logged_in', 'You need to be logged in to do that.');
        }
    
        return $next($request);
    }
    
}

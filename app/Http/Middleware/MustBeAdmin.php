<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->isAdmin()) {
            return $next($request);
        }
        return redirect('/login');
//        abort('404', 'Page not found');
    }
}

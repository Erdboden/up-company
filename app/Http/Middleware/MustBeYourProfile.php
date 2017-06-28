<?php

namespace App\Http\Middleware;

use Closure;

class MustBeYourProfile
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
        if ($user && $user->name == $user = request()->segment(2)) {
            return $next($request);
        }
        abort('404', 'Page not found');
    }

}

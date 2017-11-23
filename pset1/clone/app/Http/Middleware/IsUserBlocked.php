<?php

namespace webapp\Http\Middleware;

use Closure;

class IsUserBlocked
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
        if (\Auth::user()->isBlocked()) {
            session()->flash('status', 'you are banned');
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}

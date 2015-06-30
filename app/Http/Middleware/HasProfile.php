<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use CodeCommerce\User;
use Illuminate\Support\Facades\Auth;

class HasProfile {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!User::find(Auth::id())->profile()->exists()){
            return redirect()->route('profile_register');
        }
		return $next($request);
	}

}

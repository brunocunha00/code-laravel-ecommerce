<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	private $openRoutes = ['pagseguro/*'];

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		foreach($this->openRoutes as $route) {
			if ($request->is($route)) {
				return $next($request);
			}
		}

		return parent::handle($request, $next);
	}

}

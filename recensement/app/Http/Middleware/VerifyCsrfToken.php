<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next){
        try {
            return parent::handle($request, $next);
        } catch (TokenMismatchException $exception) {
            return response()->view('valideok');
        }
    }
}

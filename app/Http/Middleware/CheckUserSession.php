<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 18/06/2017
 * Time: 23:33
 */

namespace App\Http\Middleware;

use Closure;

class CheckUserSession
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user')) {
            // user value cannot be found in session
            return redirect('/');
        }

        return $next($request);
    }
}
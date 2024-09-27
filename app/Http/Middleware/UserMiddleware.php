<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->cookie('token') !== null) {
           $email = JWTToken::decodeJWT($request->cookie('token'));
            $count = User::where('email', '=', $email )->count();
            if ($count === 1) {
                return $next($request);
            }else{
                return redirect('/login');
            }


        }else{
            return redirect('/login');
        }
    }
}

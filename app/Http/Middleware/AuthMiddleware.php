<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('users')->where('token', '!=', null)->first();
        if($user === null){
            return response()->json([
                'code' => 403,
                'message' => 'Доступ для вашей группы запрещен'
            ]);
        } else {
            return $next($request);
        }
    }
}


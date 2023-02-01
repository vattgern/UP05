<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthAdmin
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
        $user = User::where([
            'isAdmin' => true,
        ])->where('token', '!=', null)->get();
    
        if($user[0] === null){
            return response()->json([
                'code' => 403,
                'message' => 'Доступ для вашей группы запрещен'
            ]);
        } else {
            return $next($request);
        }
    }
}

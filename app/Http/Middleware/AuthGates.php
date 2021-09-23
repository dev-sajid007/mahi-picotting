<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
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
        $user = Auth::user();
        if($user){
            $permissions = Permission::all();
            foreach ($permissions as $permission){

                Gate::define($permission->slug,function($user) use ($permission){

                    return $user->hasPermission($permission->slug);
                });
            }
        }
        return $next($request);
    }
}

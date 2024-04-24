<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


class CheckUserRole
{


    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();
        $guildId = '1221755631401304064';
        $cacheKey = "user_roles_{$userId}_{$guildId}";

        if (Cache::has($cacheKey)) {
            $userRoles = Cache::get($cacheKey);
        } else {
            $userRoles = Auth::user()->getGuildMember($guildId)->roles;
            Cache::put($cacheKey, $userRoles, now()->addMinutes(1));
        }

        $hasPermission = false;

        foreach ($userRoles as $userRole) {
            if ($userRole == '1230309305203298324') {
                $hasPermission = true;
                break;
            }
        }

        if ($hasPermission) {
            Session::put('hasPermission', $hasPermission);
            return $next($request);
        }

        return redirect()->route('homepage');
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class UserRolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
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

                // Retourner un tableau associatif contenant les données
                $view->with([
                    'userRoles' => $userRoles,
                    'hasPermission' => $hasPermission
                ]);
            }
        });
    }

}


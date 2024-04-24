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
                $guildsCacheKey = "user_guilds_{$userId}";

                if (Cache::has($guildsCacheKey)) {
                    $guildServers = Cache::get($guildsCacheKey);
                } else {
                    $guildServers = Auth::user()->getGuilds();
                    Cache::put($guildsCacheKey, $guildServers, now()->addMinutes(1));
                }
                $isInServer = false;
                
                foreach ($guildServers as $guildServer) {
                    if ($guildServer->id == $guildId) {
                        $isInServer = true;
                        break;
                    }
                }
                if ($isInServer) {

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

                $view->with([
                    'userRoles' => $userRoles,
                    'hasPermission' => $hasPermission
                ]);
            }
                else {
                    $view->with([
                        'userRoles' => [],
                        'hasPermission' => false
                    ]);
                }
            }
        });
    }

}


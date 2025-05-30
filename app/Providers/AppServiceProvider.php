<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Check if the tables exist before running any DB queries
        if (Schema::hasTable('users') && Schema::hasTable('ideas')) {
            $topUsers = Cache::remember('topUsers', 60 * 2, function () {
                return User::withCount('ideas')
                    ->orderBy('ideas_count', 'DESC')
                    ->limit(5)
                    ->get();
            });

            View::share('topUsers', $topUsers);
        }
    }
}

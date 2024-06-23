<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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

         // # generating an observer
        User::observe(UserObserver::class);
        // # prevent lazy loading models
        Model::preventLazyLoading(! App::isProduction());
        // #  @dirctive blade @admin checker
        Blade::if('admin', function () {
            return (auth()->check() && auth()->user()->is_admin == 1);

        });
        // FreshCommand::prohibit(App::isProduction());

        DB::prohibitDestructiveCommands(App::isProduction());

        // define admin Gate
    //     Gate::define('admin', function($user) {
    //         If ($user->is_admin ==1) {
    //             return true;
    //         }
    //         return false;
    //     });



    }
}

<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Connection::class, function ($app) {
			return new Connection('mysql');
		});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrapFive();   // used for pagination link activation
        View::share('latestPosts', Product::latest()->take(5)->get());


         // # generating an observer
        User::observe(UserObserver::class);
        // # prevent lazy loading models
        Model::preventLazyLoading(! App::isProduction());
        // #  @dirctive blade @admin checker
        Blade::if('admin', function () {
            return (auth()->check() && auth()->user()->is_admin == 1);

        });
         // return rate limitting route group

        RateLimiter::for('global', function (Request $request) {
            return $request->user()
                        ? Limit::perMinute(1000)->by($request->user()?->id)
                        : Limit::perMinute(1000)->by($request->ip());
        });
        // FreshCommand::prohibit(App::isProduction());
        DB::prohibitDestructiveCommands(App::isProduction());  //prevent migration in production env(APP_ENV)






        // define admin Gate
    //     Gate::define('admin', function($user) {
    //         If ($user->is_admin ==1) {
    //             return true;
    //         }
    //         return false;
    //     });



    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TodoService;
use App\Models\Todo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\TodoServiceInterface',
            function () {
                return new TodoService(new Todo());
            }
        );
    }
}

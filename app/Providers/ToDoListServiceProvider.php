<?php

namespace App\Providers;

use App\Helpers\ToDoListEloquentOrm;
use Illuminate\Support\ServiceProvider;

class ToDoListServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Contracts\ToDoListContract', function() {
            return new ToDoListEloquentOrm();
        });
    }
}

<?php

namespace CodePress\CodeCategory\Providers;


use CodePress\CodeCategory\Repository\CategoryRepositoryEloquent;
use CodePress\CodeCategory\Repository\CategoryRepositoryInterface;
use Cviebrock\EloquentSluggable\ServiceProvider;

class CodeCategoryServiceProvider extends ServiceProvider
{
    /**
     *
     *  //dizer que isso é uma migração e que é pra copiar pra pasta de migração do laravel no artisan:publish
     */
    public function boot()
    {
        $this->publishes(
            [__DIR__ . '/../../resources/migrations' => base_path('database/migrations')],
            'migrations'
        );
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/codecategory', 'codecategory');
        require __DIR__ . '/../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepositoryEloquent::class);
    }

}
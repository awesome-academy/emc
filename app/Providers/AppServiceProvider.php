<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\SuggestProduct\SuggestProductRepositoryInterface::class,
            \App\Repositories\SuggestProduct\SuggestProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Comment\CommentRepositoryInterface::class,
            \App\Repositories\Comment\CommentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\OrderDetail\OrderDetailRepositoryInterface::class,
            \App\Repositories\OrderDetail\OrderDetailRepository::class
        );
        $this->app->singleton(
            \App\Repositories\PaymentDetail\PaymentDetailRepositoryInterface::class,
            \App\Repositories\PaymentDetail\PaymentDetailRepository::class
        );
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

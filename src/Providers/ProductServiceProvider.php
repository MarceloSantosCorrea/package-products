<?php

namespace Product\Providers;

use Product\Models\Product;
use Product\Models\ProductCategory;
use Product\Observers\ProductCategoryObserver;
use Illuminate\Support\ServiceProvider;
use Product\Observers\ProductObserver;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $path = realpath(__DIR__.'/../../config/products.php');
        $this->mergeConfigFrom($path, 'products');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/products.php' => config_path('products.php'),
        ], 'config');
        $this->publishes([
            __DIR__.'/../../database/migrations' => base_path('database/migrations'),
        ], 'migrations');
        $this->publishes([
            // ProductCategory
            __DIR__.'/../Http/Controllers/Api/ProductCategoryController.php' => app_path('Http/Controllers/Api/ProductCategoryController.php'),
            __DIR__.'/../Http/Controllers/Web/ProductCategoryController.php' => app_path('Http/Controllers/Web/ProductCategoryController.php'),
            // Product
            __DIR__.'/../Http/Controllers/Api/ProductController.php'         => app_path('Http/Controllers/Api/ProductController.php'),
            __DIR__.'/../Http/Controllers/Web/ProductController.php'         => app_path('Http/Controllers/Web/ProductController.php'),
        ], 'controllers');

        ProductCategory::observe(ProductCategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}

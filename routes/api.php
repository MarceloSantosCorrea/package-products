<?php

Route::group([
    'prefix'    => config('products.api.version'),
    'namespace' => config('products.api.namespace'),
    'as'        => 'api.',
], function () {
    Route::apiResource('product-categories', 'ProductCategoryController');
});

Route::group([
    'prefix'    => config('products.api.version'),
    'namespace' => config('products.api.namespace'),
    'as'        => 'api.',
], function () {
    Route::apiResource('products', 'ProductController');
});

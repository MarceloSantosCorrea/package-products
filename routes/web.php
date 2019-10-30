<?php

Route::group(['namespace' => config('products.web.namespace'), "as" => "web."], function () {
    Route::resource('product-categories', 'ProductCategoryController');
});

Route::group(['namespace' => config('products.web.namespace'), "as" => "web."], function () {
    Route::resource('products', 'ProductController');
});

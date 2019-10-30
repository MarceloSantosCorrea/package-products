<?php

return [
    'tables' => [
        'product_categories' => [
            'name'    => 'product_categories',
            'foreign' => 'product_category_id',
        ],
        'products'           => [
            'name'    => 'products',
            'foreign' => 'product_id',
        ],
    ],
    'web'    => [
        'namespace' => "Product\\Http\\Controllers\\Web",
    ],
    'api'    => [
        'namespace' => "Product\\Http\\Controllers\\Api",
        'version'   => 'v1',
    ],
];

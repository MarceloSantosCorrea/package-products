<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['name'];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('products.tables.product_categories.name'));

        parent::__construct($attributes);
    }
}

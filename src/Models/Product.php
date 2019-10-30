<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('products.tables.products.name'));

        $this->fillable = array_merge($this->fillable, [
            config('products.tables.product_categories.foreign'),
        ]);
        
        $this->setHidden([
            config('products.tables.product_categories.foreign'),
        ]);

        parent::__construct($attributes);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, config('products.tables.product_categories.foreign'), 'id');
    }
}

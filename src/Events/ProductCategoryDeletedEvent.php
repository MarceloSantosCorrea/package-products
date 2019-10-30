<?php

namespace Product\Events;

use Product\Models\ProductCategory;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCategoryDeletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var ProductCategory
     */
    public $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }
}

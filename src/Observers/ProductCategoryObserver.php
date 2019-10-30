<?php

namespace Product\Observers;

use Product\Models\ProductCategory;

class ProductCategoryObserver
{
    /**
     * Handle the product category "creating" event.
     *
     * @param  \Product\Models\ProductCategory  $productCategory
     *
     * @return void
     */
    public function creating(ProductCategory $productCategory)
    {
        if (is_null($productCategory->uid)) {
            $uid = uniqid();
            while (ProductCategory::where('uid', '=', $uid)->count() > 0) {
                $uid = uniqid();
            }
            $productCategory->uid = $uid;
        }
    }

    /**
     * Handle the product category "created" event.
     *
     * @param  \Product\Models\ProductCategory  $productCategory
     *
     * @return void
     */
    public function created(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "updated" event.
     *
     * @param  \Product\Models\ProductCategory  $productCategory
     *
     * @return void
     */
    public function updated(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "deleted" event.
     *
     * @param  \Product\Models\ProductCategory  $productCategory
     *
     * @return void
     */
    public function deleted(ProductCategory $productCategory)
    {
        //
    }
}

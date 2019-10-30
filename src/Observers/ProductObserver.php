<?php

namespace Product\Observers;

use Product\Models\Product;

class ProductObserver
{
    /**
     * Handle the product category "creating" event.
     *
     * @param  \Product\Models\Product  $productCategory
     *
     * @return void
     */
    public function creating(Product $productCategory)
    {
        if (is_null($productCategory->uid)) {
            $uid = uniqid();
            while (Product::where('uid', '=', $uid)->count() > 0) {
                $uid = uniqid();
            }
            $productCategory->uid = $uid;
        }
    }

    /**
     * Handle the product category "created" event.
     *
     * @param  \Product\Models\Product  $productCategory
     *
     * @return void
     */
    public function created(Product $productCategory)
    {
        //
    }

    /**
     * Handle the product category "updated" event.
     *
     * @param  \Product\Models\Product  $productCategory
     *
     * @return void
     */
    public function updated(Product $productCategory)
    {
        //
    }

    /**
     * Handle the product category "deleted" event.
     *
     * @param  \Product\Models\Product  $productCategory
     *
     * @return void
     */
    public function deleted(Product $productCategory)
    {
        //
    }
}

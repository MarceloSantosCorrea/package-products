<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('products.tables.products.name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid');
            $table->string('name');

            $table->unsignedBigInteger(config('products.tables.product_categories.foreign'))->nullable();
            $table->foreign(config('products.tables.product_categories.foreign'))->references('id')->on(config('products.tables.product_categories.name'))->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('products.tables.products.name'));
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_5925700')->references('id')->on('product_categories');
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id', 'inventory_fk_5925701')->references('id')->on('product_inventories');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id', 'discount_fk_5925705')->references('id')->on('discounts');
        });
    }
}

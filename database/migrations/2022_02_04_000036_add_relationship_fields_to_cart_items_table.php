<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCartItemsTable extends Migration
{
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreign('session_id', 'session_fk_5925741')->references('id')->on('shopping_sessions');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_5925742')->references('id')->on('products');
        });
    }
}

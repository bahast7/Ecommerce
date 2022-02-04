<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('quantity', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

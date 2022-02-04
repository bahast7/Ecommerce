<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('desc');
            $table->float('discount_percent', 15, 2);
            $table->string('active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

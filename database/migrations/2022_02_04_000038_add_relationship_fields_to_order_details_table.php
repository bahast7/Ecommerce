<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5925762')->references('id')->on('users');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id', 'payment_fk_5925764')->references('id')->on('payment_details');
        });
    }
}

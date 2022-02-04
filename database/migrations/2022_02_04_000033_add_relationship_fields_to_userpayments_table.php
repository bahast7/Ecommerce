<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserpaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('userpayments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5925584')->references('id')->on('users');
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->foreign('payment_type_id', 'payment_type_fk_5925585')->references('id')->on('paymenttypes');
        });
    }
}

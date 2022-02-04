<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('payment_details', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->foreign('payment_type_id', 'payment_type_fk_5925756')->references('id')->on('paymenttypes');
        });
    }
}

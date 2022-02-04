<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('userpayments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

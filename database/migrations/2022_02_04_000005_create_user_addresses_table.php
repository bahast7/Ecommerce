<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_line_one');
            $table->string('address_line_two')->nullable();
            $table->string('city');
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->string('phone_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

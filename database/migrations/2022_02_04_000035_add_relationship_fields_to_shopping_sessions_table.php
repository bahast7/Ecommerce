<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShoppingSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('shopping_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5925734')->references('id')->on('users');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersCartOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_cart_orders', function (Blueprint $table) {

           $table->increments('id');
           $table->string('first_name');
           $table->string('last_name');
           $table->integer('post_number');
           $table->string('city');
           $table->string('email');
           $table->string('phone');
           $table->string('comment');
           $table->string('payment_method');
           $table->text('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

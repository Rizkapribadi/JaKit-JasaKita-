<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('jasa_id')->unsigned();
            $table->string('code')->unique();
            $table->enum('type',['fixed','percent']);
            $table->bigInteger('value');
            $table->bigInteger('cart_value');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jasa_id')->references('id')->on('jasas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}

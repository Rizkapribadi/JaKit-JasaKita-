<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('penjual_id')->unsigned();
            $table->bigInteger('jasa_id')->unsigned();
            $table->bigInteger('total');
            $table->bigInteger('discount')->default(0);
            $table->string('name');
            $table->string('phoneNumber');
            $table->string('email');
            $table->text('address');
            $table->char('province_id', 2); 
            $table->char('regency_id', 4);
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penjual_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}

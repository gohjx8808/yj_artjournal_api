<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('receiver_address_id');
            $table->foreign('receiver_address_id')->references('id')->on('receiver_addresses')->onDelete('restrict');
            $table->unsignedInteger('shipping_fee')->nullable();
            $table->string('notes')->nullable();
            $table->unsignedInteger('promo_code_usage_id');
            $table->foreign('promo_code_usage_id')->references('id')->on('promo_code_usages')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('payment_option_id');
            $table->foreign('payment_option_id')->references('id')->on('payment_options')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('total_price');
            $table->dateTime('completed_at');
            $table->dateTime('cancelled_at');
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
        Schema::dropIfExists('user_orders');
    }
};

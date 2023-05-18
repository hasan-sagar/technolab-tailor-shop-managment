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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('employee_id');
            $table->string('invoice_no')->nullable();
            $table->string('order_date');
            $table->string('delivery_date');
            $table->string('order_status');
            $table->string('priority');
            $table->string('payment_method');
            $table->string('comment')->nullable();
            $table->string('total_products');
            $table->string('sub_total');
            $table->string('vat');
            $table->string('total_price');
            $table->string('pay');
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
};

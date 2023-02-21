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
        Schema::create('tr_request_order_dtl', function (Blueprint $table) {
            $table->id();
            $table->string('remarks')->nullable();
            $table->uuid('request_order_uuid');
            $table->string('product_name');
            $table->string('product_url')->nullable();
            $table->integer('qty');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->decimal('price_customer', 12, 2);
            $table->decimal('forex_rate', 12, 6);
            $table->decimal('subtotal_original', 12, 2);
            $table->string('status')->nullable();
            $table->integer('seq')->nullable();
            $table->decimal('additional_fee', 12, 2)->nullable();
            $table->decimal('subtotal_final', 12, 2)->nullable();
            $table->decimal('disc_percentage', 5, 2)->nullable();
        
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
        Schema::dropIfExists('tr_request_order_dtl');
    }
};

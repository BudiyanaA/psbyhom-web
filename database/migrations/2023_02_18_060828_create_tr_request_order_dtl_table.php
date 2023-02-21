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
            $table->uuid('RequestOrderUUID')->nullable();
            $table->string('product_name')->nullable();
            $table->text('product_url')->nullable();
            $table->integer('qty')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->decimal('price_customer', 12, 2)->nullable();
            $table->decimal('forex_rate', 12, 6)->nullable();
            $table->decimal('subtotal_original', 12, 2)->nullable();
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

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
        Schema::create('tr_request_order', function (Blueprint $table) {
            $table->id();
            $table->string('AdminUUID');
            $table->string('RequestOrderUUID');
            $table->string('request_id');
            $table->datetime('created_date');
            $table->string('status');
            $table->string('forex');
            $table->string('factor');
            $table->string('total_items');
            $table->string('total_price');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->datetime('OnDateTime');
            $table->string('POUUID');
            $table->string('InvoiceUUID');
            $table->string('note');
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
        Schema::dropIfExists('tr_request_order');
    }
};

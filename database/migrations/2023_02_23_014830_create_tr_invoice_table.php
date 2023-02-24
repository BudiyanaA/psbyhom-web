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
        Schema::create('tr_invoice', function (Blueprint $table) {
            $table->id();
            $table->string('InvoiceUUID');
            $table->string('RequestOrderUUID');
            $table->string('CustomerUUID');
            $table->string('invoice_id');
            $table->date('invoice_date');
            $table->string('created_by');
            $table->string('subtotal');
            $table->string('ongkir');
            $table->string('insurance');
            $table->string('block_package');
            $table->string('discount');
            $table->string('e_wallet_amount');
            $table->string('payment_methode');
            $table->string('unique_amount');
            $table->string('grand_total');
            $table->string('status_invoice');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->datetime('OnDateTime');
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
        Schema::dropIfExists('tr_invoice');
    }
};

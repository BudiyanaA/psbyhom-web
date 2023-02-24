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
        Schema::create('tr_payment', function (Blueprint $table) {
            $table->id();
            $table->string('PaymentUUID');
            $table->string('payment_id');
            $table->string('POUUID');
            $table->string('InvoiceUUID')->nullable();
            $table->string('BankUUID');
            $table->string('image_path');
            $table->datetime('created_date');
            $table->string('created_by');
            $table->string('payment_amount');
            $table->date('payment_date');
            $table->string('bank_source');
            $table->string('account_no_source');
            $table->string('account_name_source');
            $table->string('remarks');
            $table->string('status');
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
        Schema::dropIfExists('tr_payment');
    }
};

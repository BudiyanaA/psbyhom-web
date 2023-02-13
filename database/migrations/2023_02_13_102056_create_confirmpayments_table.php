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
        Schema::create('confirmpayments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('invoice_amount');
            $table->string('payment_amount');
            $table->string('bank_destination');
            $table->string('payment_date');
            $table->string('transaction_receipt');
            $table->string('bank_name');
            $table->string('bank_account');
            $table->string('account_name');
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
        Schema::dropIfExists('confirmpayments');
    }
};

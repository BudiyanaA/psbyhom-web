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
        Schema::create('ms_voucher', function (Blueprint $table) {
            // $table->id();
            $table->string('VoucherUUID')->primary();
            $table->string('voucher_id');
            $table->datetime('created_date');
            $table->date('valid_until_date');
            $table->string('discount_amount');
            $table->string('POUUID');
            $table->string('status');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->datetime('OnDateTime');
            $table->string('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_voucher');
    }
};

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
        Schema::create('tr_withdrawal', function (Blueprint $table) {
            $table->string('withdrawUUID')->primary();
            $table->string('bank_name');
            $table->string('account_no');
            $table->string('account_name');
            $table->string('CustomerUUID');
            $table->datetime('trans_date');
            $table->string('status');
            $table->string('amount');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->datetime('OnDateTime');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_withdrawal');
    }
};

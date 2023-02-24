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
        Schema::create('ms_bank', function (Blueprint $table) {
            $table->string('BankUUID');
            $table->string('bank_name');
            $table->string('bank_account_no');
            $table->string('bank_account_name');
            $table->string('status');
            $table->string('created_by');
            $table->datetime('created_date');
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
        Schema::dropIfExists('ms_bank');
    }
};

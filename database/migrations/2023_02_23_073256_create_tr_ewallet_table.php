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
        Schema::create('tr_ewallet', function (Blueprint $table) {
            // $table->id();
            $table->string('EWalletUUID')->primary();
            $table->string('CustomerUUID');
            $table->string('POUUID');
            $table->datetime('trans_date');
            $table->string('amount');
            $table->string('description');
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
        Schema::dropIfExists('tr_ewallet');
    }
};

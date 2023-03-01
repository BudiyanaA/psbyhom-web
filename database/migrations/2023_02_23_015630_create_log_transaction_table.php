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
        Schema::create('log_transaction', function (Blueprint $table) {
            // $table->id();
            $table->string('LogTransUUID');
            $table->string('POUUID');
            $table->datetime('log_date');
            $table->string('action_desc');
            $table->string('created_by');
            $table->string('UserUUID');
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
        Schema::dropIfExists('log_transaction');
    }
};

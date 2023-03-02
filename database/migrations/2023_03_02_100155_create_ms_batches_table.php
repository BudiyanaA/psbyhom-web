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
        Schema::create('ms_batches', function (Blueprint $table) {
            $table->string('BatchUUID');
            $table->string('batch_id');
            $table->string('remarks');
            $table->string('status');
            $table->string('created_date');
            $table->string('created_by');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->string('OnDateTime');
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
        Schema::dropIfExists('ms_batches');
    }
};

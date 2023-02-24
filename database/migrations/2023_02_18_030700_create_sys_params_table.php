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
        Schema::create('sys_params', function (Blueprint $table) {
            $table->id();
            $table->string('sys_id')->nullable();
            $table->string('name')->nullable();
            $table->string('value_name')->nullable();
            $table->string('value_max')->nullable();
            $table->string('value_id')->nullable();
            $table->string('value_1')->nullable();
            $table->string('value_2')->nullable();
            $table->string('value_3')->nullable();
            $table->string('value_4')->nullable();
            $table->string('value_5')->nullable();
            $table->string('is_inactive')->nullable();
            $table->string('ByUserUUID')->nullable();
            $table->string('ByUserIP')->nullable();
            $table->dateTime('OnDateTime')->nullable();
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
        Schema::dropIfExists('sys_params');
    }
};

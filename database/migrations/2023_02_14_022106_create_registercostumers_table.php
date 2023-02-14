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
        Schema::create('registercostumers', function (Blueprint $table) {
            $table->id();
            $table->string('nohp_1');
            $table->string('nohp_2')->nullable();
            $table->string('address');
            $table->string('zip_code');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('captcha');
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
        Schema::dropIfExists('registercostumers');
    }
};

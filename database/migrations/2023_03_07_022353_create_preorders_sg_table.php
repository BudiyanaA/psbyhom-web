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
        Schema::create('preorders_sg', function (Blueprint $table) {
            $table->id();
            $table->string('qty');
            $table->text('link');
            $table->string('name');
            $table->string('color');
            $table->string('sizeweight');
            $table->string('price');
            $table->string('po_type')->default('SG');
            $table->string('info');
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
        Schema::dropIfExists('preorders_sg');
    }
};

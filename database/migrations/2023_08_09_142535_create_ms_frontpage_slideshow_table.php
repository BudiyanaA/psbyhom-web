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
        Schema::create('ms_frontpage_slideshow', function (Blueprint $table) {
            $table->id();
            $table->uuid('SlideUUID');
            $table->string('slide_name');
            $table->string('ArticleUUID');
            $table->string('seq');
            $table->string('remarks');
            $table->string('image_slide');
            $table->string('status');
            $table->datetime('created_date');
            $table->string('created_by');
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
        Schema::dropIfExists('ms_frontpage_slideshow');
    }
};

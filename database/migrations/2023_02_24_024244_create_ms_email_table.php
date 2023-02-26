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
        Schema::create('ms_email', function (Blueprint $table) {
            $table->uuid('EmailUUID')->primary();
            $table->string('email_name');
            $table->string('email_title')->nullable();
            $table->text('email_content')->nullable();
            $table->string('email_content_bottom')->nullable();
            $table->datetime('created_date')->nullable();
            $table->string('created_by')->nullable();
            $table->string('ByUserUUID')->nullable();
            $table->string('ByUserIP')->nullable();
            $table->datetime('OnDateTime')->nullable();
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
        Schema::dropIfExists('ms_email');
    }
};

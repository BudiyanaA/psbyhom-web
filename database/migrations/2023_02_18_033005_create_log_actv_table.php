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
    Schema::create('log_actv', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('user_id');
        $table->string('UserUUID');
        $table->string('menu_nm');
        $table->dateTime('log_time');
        $table->string('Description');
        $table->string('LogType');
        $table->string('user_type');
        $table->string('RefUUID');
        $table->boolean('is_financial');
        $table->boolean('is_error');
        $table->string('ByUserUUID');
        $table->string('ByUserIP');
        $table->dateTime('OnDateTime');
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
        Schema::dropIfExists('log_actv');
    }
};

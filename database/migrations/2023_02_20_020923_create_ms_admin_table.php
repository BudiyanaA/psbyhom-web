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
    Schema::create('ms_admin', function (Blueprint $table) {
        $table->string('AdminUUID');
        $table->string('user_id');
        $table->string('name');
        $table->string('profile_pict');
        $table->string('password');
        $table->string('email');
        $table->string('RoleUUID');
        $table->string('UsergroupUUID')->nullable();
        $table->string('user_type')->nullable();
        $table->date('created_date');
        $table->date('created_by');
        $table->integer('login_attemp')->default(0);
        $table->datetime('last_logout');
        $table->datetime('last_login');
        $table->string('is_login')->default('N');
        $table->string('is_delete')->default(0);
        $table->string('is_superadmin')->nullable();
        $table->string('status')->default('01');
        $table->string('ByUserUUID');
        $table->string('ByUserIP');
        $table->datetime('OnDateTime');
        $table->string('token_id')->nullable();
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
        Schema::dropIfExists('ms_admin');
    }
};

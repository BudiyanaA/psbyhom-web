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
        Schema::create('ms_customers', function (Blueprint $table) {
            $table->string('CustomerUUID');
            $table->string('token_id');
            $table->string('customer_name');
            $table->string('password');
            $table->string('email');
            $table->string('handphone');
            $table->string('handphone2')->nullable();
            $table->string('fax')->nullable();
            $table->string('address');
            $table->string('kodepos');
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('status')->default('03');
            $table->dateTime('created_date');
            $table->string('created_by');
            $table->dateTime('OnDateTime');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->timestamps();
        });

        // hapus primary key yang tidak perlu
        Schema::table('ms_customers', function (Blueprint $table) {
            $primaryKey = 'PRIMARY';
            $indexExists = collect(DB::select("SHOW INDEX FROM ms_customers WHERE Key_name = ?", [$primaryKey]))->count() > 0;
            if ($indexExists) {
                $table->dropPrimary($primaryKey);
            }
        });

        // tambahkan primary key baru
        Schema::table('ms_customers', function (Blueprint $table) {
            $table->primary('CustomerUUID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_customers');
    }
};

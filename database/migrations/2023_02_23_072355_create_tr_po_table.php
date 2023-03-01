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
        Schema::create('tr_po', function (Blueprint $table) {
            // $table->id();
            $table->string('POUUID')->primary();
            $table->string('RequestOrderUUID');
            $table->string('po_id');
            $table->string('CustomerUUID');
            $table->datetime('trans_date');
            $table->string('created_by');
            $table->string('subtotal');
            $table->string('disc')->nullable();
            $table->string('insurance');
            $table->string('block_package');
            $table->string('ongkir');
            $table->string('ongkir_type');
            $table->string('unique_amount');
            $table->string('total_trans');
            $table->string('no_resi')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->string('receiver_province');
            $table->string('receiver_city');
            $table->string('status');
            $table->string('ByUserUUID');
            $table->string('ByUserIP');
            $table->datetime('OnDateTime');
            $table->string('receiver_kecamatan');
            $table->string('receiver_hp1');
            $table->string('receiver_hp2')->nullable();
            $table->string('receiver_kodepos')->nullable();
            $table->boolean('is_dropshipper')->nullable();
            $table->boolean('use_ewallet')->nullable();
            $table->text('notes')->nullable();
            $table->string('total_paid');
            $table->string('total_outstanding');
            $table->string('dp_amount');
            $table->string('refund_amount')->nullable();
            $table->string('refund_flag')->nullable();
            $table->string('total_seq');
            $table->string('courier_name')->nullable();
            $table->dateTime('verify_payment_date')->nullable();
            $table->string('additional_shipping_fee');
            $table->string('address')->nullable();
            $table->string('payment_dp');
            $table->string('payment_last')->nullable();
            $table->string('addendum_fee')->nullable();
            $table->string('addendum_note')->nullable();
            $table->string('dropshipper_name')->nullable();
            $table->string('dropshipper_contact')->nullable();
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
        Schema::dropIfExists('tr_po');
    }
};

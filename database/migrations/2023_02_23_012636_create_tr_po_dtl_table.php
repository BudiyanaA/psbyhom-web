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
        Schema::create('tr_po_dtl', function (Blueprint $table) {
            $table->uuid('PODtlUUID');
            $table->uuid('POUUID');
            $table->string('RequestOrderDtlUUID');
            $table->integer('qty');
            $table->integer('incoming_qty')->nullable();
            $table->string('price');
            $table->string('subtotal');
            $table->string('status');
            $table->integer('seq');
            $table->decimal('refund_amount')->nullable();
            $table->string('batch_no')->nullable();
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
        Schema::dropIfExists('tr_po_dtl');
    }
};

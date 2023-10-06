<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_invoice', function (Blueprint $table) {
            $table->string('no_invoice')->primary();
            $table->string('no_wo');
            $table->foreign('no_wo')->references('no_wo')->on('db_wo')->onDelete('cascade');
            $table->date('tgl_pembayaran');
            $table->integer('total_pembayaran');
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
        //
    }
}

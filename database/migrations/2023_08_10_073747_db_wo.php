<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbWo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_wo', function (Blueprint $table) {
            $table->string('no_wo')->primary();
            $table->string('status');
            $table->date('tanggal_mulai');
            $table->time('waktu_mulai');
            $table->date('tanggal_estimasi_selesai')->nullable();
            $table->time('waktu_estimasi_selesai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('no_polisi');
            $table->json('sparepart')->nullable();
            $table->json('layanan')->nullable();
            $table->unsignedBigInteger('biaya')->nullable();
            $table->unsignedBigInteger('id_teknisi')->nullable();
            $table->foreign('no_polisi')->references('no_polisi')->on('db_pelanggan')->onDelete('cascade');
            $table->unsignedBigInteger('service_advisor');
            $table->foreign('service_advisor')->references('id')->on('db_users')->onDelete('cascade');
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

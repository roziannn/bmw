<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbJenisService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_jenis_service', function (Blueprint $table) {
            $table->id('id_service');
            $table->string('jenis_service');
            $table->integer('harga');
            $table->string('estimasi_waktu');
            $table->unsignedBigInteger('id_teknisi');
            $table->foreign('id_teknisi')->references('id_teknisi')->on('db_teknisi')->onDelete('cascade');
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

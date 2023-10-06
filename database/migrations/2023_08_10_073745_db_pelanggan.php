<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_pelanggan', function (Blueprint $table) {
            $table->string('no_polisi')->primary();
            $table->string('nama');
            $table->string('alamat');
            $table->string('email');
            $table->string('jenis_mobil');
            $table->string('no_telp');
            $table->string('no_rangka')->unique()->nullable();
            $table->string('kilometer')->nullable();
            $table->date('tanggal_registrasi')->nullable();
            $table->rememberToken();
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
    }
}

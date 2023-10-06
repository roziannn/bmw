<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbTeknisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_teknisi', function (Blueprint $table) {
            $table->id('id_teknisi');
            $table->string('nama_teknisi');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('foreman_id')->nullable();
            $table->timestamps();
    
            // Tambahkan konstrain kunci asing
            $table->foreign('foreman_id')->references('id')->on('db_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_teknisi');
    }
}

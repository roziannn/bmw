<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_booking', function (Blueprint $table) {
            $table->id();
            // $table->string('nama');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('no_polisi')->nullable();
            $table->foreign('no_polisi')->references('no_polisi')->on('db_pelanggan')->onDelete('cascade');
            $table->date('tgl_booking');
            $table->string('service_type')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('pengerjaan')->nullable();
            $table->string('no_wo')->nullable();
            $table->string('status')->default('pending');
            // $table->string('password')->nullable();
            // $table->rememberToken();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbDetailWo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_detail_wo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id_service')->on('db_jenis_service')->onDelete('cascade');
            $table->string('status');
            $table->string('no_wo');
            $table->foreign('no_wo')->references('no_wo')->on('db_wo')->onDelete('cascade');
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

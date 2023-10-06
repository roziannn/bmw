<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTglBookingToDbWo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('db_wo', function (Blueprint $table) {
            $table->date('tgl_booking')->after('no_polisi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('db_wo', function (Blueprint $table) {
            $table->dropColumn('tgl_booking');
        });
    }
}
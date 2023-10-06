<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nama')->nullable();
            $table->integer('no_telp')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('no_polisi')->nullable();
            $table->foreign('no_polisi')->references('no_polisi')->on('db_pelanggan')->onDelete('cascade');
            $table->string('role')->default('customer');
            $table->string('password')->nullable();
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
        Schema::dropIfExists('users');
    }
}

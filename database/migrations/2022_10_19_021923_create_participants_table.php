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
        Schema::create('participants', function (Blueprint $table) {
          $table->id();
          $table->string('nama');
          $table->string('gender');
          $table->bigInteger('nik')->unique();
          $table->string('tempat_lhr');
          $table->date('tanggal_lhr');
          $table->string('golongan');
          $table->string('jabatan');
          $table->string('instansi');
          $table->text('alamat_instansi');
          $table->string('no_hp');
          $table->text('alamat_rumah');
          $table->string('email')->unique();
          $table->bigInteger('no_npwp');
          $table->string('nama_bank');
          $table->bigInteger('no_rek');
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
        Schema::dropIfExists('participants');
    }
};

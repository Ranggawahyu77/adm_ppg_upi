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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->string('id_kegiatan')->primary();
            // $table->id();
            $table->string('nama_kegiatan');
            $table->string('tempat_kegiatan');
            $table->date('tgl_kegiatan');
            $table->date('tgl_berakhir')->nullable()->default(null);
            $table->string('kode_unik');
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
        Schema::dropIfExists('kegiatans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungananaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungananaks', function (Blueprint $table) {
            $table->id();
            $table->string('judulKegiatanKunjungan');
            $table->string('gambar_kunjungan');
            $table->string('keterangan_kunjungan');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('lampiran_kunjungan')->nullable();
            $table->boolean('status_kunjungan')->nullable();
            $table->unsignedBigInteger('anak_id');
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
        Schema::dropIfExists('kunjungananaks');
    }
}

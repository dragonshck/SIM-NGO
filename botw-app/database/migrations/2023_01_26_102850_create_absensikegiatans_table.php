<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensikegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensikegiatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kegiatan_id');
            $table->bigInteger('anak_id');
            $table->string('status_absen');
            $table->date('tanggal_absen');
            $table->string('periode');
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
        Schema::dropIfExists('absensikegiatans');
    }
}

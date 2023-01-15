<?php

use App\Models\KelompokUmur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanppasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatanppas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan');
            $table->string('tempat_pelaksanaan');
            $table->string('gambar_event');
            $table->string('judul_event');
            $table->string('keterangan_event');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('tipe_kegiatan');
            $table->foreignIdFor(KelompokUmur::class)->nullable();
            $table->boolean('status_kegiatan');
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
        Schema::dropIfExists('kegiatanppas');
    }
}

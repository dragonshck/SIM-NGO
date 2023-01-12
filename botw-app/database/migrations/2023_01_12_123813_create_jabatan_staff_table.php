<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan_staff', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');
            $table->string('gaji_pokok');
            $table->string('tunjangan_kendaraan');
            $table->string('tunjangan_makanan');
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
        Schema::dropIfExists('jabatan_staff');
    }
}

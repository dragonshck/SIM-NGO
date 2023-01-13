<?php

use App\Models\StaffPPA;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbsensiStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StaffPPA::class);
            $table->double('status_absen');
            $table->date('tanggal_absen');
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
        Schema::dropIfExists('absensi_staff');
    }
}

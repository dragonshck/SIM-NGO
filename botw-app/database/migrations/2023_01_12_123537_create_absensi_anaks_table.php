<?php

use App\Models\AnakPPA;
use App\Models\KelompokUmur;
use App\Models\TutorAnak;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_anak', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KelompokUmur::class);
            $table->foreignIdFor(TutorAnak::class);
            $table->foreignIdFor(AnakPPA::class);
            $table->date('attendence_date');
            $table->string('attendence_status');
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
        Schema::dropIfExists('absensi_anaks');
    }
}

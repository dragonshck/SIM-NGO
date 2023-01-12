<?php

use App\Models\TutorAnak;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokUmursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_umur', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TutorAnak::class);
            $table->string('class_name');
            $table->string('class_description');
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
        Schema::dropIfExists('kelompok_umurs');
    }
}

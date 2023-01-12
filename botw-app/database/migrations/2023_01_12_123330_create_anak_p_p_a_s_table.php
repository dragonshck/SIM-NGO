<?php

use App\Models\KelompokUmur;
use App\Models\SponsorAnak;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakPPASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anakPPA', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('fotoprofil');
            $table->string('fotocover');
            $table->string('password');
            $table->foreignIdFor(KelompokUmur::class);
            $table->foreignIdFor(SponsorAnak::class);
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
        Schema::dropIfExists('anak_p_p_a_s');
    }
}

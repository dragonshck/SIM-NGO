<?php

use App\Models\StaffPPA;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StaffPPA::class);
            $table->double('uang_overtime')->nullable()->default(0);
            $table->string('jumlah_overtime')->nullable();
            $table->date('tgl_salary');
            $table->double('total')->nullable()->default(0);
            $table->boolean('status_gaji')->nullable();
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
        Schema::dropIfExists('penggajians');
    }
}
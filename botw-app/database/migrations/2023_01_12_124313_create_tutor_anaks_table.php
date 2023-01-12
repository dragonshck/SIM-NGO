<?php

use App\Models\JabatanStaff;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tutor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('fotoprofil');
            $table->string('fotocover');
            $table->string('password');
            $table->string('phone');
            $table->date('dateofbirth');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->foreignIdFor(JabatanStaff::class);
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
        Schema::dropIfExists('tutor_anaks');
    }
}

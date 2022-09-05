<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommiteAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commite_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('bdf_id')->nullable();
            $table->string('gelar');
            $table->string('nik')->nullable();
            $table->string('satuan_kerja');
            $table->string('bidang_kepanitiaan');
            $table->string('nomor_rekening');
            $table->string('bank');
            $table->string('email');
            $table->string('phone');
            $table->string('nomor_pesawat');
            $table->date('tanggal');
            $table->string('jam');
            $table->string('foto');
            $table->string('ktp');
            $table->string('agree')->comment('agree');
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
        Schema::dropIfExists('commite_attendances');
    }
}

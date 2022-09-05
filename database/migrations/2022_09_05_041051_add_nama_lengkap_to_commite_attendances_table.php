<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaLengkapToCommiteAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commite_attendances', function (Blueprint $table) {
            $table->string('nama_lengkap')->after('gelar');
            $table->string('prefered_name_on_badge')->after('nama_lengkap');
            $table->string('jabatan')->after('prefered_name_on_badge');
            $table->string('nomor_pesawat_pulang')->after('jam')->comment('pesawat');
            $table->string('tanggal_pulang')->after('nomor_pesawat_pulang')->comment('pesawat');
            $table->string('jam_pulang')->after('tanggal_pulang')->comment('pesawat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commite_attendances', function (Blueprint $table) {
            $table->dropColumn(['nama_lengkap','prefered_name_on_badge','jabatan','nomor_pesawat_pulang','tanggal_pulang','jam_pulang']);
        });
    }
}

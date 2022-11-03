<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHotelTophysicalAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('physical_attendances', function (Blueprint $table) {
            $table->string('hotel')->nullable()->after('departure_flight_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physical_attendances', function (Blueprint $table) {
            $table->dropColumn('hotel');
        });
    }
}

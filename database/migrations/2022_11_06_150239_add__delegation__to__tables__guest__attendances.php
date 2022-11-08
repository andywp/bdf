<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDelegationToTablesGuestAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guest_attendances', function (Blueprint $table) {
            $table->string('designated_in_delegation')->nullable()->after('nationality_other');
            $table->dropColumn('affiliation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guest_attendances', function (Blueprint $table) {
            $table->dropColumn('designated_in_delegation');
            $table->string('affiliation');
        });
    }
}

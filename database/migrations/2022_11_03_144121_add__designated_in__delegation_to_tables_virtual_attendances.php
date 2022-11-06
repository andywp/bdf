<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDesignatedInDelegationToTablesVirtualAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('virtual_attendances', function (Blueprint $table) {
            $table->string('designated_in_delegation')->nullable()->after('nationality');
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
        Schema::table('virtual_attendances', function (Blueprint $table) {
            $table->dropColumn('designated_in_delegation');
            $table->string('affiliation');
        });
    }
}

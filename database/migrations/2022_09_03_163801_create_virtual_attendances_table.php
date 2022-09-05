<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('bdf_id')->nullable();
            $table->string('country_organization');
            $table->string('country_organization_other')->nullable();
            $table->string('title');
            $table->string('family_name')->nullable();
            $table->string('first_name');
            $table->string('prefered_name_on_badge');
            $table->string('nationality');
            $table->string('nationality_other')->nullable();
            $table->string('position')->nullable();
            $table->string('position_other')->nullable();
            $table->string('affiliation');
            $table->string('email');
            $table->string('telephone');
            $table->string('fax')->nullable();
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
        Schema::dropIfExists('virtual_attendances');
    }
}

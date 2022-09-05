<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_attendances', function (Blueprint $table) {
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
            $table->string('affiliation');
            $table->string('official_title');
            $table->text('office_address');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('email');
            $table->string('telephone');
            $table->string('fax')->nullable();
            $table->string('passport_no');
            $table->date('date_of_issuance')->nullable();
            $table->date('date_of_expiry')->nullable();
            $table->string('photo');
            $table->string('diplomatic_note');
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
        Schema::dropIfExists('guest__attendances');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('bdf_id')->nullable();
            $table->string('family_name')->nullable();
            $table->string('first_name');
            $table->string('nationality');
            $table->string('nationality_other')->nullable();
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('email');
            $table->string('phone');
            $table->string('id_nummber')->comment('KTP for Indonesian Applicant');
            $table->date('date_of_issuance');
            $table->date('date_of_expiry');
            $table->string('name_of_media');
            $table->string('your_position_in_agency')->nullable();
            $table->string('your_position_in_agency_other')->nullable();
            $table->string('how_do_we_contact_you')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('country_of_head_office_address')->nullable();
            $table->string('your_office_address')->nullable();
            $table->string('origin_of_media');
            $table->string('type_of_media');
            $table->string('type_of_media_other')->nullable();
            $table->string('media_status');
            $table->string('Letter_of_assignment');
            $table->string('passport_ktp');
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
        Schema::dropIfExists('media_attendances');
    }
}

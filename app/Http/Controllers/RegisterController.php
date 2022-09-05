<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Meta;

class RegisterController extends Controller
{
    //

    public function physical_attendance(){
        Meta::set('title', 'Register Physical Attendance | BDF');
        Meta::set('description', 'Register Physical Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        

        return view('FE.register.physical_attendance',compact('organisasi','negara'));
    }


    public function physical_attendance_create(Request $request, \App\Models\PhysicalAttendance $physicalAttendance){
        $request->validate([
            'country_organization'=> 'required',
            'title'=> 'required',
            'family_name'=> 'required',
            'first_name'=> 'required',
            'prefered_name_on_badge'=> 'required|max:25',
            'nationality'=> 'required',
            'position'=> 'required',
            'affiliation'=> 'required',
            'official_title'=> 'required',
            'gender'=> 'required',
            'email'=> 'required|email:rfc,dns',
            'telephone'=> 'required',
            'fax'=> 'required',
            'date_of_issuance'=> 'required|date',
            'date_of_expiry'=> 'required|date',
            'flight_number'=> 'required',
            'flight_date'=> 'required|date',
            'flight_time'=> 'required',
            'departure_flight_number'=> 'required',
            'departure_flight_date'=> 'required|date',
            'departure_flight_time'=> 'required',
            'special_dietary_requirement'=> 'required',
            'food_allergy'=> 'required',
            'other_food_allergy'=> 'required',
            'body_measurement'=> 'required',
            'agree'=> 'required',
            'Photo' => 'required|image|max:1024',
            'diplomatic_note' => 'required|image|max:1024',
        ]);


        $Photo='';
        $file = $request->file('Photo');
        if(!empty($file)){
            $Photo=\App\Helpers\HelperImages::upload($file,'register');
        }

        $diplomatic_note='';
        $file2 = $request->file('diplomatic_note');
        if(!empty($file2)){
            $diplomatic_note=\App\Helpers\HelperImages::upload($file2,'register');
        }

        $input=[
            'country_organization' => $request->country_organization,
            'country_organization_other' => $request->country_organization_other,
            'title' => $request->title,
            'family_name' => $request->family_name,
            'first_name' => $request->first_name,
            'prefered_name_on_badge' => $request->prefered_name_on_badge,
            'nationality' => $request->nationality,
            'nationality_other' => $request->nationality_other,
            'position' => $request->position,
            'position_other' => $request->position_other,
            'affiliation' => $request->affiliation,
            'official_title' => $request->official_title,
            'gender' => $request->gender,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fax' => $request->official_title,
            'passport_no' => $request->passport_no,
            'date_of_issuance' => $request->date_of_issuance,
            'date_of_expiry' => $request->date_of_expiry,
            'flight_number' => $request->flight_number,
            'flight_date' => $request->flight_date,
            'flight_time' => $request->flight_time,
            'departure_flight_number' => $request->departure_flight_number,
            'departure_flight_date' => $request->departure_flight_date,
            'departure_flight_time' => $request->departure_flight_time,
            'special_dietary_requirement' => $request->special_dietary_requirement,
            'special_dietary_requirement_Other' => $request->special_dietary_requirement_Other,
            'other_dietary_restriction' => $request->other_dietary_restriction,
            'food_allergy' => $request->food_allergy,
            'other_food_allergy' => $request->other_food_allergy,
            'body_measurement' => $request->body_measurement,
            'agree' => $request->agree,
            'Photo' => $Photo,
            'diplomatic_note' => $diplomatic_note,
        ];

        $physicalAttendance::create( $input);
        return redirect()->route('physicalattendance')->with('success','Register Physical Attendance successfully submite');
        
    }

    public function virtual_attendance(){
        Meta::set('title', 'Register Virtual Attendance | BDF');
        Meta::set('description', 'Register Virtual Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        

        return view('FE.register.virtual_attendance',compact('organisasi','negara'));

    }

    public function virtual_attendance_create(Request $request, \App\Models\VirtualAttendance $virtualAttendance){
        $request->validate([
            'country_organization'=> 'required',
            'title'=> 'required',
            'family_name'=> 'required',
            'first_name'=> 'required',
            'prefered_name_on_badge'=> 'required|max:25',
            'nationality'=> 'required',
            'position'=> 'required',
            'affiliation'=> 'required',
            'email'=> 'required|email:rfc,dns',
            'telephone'=> 'required',
            'fax'=> 'required',
            'agree'=> 'required',
        ]);
        

        $input=[
            'country_organization' => $request->country_organization,
            'country_organization_other' => $request->country_organization_other,
            'title' => $request->title,
            'family_name' => $request->family_name,
            'first_name' => $request->first_name,
            'prefered_name_on_badge' => $request->prefered_name_on_badge,
            'nationality' => $request->nationality,
            'nationality_other' => $request->nationality_other,
            'position' => $request->position,
            'position_other' => $request->position_other,
            'affiliation' => $request->affiliation,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'agree' => $request->agree
        ];

        $virtualAttendance::create($input);
        return redirect()->route('virtualattendance')->with('success','Register Virtual Attendance successfully submite');

    }


    public function media(){
        Meta::set('title', 'Register Media Attendance| BDF');
        Meta::set('description', 'Register Media Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        return view('FE.register.media',compact('organisasi','negara'));

    }


    public function media_create(Request $request, \App\Models\MediaAttendance $mediaAttendance){
       
        $request->validate([
            'family_name'=> 'required',
            'first_name'=> 'required',
            'nationality'=> 'required',
            'date_of_birth'=> 'required|date',
            'email'=> 'required|email:rfc,dns',
            'telephone'=> 'required',
            'date_of_issuance'=> 'required|date',
            'date_of_expiry'=> 'required|date',
            'name_of_media'=> 'required',
            'your_position_in_agency'=> 'required',
            'how_do_we_contact_you'=> 'required',
            'contact_person_name'=> 'required',
            'contact_person_phone'=> 'required',
            'contact_person_email'=> 'required|email:rfc,dns',
            'country_of_head_office_address'=> 'required',
            'your_office_address'=> 'required',
            'type_of_media_other'=> 'required',
            'origin_of_media'=> 'required',
            'type_of_media'=> 'required',
            'media_status'=> 'required',
            'agree'=> 'required',
            'Letter_of_assignment' => 'required|image|max:1024',
            'passport_ktp' => 'required|image|max:1024',
        ]);

        $Letter_of_assignment='';
        $file = $request->file('Letter_of_assignment');
        if(!empty($file)){
            $Letter_of_assignment=\App\Helpers\HelperImages::upload($file,'register');
        }

        $passport_ktp='';
        $file2 = $request->file('passport_ktp');
        if(!empty($file2)){
            $passport_ktp=\App\Helpers\HelperImages::upload($file2,'register');
        }

        //dd($request->all());

        $input=[
            'family_name' => $request->family_name,
            'first_name' => $request->first_name,
            'nationality' => $request->nationality,
            'nationality_other' => $request->nationality_other,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'date_of_issuance' => $request->date_of_issuance,
            'date_of_expiry' => $request->date_of_expiry,
            'name_of_media' => $request->name_of_media,
            'your_position_in_agency' => $request->your_position_in_agency,
            'your_position_in_agency_other' => $request->your_position_in_agency_other,
            'how_do_we_contact_you' => $request->how_do_we_contact_you,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_phone' => $request->contact_person_phone,
            'contact_person_email' => $request->contact_person_email,
            'country_of_head_office_address' => $request->country_of_head_office_address,
            'origin_of_media' => $request->origin_of_media,
            'type_of_media' => $request->type_of_media,
            'type_of_media_other' => $request->type_of_media_other,
            'media_status' => $request->media_status,
            'agree' => $request->agree,
            'Letter_of_assignment' => $Letter_of_assignment,
            'passport_ktp' => $passport_ktp,
        ];

        $mediaAttendance::create($input);
        return redirect()->route('media')->with('success','Register Media Attendance successfully submite');
    }


    public function guest(){
        Meta::set('title', 'Register Guest Attendance | BDF');
        Meta::set('description', 'Register Guest Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        

        return view('FE.register.guest',compact('organisasi','negara'));

    }
}

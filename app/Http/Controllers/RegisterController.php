<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Meta;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use File;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function physical_attendance(){
        //dd(Auth::guard('admin')->check());
        Meta::set('title', 'Register Physical Attendance | BDF');
        Meta::set('description', 'Register Physical Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        if((Auth::user()->type_user !='Physical Attendance') && !Auth::guard('admin')->check() ){
            return abort(403, "You are not allowed to access this page");
        }
        
        return view('FE.register.physical_attendance',compact('organisasi','negara'));
    }


    public function physical_attendance_create(Request $request, \App\Models\PhysicalAttendance $physicalAttendance){

        $messages = [
            'official_title.required'  => 'The Official Position Title field is required.',
          ];


        $request->validate([
            'country_organization'=> 'required',
            'title'=> 'required',
            'family_name'=> 'required',
            'first_name'=> 'required',
            'prefered_name_on_badge'=> 'required|max:25',
            'nationality'=> 'required',
            'designated_in_delegation'=> 'required',
            'position'=> 'required',
            //'affiliation'=> 'required',
            'official_title'=> 'required',
            'office_address'=> 'required',
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
            'hotel'=> 'required',
            'passport_no'=> 'required',
            //'special_dietary_requirement'=> 'required',
            //'food_allergy'=> 'required',
            //'other_food_allergy'=> 'required',
            //'body_measurement'=> 'required',
            'agree'=> 'required',
            'Photo' => 'required|image|max:1024',
            'diplomatic_note' => 'required|mimes:pdf|max:2024',
        ],$messages);


        $Photo='';
        $file = $request->file('Photo');
        if(!empty($file)){
            $Photo=\App\Helpers\HelperImages::upload($file,'register');
        }

        $diplomatic_note='';
        $file2 = $request->file('diplomatic_note');
        if(!empty($file2)){
            //$diplomatic_note=\App\Helpers\HelperImages::upload($file2,'register');
            $uploadPath = public_path('register/pdf/');
            if(!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $diplomatic_note=Carbon::now()->format('YmdHis').Str::random(3).'.'.$file2->extension();
            $file2->move($uploadPath, $diplomatic_note);
        }

        //dd($request->all());

        $input=[
            'country_organization' => $request->country_organization,
            'country_organization_other' => $request->country_organization_other,
            'title' => $request->title,
            'family_name' => $request->family_name,
            'first_name' => $request->first_name,
            'prefered_name_on_badge' => $request->prefered_name_on_badge,
            'nationality' => $request->nationality,
            'designated_in_delegation' => $request->designated_in_delegation,
            'nationality_other' => $request->nationality_other,
            'position' => $request->position,
            'position_other' => $request->position_other,
            'official_title' => $request->official_title,
            'office_address' => $request->office_address,
            'gender' => $request->gender,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'passport_no' => $request->passport_no,
            'date_of_issuance' => $request->date_of_issuance,
            'date_of_expiry' => $request->date_of_expiry,
            'flight_number' => $request->flight_number,
            'flight_date' => $request->flight_date,
            'flight_time' => $request->flight_time,
            'departure_flight_number' => $request->departure_flight_number,
            'departure_flight_date' => $request->departure_flight_date,
            'departure_flight_time' => $request->departure_flight_time,
            'hotel' => $request->hotel,
            'special_dietary_requirement' => !empty($request->special_dietary_requirement)?implode(',',$request->special_dietary_requirement):'',
            'special_dietary_requirement_Other' => $request->special_dietary_requirement_Other,
            'other_dietary_restriction' => $request->other_dietary_restriction,
            'food_allergy' => !empty($request->food_allergy)?implode(',',$request->food_allergy):'',
            'other_food_allergy' => $request->other_food_allergy,
            //'body_measurement' => $request->body_measurement,
            'agree' => $request->agree,
            'Photo' => $Photo,
            'diplomatic_note' => $diplomatic_note,
        ];
        //dd($input);
        $physicalAttendance::create($input);

        try{
            $fullName=$request->first_name.' '.$request->family_name;
            Mail::to($input['email'])->send(new \App\Mail\SentMail($fullName));
            Mail::to(env('SENT_EMAIL_NOTIF','info@rasalogi.com'))->send(new \App\Mail\SentMailAdmin($fullName));


        }catch(Exception $e){

        }


        return redirect()->route('physicalattendance')->with('success','Register Physical Attendance successfully submite');
        
    }

    public function virtual_attendance(){
        Meta::set('title', 'Register Virtual Attendance | BDF');
        Meta::set('description', 'Register Virtual Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();


        if((Auth::user()->type_user !='Virtual Attendance') && !Auth::guard('admin')->check()){
            return abort(403, "You are not allowed to access this page");
        }

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
            'designated_in_delegation'=> 'required',
            'position'=> 'required',
            //'affiliation'=> 'required',
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
            'designated_in_delegation' => $request->designated_in_delegation,
            'position' => $request->position,
            'position_other' => $request->position_other,
            //'affiliation' => $request->affiliation,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'agree' => $request->agree
        ];

        $virtualAttendance::create($input);
        try{
            $fullName=$request->first_name.' '.$request->family_name;
            Mail::to($input['email'])->send(new \App\Mail\SentMail($fullName));
            Mail::to(env('SENT_EMAIL_NOTIF','info@rasalogi.com'))->send(new \App\Mail\SentMailAdmin($fullName));


        }catch(Exception $e){

        }
        return redirect()->route('virtualattendance')->with('success','Register Virtual Attendance successfully submite');

    }


    public function media(){
        Meta::set('title', 'Register Media Attendance| BDF');
        Meta::set('description', 'Register Media Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        if((Auth::user()->type_user !='Media') && !Auth::guard('admin')->check()){
            return abort(403, "You are not allowed to access this page");
        }

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
            //'contact_person_name'=> 'required',
            //'contact_person_phone'=> 'required',
            //'contact_person_email'=> 'required|email:rfc,dns',
            'country_of_head_office_address'=> 'required',
            'your_office_address'=> 'required',
            //'type_of_media_other'=> 'required',
            'origin_of_media'=> 'required',
            'type_of_media'=> 'required',
            'media_status'=> 'required',
            'agree'=> 'required',
            'gender'=> 'required',
            'id_nummber'=> 'required',
            'Letter_of_assignment' => 'required|mimes:pdf|max:2024',
            'passport_ktp' => 'required|image|max:1024',
        ]);

        /* $Letter_of_assignment='';
        $file = $request->file('Letter_of_assignment');
        if(!empty($file)){
            $Letter_of_assignment=\App\Helpers\HelperImages::upload($file,'register');
        }
        */
        $Letter_of_assignment='';
        $file2 = $request->file('Letter_of_assignment');
        if(!empty($file2)){
            //$diplomatic_note=\App\Helpers\HelperImages::upload($file2,'register');
            $uploadPath = public_path('register/pdf/');
            if(!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $Letter_of_assignment=Carbon::now()->format('YmdHis').Str::random(3).'.'.$file2->extension();
            $file2->move($uploadPath, $Letter_of_assignment);
        }


        $passport_ktp='';
        $file2 = $request->file('passport_ktp');
        if(!empty($file2)){
            $passport_ktp=\App\Helpers\HelperImages::upload($file2,'register');
        }

        //dd($request->all());

        $input=[
            'id_nummber' => $request->id_nummber,
            'family_name' => $request->family_name,
            'first_name' => $request->first_name,
            'nationality' => $request->nationality,
            'nationality_other' => $request->nationality_other,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->telephone,
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
            'your_office_address' => $request->your_office_address
        ];

        $mediaAttendance::create($input);
        try{
            $fullName=$request->first_name.' '.$request->family_name;
            Mail::to($input['email'])->send(new \App\Mail\SentMail($fullName));
            Mail::to(env('SENT_EMAIL_NOTIF','info@rasalogi.com'))->send(new \App\Mail\SentMailAdmin($fullName));


        }catch(Exception $e){

        }
        return redirect()->route('media')->with('success','Register Media Attendance successfully submite');
    }


    public function guest(){
        Meta::set('title', 'Register Guest Attendance | BDF');
        Meta::set('description', 'Register Guest Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();

        if((Auth::user()->type_user !='Guest') && !Auth::guard('admin')->check()){
            return abort(403, "You are not allowed to access this page");
        }
        return view('FE.register.guest',compact('organisasi','negara'));
    }

    public function guest_create(Request $request, \App\Models\GuestAttendance $guest){
        $request->validate([
            'country_organization'=> 'required',
            'title'=> 'required',
            'family_name'=> 'required',
            'first_name'=> 'required',
            'prefered_name_on_badge'=> 'required|max:25',
            'nationality'=> 'required',
            'affiliation'=> 'required',
            'official_title'=> 'required',
            'office_address'=> 'required',
            'gender'=> 'required',
            'email'=> 'required|email:rfc,dns',
            'telephone'=> 'required',
            'fax'=> 'required',
            'passport_no'=> 'required',
            'date_of_issuance'=> 'required|date',
            'date_of_expiry'=> 'required|date',
            'agree'=> 'required',
            'photo' => 'required|image|max:1024',
            'diplomatic_note' => 'required|mimes:pdf|max:2024',
        ]);
        //dd($request->all());
        $Photo='';
        $file = $request->file('photo');
        if(!empty($file)){
            $Photo=\App\Helpers\HelperImages::upload($file,'register');
        }

        /* $diplomatic_note='';
        $file2 = $request->file('diplomatic_note');
        if(!empty($file2)){
            $diplomatic_note=\App\Helpers\HelperImages::upload($file2,'register');
        } */

        $diplomatic_note='';
        $file2 = $request->file('diplomatic_note');
        if(!empty($file2)){
            //$diplomatic_note=\App\Helpers\HelperImages::upload($file2,'register');
            $uploadPath = public_path('register/pdf/');
            if(!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $diplomatic_note=Carbon::now()->format('YmdHis').Str::random(3).'.'.$file2->extension();
            $file2->move($uploadPath, $diplomatic_note);
        }
        
        $input=[
            'country_organization' => $request->country_organization,
            'country_organization_other' => $request->country_organization_other,
            'title' => $request->title,
            'family_name' => $request->family_name,
            'first_name' => $request->first_name,
            'prefered_name_on_badge' => $request->prefered_name_on_badge,
            'nationality' => $request->nationality,
            'country_organization' => $request->country_organization,
            'nationality_other' => $request->nationality_other,
            'affiliation' => $request->affiliation,
            'official_title' => $request->official_title,
            'passport_no'   => $request->passport_no,
            'office_address' => $request->office_address,
            'gender' => $request->gender,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'date_of_issuance' => $request->date_of_issuance,
            'date_of_expiry' => $request->date_of_expiry,
            'agree' => $request->agree,
            'photo' => $Photo,
            'diplomatic_note' => $diplomatic_note,
        ];

        $guest::create($input);
        try{
            $fullName=$request->first_name.' '.$request->family_name;
            Mail::to($input['email'])->send(new \App\Mail\SentMail($fullName));
            Mail::to(env('SENT_EMAIL_NOTIF','info@rasalogi.com'))->send(new \App\Mail\SentMailAdmin($fullName));


        }catch(Exception $e){

        }
        return redirect()->route('guest')->with('success','Register Guest Attendance successfully submite');
    
    }

    public function commitee(){
        Meta::set('title', 'Register Commite Attendance| BDF');
        Meta::set('description', 'Register Commite Attendance');
        Meta::set('image', asset('images/home-logo.png'));

        $organisasi=\App\Models\Organization::get();
        $negara=\App\Models\Countries::get();
        if(Auth::user()->type_user !='Commitee' && !Auth::guard('admin')->check()){
            return abort(403, "You are not allowed to access this page");
        }
        return view('FE.register.commitee',compact('organisasi','negara'));
    }

    public function commitee_create(Request $request, \App\Models\CommiteAttendance $commiteAttendance){
        $request->validate([
            //'gelar'=> 'required',
            'nama_lengkap'=> 'required',
            'prefered_name_on_badge'=> 'required|max:25',
            'jabatan'=> 'required',
            //'nik'=> 'nullable|numeric|digits:18',
            'satuan_kerja'=> 'required',
            'bidang_kepanitiaan'=> 'required',
            'nomor_rekening'=> 'required|numeric',
            'bank'=> 'required',
            'email'=> 'required|email:rfc,dns',
            'phone'=> 'required',
            'nomor_pesawat'=> 'required',
            //'passport_no'=> 'required',
            'tanggal'=> 'required|date',
            'jam'=> 'required',
            'nomor_pesawat_pulang'=> 'required',
            'tanggal_pulang'=> 'required|date',
            'jam_pulang'=> 'required',
            'agree'=> 'required',
            'foto' => 'required|image|max:1024',
            'ktp' => 'required|image|max:1024',
        ]);

        $foto='';
        $file = $request->file('foto');
        if(!empty($file)){
            $foto=\App\Helpers\HelperImages::upload($file,'register');
        }

        $ktp='';
        $file2 = $request->file('ktp');
        if(!empty($file2)){
            $ktp=\App\Helpers\HelperImages::upload($file2,'register');
        }

        $input=[
                //'gelar'         => $request->gelar,
                'nama_lengkap'  => $request->nama_lengkap,
                'prefered_name_on_badge'  => $request->prefered_name_on_badge,
                'jabatan'  => $request->jabatan,
                'nik'   => $request->nik,
                'satuan_kerja'  => $request->satuan_kerja,
                'bidang_kepanitiaan'  => $request->bidang_kepanitiaan,
                'nomor_rekening'  => $request->nomor_rekening,
                'bank'  => $request->bank,
                'email'  => $request->email,
                'phone'  => $request->phone,
                'nomor_pesawat'  => $request->nomor_pesawat,
                'tanggal'  => $request->tanggal,
                'jam'  => $request->jam,
                'nomor_pesawat_pulang'  => $request->nomor_pesawat_pulang,
                'tanggal_pulang'  => $request->tanggal_pulang,
                'jam_pulang'  => $request->jam_pulang,
                'agree'  => $request->agree,
                'foto'  => $foto,
                'ktp'   => $ktp
        ];

        $commiteAttendance::create($input);
        try{
            $fullName=$request->nama_lengkap;
            Mail::to($input['email'])->send(new \App\Mail\SentMail($fullName));
            Mail::to(env('SENT_EMAIL_NOTIF','info@rasalogi.com'))->send(new \App\Mail\SentMailAdmin($fullName));


        }catch(Exception $e){

        }
        return redirect()->route('commitee')->with('success','Register Commite Attendance successfully submite');
    }

}

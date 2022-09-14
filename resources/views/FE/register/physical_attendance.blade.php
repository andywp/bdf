@extends('layouts.bdf')
@section('styles')
<link rel="stylesheet" href="{{ asset('bdf/assets/css/form.css') }}" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<section class="first_section" id="publication">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="title-section text-center">Physical Attendance</h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error Input</h4>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
            </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif
        <div class="row mt-md-5 mt-3">
            <div class="col-12">
            <div class="login-form">
                <form action="{{ route('physicalattendance_store') }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                    <h3 class="text-center title-form">Personal Information</h3>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="country">Country/Organization of Representation</label>
                        <select class="optionselect form-select  form-control w-100  @error('country_organization') is-invalid @enderror" name="country_organization">
                            <option value="">Country/Organization of Representation</option>
                            @foreach($organisasi as $r)
                            <option value="{{ $r->name }}" {{(old('country_organization') == $r->name)?'selected':'' }} >{{ $r->name }}</option>
                            @endforeach
                            @foreach($negara as $r)
                            <option value="{{ $r->name }}" {{(old('country_organization') == $r->name)?'selected':'' }}>{{ $r->name }}</option>
                            @endforeach
                        </select>
                        @error('country_organization')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label" for="other">Other (Specify)</label>
                        <input type="text" id="other" name="country_organization_other" value="{{ old('country_organization_other') }}" class="form-control @error('country_organization_other') is-invalid @enderror" placeholder="" />
                        @error('country_organization_other')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="titleform">Title</label>
                        <select class="optionselect form-select  form-control w-100 @error('title') is-invalid @enderror" name="title">
                            <option value="">-Title-</option>
                            <option value="H.E." {{(old('title') == 'H.E.')?'selected':'' }}>H.E.</option>
                            <option value="Mr" {{(old('title') == 'Mr')?'selected':'' }}>Mr</option>
                            <option value="Ms" {{(old('title') == 'Ms')?'selected':'' }}>Ms</option>
                            <option value="Dr" {{(old('title') == 'Dr')?'selected':'' }}>Dr</option>
                            <option value="Prof" {{(old('title') == 'Prof')?'selected':'' }}>Prof.</option>
                        </select>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="family">Family Name</label>
                        <input type="text" id="family" class="form-control @error('family_name') is-invalid @enderror" name="family_name"  value="{{ old('family_name') }}" placeholder="" />
                        @error('family_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="fisrt-name">First Name</label>
                        <input type="text" id="fisrt-name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="" />
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="badge-name">Prefered Name on Badge</label>
                        <input type="text" id="badge-name" class="form-control  @error('prefered_name_on_badge') is-invalid @enderror" name="prefered_name_on_badge"  value="{{ old('prefered_name_on_badge') }}" placeholder="(max. 25 characters, you can include your title e.g.: H.E.)" />
                        @error('prefered_name_on_badge')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="nationality">Nationality</label>
                       
                        <select class="optionselect form-select  form-control w-100 @error('nationality') is-invalid @enderror" name="nationality">
                            <option value="">Nationality</option>
                            @foreach($negara as $r)
                            <option value="{{ $r->name }}" {{(old('nationality') == $r->name)?'selected':'' }}>{{ $r->name }}</option>
                            @endforeach
                        </select>
                        @error('nationality')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="other2">Other (specify)</label>
                        <input type="text" id="other2" class="form-control @error('nationality_other') is-invalid @enderror" name="nationality_other"  value="{{ old('nationality_other') }}" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="position">Position</label>
                        <select class="form-select optionselect form-control  @error('position') is-invalid @enderror" name="position" aria-label="Default select example">
                            <option value="">-Position Delegation-</option>
                            <option value="Foreign Minister" {{(old('position') == 'Foreign Minister')?'selected':'' }}>Foreign Minister</option>
                            <option value="Head of Delegation" {{(old('position') == 'Head of Delegation')?'selected':'' }}>Head of Delegation</option>
                            <option value="Spouse" {{(old('position') == 'Spouse')?'selected':'' }}>Spouse</option>
                            <option value="Member of Delegation" {{(old('position') == 'Member of Delegation')?'selected':'' }}>Member of Delegation</option>
                            <option value="Security Officer"  {{(old('position') == 'Security Officer')?'selected':'' }}>Security Officer</option>
                            <option value="Other"  {{(old('position') == 'Other')?'selected':'' }}>Other</option>
                        </select>
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="other3">Other (specify)</label>
                        <input type="text" id="other3" class="form-control @error('position_other') is-invalid @enderror" name="position_other"  value="{{ old('position_other') }}"  placeholder="" />
                        @error('position_other')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="affiliation">Affiliation</label>
                        <input type="text" id="affiliation" class="form-control  @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ old('affiliation') }}" placeholder="" />
                        @error('affiliation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="office-address">Office Title</label>
                        <input type="text" id="office-address" class="form-control  @error('official_title') is-invalid @enderror" name="official_title" value="{{ old('official_title') }}"  placeholder="" />
                        @error('official_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="office-address">Office Address</label>
                        <input type="text" id="office-address" class="form-control  @error('office_address') is-invalid @enderror" name="office_address" value="{{ old('office_address') }}"  placeholder="" />
                        @error('office_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="position">Gender</label>
                        <select class="form-select form-control  @error('gender') is-invalid @enderror" name="gender" aria-label="Default select example">
                        <option  value="" >- Gender -</option>
                        <option value="male" {{ (old('gender') == 'male')?'selected':'' }}>Male</option>
                        <option value="female" {{ (old('gender') == 'female')?'selected':'' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- contact detail -->
                    <h3 class="text-center title-form mt-5">Contact Details</h3>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="telphone">Telphone</label>
                        <input type="tel" id="telphone" class="form-control  @error('telephone') is-invalid @enderror" name="telephone"  value="{{ old('telephone') }}" placeholder="+62213441508" />
                        @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="fax">Fax</label>
                        <input type="tel" id="fax" class="form-control  @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') }}" placeholder="+62213441508" />
                        @error('fax')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Passport -->
                    <h3 class="text-center title-form mt-5">Passport</h3>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label" for="passport-no">Passport Number</label>
                        <input type="text" id="passport-no" class="form-control  @error('passport_no') is-invalid @enderror" name="passport_no"  value="{{ old('passport_no') }}" placeholder="" />
                        @error('passport_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="date-issuance">Date of Issuance</label>
                        <input type="text" id="date-issuance" class="form-control datepicker @error('date_of_issuance') is-invalid @enderror" name="date_of_issuance"  value="{{ old('date_of_issuance') }}" laceholder="" />
                        @error('date_of_issuance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="date-expiry">Date of Expiry</label>
                        <input type="text" id="date-expiry" class="form-control datepicker  @error('date_of_expiry') is-invalid @enderror" name="date_of_expiry" value="{{ old('date_of_expiry') }}" placeholder="" />
                        @error('date_of_expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Itinerary & Accomodation -->
                    <h3 class="text-center title-form mt-5">Itinerary & Accomodation</h3>
                    
                    <h5 class="text-left mb-3 text-bold">Arrival</h5>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="flight-number">Flight Number</label>
                        <input type="text" id="flight-number" class="form-control @error('flight_number') is-invalid @enderror" name="flight_number" value="{{ old('flight_number') }}" placeholder="" />
                        @error('flight_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="date-arrival">Date</label>
                        <input type="text" id="date-arrival" class="form-control datepicker @error('flight_date') is-invalid @enderror" name="flight_date" value="{{ old('flight_date') }}" placeholder="" />
                        @error('flight_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="time-arrival">Time</label>
                        <input type="text" id="time-arrival" class="form-control timepicker @error('flight_time') is-invalid @enderror" name="flight_time" value="{{ old('flight_time') }}" value="23:59" />
                        @error('flight_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h5 class="text-left mb-3 mt-4 text-bold">Departure</h5>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="flight-number-departure">Flight Number</label>
                        <input type="text" id="flight-number-departure" class="form-control  @error('departure_flight_number') is-invalid @enderror" name="departure_flight_number"  value="{{ old('departure_flight_number') }}" placeholder="" />
                        @error('departure_flight_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="date-departure">Date</label>
                        <input type="text" id="date-departure" class="form-control datepicker  @error('departure_flight_date') is-invalid @enderror" name="departure_flight_date"  value="{{ old('departure_flight_date') }}" placeholder="" />
                        @error('departure_flight_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="time-departure">Time</label>
                        <input type="text" id="time-departure" class="form-control timepicker @error('departure_flight_time') is-invalid @enderror" name="departure_flight_time" value="{{ old('departure_flight_time') }}" value="23:59" />
                        @error('departure_flight_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dietary Restriction Information -->
                    <h3 class="text-center title-form mt-5">Dietary Restriction Information</h3>
                    <p class="text-left">
                        Special Dietary Requirement<br>
                        <i>
                        *If applicable, please select your strict dietary requirement by ticking the squaret
                        </i>
                    </p>
                    @error('special_dietary_requirement')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="No Red Meat" @if(is_array(old('special_dietary_requirement')) && in_array('No Red Meat', old('special_dietary_requirement'))) checked @endif id="no-red-meat">
                            <label class="form-check-label" for="no-red-meat">
                            No Red Meat
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="No Chicken" @if(is_array(old('special_dietary_requirement')) && in_array('No Chicken', old('special_dietary_requirement'))) checked @endif id="no-chicken" >
                            <label class="form-check-label" for="no-chicken">
                            No Chicken
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="No Fish"  @if(is_array(old('special_dietary_requirement')) && in_array('No Fish', old('special_dietary_requirement'))) checked @endif id="no-fish">
                            <label class="form-check-label" for="no-fish">
                            No Fish
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="No Egg"  @if(is_array(old('special_dietary_requirement')) && in_array('No Egg', old('special_dietary_requirement'))) checked @endif id="no-egg">
                            <label class="form-check-label" for="no-egg">
                            No Egg
                            </label>
                        </div>
                        </div>

                        <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="No Pork"  @if(is_array(old('special_dietary_requirement')) && in_array('No Pork', old('special_dietary_requirement'))) checked @endif id="no-pork" >
                            <label class="form-check-label" for="no-pork">
                            No Pork
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="No Dairy Products" @if(is_array(old('special_dietary_requirement')) && in_array('No Dairy Products', old('special_dietary_requirement'))) checked @endif id="no-dairyproducts">
                            <label class="form-check-label" for="no-dairyproducts">
                            No Dairy Products
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="special_dietary_requirement[]" value="I am a vegetarian but I eat fish" @if(is_array(old('special_dietary_requirement')) && in_array('I am a vegetarian but I eat fish"', old('special_dietary_requirement'))) checked @endif id="vegetarian">
                            <label class="form-check-label" for="vegetarian">
                            I am a vegetarian but I eat fish
                            </label>
                        </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="other-dietary">Other</label>
                        <input type="text" id="other-dietary" class="form-control" name="special_dietary_requirement_Other"  value="{{ old('special_dietary_requirement_Other') }}" />
                    </div>

                    <h5 class="text-left mb-3 text-bold">Other Dietary Restriction</h5>
                    <p class="text-left">
                        Strict Dietary Requirement<br>
                        <i>
                        *If applicable, please select your strict dietary requirement by ticking the squaret
                        </i>
                    </p>
                    @error('other_dietary_restriction')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-4">
                        <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="other_dietary_restriction" value="Halal" {{ (old('other_dietary_restriction') == 'Halal' )?'checked':''; }} id="strictdietary1">
                            <label class="form-check-label" for="strictdietary1">
                            Halal
                            </label>
                            <p><small>(I require a special meal to be prepared for me from a Halal kitchen)</small></p>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="other_dietary_restriction" value="Kosher" {{ (old('other_dietary_restriction') == 'Kosher' )?'checked':''; }} id="strictdietary2">
                            <label class="form-check-label" for="strictdietary2">
                            Kosher
                            </label>
                            <p><small>(I require a special meal to be prepared for me from a Kosher kitchen)</small></p>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="other_dietary_restriction" value="Vegan" {{ (old('other_dietary_restriction') == 'Vegan' )?'checked':''; }} id="strictdietary3">
                            <label class="form-check-label" for="strictdietary3">
                            Vegan
                            </label>
                            <p><small>(I eat only plant food and plant products. I do not eat animal foods, eggs or dairy)</small></p>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="other_dietary_restriction" value="Celiac Disease" {{ (old('other_dietary_restriction') == 'Celiac Disease' )?'checked':''; }} id="strictdietary4">
                            <label class="form-check-label" for="strictdietary4">
                            Celiac Disease
                            </label>
                            <p><small>(I am allergic to wheat, rye, oats or barley and any food containing gluten)</small></p>
                        </div>
                        </div>
                    </div>

                   <!--  <div class="form-outline mb-4">
                        <label class="form-label" for="other-strictdietary">Other</label>
                        <input type="text" id="other-strictdietary" class="form-control"  />
                    </div> -->
                    
                    <h5 class="text-left mb-3 text-bold">Other restricted dietary restriction</h5>
                    <p class="text-left">
                        Food Allergy<br>
                        <i>
                        *Please select any food allergy you have by ticking the circle
                        </i>
                    </p>
                    @error('food_allergy')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="food_allergy[]" value="Peanuts" @if(is_array(old('food_allergy')) && in_array('Peanuts', old('food_allergy'))) checked @endif id="peanuts">
                            <label class="form-check-label" for="peanuts">
                            Peanuts
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="food_allergy[]" value="Tree Nuts" @if(is_array(old('food_allergy')) && in_array('Tree Nuts', old('food_allergy'))) checked @endif id="tree-nuts" >
                            <label class="form-check-label" for="tree-nuts">
                            Tree Nuts
                            </label>
                        </div>
                        </div>

                        <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="food_allergy[]" value="Dairy"  @if(is_array(old('food_allergy')) && in_array('Dairy', old('food_allergy'))) checked @endif id="dairy">
                            <label class="form-check-label" for="dairy">
                            Dairy
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="food_allergy[]" value="All Seafood (including shellfish)"  @if(is_array(old('food_allergy')) && in_array('All Seafood (including shellfish)', old('food_allergy'))) checked @endif i id="seafood" >
                            <label class="form-check-label" for="seafood">
                            All Seafood (including shellfish)
                            </label>
                        </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="other-foodalergy">Other food allergy</label>
                        <input type="text" id="other-foodalergy" name="other_food_allergy" value="{{ old('other_food_allergy') }}" class="form-control  @error('other_food_allergy') is-invalid @enderror" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="position">Body Measurement</label>
                        <select id="body-measurement" class="form-select form-control  @error('body_measurement') is-invalid @enderror" name="body_measurement" aria-label="Default select example">
                        <option  value="" >- Body Size -</option>
                            <option value="XS" {{ (old('body_measurement') == 'XS')?'selected':'' }}>XS</option>
                            <option value="S" {{ (old('body_measurement') == 'S')?'selected':'' }}>S</option>
                            <option value="M" {{ (old('body_measurement') == 'M')?'selected':'' }}>M</option>
                            <option value="L" {{ (old('body_measurement') == 'L')?'selected':'' }}>L</option>
                            <option value="XL" {{ (old('body_measurement') == 'XL')?'selected':'' }}>XL</option>
                            <option value="XXL" {{ (old('body_measurement') == 'XXL')?'selected':'' }}>XXL</option>
                            <option value="XXXL" {{ (old('body_measurement') == 'XXXL')?'selected':'' }}>XXXL</option>
                        </select>
                        @error('body_measurement')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h3 class="text-center title-form mt-5">Upload Attachment</h3>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="photo">
                        Photo
                        <p><small>(Preferebly white background Max 1MB: jpg)</small></p>
                        </label>
                        <input type="file" id="photo" name="Photo"  value="{{ old('Photo') }}" class="form-control  @error('Photo') is-invalid @enderror" />
                        @error('Photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-5">
                        <label class="form-label" for="diplomatic-note">
                        Diplomatic Note
                        <p><small>(Max 2MB: PDF)</small></p>
                        </label>
                        <input type="file" id="diplomatic-note" name="diplomatic_note"  value="{{ old('diplomatic_note') }}" class="form-control @error('diplomatic_note') is-invalid @enderror" accept="application/pdf"/>
                        @error('diplomatic_note')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-check mb-4">
                      
                        <input class="form-check-input" type="checkbox" name="agree" value="1" id="agreement" lass="form-control @error('agree') is-invalid @enderror" >
                        <label class="form-check-label" for="agreement">
                        By filling out this form, you agree to the handling of your data by this website
                        </label>
                        @error('agree')
                            <div class="text-danger">{{ $message }}</div>
                         @enderror    
                    </div>
                                    
                    <button type="submit" class="btn primary-btn mb-4">Send</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>




@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    $(document).ready(function() {
        $('.optionselect').select2();
    });

</script>

@endsection
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
            <h2 class="title-section text-center">Guest Attendance</h2>
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
              <form action="{{ route('guest_store') }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
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
                        <label class="form-label" for="affiliation">Affiliation</label>
                        <input type="text" id="affiliation" class="form-control  @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ old('affiliation') }}" placeholder="" />
                        @error('affiliation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="office-title">Office Title</label>
                      <input type="text" id="office-title" class="form-control  @error('official_title') is-invalid @enderror" name="official_title" value="{{ old('official_title') }}" placeholder="" />
                      @error('official_title')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="office-address">Office Address</label>
                      <input type="text" id="office-address" class="form-control  @error('office_address') is-invalid @enderror" name="office_address" value="{{ old('office_address') }}" placeholder="" />
                      @error('office_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="position">Gender</label>
                        <select class="form-select form-control  @error('gender') is-invalid @enderror" name="gender" aria-label="Default select example">
                        <option value="">- Gender -</option>
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
                        <input type="text" id="date-issuance" class="form-control datepicker  @error('date_of_issuance') is-invalid @enderror" name="date_of_issuance"  value="{{ old('date_of_issuance') }}" laceholder="" />
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

                    <h3 class="text-center title-form mt-5">Upload Attachment</h3>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="photo">
                        Photo
                        <p><small>(Preferebly white background Max 1MB: jpg)</small></p>
                      </label>
                      <input type="file" id="photo" name="photo" value="{{ old('photo') }}" class="form-control  @error('photo') is-invalid @enderror"  />
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-5">
                      <label class="form-label" for="diplomatic-note">
                      Diplomatic Note / Invitation Letter
                        <p><small>(Max 2MB: pdf)</small></p>
                      </label>
                      <input type="file" id="diplomatic-note" class="form-control  @error('diplomatic_note') is-invalid @enderror"  value="{{ old('diplomatic_note') }}" name="diplomatic_note" accept="application/pdf"/>
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
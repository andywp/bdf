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
        
        <div class="row mt-md-5 mt-3">
          <div class="col-12">
            <div class="login-form">
                <form>
                    <h3 class="text-center title-form">Personal Information</h3>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="country">Country/Organization of Representation</label>
                        <input type="text" id="country" class="form-control" placeholder="- Country/Organization of Representation -" />
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="other">Other (Specify)</label>
                        <input type="text" id="other" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="titleform">Title</label>
                      <input type="text" id="titleform" class="form-control" placeholder="- Title -" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="family">Family Name</label>
                      <input type="text" id="family" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="fisrt-name">First Name</label>
                      <input type="text" id="fisrt-name" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="badge-name">Prefered Name on Badge</label>
                      <input type="text" id="badge-name" class="form-control" placeholder="(max. 25 characters, you can include your title e.g.: H.E.)" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="nationality">Nationality</label>
                      <input type="text" id="nationality" class="form-control" placeholder="- Nationality -" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="other2">Other (specify)</label>
                      <input type="text" id="other2" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="affiliation">Affiliation</label>
                      <input type="text" id="affiliation" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="office-title">Office Title</label>
                      <input type="text" id="office-title" class="form-control" placeholder="" />
                    </div>
                    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="office-address">Office Address</label>
                      <input type="text" id="office-address" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="position">Gender</label>
                      <select class="form-select form-control" aria-label="Default select example">
                        <option selected>- Gender -</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                    
                    <!-- contact detail -->
                    <h3 class="text-center title-form mt-5">Contact Details</h3>
                    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="telphone">Telphone</label>
                      <input type="tel" id="telphone" class="form-control" placeholder="+62213441508" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="fax">Fax</label>
                      <input type="tel" id="fax" class="form-control" placeholder="+62213441508" />
                    </div>

                    <!-- Passport -->
                    <h3 class="text-center title-form mt-5">Passport</h3>
                    
                    <div class="form-outline mb-4">
                      <label class="form-label" for="passport-no">Passport Number</label>
                      <input type="text" id="passport-no" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="date-issuance">Date of Issuance</label>
                      <input type="text" id="date-issuance" class="form-control" placeholder="" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="date-expiry">Date of Expiry</label>
                      <input type="text" id="date-expiry" class="form-control" placeholder="" />
                    </div>

                    <h3 class="text-center title-form mt-5">Upload Attachment</h3>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="photo">
                        Photo
                        <p><small>(Preferebly white background Max 1MB: jpg)</small></p>
                      </label>
                      <input type="file" id="photo" class="form-control" />
                    </div>

                    <div class="form-outline mb-5">
                      <label class="form-label" for="diplomatic-note">
                        Diplomatic Note
                        <p><small>(Max 1MB: pdf)</small></p>
                      </label>
                      <input type="file" id="diplomatic-note" class="form-control" />
                    </div>

                    <div class="form-check mb-4">
                      <input class="form-check-input" type="checkbox" value="" id="agreement" >
                      <label class="form-check-label" for="agreement">
                        By filling out this form, you agree to the handling of your data by this website
                      </label>
                    </div>
                                        
                    <button type="button" class="btn primary-btn mb-4">Send</button>
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
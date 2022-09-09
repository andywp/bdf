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
                <h2 class="title-section text-center">Media Attendance</h2>
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
                <form action="{{ route('media_store') }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                        <h3 class="text-center title-form">Personal Information</h3>
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
                            <label class="form-label" for="date-ofBirth">Date of Birth</label>
                            <input type="text" id="date-ofBirth" class="form-control datepicker  @error('date_of_birth') is-invalid @enderror" name="date_of_birth"  value="{{ old('date_of_birth') }}" placeholder="" />
                            @error('date_of_birth')
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
                            <label class="form-label" for="id-number">Passport Number / KTP</label>
                            <input type="text" id="id-number" name="id_nummber" class="form-control @error('id_nummber') is-invalid @enderror"  value="{{ old('id_nummber') }}" placeholder="" />
                            @error('id_nummber')
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
                            <input type="text" id="date-expiry" class="form-control  datepicker @error('date_of_expiry') is-invalid @enderror" name="date_of_expiry" value="{{ old('date_of_expiry') }}" placeholder="" />
                            @error('date_of_expiry')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Media Information -->
                        <h3 class="text-center title-form mt-5">Media Information</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="media-name">Name of Media</label>
                            <input type="text" id="media-name" class="form-control  @error('name_of_media') is-invalid @enderror" name="name_of_media"  value="{{ old('name_of_media') }}" placeholder="" />
                            @error('name_of_media')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="form-label">Your Position in Agency</label>
                        @error('your_position_in_agency')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="your_position_in_agency[]" value="Reporter" @if(is_array(old('your_position_in_agency')) && in_array('Reporter', old('your_position_in_agency'))) checked @endif id="reporter">
                                    <label class="form-check-label" for="reporter">
                                        Reporter
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="your_position_in_agency[]" value="Cameraman" @if(is_array(old('your_position_in_agency')) && in_array('Cameraman', old('your_position_in_agency'))) checked @endif id="cameraman">
                                    <label class="form-check-label" for="cameraman">
                                        Cameraman
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="your_position_in_agency[]" value="Photographer" @if(is_array(old('your_position_in_agency')) && in_array('Photographer', old('your_position_in_agency'))) checked @endif id="photographer">
                                    <label class="form-check-label" for="photographer">
                                        Photographer
                                    </label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="your_position_in_agency[]" value="Technician"  @if(is_array(old('your_position_in_agency')) && in_array('Technician', old('your_position_in_agency'))) checked @endif id="technician">
                                    <label class="form-check-label" for="technician">
                                        Technician
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="your_position_in_agency[]" value="Correspondent" @if(is_array(old('your_position_in_agency')) && in_array('Correspondent', old('your_position_in_agency'))) checked @endif id="correspondent">
                                    <label class="form-check-label" for="correspondent">
                                        Correspondent
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  name="your_position_in_agency[]" value="Freelance" @if(is_array(old('your_position_in_agency')) && in_array('Freelance', old('your_position_in_agency'))) checked @endif id="freelance">
                                    <label class="form-check-label" for="freelance">
                                        Freelance
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="other2">Other</label>
                            <input type="text" id="other2" class="form-control  @error('your_position_in_agency_other') is-invalid @enderror"  value="{{ old('your_position_in_agency_other') }}"  name="your_position_in_agency_other" />
                        </div>

                        <label class="form-label">How do we contact you?</label>
                        @error('how_do_we_contact_you')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="By e-mail" name="how_do_we_contact_you[]" @if(is_array(old('how_do_we_contact_you')) && in_array('By e-mail', old('how_do_we_contact_you'))) checked @endif id="by-email">
                                    <label class="form-check-label" for="by-email">
                                        By e-mail
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="By Phone"  name="how_do_we_contact_you[]" @if(is_array(old('how_do_we_contact_you')) && in_array('By Phone', old('how_do_we_contact_you'))) checked @endif id="by-phone">
                                    <label class="form-check-label" for="by-phone">
                                        By Phone
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="By contact person"  name="how_do_we_contact_you[]" @if(is_array(old('how_do_we_contact_you')) && in_array('By contact person', old('how_do_we_contact_you'))) checked @endif id="by-contactperson">
                                    <label class="form-check-label" for="by-contactperson">
                                        By contact person
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="contact-personName">Contact Person Name</label>
                            <input type="text" id="contact-personName" name="contact_person_name" class="form-control  @error('contact_person_name') is-invalid @enderror"  value="{{ old('contact_person_name') }}" placeholder="" />
                            @error('contact_person_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="contact-personPhone">Contact Person Phone</label>
                            <input type="tel" id="contact-personPhone" name="contact_person_phone" class="form-control  @error('contact_person_phone') is-invalid @enderror" value="{{ old('contact_person_phone') }}" placeholder="" />
                            @error('contact_person_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="contact-personPhone">Contact Person Email</label>
                            <input type="tel" id="contact-personPhone" name="contact_person_email" class="form-control  @error('contact_person_email') is-invalid @enderror" value="{{ old('contact_person_email') }}" placeholder="" />
                            @error('contact_person_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="contact-personPhone">Country of Head Office Address</label>
                            <input type="tel" id="contact-personPhone" name="country_of_head_office_address" class="form-control  @error('country_of_head_office_address') is-invalid @enderror" value="{{ old('country_of_head_office_address') }}" placeholder="" />
                            @error('country_of_head_office_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="contact-personPhone">Your Office Address</label>
                            <input type="tel" id="contact-personPhone" name="your_office_address" class="form-control  @error('your_office_address') is-invalid @enderror" value="{{ old('your_office_address') }}" placeholder="" />
                            @error('your_office_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="form-label">Origin of Media</label>
                        @error('origin_of_media')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="origin_of_media" value="Indonesian Media" {{ (old('origin_of_media') == 'Indonesian Media')?'checked':'' }}  id="originMedia1">
                                    <label class="form-check-label" for="originMedia1">
                                        Indonesian Media
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="origin_of_media" value="Foreign Media" {{ (old('origin_of_media') == 'Foreign Media')?'checked':'' }}   id="originMedia2">
                                    <label class="form-check-label" for="originMedia2">
                                        Foreign Media
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="origin_of_media" value="Jakarta Based Foreign Media" {{ (old('origin_of_media') == 'Jakarta Based Foreign Media')?'checked':'' }}  id="originMedia3">
                                    <label class="form-check-label" for="originMedia3">
                                        Jakarta Based Foreign Media
                                    </label>
                                </div>
                            </div>
                        </div>

                        <label class="form-label">Type of Media</label>
                        @error('type_of_media')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Newspaper" name="type_of_media[]" id="newspaper" @if(is_array(old('type_of_media')) && in_array('Newspaper', old('type_of_media'))) checked @endif>
                                    <label class="form-check-label" for="newspaper">
                                        Newspaper
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="News Agency" name="type_of_media[]" id="news-agency" @if(is_array(old('type_of_media')) && in_array('News Agency', old('type_of_media'))) checked @endif>
                                    <label class="form-check-label" for="news-agency">
                                        News Agency
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Radio" name="type_of_media[]" id="radio"  @if(is_array(old('type_of_media')) && in_array('Radio', old('type_of_media'))) checked @endif>
                                    <label class="form-check-label" for="radio">
                                        Radio
                                    </label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Television" name="type_of_media[]" id="television"  @if(is_array(old('type_of_media')) && in_array('Television', old('type_of_media'))) checked @endif>
                                    <label class="form-check-label" for="television">
                                        Television
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Photo Agency" name="type_of_media[]" id="photo-agency" @if(is_array(old('type_of_media')) && in_array('Photo Agency', old('type_of_media'))) checked @endif>
                                    <label class="form-check-label" for="photo-agency">
                                        Photo Agency
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Online Media" name="type_of_media[]" id="online-media" @if(is_array(old('type_of_media')) && in_array('Online Media', old('type_of_media'))) checked @endif>
                                    <label class="form-check-label" for="online-media">
                                        Online Media
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="other-media">Other (specify)</label>
                            <input type="text" id="other-media" class="form-control @error('type_of_media_other') is-invalid @enderror" name="type_of_media_other"  value="{{ old('type_of_media_other') }}" />
                            @error('type_of_media_other')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="form-label">Media Status</label>
                        @error('media_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input @error('media_status') is-invalid @enderror" type="radio" name="media_status" value="Official Media (travel with delegation)" id="media-delegation1" {{ (old('media_status') == 'Official Media (travel with delegation)')?'checked':'' }}>
                                    <label class="form-check-label" for="media-delegation1">
                                        Official Media (travel with delegation)
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input @error('media_status') is-invalid @enderror" type="radio" name="media_status" value="Non-official Media" id="media-delegation2" {{ (old('media_status') == 'Non-official Media')?'checked':'' }}>
                                    <label class="form-check-label" for="media-delegation2">
                                        Non-official Media
                                    </label>
                                </div>
                            </div>
                        </div>

                        <h3 class="text-center title-form mt-5">Upload Attachment</h3>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="photo">
                                Letter of Assignment
                                <p><small>(From the editor/executive of the media or Letter from your government /Diplomatic Note from your embassy in Jakarta if you are Official Media/travelling with the delegation. Max 2MB: pdf)</small></p>
                            </label>
                            <input type="file" id="photo" class="form-control @error('media_status') is-invalid @enderror" name="Letter_of_assignment" value="{{old('media_status') }}" />
                            @error('Letter_of_assignment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-outline mb-5">
                            <label class="form-label" for="diplomatic-note">
                                Passport/KTP
                                <p><small>(Copy of valid Passport for Non-Indonesian applicants and KTP for Indonesian applicant. Max 1MB: jpg)</small></p>
                            </label>
                            <input type="file" id="diplomatic-note" class="form-control  @error('passport_ktp') is-invalid @enderror" name="passport_ktp"  value="{{old('passport_ktp') }}" />
                            @error('passport_ktp')
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
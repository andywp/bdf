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
                <h2 class="title-section text-center">Virtual Attendance</h2>
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
                    <h3 class="text-center title-form">Personal Information</h3>
                    <form action="{{ route('virtualattendance_store') }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="country">Country/Organization of Representation</label>
                            <select class="optionselect form-select  form-control w-100  @error('country_organization') is-invalid @enderror" name="country_organization">
                                <option value="">Country/Organization of Representation</option>
                                @foreach($organisasi as $r)
                                <option value="{{ $r->name }}" {{(old('country_organization') == $r->name)?'selected':'' }}>{{ $r->name }}</option>
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
                            <input type="text" id="family" class="form-control @error('family_name') is-invalid @enderror" name="family_name" value="{{ old('family_name') }}" placeholder="" />
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
                            <input type="text" id="badge-name" class="form-control  @error('prefered_name_on_badge') is-invalid @enderror" name="prefered_name_on_badge" value="{{ old('prefered_name_on_badge') }}" placeholder="(max. 25 characters, you can include your title e.g.: H.E.)" />
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
                            <input type="text" id="other2" class="form-control @error('nationality_other') is-invalid @enderror" name="nationality_other" value="{{ old('nationality_other') }}" placeholder="" />
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
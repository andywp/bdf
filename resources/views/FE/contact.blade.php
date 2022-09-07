@extends('layouts.bdf')
@section('styles')
<link rel="stylesheet" href="{{ asset('bdf/assets/css/form.css') }}" type="text/css" />
@endsection
@section('content')
<!-- Publication -->
<section class="first_section" id="publication">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title-section text-center">CONTACT US</h2>
            <div class="mbr-section-subtitle text-center">Any question or remarks? Just write us a message!</div>
          </div>
        </div>
        
        <div class="row mt-md-5 mt-3">
          <div class="col-12">
            <div class="wrap-contactform">
              <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                  <div class="contact-information">
                    <h3 class="title-widget">Contact Information</h3>
                    <ul class="contact-list">
                      <li class="text-white">
                        <i class="fas fa-phone"></i> +6221 3441508 ext 4007
                      </li>
                      <li class="text-white">
                        <i class="fas fa-fax"></i> +6221 385 8035
                      </li>
                      <li class="text-white">
                        <i class="fas fa-envelope"></i> bdf@kemlu.go.id
                      </li>
                    </ul>
                    <div class="widget-sosmed">
                      <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
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
                  <form class="py-4" method="POST" action="{{ route('contactsend') }}" autocomplete="off">
                  @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first_name" class="form-control  @error('first_name') is-invalid @enderror"  value="{{ old('first_name') }}" placeholder="Jhon" autocomplete="off"/>
                              @error('first_name')
                              <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="last-name">last Name</label>
                            <input type="text" id="last-name" name="last_name" class="form-control  @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Due" autocomplete="off"/>
                            @error('las_name')
                              <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="081 xxxx xxxx xx" autocomplete="off"/>
                            @error('phone')
                              <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="mail@mail.com" autocomplete="off"/>
                              @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row mb-5">
                     <div class="col-12 mb-4">
                        <label class="form-label " for="message">Subject</label>
                        <input type="text" id="last-name" name="subject" class="form-control  @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="subject" autocomplete="off"/>
                        @error('subject')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="message">Message</label>
                        <textarea name="message" class="form-control  @error('subject') is-invalid @enderror" placeholder="Write your message" id="message" required="required">{{ old('message') }}</textarea>
                        @error('message')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                                      
                    <button type="submit" class="btn primary-btn mb-4 maxwidth-none">Send Message</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
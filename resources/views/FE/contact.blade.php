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
                  <form class="py-4">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="first-name">First Name</label>
                            <input type="email" id="first-name" class="form-control" placeholder="Jhon" />
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="last-name">last Name</label>
                            <input type="email" id="last-name" class="form-control" placeholder="Due" />
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="email" id="phone" class="form-control" placeholder="081 xxxx xxxx xx" />
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="mail@mail.com" />
                        </div>
                      </div>
                    </div>

                    <div class="row mb-5">
                      <div class="col-12">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" placeholder="Write your message" id="message"></textarea>
                      </div>
                    </div>
                                      
                    <button type="button" class="btn primary-btn mb-4 maxwidth-none">Send Message</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
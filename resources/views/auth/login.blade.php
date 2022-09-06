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
            <h2 class="title-section text-center">LOGIN</h2>
          </div>
        </div>
        <div class="row mt-md-5 mt-3">
          <div class="col-12">
            <div class="login-form">
                <form method="POST" action="{{ route('logincheck') }}">
                @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label label-flex" for="form2Example2">Password <a href="{{ route('password.request') }}">Forgot password?</a></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                       
                    </div>
                  
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-start">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                      </div>
                    </div>
                  
                    <button type="submit" class="btn primary-btn mb-4">Sign in</button>
                  
                   
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
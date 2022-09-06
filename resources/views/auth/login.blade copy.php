@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                   
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





@extends('layouts.bdf')
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
                <form>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Email address</label>
                        <input type="email" id="form2Example1" class="form-control" placeholder="Email address" />
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label label-flex" for="form2Example2">Password <a href="#!">Forgot password?</a></label>
                        <input type="password" id="form2Example2" class="form-control" placeholder="password" />                        
                    </div>
                  
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-start">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="form2Example31" />
                          <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                      </div>
                    </div>
                  
                    <button type="button" class="btn primary-btn mb-4">Sign in</button>
                  
                    <div class="text-left">
                      <p>Not a member? <a href="#!">Register</a></p>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
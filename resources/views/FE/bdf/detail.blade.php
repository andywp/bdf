@extends('layouts.bdf')
@section('content')

   <!-- Publication -->
   <section class="first_section" id="about-what-bdf">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title-section text-center">{{ $data->post_title }}</h2>
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
            @if(file_exists(public_path('images/post/'.$data->post_image)) && !empty($data->post_image)) 
            <div class="wrap-img-full mb-6">
              <img src="{{ asset('images/post/'.$data->post_image) }}" alt="{{ $data->post_title }}" >
            </div>
            @endif
            <div class="text-content">
                {!! $data->post_content  !!}

            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
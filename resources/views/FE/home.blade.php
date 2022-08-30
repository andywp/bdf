@extends('layouts.bdf')
@section('title','Bali Democracy Forum')
@section('content')

    <!-- BANNER -->
    <section class="slider1 banner_slider mbr-fullscreen" id="slider1-2">
      <div class="carousel slide carousel-fade" id="t300HvSMfa" data-ride="carousel" data-bs-ride="carousel" data-interval="5000" data-bs-interval="5000">
        <ol class="carousel-indicators">
            @foreach($slider as $sliders)
                <li data-slide-to="{{ $loop->index }}" data-bs-slide-to="$loop->index" class="active" data-target="#t300HvSMfa" data-bs-target="#t300HvSMfa"></li>
            @endforeach
          
        </ol>
        <div class="carousel-inner">
        @foreach($slider as $sliders)
            <div class="carousel-item slider-image item @if($loop->first) active @endif">
                <div class="item-wrapper">
                <img class="d-block w-100" src="{{ asset('images/slider/'.$sliders->images) }}" alt="{{ $sliders->title }}" data-slide-to="{{ $loop->index }}" data-bs-slide-to="{{ $loop->index }}" />
                </div>
            </div>
        @endforeach
          
        </div>
        <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" data-bs-slide="prev" href="#t300HvSMfa">
          <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
          <span class="sr-only visually-hidden">Previous</span>
        </a>
        <a class="carousel-control carousel-control-next" role="button" data-slide="next" data-bs-slide="next" href="#t300HvSMfa">
          <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
          <span class="sr-only visually-hidden">Next</span>
        </a>
      </div>
    </section>
     <!-- BANNER -->


    <!-- Introduction -->
    <section class="section_regular bg-grey" id="history">
      <div class="container text-center">
        <div class="row align-items-center">
          <div class="col-12">
            <h2 class="title-section">Introduction</h2>
            <div class="inner_content">
              <p>The Bali Democracy Forum (BDF) was established in 2008 to create a progressive democratic architecture in the Asia-Pacific region. In the past decades, the Forum facilitated dialogues through sharing experiences and best practices in managing diversity that encourages equality, mutual understanding and respect. Throughout the years, this has become the foundation of the Forum. In doing so, the BDF has also been active in advocating the principles of democracy – namely that it must be grown and developed based on internal initiatives (home-grown); that it upholds the values of pluralism and diversity; and that it must be inclusive.
                Over the years, the BDF has succeeded in making democracy a strategic agenda in the Asia-Pacific. It has encouraged countries to establish a balance between economic and political development, between creating peace and security, and promoting human rights and fundamental freedom as well as respecting humanitarian values. All of which are reflected in the three founding pillars of the United Nations Charter.
                The various themes that have been discussed in the BDF have resulted in new ideas being further promulgated and shared amongst countries. Over a decade, the BDF is expected to continue contributing to the region’s peace and stability, to the promotion of human rights, and especially to further encourage the healthy balance between economic growth and political development.
              </p>
              <p>FOR INQUIRIES, PLEASE CONTACT BDF@KEMLU.GO.ID.</p>
            </div>
          </div>
        </div>        
      </div>
    </section>
    <!--// Introduction -->

    <!-- Gallery -->
    <section class="section_regular" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title-section text-center">Gallery</h2>
          </div>
        </div>
        
        <div class="row">
            @foreach($gallery as $r)
                @if(file_exists(public_path('images/gallery/'.$r->images))) 
                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                    <div class="card-gallery">
                        <a href="{{ asset('images/gallery/'.$r->images) }}" data-fancybox="gallery" data-caption="Caption Images 1">
                        <img src="{{ asset('images/gallery/thumb/medium/'.$r->images) }}" alt="{{ $r->title }}">
                        </a>
                    </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
      </div>
    </section>

@endsection
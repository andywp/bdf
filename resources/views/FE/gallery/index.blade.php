@extends('layouts.bdf')
@section('styles')
  <style>
    .external_links .slick-slide img{
        max-width: 70px;
    }
    .card-gallery img {
        object-fit: cover;
        height: 200px;
    }
    h6{
        font-weight: 500;
        color: #2A4B75;
    }
  </style>
@endsection
@section('content')

<!-- Gallery -->
<section class="first_section" id="gallery">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <h2 class="title-section text-center">Gallery</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
        <!-- Nav Tabs -->
        <ul class="nav nav-gallery mb-4 justify-content-center" id="gallery-tab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="gallery-images-tab" data-bs-toggle="pill" data-bs-target="#gallery-images" type="button" role="tab" aria-controls="gallery-images" aria-selected="true">images</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="gallery-video-tab" data-bs-toggle="pill" data-bs-target="#gallery-video" type="button" role="tab" aria-controls="gallery-video" aria-selected="false">video</button>
            </li>
        </ul>
        <!-- Nav Tabs -->
        <!-- Tabs content -->
        <div class="tab-content" id="gallery-tabContent">
            <div class="tab-pane fade show active" id="gallery-images" role="tabpanel" aria-labelledby="gallery-images-tab" tabindex="0">
                <!-- <form action="{{ route('gallery') }}" method="GET"> -->
                <div class="form-floating mb-4">
                    <select class="form-select" id="selectGallery" name="album" aria-label="Floating label select example" >
                        @foreach($album as $albums)
                        <option value="bdf-{{ $albums->id }}"> {{ $albums->album }}</option>
                        @endforeach
                        
                    </select>
                    <label for="selectGallery">Pilih Kategori</label>
                </div>
            <!--  </form> -->

                <div class="wrapp-gallery">
                    @foreach($album as $albums)
                    <div id="bdf-{{ $albums->id }}" class="list-gallery">
                        <div class="row">
                            @foreach($albums->gallery as $r)
                                @if(file_exists(public_path('images/gallery/'.$r->images))) 
                                <div class="col-md-3 col-6 py-3">
                                    <div class="card">
                                        <div class="card-gallery">
                                        <a href="{{ asset('images/gallery/'.$r->images) }}" data-fancybox="gallery" data-caption="{{ $r->title }}">
                                            <img src="{{ asset('images/gallery/thumb/medium/'.$r->images) }}" alt="{{ $r->title }}">
                                        </a>
                                        </div>
                                        <h6 class="my-2 text-center" >{{ $r->title }}</h6>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    
                </div>
            </div>
            <div class="tab-pane fade" id="gallery-video" role="tabpanel" aria-labelledby="gallery-video-tab" tabindex="0">

            
            <div class="wrapp-gallery">
                <div class="row">
                @foreach($video as $v)
                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                            <a href="#video{{ $loop->iteration }}" data-fancybox="gallery_video" data-caption="{{ $v->title }}">
                            <img src="{{ asset('images/cover_video/thumb/medium/'.$v->cover) }}"/>
                            </a>
                            <div id="video{{ $loop->iteration }}" class="fancybox-video">
                            <video controls width="100%" height="auto" class="video-item">
                                <source src="{{ asset('video/'.$v->file) }}" type="video/mp4">   
                            </video>
                            </div>
                        </div>
                        <h6 class="my-2 text-center" >{{ $v->title }}</h6>
                    </div>
                </div>
                @endforeach
                </div>
                {{ $video->links() }}
            </div>
            </div>
        </div>
        <!-- Tabs content -->
        </div>
    </div>
    </div>
</section>

@endsection
@section('scripts')
<script src="{{ asset('bdf/assets/js/selected-gallery.js') }}"></script>
@endsection
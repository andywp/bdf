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
            <form action="{{ route('gallery') }}" method="GET">
            <div class="form-floating mb-4">
                <select class="form-select" id="selectGallery" name="album" aria-label="Floating label select example" onchange="this.form.submit()">
                    @foreach($album as $albums)
                    <option value="{{ $albums->id }}" {{ ($albums->id == $albumID)?'selected':'' }} > {{ $albums->album }}</option>
                    @endforeach
                    
                </select>
                <label for="selectGallery">Pilih Kategori</label>
            </div>
            </form>

            <div class="wrapp-gallery">
                <div id="bdf-15" class="list-gallery">
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
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?food" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?food" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
        
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?travel" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?travel" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
        
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?building" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?building" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <div id="bdf-14" class="list-gallery">
                <div class="row">
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?nature" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?nature" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
        
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?bali" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?bali" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
        
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?car" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?car" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
        
                    <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <div class="card-gallery">
                        <a href="https://source.unsplash.com/480x300/?rose" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://source.unsplash.com/480x300/?rose" alt="Image Gallery">
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="gallery-video" role="tabpanel" aria-labelledby="gallery-video-tab" tabindex="0">
            <div class="wrapp-gallery">
                <div class="row">
                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                    <div class="card-gallery">
                        <a href="#video1" data-fancybox="gallery_video" data-caption="Caption Images 1">
                        <img src="https://source.unsplash.com/480x300/?nature"/>
                        </a>
                        <div id="video1" class="fancybox-video">
                        <video controls width="100%" height="auto" class="video-item">
                            <source src="./assets/videos/big_buck_bunny.mp4" type="video/mp4">   
                        </video>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                    <div class="card-gallery">
                        <a href="#video2" data-fancybox="gallery_video" data-caption="Caption Images 1">
                        <img src="https://source.unsplash.com/480x300/?bali" alt="Image Gallery">
                        </a>
                        <div id="video2" class="fancybox-video">
                        <video controls width="100%" height="auto" class="video-item">
                            <source src="./assets/videos/big_buck_bunny.mp4" type="video/mp4">   
                        </video>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                    <div class="card-gallery">
                        <a href="#video3" data-fancybox="gallery_video" data-caption="Caption Images 1">
                        <img src="https://source.unsplash.com/480x300/?space" alt="Image Gallery">
                        </a>
                        <div id="video3" class="fancybox-video">
                        <video controls width="100%" height="auto" class="video-item">
                            <source src="./assets/videos/big_buck_bunny.mp4" type="video/mp4">   
                        </video>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                    <div class="card-gallery">
                        <a href="#video4" data-fancybox="gallery_video" data-caption="Caption Images 1">
                        <img src="https://source.unsplash.com/480x300/?winter" alt="Image Gallery">
                        </a>
                        <div id="video4" class="fancybox-video">
                        <video controls width="100%" height="auto" class="video-item">
                            <source src="./assets/videos/big_buck_bunny.mp4" type="video/mp4">   
                        </video>
                        </div>
                    </div>
                    </div>
                </div>

                </div>
            </div>
            </div>
        </div>
        <!-- Tabs content -->
        </div>
    </div>
    </div>
</section>

@endsection
@extends('layouts.bdf')

@section('content')
<section class="first_section" id="history">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <h2 class="title-section text-center">History</h2>
        </div>
    </div>
    <div class="row">
        @foreach($data as $r)
        <div class="col-md-6 col-12">
            <div class="card crd-history">
                <div class="card-body">
                    <h5 class="card-title">{{ $r->post_title }}</h5>
                    <div class="card-text">{!! $r->post_content !!}</div>
                </div>
            </div>
        </div>
        @endforeach
        
        </div>
    </div>
</section>
@endsection
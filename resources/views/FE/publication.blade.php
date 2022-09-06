@extends('layouts.bdf')
@section('content')
<!-- Publication -->
<!-- Publication -->
<section class="first_section" id="publication">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title-section text-center">PUBLICATION</h2>
          </div>
        </div>
        <form action="{{ route('download') }}" class="needs-validation" method="POST" >
        @csrf
        <div class="row">
          <div class="col-12">
            <!-- <div class="filter-content">
                <div class="counter-download">
                    <button class="reset-btn" type="button" id="reset_download">-</button>
                    <div class="label_counter">
                        <span class="download_count">2</span>&nbsp;request selected
                    </div>
                </div>
                <button type="submit" id="btn_download"><i class="fas fa-arrow-down"></i> Download</button>
            </div> -->
           
            <div class="accordion" id="accordion_Download">
                @foreach($data as $r)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading-{{ $r->id }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $r->id }}" aria-expanded="true" aria-controls="collapse-{{ $r->id }}">
                        {{ $r->title }}
                    </button>
                  </h2>
                  <div id="collapse-{{ $r->id }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ $r->id }}" data-bs-parent="#accordion_Download">

                     
                    <div class="accordion-body">
                         @foreach($r->download as $d)
                            <div class="form-check">
                               <!--  <input class="form-check-input" name="download[]" type="checkbox" value="{{ $d->file }}" id="flexCheckDefault" -->
                                <a href="{{ asset('download/'. $d->file) }}" download>
                                  <i class="fas fa-file-pdf"></i> {{ $d->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                   
                  </div>
                </div>
                @endforeach
                
              </div>
          </div>
        </div>
        </form>
      </div>
    </section>



@endsection
@section('scripts')
<script src="{{ asset('bdf/assets/js/download-pdf.js') }}"></script>
@endsection
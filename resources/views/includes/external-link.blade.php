<!-- External Link -->
<section class="section_regular bg-grey" id="media">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="title-section text-center">External Link</h2>
      </div>
    </div>
   

    <div class="row">
      <div class="col-12">
        <div class="external_links">
          @foreach($slider as $r)
            @if(file_exists(public_path('images/link/thumb/small/'.$r->images))) 
            <div>
              <a href="{{ !empty($->order_link)?$r->order_link:'#' }}"><img src="{{ asset('images/link/thumb/medium/'.$r->images) }}" alt="{{ $r->title }}" class="img_externallinks"></a>
            </div>
            @endif
          @foreach
        </div>
      </div>
    </div>
  </div>
</section>
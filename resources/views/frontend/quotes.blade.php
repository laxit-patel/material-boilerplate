@extends('frontend.layouts.master')

@section('title', 'Quotes')

@section('content')
		

<div class="container">
    <div class="section">

    <div class="row align-items-center grid">



@foreach ($quotes as $quote)

<div class="col-md-6 grid-item">
    <div class="card card-testimonial" style="background:url('{{ asset('images/'.$quote->image) }}') no-repeat scroll center center transparent!important;background-size: cover!important;background">
                <div class="icon">
                  <i class="material-icons">format_quote</i>
                </div>
                <div class="card-body ">
                <blockquote class="card-description quote-overlay" >

                    <h3 class=" text-white" id="quote-text" style="margin-top:-4%;">{{ $quote->quote }}</h3>

                    <div class="card-footer row justify-content-center " style="margin-bottom:-4%" >

                    <div class="col-md-6  ">
                    <div class="author p-3">
                                    <a href="#pablo">
                                    <img src="../assets/img/user.png" alt="..." class="avatar img-raised">
                                    <span class="text-white">{{ $quote->name }}</span>
                                    </a>
                                </div>
                    </div>
                    <div class="col-md-6 ">
                            <a href="javascript:;" class="btn btn-just-icon btn-rose btn-round">
                                <i class="fa fa-share"></i>
                            </a>
                            <button id='copy-quote' data-clipboard-text="{{ $quote->quote }}" class="btn btn-just-icon btn-rose btn-round">
                                <i class="fa fa-copy"></i>
                            </button>
                            <a href="{{ asset('images/'.$quote->image)}}" class="btn btn-just-icon btn-rose btn-round" data-toggle="tooltip" data-placement="left" data-original-title="Download Image">
                                <i class="fa fa-download"></i>
                            </a>
                    </div>
                    </div>
                    </blockquote>
                </div>
             
              </div>
    </div>
 
@endforeach

</div>

    </div>
</div>


@push('js')

<!-- Pushing Masonry -->
<script src="{{ asset('material') }}/js/plugins/masonry.js"></script>
<script src="{{ asset('material') }}/js/plugins/clipboard.js"></script>

<script type="text/javascript">
$('.grid').masonry({
  // options
  itemSelector: '.grid-item',
});

var clipboard = new ClipboardJS('#copy-quote');

clipboard.on('success', function(e) {
   alert('Copied');

    e.clearSelection();
});

function copyIt(quote) {
    var quote_text = quote.getAttribute("data-quote");
    alert(quote_text);
}


</script>
@endpush

@endsection
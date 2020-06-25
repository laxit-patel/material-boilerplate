@extends('layouts.app', ['activePage' => 'view-quote', 'breadCrumb' => 'Quote -> Create' ,'titlePage' => __('Quote - Create')])

@section('content')
  <div class="content">
    <div class="container-fluid" style="height: auto;">

        <div class="row align-items-center grid">

            @foreach ($quotes as $quote)

            <div class="col-md-6 grid-item">

                <div class="card card-background quote-bg" style="background:url('{{ asset('images/'.$quote->image) }}') no-repeat scroll center center transparent!important;background-size: cover!important;">
                <div class="card-header card-header-rose card-header-text">
                  <button class="card-icon btn btn-link text-white btn-round">
                    <i class="fa fa-quote-left"></i>
                    {{ $quote->catagory }}
                  <div class="ripple-container"></div>
                    </button>
                  
                </div>
                <blockquote class=" quote-overlay" >

                <h3 class="card-title" style="margin-top:-4%">{{ $quote->quote }}</h3>

                <div class="card-footer row justify-content-center " style="margin-bottom:-4%" >
                
                <div class="col-md-6  ">
                <div class="author p-3">
                                <a href="#pablo">
                                   <img src="../assets/img/user.png" alt="..." class="avatar img-raised">
                                   <span class="text-white">{{ Auth::user()->name ?? "" }}</span>
                                </a>
                            </div>
                </div>
                <div class="col-md-6 ">
                    
                        <a href="javascript:;" class="btn btn-just-icon btn-rose btn-round">
                            <i class="fa fa-share"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-just-icon btn-rose btn-round">
                            <i class="fa fa-copy"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-just-icon btn-rose btn-round">
                            <i class="fa fa-download"></i>
                        </a>
                </div>
                </blockquote>
                </div>
                </div>
             
            @endforeach

        </div>
      </div>
  </div>

  
@push('js')

<!-- Pushing Masonry -->
<script src="{{ asset('material') }}/js/plugins/masonry.js"></script>

<script type="text/javascript">
$('.grid').masonry({
  // options
  itemSelector: '.grid-item',
});
</script>
@endpush

@endsection

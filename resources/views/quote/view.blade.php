@extends('layouts.app', ['activePage' => 'view-quote', 'breadCrumb' => 'Quote -> Create' ,'titlePage' => __('Quote - Create')])

@section('content')
  <div class="content">
    <div class="container-fluid" style="height: auto;">

    @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
          @endif

        <div class="row align-items-center grid">

        

            @forelse ($quotes as $quote)

            <div class="col-md-6 grid-item">

                <div class="card card-background quote-bg" style="background:url('{{ asset('images/'.$quote->image) }}') no-repeat scroll center center transparent!important;background-size: cover!important;">
                
                <div class="row card-header card-header-rose card-header-text">

                  <button class="col-md-9 card-icon btn btn-link text-white  btn-round">
                    <i class="fa fa-quote-left"></i>
                    {{ $quote->catagory }}
                  <div class="ripple-container"></div>
                    </button>

                    <button class=" col-md-2 card-icon btn btn-link text-white btn-round pull-right">
                    <a href="delete-quote/{{$quote->id}}" style="color:white" >X</a>
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
                                   <span class="text-white">{{ $quote->author }}</span>
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
             
            @empty

            <div class="info container-fluid ">
                <div class="icon icon-warning">
                  <i class="material-icons">warning</i>
                </div>
                <h4 class="info-title">
                    Ooops!
                </h4>
                <p>No Quotes Found</p>
                <a href="create-quote" class="btn btn-rose"> Add New Quotes</a>
              </div>

            @endforelse

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

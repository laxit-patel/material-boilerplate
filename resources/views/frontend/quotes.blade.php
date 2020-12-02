@extends('frontend.layouts.master')

@section('title', 'Quotes')

@section('content')
		

<div class="container">
    
    <div class="section">
        
    <div class="row nav-align-center">
          <div class="col-md-12 ml-auto mr-auto text-center">
            <ul class="nav nav-pills nav-pills-primary">
              <li class="nav-item active">
                <a class="nav-link active" href="#pill1" data-toggle="tab">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pill2" data-toggle="tab">Attitude</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pill3" data-toggle="tab">Emotional</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pill3" data-toggle="tab">Love</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pill3" data-toggle="tab">Inspirational`</a>
              </li>
            </ul>
            <div class="tab-content tab-space">
              <div class="tab-pane active" id="pill1"></div>
              <div class="tab-pane" id="pill2"></div>
              <div class="tab-pane" id="pill3"></div>
              <div class="tab-pane" id="pill4"></div>
            </div>
          </div>
        </div>

    <div class="row align-items-center grid">



@forelse ($quotes as $quote)

                <div class=" col-md-4 rotating-card-container manual-flip grid-item" style="margin-bottom: 30px;">
                  <div class="card card-rotate">
                    <div class="front front-background" style="background-image: url(&quot;{{ asset('images/'.$quote->image) }}&quot;);">
                      <div class="card-body" style="background-color: rgba(0,0,0,.50)!important;border-radius:6px">

                      <h5 class="card-category text-left card-category-social" style="color:white;">
                          <i class="fa fa-quote-left text-primary"></i> {{ $quote->catagory }}
                        </h5>

                          <h3 class="card-title">{{ $quote->quote }}</h3>
                        
                        <div class="container-fluid">
                            
                        <div class="author pull-left">
                      <a href="#pablo">
                        <i class="fa fa-user text-primary"></i>
                        <span style="color:white">{{ $quote->author }}</span>
                      </a>
                    </div>
                    <i class="material-icons btn-rotate pull-right" style="cursor: pointer;color:white">info</i>
                    
                        </div>
                      </div>
                    </div>


                    <div class="back back-background" style="background-image: url(&quot;{{ asset('images/'.$quote->image) }}&quot;); width: 350px;">
                      <div class="card-body">
                       
                        <div class=" stats text-center">


                        <div class="row">

                        <button class="btn btn-fab btn-round col" style="background:#3b5998">
                        <i class="fa fa-facebook"></i>
                        <div class="ripple-container"></div></button>

                        <button class="btn btn-primary btn-fab btn-round col " style="background:#E1306C" >
                        <i class="fa fa-instagram"></i>
                        <div class="ripple-container"></div></button>

                        <button class="btn btn-primary btn-fab btn-round col" style="background:#25d366">
                        <i class="fa fa-whatsapp"></i>
                        <div class="ripple-container"></div></button>

                        <a href="/gaze/{{ $quote->link }}"><button  class="btn btn-fab btn-round col" data-toggle="tooltip" data-placement="top" data-original-title="Copy Link">
                        <i class="fa fa-link"></i>
                        <div class="ripple-container"></div></button></a>

                        </div>

                        <br>

                        <div class="row">

                          <button class="btn btn-primary btn-fab btn-round col" data-toggle="tooltip" data-placement="top" data-original-title="Copy Quote">
                            <i class="material-icons">content_copy</i>
                          <div class="ripple-container"></div></button>

                          <button class="btn btn-primary btn-fab btn-round col" data-toggle="tooltip" data-placement="top" data-original-title="Download Image">
                            <i class="material-icons">image</i>
                          <div class="ripple-container"></div></button>

                          <button class="btn btn-primary btn-fab btn-round btn-rotate col" data-toggle="tooltip" data-placement="top" data-original-title="Rotate">
                            <i class="material-icons">refresh</i>
                          <div class="ripple-container"></div></button>

                          </div>

            
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      

@empty


            <div class="info container-fluid grid-item ">
                <div class="icon icon-warning">
                  <i class="material-icons">warning</i>
                </div>
                <h4 class="info-title">
                    Ooops!
                </h4>
                <p>No Quotes Found</p>
              </div>
 
@endforelse



</div>



    </div>
</div>


@push('js')

<!-- Pushing Masonry -->
<script src="{{ asset('material') }}/js/plugins/masonry.js"></script>
<script src="{{ asset('material') }}/js/plugins/clipboard.js"></script>
<script src="{{ asset('material') }}/js/plugins/html2canvas.js"></script>

<script type="text/javascript">

$(document).ready(function() { 
          
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

$(document).ready(function() { 
          
          // Global variable 
          var element = $("#html-content-holder");  
        
          // Global variable 
          var getCanvas;  



          $("#btn-Convert-Html2Image").on('click', function() { 
              var imgageData =  
                  getCanvas.toDataURL("image/png"); 
            
              // Now browser starts downloading  
              // it instead of just showing it 
              var newData = imgageData.replace( 
              /^data:image\/png/, "data:application/octet-stream"); 
            
              $("#btn-Convert-Html2Image").attr( 
              "download", "GeeksForGeeks.png").attr( 
              "href", newData); 
          }); 
      }); 


      }); 
</script>
@endpush

@endsection
@extends('layouts.app', ['activePage' => 'create-quote', 'breadCrumb' => 'Quote -> Create' ,'titlePage' => __('Quote - Create')])

@section('content')
  <div class="content">
    <div class="container-fluid" style="height: auto;">
        <div class="row align-items-center">

  

              <div class="card card-blog">
                <div class="card-header card-header-image">
                    
                        <img class="img" src="https://images.unsplash.com/photo-1511439817358-bee8e21790b5?auto=format&fit=crop&w=750&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" rel="nofollow">
                        <div class="card-title text-center">
                            <i class="fa fa-quote-left text-rose pull-left"></i>
                            <h3 class="text-center display-3">This Summer Will be Awesome</h3>
                            <i class="fa fa-quote-right text-rose pull-right"></i>
                        </div>
                    
                </div>
                <div class="card-body">



                    <button class="btn pull-right btn-success btn-fab btn-round">
                        <i class="material-icons">share</i>
                      </button>
                    <button class="btn pull-right btn-rose btn-round">
                        <i class="material-icons">favorite</i> likes
                      </button>

                      
                   
                </div>
            </div>

            @foreach ($quotes as $quote)

            <div class="col-md-12">
                <div class="card card-background" style="background-image: url('assets/img/examples/office1.jpg')">
                    <div class="card-content">
                        <h5 class="category-social text-left ">
                            <i class="fa fa-quote-left text-rose "></i><b class="text-rose">Love</b>
                        </h5>
                        
                            <h3 class="card-title text-rose">
                                {{ $quote->quote }}
                            </h3>
                        
                        <div class="footer">
                            <div class="author">
                                <a href="#pablo">
                                    
                                   <img src="../assets/img/user.png" alt="..." class="avatar img-raised">
                                   <span>Tania Andrew</span>
                                </a>
                            </div>
                           <div class="stats">
                                <i class="material-icons">favorite</i> 2.4K ·
                                <i class="material-icons">share</i> 45
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                
            @endforeach




        </div>
      </div>
  </div>
@endsection
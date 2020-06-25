@extends('layouts.app', ['activePage' => 'create-quote', 'breadCrumb' => 'Quote -> Create' ,'titlePage' => __('Quote - Create')])

@section('content')
  <div class="content">
    <div class="container-fluid" style="height: auto;">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <form class="form" method="POST" action="{{ route('create-new-quote') }}" enctype="multipart/form-data">
              @csrf
      
              <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title"><strong>{{ __('Create') }}</strong></h4>
      
                </div>
                <div class="card-body ">
                  
                  <div class="bmd-form-group{{ $errors->has('catagory') ? ' has-danger' : '' }}">
                   
                   
                    <div class="input-group">
                      
                      <select name="catagory" id="catagory" class="form-control  selectpicker">

                        <option selected disabled>--Select Catagory--</option>
                        @forelse ($catagories as $catagory)
                        <option value="{{ $catagory->id }}">{{ $catagory->catagory }}</option>
                        @empty
                        <option disabled value=""> Please Add New Catagory</option>
                        @endforelse

                      </select>

                      
                    
                    @if ($errors->has('catagory'))
                      <div id="name-error" class="error text-danger pl-3" for="catagory" style="display: block;">
                        <strong>{{ $errors->first('catagory') }}</strong>
                      </div>
                    @endif
                  </div>





                  <div class="row bmd-form-group input-group mt-3">

                    <div class="col-md-9">
                      <div class="bmd-form-group{{ $errors->has('quote') ? ' has-danger' : '' }} mt-3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">format_quote</i>
                            </span>
                          </div>
                          <textarea name="quote" id="" style="font-size: xx-large" rows="7" class="form-control" placeholder="Write Quote Here...."></textarea>
                          
                        </div>
                        @if ($errors->has('quote'))
                          <div id="email-error" class="error text-danger pl-3" for="quote" style="display: block;">
                            <strong>{{ $errors->first('quote') }}</strong>
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="col-md-3">

                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-raised">
                            <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" rel="nofollow" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                        <div>
                            <span class="btn btn-raised btn-round btn-default btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image" />
                            </span>
                            <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>

                        @if ($errors->has('image'))
                        <div id="email-error" class="error text-danger pl-3" for="image" style="display: block;">
                          <strong>{{ $errors->first('image') }}</strong>
                        </div>
                      @endif
                    </div>

                    </div>

                  </div>


      
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-primary btn-block btn-rose btn-lg">{{ __('Submit') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection
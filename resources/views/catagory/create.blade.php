@extends('layouts.app', ['activePage' => "", 'breadCrumb' => 'Catagory -> Create' ,'titlePage' => __('Catagory - Create')])

@section('content')
  <div class="content">
    <div class="container-fluid" style="height: auto;">

        <div class="row align-items-center">
          <div class="col-lg-12">

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

            <form class="form" method="POST" action="{{ route('create-new-catagory') }}">
              @csrf
      
              <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title"><strong>{{ __('Create Catagory') }}</strong></h4>
      
                </div>
                <div class="card-body ">
                  
                  <div class="bmd-form-group{{ $errors->has('label') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">label</i>
                            
                        </span>
                      </div>
                      <input type="text" name="label" class="form-control" placeholder="{{ __('Catagory ...') }}" value="{{ old('label') }}" required>
                    </div>
                    @if ($errors->has('label'))
                      <div id="name-error" class="error text-danger pl-3" for="label" style="display: block;">
                        <strong>{{ $errors->first('label') }}</strong>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-primary btn-block btn-rose btn-lg">{{ __('Submit') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!--catagory tags cloud -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="bootstrap-tagsinput info-badge">

                @foreach($catagories as $catagory)
                <span class="tag"> {{$catagory->catagory}} <span data-role="remove" onclick="location.href = '/removeCatagory/{{$catagory->id}}';"></span></span>
                @endforeach

                  
                  
                    </div>

            </div>
          </div>
        </div>

      </div>
  </div>

  @push('js')
      
    <script type='text/javascript'>
    
    function deleteCat(id)
    {
      alert(id);
    }
    
    </script>

  @endpush
@endsection
@extends('gazeMaster', ['class' => 'off-canvas-sidebar', 'activePage' => 'gaze', 'title' => __('Material Dashboard')])

@section('bg-style')
<style>
    #yield-bg{
       background-image: url("{{ asset('images/'.$quote->image) }}"); 
    }
</style>
@endsection

@section('meta')

<meta property="og:title" content="{{ $quote->catagory }} Quote" />
<meta property="og:description" content="{{ $quote->quote }}" />
<meta property="og:url" content="{{ $quote->link }}" />
<meta property="og:image" content="{{ asset('images/'.$quote->image) }}" />

@endsection

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">

    <div class="col-lg-12 col-md-12 col-sm-12 ml-auto mr-auto">
   
   <h1 >{{ $quote->quote}} </h1>

    </div>
  </div>
</div>
@endsection

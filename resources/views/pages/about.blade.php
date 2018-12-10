@extends("app")

@section('head_title', getcong('about_us_title').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
 <!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>{{getcong('about_us_title')}}</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li>{{getcong('about_us_title')}}</li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->
<!-- begin:content -->
    <section class="main-container container" id="video-tour-section">
    <h2 class="hsq-heading type-1">{{getcong('about_us_title')}}</h2>
    <div class="content clearfix"> 
      <div class="desc">
        {!! getcong('about_us_description') !!}
      </div>
    </div>
  </section>
    <!-- end:content -->
 
@endsection

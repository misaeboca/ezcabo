@extends("app")

@section('head_title', 'Agents | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>Agents</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="#">Agents</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->

  <section class="main-container container agent-box-container">
    <div class="title-box clearfix">
      <h2 class="hsq-heading type-1">Our Agents</h2>
      <div class="subtitle">&nbsp;</div>
    </div>
    @foreach($agents as $i => $agent) 
    <div class="agent-box col-xs-6 col-sm-4">
      <div class="inner-container">
        <a href="{{URL::to('user/details/'.Crypt::encryptString($agent->id))}}" class="img-container">           
          @if($agent->image_icon)
                          
            <img src="{{ URL::asset('upload/members/'.$agent->image_icon.'-b.jpg') }}" alt="{{ $agent->name }}">
          
          @else
          
          <img src="{{ URL::asset('site_assets/img/agent_default.jpg') }}" alt="{{ $agent->name }}">
          
          @endif
        </a>
        <div class="bott-sec">
          <div class="name">{{$agent->name}}</div>
          <div class="desc">
            {{$agent->about}}
          </div>
          <a href="{{URL::to('user/details/'.Crypt::encryptString($agent->id))}}" class="view-listing">View Listing</a>
          <div class="social-icons">
            <a href="{{$agent->facebook}}" class="fa fa-facebook" target="_blank"></a>
            <a href="{{$agent->twitter}}" class="fa fa-twitter" target="_blank"></a>
            <a href="{{$agent->gplus}}" class="fa fa-google-plus" target="_blank"></a>
            <a href="{{$agent->linkedin}}" class="fa fa-linkedin" target="_blank"></a>

          </div>
        </div>
      </div>
    </div>
    @endforeach 
    

  </section>
  <!-- Pagination -->
  @include('_particles.pagination', ['paginator' => $agents]) 
  <!-- End of Pagination -->

  @endsection
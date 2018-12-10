@extends("app")

@section('head_title', 'Properties For Rent | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
 
    <!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>Properties For Rent</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="#">Properties For Rent</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->

  <!-- Recent Properties -->
  <section class="property-listing boxed-view clearfix">
     <div class="inner-container container">
      @foreach($properties as $i => $property)
      <div class="property-box col-xs-12 col-sm-6 col-md-4">
        <div class="inner-box">
          <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}" class="img-container">
            @if($property->featured_property==1)<span class="tag-label hot-offer">Featured</span>@endif
            <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" alt="Image of Property">
            <span class="price">{{getcong('currency_sign').' '.$property->price}}</span>
          </a>
          <div class="bottom-sec">
            <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}" class="title">{{ str_limit($property->property_name,35) }}</a>
            <div class="location">{{ str_limit($property->address,40) }}</div>
            <div class="desc">
              {!! str_limit($property->description,100) !!}
            </div>
            <div class="extra-info clearfix">
              <div class="area col-xs-4">
                <div class="value">{{$property->land_area}}</div>
                m2
              </div>
              <div class="bedroom col-xs-4">
                <div class="value">{{$property->bedrooms}}</div>
                bed
              </div>
              <div class="bathroom col-xs-4">
                <div class="value">{{$property->bathrooms}}</div>
                bath
              </div>
            </div>
          </div>
          <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}" class="btn more-link">More</a>
        </div>
      </div>
      @endforeach
    
    </div>
    <!-- begin:pagination -->
            @include('_particles.pagination', ['paginator' => $properties])             
    <!-- end:pagination -->
    
  </section>
  <!-- End of Recent Properties -->

 
 
@endsection

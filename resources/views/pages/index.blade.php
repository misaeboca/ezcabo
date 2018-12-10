@extends("app")
@section("content")

@if(getcong('home_properties_layout')=='slider')

@include("_particles.slidersearch")

@else

@include("_particles.mapsearch")

@endif
 
  
<!-- Recent Properties -->
  <section class="property-listing boxed-view clearfix">
    <h2 class="hsq-heading type-1">Recent Properties</h2>
    <div class="inner-container container">
      @foreach($propertieslist as $i => $property)
      <div class="property-box col-xs-12 col-sm-6 col-md-4">
        <div class="inner-box">
          <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}" class="img-container">
            @if($property->featured_property==1)<span class="tag-label featured">Featured</span>@endif
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
    
  </section>
  <!-- End of Recent Properties -->

  @if(count($featured_properties)>0)
  <!-- Featured Properties -->
  <section class="property-listing boxed-view clearfix">
    <h2 class="hsq-heading type-1">Featured Properties</h2>
    <div class="inner-container container">
      @foreach($featured_properties as $i => $property)
      <div class="property-box col-xs-12 col-sm-6 col-md-4">
        <div class="inner-box">
          <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}" class="img-container">             
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
    
  </section>
  <!-- End of Featured Properties -->
 @endif

  <!--Our Partners-->
      @include("_particles.partners")
    
  <!--End of Our Partners-->

@endsection

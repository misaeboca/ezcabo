@extends("app")

@section('head_title', 'My Properties | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>Properties</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="#">Properties</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->
 <div class="container">
  <div class="min_profile">
  <div class="row">
    @include("_particles.sidebar_user")

    <div class="col-lg-9 col-md-9 min_form">
      @if(Session::has('flash_message'))
                  <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                      {{ Session::get('flash_message') }}
                  </div>
      @endif
      <div class="table-responsive properties_min">
        <table class="my-properties-list">
          <tbody>
            <tr>
              <th>Image</th>
              <th>Property</th>
              <th>Status</th>
              @if(Auth::User()->usertype!='Agents')<th>Featured</th>@endif
              <th>Actions</th>
            </tr>
          @foreach($propertieslist as $i => $property)
          <tr>
              <td class="property-img"><a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}"><img src="{{ url('upload/properties/'.$property->featured_image.'-s.jpg') }}" alt=""></a></td>
              <td class="property-title">
                <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}">{{ $property->property_name }}</a><br>
                <p class="property-address"><i class="fa fa-map-marker icon"></i>{{ $property->address }}</p>
                <p><strong>${{ $property->price }}</strong></p>
              </td>
              <td class="property-post-status">
                  @if($property->status==1)
                    <span class="button small alt">Published</span>
                  @else
                    <span class="button small grey">Pending</span>
                    <span class="icon-circle bg-orange">
                      <i class="md md-close"></i>
                    </span>
                  @endif
                  

              </td>
              @if(Auth::User()->usertype!='Agents')
              <td class="property-date">
                @if($property->featured_property!=1)
                 @if(env('STRIPE_KEY')!='' AND getcong('featured_property_price')!='')
                 <form action="stripe/charge" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="featured_property_id" value="{{$property->id}}">
                  <script
                          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                          data-key="{{env('STRIPE_KEY')}}"
                          data-amount="{{getcong('featured_property_price')*100}}"
                          data-name="Stripe Payment"
                          data-description="Pay for Featured"
                          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                          data-locale="auto"
                          data-currency="{{getcong('stripe_currency')}}"
                          data-label="Pay for Featured">
                  </script>
                </form>
                @endif
                @else
                <span class="button small alt">Yes</span>
                @endif                                
              </td>
              @endif
              <td class="property-actions">                 
                <a href="{{ url('properties/'.$property->property_slug.'/'.Crypt::encryptString($property->id)) }}" target="_blank"><i class="fa fa-eye icon"></i>View</a>
                <a href="{{ url('update-property/'.Crypt::encryptString($property->id)) }}"><i class="fa fa-pencil icon"></i>Edit</a>
                <a href="{{ url('delete/'.Crypt::encryptString($property->id)) }}" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-close icon"></i>Delete</a>
              </td>
          </tr>
          @endforeach
           
        </tbody></table>
        @include('_particles.pagination', ['paginator' => $propertieslist])
      </div>
        
        
    
    </div><!-- end col -->
  </div>
  </div>
  
  </div>


  @endsection
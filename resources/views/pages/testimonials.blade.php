@extends("app")

@section('head_title', 'Testimonials | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
 
  <!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>Testimonials</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="#">Testimonials</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section--> 

 <section class="main-container container">
    <div class="testimonials-main-container">
      <h2 class="hsq-heading type-1">Our Clients Say</h2>
      <div class="subtitle">Check our great words from our great clients</div>
      <div class="testimonials-container clearfix">
        
        @foreach($alltestimonials as $i => $testimonials)
        <div class="col-md-6 testimonials-box">
          <div class="inner-container" style="min-height: 390px;">
            <div class="client-img">
              @if($testimonials->t_user_image)
                <img src="{{ URL::asset('upload/testimonial/'.$testimonials->t_user_image.'.jpg')}}" alt="Client Image">
              @else
                <img src="{{ URL::asset('upload/testimonial/default.jpg')}}" alt="Client Image">
              @endif
              
            </div>
            <div class="title-box">
              <div class="name">{{$testimonials->name}}</div>
              <div class="title">{{$testimonials->designation}}</div>
            </div>
            <blockquote>
              {!! stripslashes($testimonials->testimonial) !!}
            </blockquote>
          </div>
        </div>
        @endforeach
         
         
      </div>
      <!-- Pagination -->
      <div class="pagination-box">
        @include('_particles.pagination', ['paginator' => $alltestimonials]) 
      </div>
      <!-- End of Pagination -->

    </div>

  </section>
  
 
@endsection

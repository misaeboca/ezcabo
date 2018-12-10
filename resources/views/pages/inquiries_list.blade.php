@extends("app")

@section('head_title', 'Inquiries | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>Inquiries</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="#">Inquiries</a></li>
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
              <th>Property ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Actions</th>
            </tr>
          @foreach($inquiries_list as $i => $inquiries)
          <tr>
              <td class="property-post-status">{{ $inquiries->property_id }}</td>
              <td class="property-post-status">{{ $inquiries->name }}</td>
              <td class="property-title">{{ $inquiries->email }}</td>
              <td class="property-post-status">{{ $inquiries->phone }}</td>
              <td class="property-title"><p class="desc">{{ $inquiries->message }}</p></td>
               
              <td class="property-actions">                
                <a href="{{ url('inquiries/delete/'.Crypt::encryptString($inquiries->id)) }}" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-close icon"></i>Delete</a>
              </td>
          </tr>
          @endforeach
           
        </tbody></table>
        @include('_particles.pagination', ['paginator' => $inquiries_list])
      </div>
        
        
    
    </div><!-- end col -->
  </div>
  </div>
  
  </div>


  @endsection
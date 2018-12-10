@extends('app')

@section('head_title', 'Reset Password | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

 
 @section("content")
   <section class="property-listing boxed-view clearfix">
     <div class="inner-container container">
       
       <div id="login-form" class="login-form">
        <h2 class="hsq-heading type-1">Reset Password</h2>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
</button>
                        {{ Session::get('flash_message') }}
                    </div>
            @endif

           {!! Form::open(array('url' => 'password/reset','class'=>'search-form','id'=>'loginform','role'=>'form')) !!} 
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="search-fields">
                  <input type="email" placeholder="Email" name="email" id="email" required/> 
              </div>
              <div class="search-fields">
                  <input placeholder="Password" type="password" name="password" required/> 
              </div>
              <div class="search-fields">
                  <input placeholder="Confirm Password" type="password" name="password_confirmation" required/> 
              </div>
              
              <div class="search-button-container button-box">
              <button class="btn">Submit</button>
              <br/>&nbsp;

              <div class="search-fields" style="font-size: 15px;">     
                   Remember Password?<a href="{{ url('login') }}">Login Here</a></p>
              </div>

            </div>

          {!! Form::close() !!}  
      </div>
    
    </div>
     
  </section>
  
 
@endsection

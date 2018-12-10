@extends("app")

@section('head_title', 'Update Property | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

<style type="text/css">
 @media (max-width: 991px) {
    .mobile-only {
        display:block !important;
    }
 
    .desktop-only {
        display:none !important;
    }
} 

</style>
 
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>Update Property</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="{{ URL::to('dashboard/') }}">Dashboard</a></li>
          <li>Update Property</li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->
<!-- begin:content -->
    <section class="main-container container">
    <div class="descriptive-section">
      <h2 class="hsq-heading type-1">Update Property</h2>
 
         @if(Session::has('flash_message'))
                  <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                      {{ Session::get('flash_message') }}
                  </div>
        @endif
 
    </div>
    <div class="submit-main-box clearfix">
         {!! Form::open(array('url' => 'submit-property','class'=>'','id'=>'submit-property-main-form','role'=>'form','enctype' => 'multipart/form-data')) !!}

         <input type="hidden" name="id" value="{{ Crypt::encryptString($property->id) }}">

        <div class="row t-sec">
          <div class="col-md-6 l-sec">
            <div class="information-box">
              <h3>Basic Details </h3>

              <div class="box-content">
                <div class="field-row">
                  <input type="text" placeholder="Property Name" name="property_name" id="p-title" value="{{stripslashes($property->property_name)}}">
                  @if ($errors->has('property_name'))
                    <span style="color:#fb0303">
                        {{ $errors->first('property_name') }}
                    </span>
                 @endif
                 </div>
                <div class="field-row clearfix">
                  <div class="col-xs-6">
                    <select id="p-status" name="property_purpose">
                      <option value="">Property Purpose</option>
                      <option value="Sale" @if($property->property_purpose=='Sale') selected @endif>For Sale</option>
                      <option value="Rent" @if($property->property_purpose=='Rent') selected @endif>For Rent</option>
                    </select>
                    @if ($errors->has('property_purpose'))
                    <span style="color:#fb0303">
                        {{ $errors->first('property_purpose') }}
                    </span>
                 @endif
                  </div>
                  <div class="col-xs-6">
                    <select id="p-type" name="property_type">
                      <option value="">Property Type</option>
                      @foreach($types as $type)  
                        <option value="{{$type->id}}" @if($property->property_type==$type->id) selected @endif>{{$type->types}}</option>
                    
                    @endforeach
                    </select>
                    @if ($errors->has('property_type'))
                    <span style="color:#fb0303">
                        {{ $errors->first('property_type') }}
                    </span>
                 @endif
                  </div>
                </div>
                <div class="field-row clearfix">
                  <div class="col-xs-6">
                    <div class="input-group l-icon">
                      <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                      <input type="text" name="price" class="form-control number-field" id="p-price"
                           placeholder="Price" value="{{ $property->price }}">  
                    </div>
                    @if ($errors->has('price'))
                    <span style="color:#fb0303">
                        {{ $errors->first('price') }}
                    </span>
                 @endif
                  </div>
                  <div class="col-xs-6">
                    <select id="p-bedroom" name="bedrooms">
                      <option value="">Bedroom</option>
                      <option value="1" @if($property->bedrooms=='1') selected @endif>1</option>
                      <option value="2" @if($property->bedrooms=='2') selected @endif>2</option>
                      <option value="3" @if($property->bedrooms=='3') selected @endif>3</option>
                      <option value="4" @if($property->bedrooms=='4') selected @endif>4</option>
                      <option value="5" @if($property->bedrooms=='5') selected @endif>5</option>
                      <option value="+5" @if($property->bedrooms=='+5') selected @endif>+5</option>
                    </select>
                  </div>
                </div>
                <div class="field-row clearfix">
                  <div class="col-xs-6">
                    <select id="bathroom" name="bathrooms">
                      <option value="">Bathroom</option>
                      <option value="1" @if($property->bathrooms=='1') selected @endif>1</option>
                      <option value="2" @if($property->bathrooms=='2') selected @endif>2</option>
                      <option value="3" @if($property->bathrooms=='3') selected @endif>3</option>
                      <option value="4" @if($property->bathrooms=='4') selected @endif>4</option>
                      <option value="5" @if($property->bathrooms=='5') selected @endif>5</option>
                      <option value="+5" @if($property->bathrooms=='+5') selected @endif>+5</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <select id="garage" name="garage">
                      <option value="">Garages</option>
                      <option value="1" @if($property->garage=='1') selected @endif>1</option>
                      <option value="2" @if($property->garage=='2') selected @endif>2</option>
                      <option value="3" @if($property->garage=='3') selected @endif>3</option>
                      <option value="4" @if($property->garage=='4') selected @endif>4</option>
                      <option value="5" @if($property->garage=='5') selected @endif>5</option>
                      <option value="+5" @if($property->garage=='+5') selected @endif>+5</option>
                    </select>
                  </div>
                </div>
                <div class="field-row clearfix">
                  <div class="col-xs-6">
                    <div class="input-group r-icon">
                      <input type="text" name="land_area" class="form-control number-field" id="p-land"
                           placeholder="Land Area" value="{{ $property->land_area }}">
                      <span class="input-group-addon">m2</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="input-group r-icon">
                      <input type="text" name="build_area" class="form-control number-field" id="p-build"
                           placeholder="Build Aria" value="{{ $property->build_area }}">
                      <span class="input-group-addon">m2</span>
                    </div>
                  </div>
                </div>
                <div class="field-row">
                  <textarea name="description" id="p-desc" placeholder="Description">{{ stripslashes($property->description) }}</textarea>
                  @if ($errors->has('description'))
                    <span style="color:#fb0303">
                        {{ $errors->first('description') }}
                    </span>
                 @endif
                </div>
              </div>
            </div>

            <div class="information-box">
              <h3>Amenities</h3>`
                
                <div class="box-content">
                  <div class="field-row">
                     <input type="text" name="property_features" value="{{$property->property_features}}" data-role="tagsinput">
                  </div>
                </div>  
            </div>
            <div class="information-box">
              <h3>Featured Image</h3>
                <div class="box-content">
                   
                    <input type="file" name="featured_image" id="featured_image" style="color: green;padding: 5px;border: 1px dashed #123456;background-color: #f9ffe5;"/><br/>
                   @if ($errors->has('featured_image'))
                    <span style="color:#fb0303">
                        {{ $errors->first('featured_image') }}
                    </span>
                    @endif

                    <div class="media-left">
                         @if(isset($property->featured_image))
                                 
                          <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" width="150" alt="Featured Image">
                
                         @endif                                                
                    </div>
                </div>    
            </div>
            <div class="information-box">
              <h3>Floor Plan</h3>
                <div class="box-content">
                   
                    <input type="file" name="floor_plan" id="floor_plan" style="color: green;padding: 5px;border: 1px dashed #123456;background-color: #f9ffe5;" />

                    <div class="media-left">
                         @if(isset($property->floor_plan))
                                 
                          <img src="{{ URL::asset('upload/floorplan/'.$property->floor_plan.'-s.jpg') }}" width="150" alt="Floor Plan Image">
                
                         @endif                                                
                    </div>
                   
                </div>    
            </div>
          </div>
          <div class="col-md-6 r-sec">
          <div class="information-box">
            <h3>Location</h3>

            <div class="box-content">
              <div class="field-row">
                <input type="text" placeholder="Address" name="address" id="p-address" value="{{$property->address}}" onkeydown="if (event.keyCode == 13) return false;">
                @if ($errors->has('address'))
                    <span style="color:#fb0303">
                        {{ $errors->first('address') }}
                    </span>
                 @endif
              </div>
              <div class="field-row">
                <div id="p-map"></div>
              </div>
              <div class="field-row clearfix">
                <div class="col-xs-6">
                  <input type="text" name="map_longitude" placeholder="Longitude" id="p-long" value="{{ $property->map_longitude }}" readonly>
                </div>
                <div class="col-xs-6">
                  <input type="text" name="map_latitude" placeholder="Latitude" id="p-lat" value="{{ $property->map_latitude }}" readonly>
                </div>
              </div>

            </div>
          </div>           
          <div class="information-box">
            <h3>Video Presentation </h3>

            <div class="box-content">
              <div class="field-row">
                <textarea id="p-video" name="video_code" placeholder="Paste the embed code here">{{ stripslashes($property->video_code) }}</textarea>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="row b-sec desktop-only">

          <link rel="stylesheet" href="{{ URL::asset('site_assets/css/gallery_style.css') }}">
          <div class="information-box">
            <h3>Gallery</h3>

                <div class="media">
                            <div class="med_list media-left">
                                @if(isset($property->id))
                                    @foreach($property_gallery_images as $i => $gallery_img)

                                        <div id="abcd_1" class="abcd">
                                         <img src="{{ URL::asset('upload/gallery/'.$gallery_img->image_name) }}" width="100" alt="image">
                                         <a href="{{ url('gallery_image_delete/'.Crypt::encryptString($gallery_img->id)) }}"><img id="img" src="{{ URL::asset('site_assets/img/x.png') }}" alt="delete"></a>
                                        </div>
                                    @endforeach
                                @endif   

                                                             
                            </div>
                             
                        </div>

                <div id="formdiv"> 
                     
                     <div id="filediv"></div>
                     
                     <div style="margin-top:5px;">
                        <input name="gallery_file[]" type="file" id="file"/>
                        <input type="button" id="add_more" class="upload" value="Add More Images"/>
                    </div>
        
                </div>
          </div>
        </div>
      <div class="row b-sec" align="center">
          <button type="submit" class="btn btn-lg submit">Save Changes</button>
        </div>
        
      {!! Form::close() !!}
    </div>
  </section>
    <!-- end:content -->
 
@endsection

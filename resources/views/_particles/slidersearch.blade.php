<!-- Main Slider -->
  <section id="main-slider">
    
    @foreach(\App\Slider::orderBy('slider_title')->get() as $slide)
    <div class="items">
      <div class="img-container" data-bg-img="{{ URL::asset('upload/slides/'.$slide->image_name.'.jpg') }}"></div>
      <!-- Change the URL section based on your image\'s name -->
      <div class="slide-caption">
        <div class="inner-container clearfix">
          <div class="first-sec">{{ $slide->slider_text1 }}</div>
          <div class="sec-sec">{{ $slide->slider_text2 }}</div> 
        </div>
      </div>
    </div>
    @endforeach
   
  </section>
  <!-- End of Main Slider -->
  <!-- Property Search Box -->
    <section id="property-search-container" class="container" style="margin-bottom: 0px;">
        <div class="property-search-form horizontal">
            {!! Form::open(array('url' => array('searchproperties'),'class'=>'','name'=>'search_form','id'=>'search_form','role'=>'form')) !!}
            <div class="main-search-sec">
                <div class="col-xs-6 col-sm-3 search-field">
                    <input type="text" placeholder="Title, Address..." name="keyword" id="keyword" style="margin-bottom: 0px;border:1px solid #d4d4d4;border-bottom-color: #50AEE6;">
                </div>
                <div class="col-xs-6 col-sm-3 search-field">
                    <select id="proeprty-status" name="purpose">
                       <option value="">Property Purpose</option>
                       <option value="Sale">For Sale</option>
                       <option value="Rent">For Rent</option>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-3 search-field">
                    <select id="proeprty-type" name="type">
                      <option value="">Property Type</option>
                      @foreach(\App\Types::orderBy('types')->get() as $type)
                            <option value="{{$type->id}}">{{$type->types}}</option>
                      @endforeach
                    </select>
                </div>
                 
              
                <div class="col-xs-6 col-sm-3 search-field">
                    <button class="btn" type="submit" name="submit">Search</button>
                </div>
            </div>
            {!! Form::close() !!} 
             
        </div>
    </section>
    <!-- End of Property Search Box -->
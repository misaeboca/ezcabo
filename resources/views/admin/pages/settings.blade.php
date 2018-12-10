@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> Settings</h2>
		<a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
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
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
				@endif
    <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#account" aria-controls="account" role="tab" data-toggle="tab">General Settings</a>
        </li>
        <li role="presentation">
            <a href="#layout_settings" aria-controls="layout_settings" role="tab" data-toggle="tab">Layout</a>
        </li>
        <li role="presentation">
            <a href="#payment_info" aria-controls="payment_info" role="tab" data-toggle="tab">Payment Info</a>
        </li>
        <li role="presentation">
            <a href="#social_links" aria-controls="social_links" role="tab" data-toggle="tab">Social</a>
        </li>
        <li role="presentation">
            <a href="#share_comments" aria-controls="share_comments" role="tab" data-toggle="tab">AddThis & Disqus</a>
        </li>
        <li role="presentation">
            <a href="#about_us" aria-controls="about_us" role="tab" data-toggle="tab">About Us</a>
        </li>
        <li role="presentation">
            <a href="#contact_us" aria-controls="contact_us" role="tab" data-toggle="tab">Contact Us</a>
        </li>         
        
        <li role="presentation">
            <a href="#other_Settings" aria-controls="other_Settings" role="tab" data-toggle="tab">Other Settings</a>
        </li>        
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="account">             
            {!! Form::open(array('url' => 'admin/settings','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                 
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Logo</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_logo)
                                 
									<img src="{{ URL::asset('upload/'.$settings->site_logo) }}" width="150" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_logo" class="filestyle">
                                <small class="text-muted bold">Size 200x75px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Favicon</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_favicon)
                                 
									<img src="{{ URL::asset('upload/'.$settings->site_favicon) }}" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_favicon" class="filestyle">
                                <small class="text-muted bold">Size 16x16px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="site_email" value="{{ $settings->site_email }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Currency Sign</label>
                    <div class="col-sm-9">
                        <input type="text" name="currency_sign" value="{{ $settings->currency_sign }}" class="form-control" value="" placeholder="$">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Google Map Key</label>
                    <div class="col-sm-9">
                        <input type="text" name="google_map_key" value="{{ $settings->google_map_key }}" class="form-control" value="" placeholder="xxxx">
                    </div>
                </div>                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">reCaptcha</label>
                    <div class="col-sm-4"> 
                        <select name="recaptcha" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                 
                                <option value="1" @if($settings->recaptcha== 1) selected @endif> On</option>
                                <option value="0" @if($settings->recaptcha== 0) selected @endif> Off</option>
  
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_description" class="form-control" rows="5" placeholder="A few words about site">{{ $settings->site_description }}</textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Keywords</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_keywords" class="form-control" rows="5" placeholder="A few words about site">{{ $settings->site_keywords }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer widget 1 Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget1_title" value="{{ stripslashes($settings->footer_widget1_title) }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer widget 1</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="footer_widget1" class="form-control" rows="5" placeholder="">{{ stripslashes($settings->footer_widget1) }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer widget 2 Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget2_title" value="{{ stripslashes($settings->footer_widget2_title) }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer widget 2</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="footer_widget2" class="form-control" rows="5" placeholder="">{{ stripslashes($settings->footer_widget2) }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer widget 3 Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget3_title" value="{{ stripslashes($settings->footer_widget3_title) }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer widget 3</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="footer_widget3" class="form-control" rows="5" placeholder="">{{ stripslashes($settings->footer_widget3) }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Copyright Text</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_copyright" class="form-control" rows="5">{{ $settings->site_copyright }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Save Changes</button>
                         
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>

        <div role="tabpanel" class="tab-pane" id="layout_settings">
            
            {!! Form::open(array('url' => 'admin/layout_settings','class'=>'form-horizontal padding-15','name'=>'social_links_form','id'=>'social_links_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                 
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Title BG Image</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->title_bg)                                 
                                    <img src="{{ URL::asset('upload/'.$settings->title_bg) }}" width="150" alt="person">
                                @endif
                                                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="title_bg" class="filestyle">                                 
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Default Map Latitude</label>
                    
                    <div class="col-sm-3">
                        <input type="text" name="map_latitude" value="{{ $settings->map_latitude }}" class="form-control" value="">
                    </div>
                    <label for="" class="col-sm-3 control-label">Default Map Longitude</label>
                    
                    <div class="col-sm-3">
                        <input type="text" name="map_longitude" value="{{ $settings->map_longitude }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Home Page</label>                    
                    <div class="col-sm-6">
                        <select name="home_properties_layout" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                 <option value="slider" @if($settings->home_properties_layout=='slider') selected @endif>Slider</option>
                                <option value="map" @if($settings->home_properties_layout=='map') selected @endif>Map</option>
                                 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Properties Page</label>                    
                    <div class="col-sm-6">
                        <select name="all_properties_layout" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                 <option value="grid" @if($settings->all_properties_layout=='grid') selected @endif>Property Listing - Grid</option>
                                <option value="grid_side" @if($settings->all_properties_layout=='grid_side') selected @endif>Property Listing - Grid with Sidebar</option>
                                <option value="rows" @if($settings->all_properties_layout=='rows') selected @endif>Property Listing - Rows with Sidebar</option>                                
  
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Featured Properties Page</label>                    
                    <div class="col-sm-6">
                        <select name="featured_properties_layout" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                 <option value="grid" @if($settings->featured_properties_layout=='grid') selected @endif>Property Listing - Grid</option>
                                <option value="grid_side" @if($settings->featured_properties_layout=='grid_side') selected @endif>Property Listing - Grid with Sidebar</option>
                                <option value="rows" @if($settings->featured_properties_layout=='rows') selected @endif>Property Listing - Rows with Sidebar</option>                                
  
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Sale Properties Page</label>                    
                    <div class="col-sm-6">
                        <select name="sale_properties_layout" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                 <option value="grid" @if($settings->sale_properties_layout=='grid') selected @endif>Property Listing - Grid</option>
                                <option value="grid_side" @if($settings->sale_properties_layout=='grid_side') selected @endif>Property Listing - Grid with Sidebar</option>
                                <option value="rows" @if($settings->sale_properties_layout=='rows') selected @endif>Property Listing - Rows with Sidebar</option>                                
  
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Rent Properties Page</label>                    
                    <div class="col-sm-6">
                        <select name="rent_properties_layout" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                 <option value="grid" @if($settings->rent_properties_layout=='grid') selected @endif>Property Listing - Grid</option>
                                <option value="grid_side" @if($settings->rent_properties_layout=='grid_side') selected @endif>Property Listing - Grid with Sidebar</option>
                                <option value="rows" @if($settings->rent_properties_layout=='rows') selected @endif>Property Listing - Rows with Sidebar</option>                                
  
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Pagination Limit <br/><small class="text-muted bold">(Per Page Properties)</small></label>
                    
                    <div class="col-sm-6">
                        <input type="number" name="pagination_limit" value="{{ $settings->pagination_limit }}" class="form-control" value="">
                    </div>
                     
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes </button>
                         
                    </div>
                </div>
            {!! Form::close() !!} 
        </div>

        <div role="tabpanel" class="tab-pane" id="payment_info">
            
            {!! Form::open(array('url' => 'admin/payment_info','class'=>'form-horizontal padding-15','name'=>'social_links_form','id'=>'social_links_form','role'=>'form')) !!}
                 
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Featured Property Price</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="featured_property_price" value="{{ $settings->featured_property_price }}" class="form-control" value="" placeholder="10">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Stripe Currency</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="stripe_currency" value="{{ $settings->stripe_currency }}" class="form-control" value="" placeholder="USD">
                    </div>
                </div>
                <hr>                  
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Bank Payment Details                         
                    </label>
                    <div class="col-sm-9">
                        <textarea type="text" name="bank_payment_details" class="form-control summernote" rows="5">{{ stripslashes($settings->bank_payment_details) }}</textarea>
                    </div>
                </div>
                <hr>
                 <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes </button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>

        <div role="tabpanel" class="tab-pane" id="social_links">
            
            {!! Form::open(array('url' => 'admin/social_links','class'=>'form-horizontal padding-15','name'=>'social_links_form','id'=>'social_links_form','role'=>'form')) !!}
                 
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Facebook URL</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="social_facebook" value="{{ $settings->social_facebook }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Twitter URL</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="social_twitter" value="{{ $settings->social_twitter }}" class="form-control" value="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Linkedin URL</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="social_linkedin" value="{{ $settings->social_linkedin }}" class="form-control" value="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">GPlus URL</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="social_gplus" value="{{ $settings->social_gplus }}" class="form-control" value="">
                    </div>
                </div>
                 
                <hr>
                 <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes </button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        
        <div role="tabpanel" class="tab-pane" id="share_comments">
            
            {!! Form::open(array('url' => 'admin/addthisdisqus','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">AddThis Code
                     <br><small class="text-muted bold">Get code <a href="https://www.addthis.com" target="_blank">here!</a></small>   
                    </label>
                    <div class="col-sm-9">
                        <textarea type="text" name="addthis_share_code" class="form-control" rows="5">{{ $settings->addthis_share_code }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Disqus Code
                    <br><small class="text-muted bold">Get code <a href="https://disqus.com" target="_blank">here!</a></small>
                   </label>
                    <div class="col-sm-9">
                        <textarea type="text" name="disqus_comment_code" class="form-control" rows="5">{{ $settings->disqus_comment_code }}</textarea>
                    </div>
                </div>
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        
        <div role="tabpanel" class="tab-pane" id="about_us">
            
            {!! Form::open(array('url' => 'admin/about_us','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">About Title</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="about_us_title" value="{{ $settings->about_us_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="about_us_description" class="form-control summernote" rows="5">{{ $settings->about_us_description }}</textarea>
                    </div>
                </div>
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        <div role="tabpanel" class="tab-pane" id="contact_us">
            
            {!! Form::open(array('url' => 'admin/contact_us','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Contact Title</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="contact_us_title" value="{{ $settings->contact_us_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Map Latitude</label>
                    
                    <div class="col-sm-3">
                        <input type="text" name="contact_lat" value="{{ $settings->contact_lat }}" class="form-control" value="">
                    </div>
                    <label for="" class="col-sm-3 control-label">Map Longitude</label>
                    
                    <div class="col-sm-3">
                        <input type="text" name="contact_long" value="{{ $settings->contact_long }}" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Contact Email</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="contact_us_email" value="{{ $settings->contact_us_email }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Contact Phone</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="contact_us_phone" value="{{ $settings->contact_us_phone }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Contact Address</label>
                    
                    <div class="col-sm-9">
                        <input type="text" name="contact_us_address" value="{{ $settings->contact_us_address }}" class="form-control" value="">
                    </div>
                </div> 
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
         
        <div role="tabpanel" class="tab-pane" id="other_Settings">
            
            {!! Form::open(array('url' => 'admin/headfootupdate','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Header Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_header_code" class="form-control" rows="5" placeholder="You may want to add some css/js code to header. ">{{ $settings->site_header_code }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_footer_code" class="form-control" rows="5" placeholder="You may want to add some css/js code to footer. ">{{ $settings->site_footer_code }}</textarea>
                    </div>
                </div>
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes </button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
         
    </div>
</div>
</div>

@endsection
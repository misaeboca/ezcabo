<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Settings;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class SettingsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function settings()
    { 
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $settings = Settings::findOrFail('1');
        
        return view('admin.pages.settings',compact('settings'));
    }	 
    
    public function settingsUpdates(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'site_name' => 'required',
		        'site_email' => 'required',
		        'currency_sign' => 'required',
		        'google_map_key' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('site_logo');
		
		$icon_favicon = $request->file('site_favicon');
		 
		//Logo
		 
        if($icon){
            
            $icon->move(public_path().'/upload/', 'logo.png');
             
            $settings->site_logo = 'logo.png';
             
        }       
        
        //Favicon
        if($icon_favicon){
        	
        	$icon_favicon->move(public_path().'/upload/', 'favicon.png');
             
            $settings->site_favicon = 'favicon.png';
             
        }
       
 		$settings->site_name = $inputs['site_name'];
		$settings->currency_sign = $inputs['currency_sign']; 
		$settings->site_email = $inputs['site_email'];
		$settings->google_map_key = $inputs['google_map_key'];
		$settings->recaptcha = $inputs['recaptcha'];

		$settings->site_description = $inputs['site_description'];
		$settings->site_keywords = $inputs['site_keywords'];
		$settings->site_copyright = $inputs['site_copyright'];
		
		$settings->footer_widget1_title = addslashes($inputs['footer_widget1_title']);
		$settings->footer_widget1 = addslashes($inputs['footer_widget1']);

		$settings->footer_widget2_title = addslashes($inputs['footer_widget2_title']);
		$settings->footer_widget2 = addslashes($inputs['footer_widget2']);

		$settings->footer_widget3_title = addslashes($inputs['footer_widget3_title']);
		$settings->footer_widget3 = addslashes($inputs['footer_widget3']);
		
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function layout_settings_update(Request $request)
    {

    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
	    $title_bg = $request->file('title_bg');

		if($title_bg){
        	
        	$title_bg->move(public_path().'/upload/', 'title_bg.jpg');
             
            $settings->title_bg = 'title_bg.jpg';
             
        } 
		 
		$settings->map_latitude = $inputs['map_latitude'];
		$settings->map_longitude = $inputs['map_longitude'];
		$settings->home_properties_layout = $inputs['home_properties_layout'];
		$settings->all_properties_layout = $inputs['all_properties_layout'];
		$settings->featured_properties_layout = $inputs['featured_properties_layout'];
		$settings->sale_properties_layout = $inputs['sale_properties_layout'];
		$settings->rent_properties_layout = $inputs['rent_properties_layout'];
		$settings->pagination_limit = $inputs['pagination_limit'];			 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function payment_info_update(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1'); 
	    
	    $data =  \Input::except(array('_token')) ;    
	     
	    $inputs = $request->all();
		 
		 
		$settings->stripe_currency = $inputs['stripe_currency'];
		$settings->featured_property_price = $inputs['featured_property_price'];
		$settings->bank_payment_details = addslashes($inputs['bank_payment_details']);		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function social_links_update(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		 
		 
		$settings->social_facebook = $inputs['social_facebook'];
		$settings->social_twitter = $inputs['social_twitter'];
		$settings->social_linkedin = $inputs['social_linkedin'];
		$settings->social_gplus = $inputs['social_gplus'];
		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function addthisdisqus(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		 
		
		$settings->addthis_share_code = $inputs['addthis_share_code']; 
		$settings->disqus_comment_code = $inputs['disqus_comment_code'];
		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function about_us_page(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		 
		 
		$settings->about_us_title = $inputs['about_us_title'];
		$settings->about_us_description = $inputs['about_us_description'];
		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function contact_us_page(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		 
		 
		$settings->contact_us_title = $inputs['contact_us_title'];

		$settings->contact_lat = $inputs['contact_lat'];
		$settings->contact_long = $inputs['contact_long'];

		$settings->contact_us_email = $inputs['contact_us_email'];
		$settings->contact_us_phone = $inputs['contact_us_phone'];
		$settings->contact_us_address = $inputs['contact_us_address'];		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function headfootupdate(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->site_header_code = $inputs['site_header_code']; 
		$settings->site_footer_code = $inputs['site_footer_code'];
		 
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    } 
    	
}

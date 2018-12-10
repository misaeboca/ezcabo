<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Properties;
use App\Enquire;
use App\Partners;
use App\Subscriber;
use App\Testimonials;

use App\Http\Requests;
use Illuminate\Http\Request;


class DashboardController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 
    	 	if(Auth::User()->usertype!="Admin"){

	            \Session::flash('flash_message', 'Access denied!');

	            return redirect('dashboard');
	            
	        }
 
			$properties_count = Properties::count();
			$pending_properties_count = Properties::where('status', '0')->count();
	    	
	    	$featured_properties = Properties::where('featured_property', '1')->count(); 
	    	$inquiries = Enquire::count();
	    	
	    	$users = User::where('usertype', 'User')->count();
	    	
	    	$testimonials = Testimonials::count();
	    	
	    	$subscriber = Subscriber::count();
	    	
	    	$partners = Partners::count();
		 
    	
        return view('admin.pages.dashboard',compact('properties_count','pending_properties_count','featured_properties','inquiries','users','testimonials','subscriber','partners','publish_properties','unpublish_properties'));
    }
	
	 
    	
}

<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Properties;
use App\PropertyGallery;
use App\Enquire;
use App\Types;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class PropertiesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function propertieslist()
    {  
    	if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', 'Access denied!');

                return redirect('dashboard');
                
            }
    	
    	if(isset($_GET['keyword']))
        {
        	$purpose=$_GET['purpose'];
	        $type=$_GET['type'];	 	
		 	$keyword=$_GET['keyword'];
        
    	 	
    	 	$propertieslist = Properties::SearchByKeyword($keyword,$purpose,$type)->paginate(10);
 
            $propertieslist->appends($_GET)->links();  
        }
        else
        {
        	$propertieslist = Properties::orderBy('id','desc')->paginate(10);
		}
    	
    	
		  
        return view('admin.pages.properties',compact('propertieslist'));
    } 
 
	public function delete($id)
    {
    	 
    		
       if(!Auth::user())
         {
            \Session::flash('flash_message', 'Login required');

            return redirect('login');
         }

        $decrypted_id = Crypt::decryptString($id);  
            
        $property = Properties::findOrFail($decrypted_id);
        
        \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
        \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');

        \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-b.jpg');
        \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-s.jpg');
         
        $property->delete();

        $property_gallery_images = PropertyGallery::where('property_id',$decrypted_id)->get();

        foreach ($property_gallery_images as $gallery_images) {

            \File::delete(public_path() .'/upload/gallery/'.$gallery_images->image_name);

            $property_gallery_obj = PropertyGallery::findOrFail($gallery_images->id);
            $property_gallery_obj->delete();
        }
        
        \Session::flash('flash_message', 'Property Deleted');

        return redirect()->back();

    }
	
	
	public function status($id)
    { 	
    	$decrypted_id = Crypt::decryptString($id);

        $property = Properties::findOrFail($decrypted_id);
       
       	if(Auth::User()->id!=$property->user_id and Auth::User()->usertype!="Admin")
       	{

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
       
		if($property->status==1)
		{
			$property->status='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Unpublished');
		}
		else
		{
			$property->status='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Published');
		}
		 
        return redirect()->back();

    }
	
	public function featuredproperty($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $decrypted_id = Crypt::decryptString($id);

        $property = Properties::findOrFail($decrypted_id);
       
		if($property->featured_property==1)
		{
			$property->featured_property='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Property unset from featured');
		}
		else
		{
			$property->featured_property='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Property set as featured');
		}
		 
        return redirect()->back();

    }
      
    	
}

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

class TypesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function typeslist()
    {  
        if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', 'Access denied!');

                return redirect('dashboard');
                
            }
        
    	$alltypes = Types::orderBy('id')->get();
		  
        return view('admin.pages.types',compact('alltypes'));
    } 
	
	 public function addedittypes()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.addedittypes');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'property_type' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $types = Types::findOrFail($inputs['id']);

        }else{

            $types = new Types;

        }
		
		if($inputs['slug']=="")
		{
			$slug  = str_slug($inputs['property_type'], "-");
		}
		else
		{
			$slug =str_slug($inputs['slug'], "-"); 
		}  
		 
		$types->types = $inputs['property_type'];
		$types->slug = $slug;		 
		  
		 
	    $types->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function edittypes($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }		
    		     
          $type = Types::findOrFail($id);
           
          return view('admin.pages.addedittypes',compact('type'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $property_list = Properties::where('property_type',$id)->get();

        foreach ($property_list as $property_data)
        {

            $property_gallery_images = PropertyGallery::where('property_id',$property_data->id)->get();

            foreach ($property_gallery_images as $gallery_images) {

                \File::delete(public_path() .'/upload/gallery/'.$gallery_images->image_name);

                $property_gallery_obj = PropertyGallery::findOrFail($gallery_images->id);
                $property_gallery_obj->delete();
            }

            $property = Properties::findOrFail($property_data->id);
    
            \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
            \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');

             \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-b.jpg');
             \File::delete(public_path() .'/upload/floorplan/'.$property->floor_plan.'-s.jpg');
             
            $property->delete();
        }
        
    		
        $type = Types::findOrFail($id);         
		$type->delete();
		
        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
      
    	
}

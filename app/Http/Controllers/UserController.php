<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Properties;
use App\Testimonials;
use App\Subscriber;
use App\Enquire;
use App\Partners;

use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Crypt;

use Session;

class UserController extends Controller
{
	public function __construct()
    {
         $this->middleware('auth'); 
         
    }
      
	public function dashboard()
    {   
        if(!Auth::user())
         {
            \Session::flash('flash_message', 'Login required!');

            return redirect('login');
         }

        if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/dashboard');
        }

        $user_id=Auth::user()->id; 
             
        $properties_count = Properties::where(['user_id' => $user_id])->count();

        $pending_properties_count = Properties::where(['user_id' => $user_id,'status' => 0])->count();
        
        $inquiries = Enquire::where(['agent_id' => $user_id])->count();

        return view('pages.dashboard',compact('properties_count','pending_properties_count','inquiries'));
    }

    public function inquirieslist()
    {  
        if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/dashboard');
        }

        $user_id=Auth::user()->id;
        
        $inquiries_list = Enquire::where('agent_id',$user_id)->orderBy('id')->paginate(8);
          
        return view('pages.inquiries_list',compact('inquiries_list'));
    } 
     
    
    public function delete($id)
    {   
        $decrypted_id = Crypt::decryptString($id);   

        $inquire = Enquire::findOrFail($decrypted_id);
         
         
        $inquire->delete();
        
        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }

    public function profile()
    {  
        if(!Auth::user())
         {
            \Session::flash('flash_message', 'Login required');

            return redirect('login');
         } 

        if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/profile');
        } 

    	$user_id=Auth::user()->id;

        $user = User::findOrFail($user_id);
           
         return view('pages.profile',compact('user'));
    }

     public function profile_update(Request $request)
    {  
    	$user_id=Auth::user()->id;
 			   
        $user = User::findOrFail($user_id);
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users,id',
		        'image_icon' => 'mimes:jpg,jpeg,gif,png'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('user_icon');
		 
        if($icon){
		
			\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		    \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');
		
            $tmpFilePath = 'upload/members/';

            $hardPath =  str_slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(450, 450)->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->image_icon = $hardPath;
        }
        
		
		$user->name = $inputs['name']; 
		$user->email = $inputs['email']; 
		$user->phone = $inputs['phone'];
  		$user->about = $inputs['about'];
		$user->facebook = $inputs['facebook'];
		$user->twitter = $inputs['twitter'];
		$user->gplus = $inputs['gplus'];
		$user->linkedin = $inputs['linkedin'];
		
	   
	    $user->save();

	    Session::flash('flash_message_profile', 'Successfully updated!');

        return redirect()->back();
    }

    public function change_pass()
    {  
    	 if(!Auth::user())
         {
            \Session::flash('flash_message', 'Login required');

            return redirect('login');
         }
         
         if(Auth::user()->usertype=='Admin')
        {
            return redirect('admin/profile');
        }
          
         return view('pages.change_pass');
    }

    public function updatePassword(Request $request)
    { 
    	 
    		//$user = User::findOrFail(Auth::user()->id);
		
		
		    $data =  \Input::except(array('_token')) ;
            $rule  =  array(
                    'password'       => 'required|confirmed',
                    'password_confirmation'       => 'required'
                ) ;
 
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
		
	   		/* $val=$this->validate($request, [
                    'password' => 'required|confirmed',
            ]);  */      
         
	    $credentials = $request->only('password', 'password_confirmation'
            );
            
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
     
}
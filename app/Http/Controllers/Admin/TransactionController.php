<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\PaymentTransaction;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class TransactionController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function transaction_list()    
    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }          
        
        if(isset($_GET['keyword']))
        {   
            $keyword = $_GET['keyword'];  

            $transaction = DB::table('transaction')                            
                           ->where("transaction.email", "LIKE","%$keyword%")
                           ->orwhere("transaction.payment_id", "LIKE","%$keyword%")
                           ->orderBy('id','DESC')
                           ->paginate(10); 

            $transaction->appends(\Request::only('keyword'))->links();              
        }  
        else
        {
            $transaction = DB::table('transaction')                           
                           ->orderBy('id','DESC')
                           ->paginate(10);
        }
          
        return view('admin.pages.transaction',compact('transaction'));
    }

     
    	
}

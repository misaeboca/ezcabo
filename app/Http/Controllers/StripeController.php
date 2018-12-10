<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\PaymentTransaction;
use App\Properties;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

class StripeController extends Controller
{
      
    public function paymentWithStripe(Request $request)
    {
          
         $stripe = Stripe::make(env('STRIPE_SECRET'));

         $charge = $stripe->charges()->create([
                    'card' => $request->stripeToken,
                    'amount'   => getcong('featured_property_price'),
                    'currency' => getcong('stripe_currency'),                     
                ]);

 
        $user_id=Auth::user()->id;           
        $user = User::findOrFail($user_id);
 

        $payment_trans = new PaymentTransaction;

        $payment_trans->property_id = $request->featured_property_id;
        $payment_trans->email = $request->stripeEmail;
        $payment_trans->user_id = $user_id;
        $payment_trans->gateway = 'Stripe';
        $payment_trans->payment_amount = getcong('featured_property_price');
        $payment_trans->payment_id = $charge['id'];
        $payment_trans->date = strtotime(date('m/d/Y'));
        
        $payment_trans->save();

        //Featured Property Set
        $property_obj = Properties::findOrFail($request->featured_property_id);

        $property_obj->featured_property = 1;
        $property_obj->status = 1;
        $property_obj->save();

        //Email Notification
        $user_full_name=$user->first_name.' '.$user->last_name;

        $data_email = array(
            'name' => $user_full_name
             );    

        \Mail::send('emails.featured_property', $data_email, function($message) use ($user,$user_full_name){
            $message->to($user->email, $user_full_name)
                ->from(getcong('site_email'), getcong('site_name'))
                ->subject(getcong('site_name').' | Featured Property Set');
        });
 
 
            \Session::put('flash_message','Payment success');
            return redirect('my_properties');
    }    
}
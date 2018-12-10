<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','phone','fax','about','facebook','twitter','gplus','linkedin','image_icon'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    
    public static function getUserInfo($id) 
    { 
		return User::find($id);
	}
    

    public function scopeSearchUserByKeyword($query, $keyword,$type)
    { 
             
            if($keyword!='' and $type!='')
            {
                $query->where(function ($query) use ($keyword,$type) {
                $query->where("usertype", "$type")
                     ->where("name", 'like', '%' .$keyword. '%')
                     ->where("email", 'like', '%' .$keyword. '%');                      
                });
            }          
            elseif ($type!='') 
            {
                        $query->where(function ($query) use ($keyword,$type) {
                        $query->where("usertype", "$type");                      
                        });
            }                                   
            else
            {
                $query->where(function ($query) use ($keyword,$type) {
                $query->where("usertype", "!=", "Admin")
                    ->where("name", 'like', '%' .$keyword. '%')
                    ->where("email", 'like', '%' .$keyword. '%');                      
                });
            }
 
        return $query;
    } 


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPassword($token));
    }
    
}


class CustomPassword extends ResetPassword
{
    public function toMail($notifiable)
    {   
        $url=url('password/reset/'.$this->token);

        return (new MailMessage)
            ->subject('Reset Password')
            ->from(getcong('site_email'), getcong('site_name'))
            /*->line('We are sending this email because we recieved a forgot password request.')
            ->action('Reset Password', $url)
            ->line('If you did not request a password reset, no further action is required. Please contact us if you did not submit this request.');*/
            ->view('emails.password',['url'=>$url]);
    }
}
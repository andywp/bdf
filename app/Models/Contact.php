<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;
use App\Mail\MailAdmin;

class Contact extends Model
{
    use HasFactory;

    public $fillable = ['first_name', 'las_name', 'phone', 'email', 'subject','message','ip'];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = $item->email;
            Mail::to($adminEmail)->send(new ContactMail($item));
            Mail::to(env('MAIL_FROM_ADDRESS','info@bdf.com'))->send(new MailAdmin($item));
        });
    }
}

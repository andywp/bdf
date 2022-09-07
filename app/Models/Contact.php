<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;

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
                
            $adminEmail = "andy.wijang@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}

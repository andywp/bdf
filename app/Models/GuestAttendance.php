<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestAttendance extends Model
{
    use HasFactory;
    protected $casts = [
        'date_of_issuance' => 'datetime:Y-m-d',
        'date_of_expiry' => 'datetime:Y-m-d'
     ];

    protected $guarded = ['id'];
}

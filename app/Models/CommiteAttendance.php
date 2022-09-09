<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommiteAttendance extends Model
{
    use HasFactory;

    protected $casts = [
        'tanggal' => 'datetime:Y-m-d'
     ];

    protected $guarded = ['id'];
}
 
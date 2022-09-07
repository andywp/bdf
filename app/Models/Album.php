<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'album'
    ];


    public function getCreatedAtAttribute(){

        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
     }

    public function gallery(){
        return $this->hasMany(Gallery::class, 'album_id');
    }

}

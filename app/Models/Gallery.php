<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'images',
        'album_id'
    ];


    public function getCreatedAtAttribute(){

        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    function category(){
		return $this->belongsTo(Album::class,'id');
	}


}

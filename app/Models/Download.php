<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Download extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'category_id','title','file'

    ];


    public function getCreatedAtAttribute(){

        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
     }

    function category(){
		return $this->belongsTo(Category::class,'id');
	}
}

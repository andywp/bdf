<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Carbon;
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'post_title',
        'post_description',
        'post_image',
        'post_content',
        'posts_author',
        'publish',
        'slug_url',
        'post_type',
        'post_tag'
    ];

    /**
     * conver date publish
     */

     public function getCreatedAtAttribute(){

        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
     }


     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug_url' => [
                'source' => 'post_title'
            ]
        ];
    }
    

}

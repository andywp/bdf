<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAttendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setYourPositionInAgencyAttribute( $data ) {
        $this->attributes['your_position_in_agency'] = implode(',',$data);
    
    }
    public function setHowDoWeContactYouAttribute( $data ) {
        $this->attributes['how_do_we_contact_you'] = implode(',',$data);
    
    }

    public function setTypeOfMediaAttribute( $data ) {
        $this->attributes['type_of_media'] = implode(',',$data);
    
    }
}

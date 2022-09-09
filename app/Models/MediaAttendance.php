<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAttendance extends Model
{
    use HasFactory;

    /* protected $casts = [
        'date_of_birth' => 'datetime:Y-m-d',
        'date_of_issuance' => 'datetime:Y-m-d',
        'date_of_expiry' => 'datetime:Y-m-d',
        //'your_position_in_agency' => 'array',  
        'how_do_we_contact_you' => 'array',  
        'type_of_media' => 'array',  
     ]; */


    protected $guarded = ['id'];

    public function setYourPositionInAgencyAttribute( $data ) {
        $this->attributes['your_position_in_agency'] = implode(',',$data);
    
    }
    /* public function getYourPositionInAgencyAttribute() {
         return $this->your_position_in_agency;
    
    } */
    public function setHowDoWeContactYouAttribute( $data ) {
        $this->attributes['how_do_we_contact_you'] = implode(',',$data);
    
    }

    public function setTypeOfMediaAttribute( $data ) {
        $this->attributes['type_of_media'] = implode(',',$data);
    
    }
}

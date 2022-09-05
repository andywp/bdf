<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalAttendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setSpecialDietaryRequirementAttribute( $data ) {
    
        $this->attributes['special_dietary_requirement'] = implode(',',$data);
    
    }

    public function setFoodAllergyAttribute( $data ) {
    
        $this->attributes['food_allergy'] = implode(',',$data);
    
    }

}

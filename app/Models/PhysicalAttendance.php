<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalAttendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'date_of_issuance' => 'datetime:Y-m-d',
        'date_of_expiry' => 'datetime:Y-m-d',
        'departure_flight_date' => 'datetime:Y-m-d',
        //'special_dietary_requirement' => 'array',
        //'food_allergy' => 'array',
        // /'food_allergy' => 'array',
     ];

 /*    public function setSpecialDietaryRequirementAttribute( $data ) {
    
        $this->attributes['special_dietary_requirement'] = implode(',',$data);
    
    }
 */
    /* public function setFoodAllergyAttribute( $data ) {
    
        $this->attributes['food_allergy'] = implode(',',$data);
    
    }

    public function setFoodFoodAllergyAttribute( $data ) {
    
        $this->attributes['food_allergy'] = implode(',',$data);
    
    }

    public function getFoodOtherFoodAllergyAttribute( $data ) {
    
        return  implode(',',$this->other_food_allergy);
    
    } */

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

}

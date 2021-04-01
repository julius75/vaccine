<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = ['first_name',"last_name", "id_number", "email",
        "phone",
        "date_of_birth",
        "next_dose_date" , "dose_type" ,
        "approved","code","allergies","reaction","transfusion","problems","vaccinated","pregnant","user_has_disease","immunocompromised","symptoms","test_date","travelled","contacted","tested "];
    public function setCategoryAttribute($value)
    {
        $this->attributes['user_has_disease'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['user_has_disease'] = json_decode($value);
    }
}

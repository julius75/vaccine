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
        "approved" ];

}

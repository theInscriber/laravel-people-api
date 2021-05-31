<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        "birthdate", "blood", "born", "born_place", "cellphone", "city", "country", "eye_color", "father_name", "gender",
        "height", "last_name", "name", "national_code", "religion", "system_id", "weight", "avatar"
    ];

    protected $casts = [
      'birthdate' => 'date'
    ];

    public function getAgeAttribute()
    {
        return Carbon::now()->diffInYears($this->birthdate);
    }
}

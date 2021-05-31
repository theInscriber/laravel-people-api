<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        # Using the Google JSON Style Guide for JSON property naming convention. Property names are to be camelCased

        return [
            "object" => 'Person',
            "id" => $this->id,
            "name" => $this->name,
            "lastName" => $this->last_name,
            "gender" => $this->gender,
            "age" => $this->age,
            "height" => $this->height,
            "weight" => $this->weight,
            "blood" => $this->blood,
            "eyeColor" => $this->eye_color,
            "country" => $this->country,
            "city" => $this->city,
            "bornPlace" => $this->born_place,
            "born" => $this->born,
            "cellphone" => $this->cellphone,
            "nationalCode" => $this->national_code,
            "religion" => $this->religion,
            "fatherName" => $this->father_name,
            "avatar" => URL::asset('/storage'.$this->avatar),
            "createdAt" => $this->created_at->toDatetimeString(),
        ];
    }
}

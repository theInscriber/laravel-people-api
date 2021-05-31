<?php

namespace App\Actions;

use App\Models\Person;
use Carbon\Carbon;

class GetPeopleStatistics{

    public function run()
    {

        $people = Person::all();
        return [
            "totals" => [
                "all" => $people->count(),
                "male" => $people->where('gender', 'Male')->count(),
                "female" => $people->where('gender', 'Female')->count(),
            ],
            "averageAge" => round($people->avg('age'), '0'),
            "countries" =>  $people->pluck('country')->unique()->flatten()->all(),
        ];
    }
}

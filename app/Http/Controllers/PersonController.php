<?php

namespace App\Http\Controllers;

use App\Actions\CreatePerson;
use App\Actions\GetPeopleStatistics;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $createPerson;
    private $getPeopleStatistics;

    public function __construct(CreatePerson $createPerson, GetPeopleStatistics $getPeopleStatistics)
    {
        $this->createPerson = $createPerson;
        $this->getPeopleStatistics = $getPeopleStatistics;
    }

    public function getAll()
    {
        return PersonResource::collection(Person::all());
    }

    public function getLatest()
    {
        return PersonResource::collection(Person::latest()->take(10)->get());
    }

    public function getStatistics()
    {
        $statistics = $this->getPeopleStatistics->run();

        return response()->json(["data" => ["statistics" => $statistics]], 200);
    }

    public function get(Person $person)
    {
        return new PersonResource($person);
    }

    public function store(Request $request)
    {
        return new PersonResource($this->createPerson->run());
    }

    public function update(Request $request, Person $person)
    {
        return new PersonResource($person);
    }

    public function delete(Request $request, Person $person)
    {
        $person->delete();

        return response()->json('Person deleted successfully',200);
    }
}

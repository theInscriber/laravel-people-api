<?php

namespace App\Actions;

use App\Models\Person;
use App\Tasks\DownloadPersonAvatarFromRoboHash;
use App\Tasks\GetRandomPersonFromGenerator;
use Carbon\Carbon;

class CreatePerson{

    private $getRandomPersonFromGenerator;
    private $downloadPersonAvatarFromRoboHash;

    public function __construct(
        GetRandomPersonFromGenerator $getRandomPersonFromGenerator,
        DownloadPersonAvatarFromRoboHash $downloadPersonAvatarFromRoboHash
    ){
        $this->getRandomPersonFromGenerator = $getRandomPersonFromGenerator;
        $this->downloadPersonAvatarFromRoboHash = $downloadPersonAvatarFromRoboHash;
    }

    public function run()
    {
        $personalData = $this->getRandomPersonFromGenerator->run();
        $personalData['avatar'] = $this->downloadPersonAvatarFromRoboHash->run($personalData['name']);
        $personalData['birthdate'] = Carbon::create(Carbon::now()->year - $personalData['age'])->toDateString();

        return Person::create($personalData);
    }
}

<?php

namespace App\Tasks;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class GetRandomPersonFromGenerator{

    private $BASE_URL = "https://pipl.ir/v1";

    public function run()
    {
        $URL = $this->BASE_URL.'/getPerson';
        try {
            $response = Http::get($URL);
            if (! $response->ok())
                response()->json( 'Something went wrong with the People Data Source', 500);

        } catch (ConnectionException $exception) {
            return response()->json( 'Failed to connect to Data Source', 500);
        }

        return $response->json()['person']['personal'];
    }
}

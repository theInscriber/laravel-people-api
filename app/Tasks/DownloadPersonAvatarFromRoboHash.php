<?php

namespace App\Tasks;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DownloadPersonAvatarFromRoboHash{

    private $BASE_URL = "https://robohash.org";

    public function run($name = "John Doe")
    {
        $filename = Str::slug($name).'.png';
        $URL = $this->BASE_URL.'/'.$filename;

        try {
            $contents = file_get_contents($URL);
            File::put(storage_path().'/app/public/avatars/'.$filename, $contents);
        } catch (FileNotFoundException $exception) {
            return response()->json( 'File not found from RoboHash', 500);
        }

        return '/avatars/'.$filename;
    }
}

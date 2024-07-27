<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTemporalyFilmController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->hasFile('film')) {
            return;
        }

        $film = $request->film;

        $folder = uniqid('film-');

        $path = 'films/tmp/' . $folder;
        $file = $film;
        $name = $film->getClientOriginalName();

        Storage::putFileAs($path, $file, $name);

        return $folder;
    }
}

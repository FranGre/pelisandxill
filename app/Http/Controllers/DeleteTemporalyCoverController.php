<?php

namespace App\Http\Controllers;

use App\Models\TemporalyCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteTemporalyCoverController extends Controller
{
    public function __invoke()
    {
        $temporalyCover = TemporalyCover::first();

        $directory = 'covers/tmp/' . $temporalyCover->folder;

        Storage::deleteDirectory($directory);
        $temporalyCover->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TemporalyCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTemporalyCoverController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->hasFile('cover')) {
            return;
        }

        $cover = $request->cover;

        $filename = $cover->getClientOriginalName();
        $folder = uniqid('image-');
        $path = 'covers/tmp/' . $folder;

        Storage::putFileAs($path, $cover, $filename);

        TemporalyCover::create(['folder' => $folder, 'filename' => $filename]);

        return $folder;
    }
}

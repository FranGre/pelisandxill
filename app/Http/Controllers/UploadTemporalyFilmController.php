<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTemporalyFilmController extends Controller
{
    public function __invoke(Request $request)
    {
        // Retrieve chunk data
        $chunk = $request->file('film')->get();
        $chunkIndex = $request->header('Upload-Offset');
        $totalChunks = $request->header('Upload-Length');
        $filename = $request->header('Upload-Name');
        $folder = uniqid('film-');

        // Define path for chunk storage
        $path = 'films/tmp/' . $folder;

        // Ensure directory exists
        Storage::makeDirectory($path);

        // Append the chunk to the file
        Storage::append("$path/$filename", $chunk);

        // Check if all chunks are received
        if ($chunkIndex + strlen($chunk) >= $totalChunks) {
            return response()->json(['key' => $folder]);
        }

        return response()->json([], 204);

    }
}

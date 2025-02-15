<?php

use function Livewire\Volt\{state, rules};
use Illuminate\Support\Facades\Storage;
use App\Models\TemporalyCover;
use App\Models\Cover;
use App\Models\Trailer;
use App\Models\Film;

// https://stackoverflow.com/questions/72321283/filepond-is-there-a-way-to-send-revert-when-large-chunked-file-is-canceled-mid-u

state(['title', 'summary', 'sipnosis', 'year', 'director', 'duration', 'age', 'link']);

rules([
    'title' => 'required|string|max:60',
    'summary' => 'required|string|max:500',
    'sipnosis' => 'required|string|max:255',
    'year' => 'required|integer|between:1900,2200',
    'duration' => 'required|integer|between:0,400',
    'director' => 'required|string|max:80',
    'age' => 'required|integer|between:0,22',
    'link' => 'required|url:https'
]);

$save = function () {
    $this->validate();

    $temporalyCover = TemporalyCover::first();

    $path = 'covers/'. $temporalyCover->folder . '/' . $temporalyCover->filename;
    $filename = $temporalyCover->filename;

    $cover = Cover::create(['path' => $path, 'filename' => $filename]);

    $oldPath = 'covers/tmp/'. $temporalyCover->folder . '/' . $temporalyCover->filename;
    $newPath = 'covers/'. $temporalyCover->folder . '/' . $temporalyCover->filename;
    Storage::copy($oldPath, $newPath);

    Storage::deleteDirectory('covers/tmp/'. $temporalyCover->folder);
    $temporalyCover->delete();

    $trailer = Trailer::create(['link' => $this->link]);

    $film = Film::create(['cover_id' => $cover->id, 'trailer_id' => $trailer->id ,'title' => $this->title
    , 'summary' => $this->summary ,'sipnosis' => $this->sipnosis ,'year' => $this->year ,'director' => $this->director 
    ,'age' => $this->age, 'duration' => $this->duration]);

    // arreglar
    return $this->redirect(route('welcome'), true);
}

?>

@section('head')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

<div>
    <h1 class="text-center">Nueva Película</h1>
    <form wire:submit.prevent='save' class="space-y-12 mt-16" enctype="multipart/form-data">
        <div class="grid
        md:grid-cols-2 md:gap-6
        ">
            <div class="flex flex-col space-y-2">
                <label>Title</label>
                <x-input.text placeholder="Title..." wire:model='title' />
                @error('title') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Summary</label>
                <x-input.text placeholder="Summary..." wire:model='summary' />
                @error('summary') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Sipnosis</label>
                <x-input.text placeholder="Sipnosis..." wire:model='sipnosis' />
                @error('sipnosis') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Year</label>
                <x-input.text placeholder="Year..." wire:model='year' />
                @error('year') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Director</label>
                <x-input.text placeholder="Director..." wire:model='director' />
                @error('director') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Duration</label>
                <x-input.text placeholder="Duration..." wire:model='duration' />
                @error('duration') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Age</label>
                <x-input.text placeholder="Age..." wire:model='age' />
                @error('age') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label>Trailer</label>
                <x-input.text placeholder="Trailer..." wire:model='link' />
                @error('link') <x-error-message>{{$message}}</x-error-message> @enderror
            </div>
        </div>


        <div class="space-y-6">
            <div class="space-y-1">
                <label>Cover</label>
                <input type="file" name="cover" id="cover">
            </div>

            <div class="space-y-1">
                <label>Film</label>
                <input type="file" name="film" id="film">
            </div>
        </div>

        <x-button.save>Save</x-button.save>
    </form>
</div>


@section('scripts')
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    // Image Preview
    FilePond.registerPlugin(FilePondPluginFileValidateSize, FilePondPluginImagePreview)

    const inputElementCover = document.getElementById('cover')
    
    FilePond.create(inputElementCover,{
        maxFileSize: 1024 * 1024 * 20,
        server: {
            process: '/uploadCover',
            revert: '/deleteCover',
            headers: {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            },
        },
    })

    const inputElementFilm = document.getElementById('film')

    FilePond.create(inputElementFilm, {
        maxFileSize: 1024 * 1024 * 1024 * 3,
        server: {
            chunkUploads: true,
            chunkSize: 1024 * 1024 * 1,
            timeout: 15000,
            process: '/uploadFilm',
            revert: '/deleteFilm',
            headers: {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            }
        }

    })
    
</script>
@endsection
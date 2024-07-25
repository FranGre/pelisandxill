<?php

use function Livewire\Volt\{state};

state(['title', 'summary', 'sipnosis', 'year', 'director', 'duration', 'age']);

$save = function () {
    dd($this->all());
}

?>

@section('head')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

<div>
    <h1 class="text-center">Nueva Película</h1>
    <form wire:submit='save' class="space-y-12 mt-16">
        <div class="grid
        md:grid-cols-2 md:gap-6
        ">
            <div class="flex flex-col space-y-2">
                <label>Title</label>
                <x-input.text placeholder="Title..." wire:model='title' />
            </div>

            <div class="flex flex-col space-y-2">
                <label>Summary</label>
                <x-input.text placeholder="Summary..." wire:model='summary' />
            </div>

            <div class="flex flex-col space-y-2">
                <label>Sipnosis</label>
                <x-input.text placeholder="Sipnosis..." wire:model='sipnosis' />
            </div>

            <div class="flex flex-col space-y-2">
                <label>Year</label>
                <x-input.text placeholder="Year..." wire:model='year' />
            </div>

            <div class="flex flex-col space-y-2">
                <label>Director</label>
                <x-input.text placeholder="Director..." wire:model='director' />
            </div>

            <div class="flex flex-col space-y-2">
                <label>Duration</label>
                <x-input.text placeholder="Duration..." wire:model='duration' />
            </div>

            <div class="flex flex-col space-y-2">
                <label>Age</label>
                <x-input.text placeholder="Age..." wire:model='age' />
            </div>
        </div>

        <div class="space-y-6">
            <div class="space-y-1">
                <label>Cover</label>
                <input type="file" name="cover">
            </div>
        </div>

        <x-button.save>Save</x-button.save>
    </form>
</div>


@section('scripts')
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    // Image Preview
    FilePond.registerPlugin(FilePondPluginImagePreview)

    FilePond.setOptions({
        server: {
            process: '/uploadCover',
            revert: '/deleteCover',
            headers: {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            }
        },
    });

    const inputElement = document.querySelector('input[type="file"]');
    
    FilePond.create(inputElement);
    
</script>
@endsection
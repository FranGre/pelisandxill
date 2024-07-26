<?php

use function Livewire\Volt\{state};

state('film');

?>

<li wire:key='{{$this->film->id}}'>
    <a href="{{route('watchFilm', ['film_id' => $this->film->id, 'title' => $this->film->title])}}" wire:navigate>
        <div class="rounded p-3 flex flex-col justify-center items-center
        dark:bg-gray-700
        bg-neutral-400">
            <img src="{{asset('storage/' . $this->film->cover->path)}}" alt="{{$this->film->title}} cover" />
            <small>{{$this->film->title}}</small>
        </div>
    </a>
</li>
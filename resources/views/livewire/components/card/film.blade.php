<?php

use function Livewire\Volt\{state};

state('film');

?>

<li class="rounded p-3 flex flex-col justify-center items-center
                                dark:bg-gray-700
                                bg-neutral-400">
    <a href="{{route('watchFilm')}}" wire:navigate>
        <img src="{{asset('storage/' . $this->film->cover->path)}}" alt="{{$this->film->title}} cover" />
        <small>{{$this->film->title}}</small>
    </a>
</li>
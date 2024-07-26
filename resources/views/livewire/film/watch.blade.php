<?php

use function Livewire\Volt\{state, mount};
use App\Models\Film;

state('film');

mount(fn () => $this->film = Film::findOrFail(request()->query()['film_id']));

?>

<div class="space-y-16">
    <h2 class="text-center">{{$this->film->title}}</h2>

    <div class="space-y-12">
        <div>
            <p>{{$this->film->sipnosis}}</p>
        </div>
        <div class="grid text-center
        grid-cols-2">
            <p>Fecha Lanzamiento - <strong>{{$this->film->year}}</strong></p>
            <p>Duración - <strong>{{$this->film->duration}} min</strong></p>
            <p>Director - <strong>{{$this->film->director}}</strong></p>
            <p>PEGI - <strong>{{$this->film->age}}</strong></p>
        </div>
        <div>
            <img src="{{asset('storage/' . $this->film->cover->path)}}" alt="{{$this->film->title}}">
        </div>
    </div>
</div>
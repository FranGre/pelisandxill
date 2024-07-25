<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <h1 class="text-center">PelisAndXill</h1>

    <a href="{{ route('login') }}" wire:navigate
        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
        Log in
    </a>

    <a href="{{ route('register') }}" wire:navigate
        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
        Register
    </a>

    <a href="{{ route('storeFilm') }}" wire:navigate
        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
        Añadir Película
    </a>



    <div class="mt-24">
        <ul
            class="grid 
        grid-cols-2 gap-3 
        sm:grid-cols-3 sm:gap-4
        md:grid-cols-4 md:gap-6
        lg:md:grid-cols-5 lg:gap-12">
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
            <li
                class="rounded p-3 flex flex-col justify-center items-center
            dark:bg-gray-700
            bg-neutral-400">
                <img src="" alt="cover" />
                <small>title</small>
            </li>
        </ul>
    </div>
</div>

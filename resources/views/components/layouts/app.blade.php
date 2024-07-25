<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>pelisandxill</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('head')

</head>

<body
    class="font-sans antialiased
p-6
sm:py-12 sm:px-12
md:py-12 md:px-24
lg:py-12 lg:px-24
dark:bg-neutral-700 dark:text-white/50 
bg-gray-50 text-black/50">
    {{ $slot }}

    @yield('scripts')
</body>

</html>

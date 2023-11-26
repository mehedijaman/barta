<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
    <style>
        /* 1. declare transition */
        .fade-move,
        .fade-enter-active,
        .fade-leave-active {
            transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
        }

        /* 2. declare enter from and leave to state */
        .fade-enter-from,
        .fade-leave-to {
            opacity: 0;
            transform: scaleY(0.01) translate(30px, 0);
        }

        /* 3. ensure leaving items are taken out of layout flow so that moving
            animations can be calculated correctly. */
        .fade-leave-active {
            position: absolute;
        }
    </style>

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>

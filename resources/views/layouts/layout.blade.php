<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
@include('layouts.navigation')

    <nav>
        @yield('login')
    </nav>

    <main class="container mx-auto pt-10">
        <div class="heading">
            <h1 class="text-5xl">
                Theetuin de Meeze
            </h1>

        </div>
        @yield("packages")
        <section>
            @yield("content")
        </section>
    </main>

</body>
</html>

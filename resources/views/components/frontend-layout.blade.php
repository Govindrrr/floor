<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>Floor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="/font/css/all.min.css">
</head>

<body>
    @include('sweetalert::alert')

    <header>
        <x-frontend-navbar />
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
    </footer>
   </body>

</html>

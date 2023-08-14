<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css','resources/css/app.js'])
    </head>
    <body id="app" class="md:mx-20 mt-10 bg-gradient-to-r from-slate-900 to-slate-950 text-white">
        @yield('content')
        @vite('resources/js/app.js')
    </body>

</html>

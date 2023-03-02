<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/libs/font-awesome/css/font-awesome.min.css')}} ">
    <title>{{$title ?? 'bestchoice.com'}}</title>

    @livewireStyles
    @vite(['resources/css/app.css'])
    {{ $style ?? '' }}

</head>

<body>
    <x-navbar />
    {{ $slot }}
    <x-footer />

    @livewireScripts
    @vite(['resources/js/app.js'])
    {{ $script ?? '' }}
</body>

</html>

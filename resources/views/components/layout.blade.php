<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/libs/font-awesome/css/font-awesome.min.css')}} ">
    <script src="https://kit.fontawesome.com/b24e33cab9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>{{$title ?? 'bestchoice.com'}}</title>

    @livewireStyles
    @vite(['resources/css/app.css'])
    {{ $style ?? '' }}

</head>

<body>
    <x-navbar />
    @if (session()has('message'))
        <x-alert  :type="session('message')['type']" :message="session('message')['text']"/>
    @endif
    {{ $slot }}
    <x-footer />

    @livewireScripts
    @vite(['resources/js/app.js'])
    {{ $script ?? '' }}
</body>

</html>

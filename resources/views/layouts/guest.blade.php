<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">
    {{-- :class="{ 'theme-dark': dark }" x-data="data()" --}}
<head>
    <!-- Primary Meta Tags -->
    <meta name="robots" content="INDEX,FOLLOW">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ATM - {{ \Request::route()->getName() }}</title>

    <meta name="googlebot" content="index,follow">
    <meta name="author" content="ramy-nagy">
    <meta name='description' content='a doorway for all atm Misr employees to access their day-to-day needst.'>
    <meta name='keywords' content='atm, atm egypt, atm Misr'>
    <link rel="canonical" href="https://atm.com"><!-- Canonical SEO -->

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://atm.com">
    <meta property="og:title" content="I atm - Dashboard">
    <meta property="og:description"
        content='a doorway for all atm Misr employees to access their day-to-day needst.'>
    <meta name='og:image' content="{{asset('assets/images/logo.jpg')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://atm.com">
    <meta property="twitter:title" content="I atm - Dashboard">
    <meta property="twitter:description"
        content="a doorway for all atm Misr employees to access their day-to-day needst.">
    <meta property="twitter:image" content="{{asset('assets/images/logo.jpg')}}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
 
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/notyf/notyf.min.css') }}"><!-- notyf -->
    <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('css/tailwind.output.css')  }}"><!-- tailwind -->

</head>

<body>


    {{ $slot }}
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/notyf/notyf.min.js') }}"></script><!-- notyf -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    @if(session('message'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const message = "{{ session('message')}}";
            const type = "{{ session('type') }}";
            var notyf = new Notyf();
            notyf.open({duration: 5000, type:type,
                position: {x: 'right', y: 'top',},
                message});
        });
    </script>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const message = "{{ $error }}";
            const type = "error";
            var notyf = new Notyf();
            notyf.open({duration: 5000, type:type,
                position: {x: 'right', y: 'top',},
                message});
        });
    </script>
    @endforeach
    @endif
</body>

</html>
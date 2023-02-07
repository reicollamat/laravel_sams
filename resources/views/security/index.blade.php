<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    {{-- icon --}}
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/icon.svg') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"  type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome-6-2-1/all.min.css') }}"  type="text/css">
</head>

<body class="antialiased">
    @if(Session::has('message'))
        <script>
            alert("{{ Session::get('message') }}");
        </script>
    @endif
    
    <p class="text-white">hello</p>
    {{-- js script --}}
    <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}" async></script>
    <script src="{{ URL::asset('js/main.js') }}" async></script>

</body>

</html>
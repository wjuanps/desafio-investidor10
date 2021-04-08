<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Desafio Investidor10</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>
<body>
    @include("layouts.header")

    <div class="container">
        @if (isset($tiding))
            <h1>{{ $tiding->title }}</h1>

            <br />
            <p>{{ $tiding->text }}</p>
        @endif
    </div>

    @include('layouts.footer')
</body>
</html>

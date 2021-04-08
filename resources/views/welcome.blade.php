<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
            <div class="row">
                @if (isset($tidings) && count($tidings) > 0)
                    @foreach ($tidings as $tiding)
                        <div class="card">
                            <div class="card-header">
                                <h1>{{ $tiding->title }}</h1>
                                <small>Em: {{ $tiding->category->name }}</small>
                            </div>
                            <div class="card-body">
                                <p style="text-align: justify">{{ Str::limit($tiding->text, 300, ' (...)') }}</p>

                                <a href="{{ Route('tiding.show', $tiding->slug) }}" class="btn">Acessar</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 style="color: #1f1d1d">Nenhuma notícia encontrada</h1>
                @endif
            </div>
        </div>

        @include('layouts.footer')
    </body>
</html>

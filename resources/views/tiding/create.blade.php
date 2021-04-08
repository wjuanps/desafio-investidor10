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
        <form action="{{ Route('tiding.store') }}" method="post">
            @csrf

                <div class="row">
                    <div class="card">

                        @if (session('error'))
                            <h3 class="error">* {{ session('error') }}</h3>
                        @endif

                        <div class="card-body input">
                            <label for="title">Título</label>
                            <input name="title" id="title" type="text" class="input-text" required="required" />

                            <label for="text">Conteúdo</label>
                            <textarea name="text" id="text" required="required"></textarea>

                            <label for="category">Categoria</label>
                            <select name="category" id="category" rows="100" required="required">
                                <option value="">Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <button type="submit" style="width: 100%" class="btn">Cadastrar</button>
                        </div>
                    </div>
                </div>


        </form>
    </div>

    @include('layouts.footer')
</body>
</html>

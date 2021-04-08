<header>
    <a class="logo" href="{{ Route('tiding.index') }}"><img src="{{ asset('images/laravel-logo.png') }}" height="40" alt="logo"></a>
    <nav>
        <ul class="nav__links">
            <li><a href="{{ Route('tiding.new') }}">CADASTRAR NOTÍCIAS</a></li>
            <li><a href="{{ Route('tiding.index') }}">EXIBIR NOTÍCIAS</a></li>
            <form action="{{ Route('tiding.index') }}" method="get">
                <input class="search" name="search" value="{{ isset($search) ? $search : '' }}" placeholder="Procure pelo nome da noticia ou pela categoria" />
            </form>
        </ul>
    </nav>
    <p class="menu cta">Menu</p>
</header>
<div class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <li><a href="{{ Route('tiding.new') }}">CADASTRAR NOTÍCIAS</a></li>
        <li><a href="{{ Route('tiding.index') }}">EXIBIR NOTÍCIAS</a></li>
        <form action="{{ Route('tiding.index') }}" method="get">
            <input class="search" name="search" value="{{ isset($search) ? $search : '' }}" placeholder="Procure pelo nome da noticia ou pela categoria" />
        </form>
    </div>
</div>

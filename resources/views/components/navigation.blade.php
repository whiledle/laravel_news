<div class="row mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('post.index') }}">Новости</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.index') }}">Главная</a>
                </li>
            </ul>
        </div>
        <form class="d-flex" action="{{ route('post.search') }}" method="get">
            <input name="search" class="form-control me-2" type="search" aria-label="Search" value="{{ request()->get('search') }}">
            <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form>
    </nav>
</div>
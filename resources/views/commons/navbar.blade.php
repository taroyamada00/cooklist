<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-light">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand text-dark" href="/">Cook li</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="mr-4">{!! link_to_route('cooks.create', 'メニューや食材を登録する', ['class' => 'text-dark']) !!}</li>
                    {{-- ログアウトへのリンク --}}
                    <li>{!! link_to_route('logout.get', 'ログアウト', ['class' => 'text-dark']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
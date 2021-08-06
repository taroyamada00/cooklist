@extends('layouts.app')
@section('content')
    <ul class="logout">
      @if (Auth::check())
            {{-- ログアウトへのリンク --}}
            <li>{!! link_to_route('logout.get', 'ログアウト', ['class' => 'text-center']) !!}</li>
        @endif
    </ul>
    <div class="content">
        {{-- エラーメッセージ --}}
        @include('commons.error_messages')
            <div class="main-img"><img src="https://www.dfc97.net/cookli/mainimg.jpg"></div>
            <div class="d-wrap">
                <h1><img src="https://www.dfc97.net/cookli/logo.svg"></h1>
                @if (Auth::check())
                <div>
                    <div class="form-group">
                        <form action="{{ route('cooks.search') }}" method="get" class="form-inline">
                            <input type="text" name="search" placeholder="食材やメニューで検索" class="form-control mr-2">
                            <button type="submit" class="btn btn-success">検索</button>
                        </form>
                    </div>
                    <div>
                        {!! link_to_route('cooks.create', 'メニューや食材を登録する', [], ['class' => 'text-link']) !!}
                    </div>
                    {{-- <div>
                        {!! link_to_route('cooks.index', '一覧テスト用', [], ['class' => 'btn btn-success']) !!}
                    </div> --}}
                </div>
                @else
                <ul class="d-flex list-unstyled">
                    <li class="mr-2">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-light']) !!}</li>
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-light']) !!}</li>
                </ul>
                @endif
            </div>
    </div>
@endsection
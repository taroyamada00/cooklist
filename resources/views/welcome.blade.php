@extends('layouts.app')
@section('content')
    <div class="center mt-5">
        <div class="text-center">
            <h1>Cook li</h1>
            <p>〜 最近なに食べた？ 〜</p>
        </div>
        @if (Auth::check())
            <div class="text-center">
                <div class="mb-3">
                    <form>
                        <input type="text" name="query">
                        <input type="submit" name="btn" value="検索">
                    </form>
                </div>
                <div class="mb-3">
                    {!! link_to_route('cooks.create', 'メニューや食材を登録する', [], ['class' => 'text-link']) !!}
                    
                </div>
                <div>
                    {!! link_to_route('cooks.index', '一覧テスト用', [], ['class' => 'btn btn-success']) !!}
                </div>
                
            </div>
        @else
            <ul class="d-flex justify-content-center list-unstyled pl-2">
                <li class="mr-2">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-light']) !!}</li>
                <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-light']) !!}</li>
            </ul>
        @endif
    </div>
    
    <div class="container">
        {{-- エラーメッセージ --}}
        @include('commons.error_messages')
    </div>
@endsection
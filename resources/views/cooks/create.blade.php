@extends('layouts.app')
@section('content')
{{-- ナビゲーションバー --}}
@include('commons.navbar')
        {{-- エラーメッセージ --}}
        @include('commons.error_messages')
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('cooks.store') }}">
                    @csrf
                    <div class="form-group">
                            <label>登録日</label>
                            <input type="date" name="date">
                    </div>
                    <div class="form-group">
                            <label>朝昼夜</label>
                            <input type="radio" name="when" value="朝"><label>朝</label>
                            <input type="radio" name="when" value="昼"><label>昼</label>
                            <input type="radio" name="when" value="夜"><label>夜</label>
                    </div>
                    <div class="form-group">
                            <label>メニュー</label>
                            <input type="text" name="menu">
                    </div>
                    <div class="form-group">
                            <label>食材</label>
                            <textarea name="ingregient" rows="3" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                            <label>メモ</label>
                            <textarea name="memo" rows="3" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                            <label>参考URL</label>
                            <input type="text" name="url">
                    </div>
                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
@include('commons.error_messages')
    <h2>{{ $cook->menu }}</h2>
    <table class="table table-bordered">
        <tr>
            <th>登録日</th>
            <td>{{ $cook->date }}</td>
        </tr>
        <tr>
            <th>朝昼夜</th>
            <td>{{ $cook->when }}</td>
        </tr>
        <tr>
            <th>食材</th>
            <td>{!! nl2br(e( $cook->ingregient )) !!}</td>
        </tr>
        <tr>
            <th>メモ</th>
            <td>{!! nl2br(e( $cook->memo )) !!}</td>
        </tr>
        <tr>
            <th>参考URL</th>
            <td><a href="{{$cook->url}}">{{ $cook->url }}</a></td>
        </tr>
    </table>
    <div class="d-flex">
        <button type="button" onClick="history.back()" class="btn btn-secondary mr-2">戻る</button>
        {{-- 編集ページへのリンク --}}
        {!! link_to_route('cooks.edit', '編集', ['cook' => $cook->id], ['class' => 'btn btn-warning mr-2']) !!}
        <form method="post" action="{{ route('cooks.destroy', $cook->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
    </div>
@endsection
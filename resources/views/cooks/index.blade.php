@extends('layouts.app')

@section('content')
    @if (count($cooks) > 0)
        <h2 class="text-center mb-5">検索結果一覧</h2>
        <div class="center">
            <div>
                @foreach ($cooks as $cook)
                    <h3>{{ $cook->menu }}</h3>
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
                    <div class="text-right mb-5">
                        {{-- 編集・削除ページへのリンク --}}
                        {!! link_to_route('cooks.show', '編集・削除', ['cook' => $cook->id]) !!}
                    </div>
                @endforeach
            </div>
        </div>
        {{-- ページネーションのリンク --}}
        {{ $cooks->links() }}
    @endif
@endsection
@extends('layouts.app')
{{-- ナビゲーションバー --}}
@include('commons.navbar')
@section('content')
    @if (count($cooks) > 0)
        <h2 class="text-center mb-5">検索結果一覧</h2>
        @isset($search_result)
            <p>{{ $search_result }}</p>
        @endisset
            <div class="memo">
                <div class="memo-inn">
                    @foreach ($cooks as $cook)
                        <h3>{{ $cook->menu }}</h3>
                        <table class="table table-striped">
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
                        <div class="mb-5 d-flex justify-content-end">
                            {{-- 編集ページへのリンク --}}
                            <p class="btn btn-warning mr-2">{!! link_to_route('cooks.show', '編集', ['cook' => $cook->id]) !!}</p>
                            {{-- 削除ページへのリンク --}}
                            <form method="post" action="{{ route('cooks.destroy', $cook->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        {{-- ページネーションのリンク --}}
        @if(isset($search))
            {{ $cooks->appends(['search' => $search])->links() }}
        @else
        {{ $cooks->links() }}
        @endif

        @else
            <div>【{{$search}}】は見つかりませんでした。</div>
            <a href="/">検索ページへ戻る</a>
    @endif
@endsection
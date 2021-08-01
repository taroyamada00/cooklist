@extends('layouts.app')

@section('content')
@include('commons.error_messages')
    <div class="row">
            <div class="col-6">
                <form method="put" action="{{ route('cooks.update', $cook->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>登録日</label>
                        <input type="date" name="date" value="{{ $cook->date }}">
                    </div>
                    <div class="form-group">
                        <label>朝昼夜</label>
                        <label><input type="radio" name="when" required value="{{ $cook->when ?? old('when') }}">朝</label>
                        <label><input type="radio" name="when" required value="{{ $cook->when ?? old('when') }}">昼</label>
                        <label><input type="radio" name="when" required value="{{ $cook->when ?? old('when') }}">夜</label>
                    </div>
                    <div class="form-group">
                        <label>メニュー</label>
                        <input type="text" name="menu" value="{{ $cook->menu }}">
                    </div>
                    <div class="form-group">
                        <label>食材</label>
                        <textarea name="ingregient" rows="3" cols="50">{{ $cook->ingregient }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>メモ</label>
                        <textarea name="memo" rows="3" cols="50">{{ $cook->memo }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>参考URL</label>
                        <input type="text" name="url" value="{{ $cook->url }}">
                    </div>
                    <button type="button" onClick="history.back()" class="btn btn-secondary mr-2">戻る</button>
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>

@endsection
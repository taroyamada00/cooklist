@extends('layouts.app')

@section('content')
{{-- ナビゲーションバー --}}
@include('commons.navbar')
@include('commons.error_messages')
    <div class="row">
            <div class="col-6">
                {!! Form::model($cook, ['route' => ['cooks.update', $cook->id], 'method' => 'put']) !!}
                    @csrf
                    <div class="form-group">
                        <label class="w-20">登録日</label>
                        <input type="date" name="date" value="{{ $cook->date }}">
                    </div>
                    <div class="form-group">
                        <label>朝昼夜</label>
                        <label>{{ Form::radio('when', '朝', (old('when')== '朝' ? true: ($cook->when == '朝'))? true:false) }}<span>朝</span></label>
                        <label>{{ Form::radio('when', '昼', (old('when')== '昼' ? true: ($cook->when == '昼'))? true:false) }}<span>昼</span></label>
                        <label>{{ Form::radio('when', '夜', (old('when')== '夜' ? true: ($cook->when == '夜'))? true:false) }}<span>夜</span></label>
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
                {!! Form::close() !!}
            </div>
        </div>

@endsection
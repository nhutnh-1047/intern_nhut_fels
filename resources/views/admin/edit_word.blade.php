@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="#" method="post">
            @csrf
            <input type="hidden" id="idWord" value="{{ $word->id }}">
            <div class="form-group">
                <label>@lang('messages.word_eng')</label>
                <input type="text" class="form-control word_eng" placeholder="English" value="{{ $word->word_eng }}">
            </div>
            <div class="form-group">
                <label>@lang('messages.word_vi')</label>
                <input type="text" class="form-control word_vi" placeholder="Vietnamese" value="{{ $word->word_vi }}">
            </div>
            <button type="submit">@lang('messages.change')</button>
        </form>
    </div>
@endsection
@section('script')
    {!! HTML::script(mix('js/editWord.js')) !!}
@endsection

@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    @lang('messages.filter')
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('words.show', ['word' => 1]) }}">@lang('messages.all')</a>
                    <a class="dropdown-item" href="{{ route('words.show', ['word' => 2]) }}">@lang('messages.learned')</a>
                    <a class="dropdown-item" href="{{ route('words.show', ['word' => 3]) }}">@lang('messages.unlearn')</a>
                </div>
            </div>
        </div>
        <div class="row">
            <input type="hidden" id="user-id" value="{{ Auth::user()->id }}">
            @foreach ($words->word as $item)
                @if ($id == 2 && $item->pivot->status)
                    <div class="col-xl-3">
                        <div class="card text-center mt-2 mb-2">
                            <div class="card-header">
                                <h3>{{ $item->word_eng }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $item->word_vi }}</p>
                                <button value="{{ $item->id }}" href="#" class="btn btn-primary change-status-word">
                                    @lang('messages.remeber')
                                </button>
                            </div>
                        </div>
                    </div>
                @elseif($id == 3 && !$item->pivot->status)
                    <div class="col-xl-3">
                        <div class="card text-center mt-2 mb-2">
                            <div class="card-header">
                                <h3>{{ $item->word_eng }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $item->word_vi }}</p>
                                <button value="{{ $item->id }}" href="#" class="btn btn-danger change-status-word">
                                    @lang('messages.forget')
                                </button>
                            </div>
                        </div>
                    </div>
                @elseif($id == 1)
                    <div class="col-xl-3">
                        <div class="card text-center mt-2 mb-2">
                            <div class="card-header">
                                <h3>{{ $item->word_eng }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $item->word_vi }}</p>
                                @if ($item->pivot->status)
                                    <button value="{{ $item->id }}" href="#" class="btn btn-primary change-status-word">
                                        @lang('messages.remeber')
                                    </button>
                                @else
                                    <button value="{{ $item->id }}" href="#" class="btn btn-danger change-status-word">
                                        @lang('messages.forget')
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    {!! HTML::script(mix('js/updateWord.js')) !!}
@endsection

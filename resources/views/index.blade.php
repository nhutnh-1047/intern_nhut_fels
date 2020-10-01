@extends('layouts.master')
@section('content')
    <div class="d-flex flex-wrap">
        @foreach ($lessons as $key => $lesson)
            <div class="card m-2 w-25">
                <img class="card-img-top" src="{{ asset('../../asset/img/english.jpg') }}" alt="avatar">
                <div class="card-body">
                    <h4 class="card-title">
                        <p>{{ $lesson->title }}</p>
                    </h4>
                    <p class=" card-text">{{ Str::limit($lesson->description, 100) }}</p>
                    <div class="text-center">
                        <a href="{{ route('lesson.view.id', ['id' => $lesson->id]) }}"
                            class="btn btn-primary join-class">@lang('messages.join_learn')
                        </a>
                        <input type="hidden" name="id-lesson" value="{{ $lesson->id }}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    {!! HTML::script(mix('js/joinLesson.js')) !!}
@endsection

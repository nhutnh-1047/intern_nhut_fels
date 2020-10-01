@extends('layouts.master')
@section('content')
    <h1>{{ $lesson->title }}</h1>
    <hr>
    <div class="description">
        {{ $lesson->description }}
    </div>
    <div class="lesson_quesion text-center  ">
        <a href="{{ route('lesson.question.get', ['id' => $lesson->id]) }}" class="btn btn-info"
            role="button">@lang('messages.start_exam')</a>
    </div>
@endsection

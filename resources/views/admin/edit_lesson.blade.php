@extends('layouts.master')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <form action="#" method="post">
            @csrf
            <input type="hidden" id="idLesson" value="{{ $lesson->id }}">
            <div class="form-group">
                <label>@lang('messages.title')</label>
                <input type="text" class="form-control title" placeholder="Enter name" name="title"
                    value="{{ $lesson->title }}">
            </div>
            <div class="form-group">
                <label for="category">@lang('messages.category')</label>
                <select class="form-control" id="category" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>@lang('messages.question_id')</label>
                <input type="text" class="form-control question_ids" placeholder="Enter name" name="question_ids"
                    value="{{ $lesson->question_ids }}">
            </div>
            <div class="form-group">
                <label>@lang('messages.description')</label>
                <textarea id="description" name="description" cols="30" rows="10">
                {{ $lesson->description }}
                </textarea>
            </div>
            <button type="submit">@lang('messages.change')</button>
        </form>
    </div>
@endsection
@section('script')
    {!! HTML::script(mix('js/editLesson.js')) !!}
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');

    </script>
@endsection

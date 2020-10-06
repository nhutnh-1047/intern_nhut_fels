@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xl-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('admin.member') }}">@lang('messages.manager_member')</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('admin.lesson') }}">@lang('messages.manager_lesson')</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('admin.word') }}">@lang('messages.manager_word')</a>
                </li>
            </ul>
        </div>
        <div class="col-xl-9">
            @yield('admin-content')
        </div>
    </div>
@endsection

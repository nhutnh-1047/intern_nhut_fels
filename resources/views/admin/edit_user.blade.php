@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mt-3">@lang('messages.change_user_info')</h1>
        <hr>
        <form action="{{ route('admin.member.edit.post', ['id' => $user->id]) }}" method="POST">
            @csrf
            <input type="hidden" id="idMember" value="{{ $user->id }}">
            <div class="form-group">
                <label>@lang('messages.email')</label>
                <input type="input" class="form-control email" readonly="readonly" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label>@lang('messages.name')</label>
                <input type="text" class="form-control name" placeholder="Enter name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label>@lang('messages.password')</label>
                <input type="password" class="form-control password" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
                <label>@lang('messages.repassword')</label>
                <input type="password" class="form-control repassword" placeholder="Re-password" name="repassword">
            </div>
            <div class="form-group">
                <label>@lang('messages.address')</label>
                <input type="text" class="form-control address" placeholder="Enter address" name="address"
                    value="{{ $user->address }}">
            </div>
            <div class="form-group">
                <label>@lang('messages.phone')</label>
                <input type="text" class="form-control phone" placeholder="Enter phone" name="phone"
                    value="{{ $user->phone }}">
            </div>
            <button type="submit" class="btn btn-primary">@lang('messages.update')</button>
        </form>
    </div>
@endsection
@section('script')
    {!! HTML::script(mix('js/editMember.js')) !!}
@endsection

@extends('admin.index')

@section('admin-content')
    <table class="table">
        <thead>
            <tr>
                <th>@lang('messages.name')</th>
                <th>@lang('messages.email')</th>
                <th>@lang('messages.address')</th>
                <th>@lang('messages.phone')</th>
                <th>@lang('messages.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="{{ route('admin.member.edit', ['id' => $user->id]) }}" class="text-decoration-none">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a href="/" class="text-decoration-none">
                            <i class="fas fa-backspace"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    {!! HTML::script(mix('js/updateWord.js')) !!}
@endsection

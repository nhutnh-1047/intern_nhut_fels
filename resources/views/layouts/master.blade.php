<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('../../asset/style/process.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@lang('messages.title')</title>
</head>

<body>
    @include('layouts.nav')
    <div class="container-fluid">
        <div class="row">
            @if (!Request::is('profile') && !Request::is('words') && !Request::is('lesson'))
                <div class="col-xl-2 mt-2">
                    @include('layouts.category')
                </div>
                <div class="col-xl-10">
                    @yield('content')
                </div>
            @else
                <div class="col-xl-12">
                    @yield('content')
                </div>
            @endif
        </div>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>@lang('messages.footer')</small>
        </div>
    </footer>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('script')

</html>

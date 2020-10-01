<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <h1>@lang('messages.title')</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{!!  route('user.change-language', ['en']) !!}">English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!!  route('user.change-language', ['vi']) !!}">Vietnam</a>
                </li>
            </ul>
            @guest
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">@lang('messages.login')</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">@lang('messages.register')</a>
                        </li>
                    @endif
                </ul>
            @else
            <div class="dropdown">
                <input type="image" src="{{ asset('/../../../asset/img/avatar.png') }}" width="50" height="50"
                    class="dropdown-toggle rounded-circle" data-toggle="dropdown" />
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">@lang('messages.my_profile')</a>
                    <a class="dropdown-item" href="#">@lang('messages.word_list')</a>
                    <a class="dropdown-item" href="{{ route('lesson.my.get') }}">@lang('messages.lesson')</a>
                    <a class="dropdown-item" href="{{ route('user.logout') }}">@lang('messages.logout')</a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</nav>

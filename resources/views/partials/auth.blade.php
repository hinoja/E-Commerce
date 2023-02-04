@guest

    {{-- <div class="row">
        <div class="2000px"><a style="float: left; " href="http://" class="col-sm-6 btn btn-dark">Register</a><a href="http://" class="col-sm-6 btn btn-dark">Login</a></div>
        <div></div>
    </div> --}}
    {{-- <style>
        ul.float-right li a:hover {
            background-color: #58ba2b;
        }

        header.full-width #navigation ul.float-right {
            right: 35px;
        }

        ul.float-right li a {
            background-color: #f0f0f0;
            color: #333;
        }

        ul.float-right li a:hover,
        .menu ul li.sfHover a.sf-with-ul,
        .menu ul li a:hover {
            background-color: #505050;
            color: #fff;
        }

        ul.float-right li {
            display: inline-block;
            widows: ;
        }

        ul.float-right {
            top: 0
        }

        ul.float-right {
            position: relative;
            text-transform: uppercase;
            font-weight: 600;
            display: inline-block;
            width: 100%;
            right: 0;
        }
        header ul.float-right { right: 35px; }
    </style> --}}



    {{-- <div class="dropdown"> --}}
        {{-- <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"></button> --}}
        {{-- <div class="dropdown-menu"> --}}
            @if (Route::has('login'))
                <a class="btn btn-success "  href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                <a class="btn btn-success ml-2"   href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        {{-- </div> --}}
    {{-- </div> --}}
@else
    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"
            aria-expanded="false">{{ Auth::user()->name }}</button>
        <div class="dropdown-menu">
            {{-- <a class="dropdown-item" href="  {{ route('logout') }}">   {{ __('Log Out') }}</a> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

        </div>
    </div>
@endguest

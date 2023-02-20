<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none header__icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="m20 36.667-15-8.5V11.542l15-8.209 15 8.209v16.625ZM15.208 15.75q.959-.958 2.209-1.542 1.25-.583 2.583-.583 1.333 0 2.583.583 1.25.584 2.209 1.542l5.916-3.417L20 6.542 9.292 12.333Zm3.417 16.958V26.25q-2.208-.583-3.604-2.292Q13.625 22.25 13.625 20q0-.458.042-.917.041-.458.208-.875l-6.083-3.583v11.917ZM20 23.625q1.5 0 2.562-1.063Q23.625 21.5 23.625 20q0-1.5-1.063-2.562Q21.5 16.375 20 16.375q-1.5 0-2.562 1.063Q16.375 18.5 16.375 20q0 1.5 1.063 2.562Q18.5 23.625 20 23.625Zm1.375 9.083 10.833-6.166V14.625l-6.083 3.583q.167.417.208.875.042.459.042.917 0 2.25-1.396 3.958-1.396 1.709-3.604 2.292Z"/></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @foreach($menuRoutes as $route)
                <li><a href='{{$route->getHref()}}' class="nav-link px-2 text-white {{$route->isCurrentRoute ? 'menu-active' : ''}}">{{$route->getTitle()}}</a></li>
                @endforeach
            </ul>
            @guest
                <div class="text-end">
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            @endguest
            @auth
                <li class="nav-item dropdown user-bar">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        @if(Auth::user()->is_admin)
                            <a class="dropdown-item" href="{{ route('admin/index') }}">
                                Админка
                            </a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
        </div>
    </div>
</header>

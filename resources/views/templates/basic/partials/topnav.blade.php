@php
    $sidenav = json_decode($sidenav);

    $routesData = [];
    foreach (\Illuminate\Support\Facades\Route::getRoutes() as $route) {
        $name = $route->getName();
        if (strpos($name, 'reviewer') !== false) {
            $routeData = [
                $name => url($route->uri()),
            ];
            $routesData[] = $routeData;
        }
    }
@endphp

<nav class="navbar-wrapper bg--dark d-flex">
    {{-- <div class="navbar__left"> --}}
           
    {{-- </div> --}}

    <div class="navbar__right d-flex justify-content-between">
        <button type="button" class="res-sidebar-open-btn me-3"><i class="las la-bars"></i></button>   

        <ul class="navbar__action-list">
            <li class="dropdown d-flex profile-dropdown">
                <button type="button" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="navbar-user">
                        @auth
                            @php
                                $user = auth()->user();
                            @endphp

                            <span class="navbar-user">
                                <span class="navbar-user__thumb"><img
                                        src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, null, 'user') }}"
                                        alt="{{ $user->username }}"></span>
                                <span class="navbar-user__info">
                                    <span class="navbar-user__name">{{ $user->username }}</span>
                                </span>
                            </span>
                        @else
                            <span class="navbar-user__thumb">
                                <img src="{{ getImage('assets/images/avatar.png', null, 'user') }}" alt="image">
                            </span>
                            <span class="navbar-user__info">
                                <span class="navbar-user__name">@lang('Login')</span>
                            </span>
                        @endauth

                        <span class="icon">
                            <i class="las la-chevron-circle-down"></i>
                        </span>
                    </span>
                </button>
                @auth
                    <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                        <a href="{{ route('user.profile') }}"
                            class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                            <i class="dropdown-menu__icon las la-user-circle"></i>
                            <span class="dropdown-menu__caption">@lang('Profile')</span>
                        </a>

                        <a href="{{ route('user.password') }}"
                            class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                            <i class="dropdown-menu__icon las la-key"></i>
                            <span class="dropdown-menu__caption">@lang('Password')</span>
                        </a>

                        <a href="{{ route('user.logout') }}"
                            class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                            <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                            <span class="dropdown-menu__caption">@lang('Logout')</span>
                        </a>
                    </div>
                @else
                    <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                        <a href="{{ route('user.auth.login') }}"
                            class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                            <i class="dropdown-menu__icon las la-sign-in-alt"></i>
                            <span class="dropdown-menu__caption">@lang('Login')</span>
                        </a>
                    </div>
                @endauth

                <button type="button" class="breadcrumb-nav-open ms-2 d-none">
                    <i class="las la-sliders-h"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>

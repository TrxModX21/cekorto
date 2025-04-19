@extends('templates.basic.layouts.master')

@section('content')
    @php
        $sidenav = file_get_contents(resource_path('views/templates/basic/partials/sidenav.json'));
    @endphp

    @if (!request()->routeIs('user.auth.*'))
        <div class="page-wrapper default-version">
            @include('templates.basic.partials.sidenav')
            @include('templates.basic.partials.topnav')

            <div class="body-wrapper">
                <div class="bodywrapper__inner">
                    @stack('topBar')

                    @if (!request()->routeIs('home'))
                        @include('templates.basic.partials.breadcrumb')
                    @endif

                    @yield('panel')
                </div>
            </div>
        </div>
    @else
        <main class="for-blur">
            @yield('panel')
        </main>
    @endif
@endsection

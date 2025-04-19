@php
    $sideBarLinks = json_decode($sidenav);
    $role = auth('admin')->user()->role;

    // Filter menu berdasarkan role
    if ($role !== 'superadmin') {
        unset($sideBarLinks->manage_staffs);
        unset($sideBarLinks->manage_users);
        unset($sideBarLinks->report);
        unset($sideBarLinks->system_setting);
        unset($sideBarLinks->extra);
    }
@endphp

<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{ route('admin.dashboard') }}" class="sidebar__main-logo"><img src="{{ siteLogo('dark') }}"
                    alt="image"></a>
        </div>
        <div class="sidebar__menu-wrapper">
            <ul class="sidebar__menu">
                @foreach ($sideBarLinks as $key => $data)
                    @if (@$data->submenu)
                        <li class="sidebar-menu-item sidebar-dropdown">
                            <a href="javascript:void(0)" class="{{ menuActive(@$data->menu_active, 3) }}">
                                <i class="menu-icon {{ @$data->icon }}"></i>
                                <span class="menu-title" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="{{ __($data->title) }}">{{ __(Str::limit(@$data->title, 18, '...')) }}</span>
                                @foreach (@$data->counters ?? [] as $counter)
                                    @if ($$counter > 0)
                                        <span class="menu-badge menu-badge-level-one bg--warning ms-auto">
                                            <i class="fas fa-exclamation"></i>
                                        </span>
                                        @break
                                    @endif
                                @endforeach
                            </a>
                            <div class="sidebar-submenu {{ menuActive(@$data->menu_active, 2) }} ">
                                <ul>
                                    @foreach ($data->submenu as $menu)
                                        @php
                                            $submenuParams = null;
                                            if (@$menu->params) {
                                                foreach ($menu->params as $submenuParamVal) {
                                                    $submenuParams[] = array_values((array) $submenuParamVal)[0];
                                                }
                                            }
                                        @endphp
                                        <li class="sidebar-menu-item {{ menuActive(@$menu->menu_active) }} ">
                                            <a href="{{ route(@$menu->route_name, $submenuParams) }}" class="nav-link">
                                                <i class="menu-icon las la-dot-circle"></i>
                                                <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __($menu->title) }}"
                                                    class="menu-title">{{ __(Str::limit($menu->title, 15, '...')) }}</span>
                                                @php $counter = @$menu->counter; @endphp
                                                @if (@$$counter)
                                                    <span
                                                        class="menu-badge bg--info ms-auto">{{ @$$counter }}</span>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        @php
                            $mainParams = null;
                            if (@$data->params) {
                                foreach ($data->params as $paramVal) {
                                    $mainParams[] = array_values((array) $paramVal)[0];
                                }
                            }
                        @endphp
                        <li class="sidebar-menu-item {{ menuActive(@$data->menu_active) }}">
                            <a href="{{ route(@$data->route_name, $mainParams) }}" class="nav-link ">
                                <i class="menu-icon {{ $data->icon }}"></i>
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __($data->title) }}"
                                    class="menu-title">{{ __(Str::limit(@$data->title, 18, '...')) }}</span>
                                @php $counter = @$data->counter; @endphp
                                @if (@$$counter)
                                    <span class="menu-badge bg--info ms-auto">{{ @$$counter }}</span>
                                @endif
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="version-info text-center text-uppercase">
            <span class="text--primary">{{ __(systemDetails()['name']) }}</span>
            <span class="text--success">@lang('V'){{ systemDetails()['version'] }} </span>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
    <script>
        if ($('li').hasClass('active')) {
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            }, 500);
        }
    </script>
@endpush

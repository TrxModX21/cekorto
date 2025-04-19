<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ gs()->siteName($pageTitle ?? '') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ siteFavicon() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}">

    @stack('style-lib')

    <link rel="stylesheet" href="{{ asset('assets/templates/basic/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/select2.min.css') }}">

    @if (!request()->routeIs('user.auth.*'))
        <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    @else
        <link href="{{ asset('assets/templates/basic/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/templates/basic/css/custom.css') }}" rel="stylesheet">
    @endif

    @stack('style')
</head>

<body>
    @if (request()->routeIs('user.auth.*'))
        <div class="preloader">
            <div class="preloader__img">
                <img src="{{ siteFavicon() }}" alt="@lang('Preloader')">
            </div>
        </div>

        <div class="back-to-top">
            <span class="back-top">
                <i class="las la-angle-double-up"></i>
            </span>
        </div>
    @endif

    @yield('content')

    <script src="{{ asset('assets/global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/bootstrap-toggle.min.js') }}"></script>

    <script src="{{ asset('assets/global/js/nicEdit.js') }}"></script>
    <script src="{{ asset('assets/global/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/templates/basic/js/slick.js') }}"></script>

    @if (!request()->routeIs('user.auth.*'))
        <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    @else
        <script src="{{ asset('assets/templates/basic/js/slick.js') }}"></script>
        <script src="{{ asset('assets/templates/basic/js/app.js') }}"></script>
    @endif

    @stack('script-lib')

    @include('partials.notify')

    @php echo loadExtension('tawk-chat') @endphp

    {{-- LOAD NIC EDIT --}}
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });

            var inputElements = $('[type=text],[type=password],select,textarea');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $.each($('input:not([type=checkbox]):not([type=hidden]), select, textarea'), function(i, element) {
                if (element.hasAttribute('required')) {
                    $(element).closest('.form-group').find('label').addClass('required');
                }
            });
        })(jQuery);
    </script>

    @stack('script')

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('inc.head')
<body class="fixed-left">
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<div id="wrapper">
    @include('inc.left-sidebar')

    <div class="content-page">
        <div class="content">
            @include('inc.dashboard-topbar')
            @yield('content-wrapper')
            @include('inc.dashboard-footer')
        </div>
    </div>
</div>
@include('inc.dashboard-scripts')

</body>
</html>

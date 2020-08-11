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
<div class="accountbg"></div>
<div class="wrapper-page">
    @yield('content')
</div>
@include('inc.auth-scripts')
</body>
</html>

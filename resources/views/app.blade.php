<!DOCTYPE html>
<html>
<head>
    <title>MyLogBook</title>

    <link rel="stylesheet" href="/assets/css/theme.css">
    <link rel="stylesheet" href="/assets/css/third-party.css">
    <script src="/assets/js/app.js"></script>

</head>

<body>
<header>
    @include('partials.nav.nav')
</header>
<main>
    <div class="container-fluid">
        <div class="col-md-12">
            @include('flash::message')
            @yield('content')
        </div>
    </div>
</main>
<footer>
    @yield('inline_scripts')
    @include('partials.footer')
</footer>

</body>
</html>
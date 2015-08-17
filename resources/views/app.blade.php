<!DOCTYPE html>
<html>
<head>
    <title>MyLogBook</title>

    <link rel="stylesheet" href="/css/all.css">
    <script src="/js/all.js"></script>

</head>

<body>
<header>
    @include('partials.nav.nav')
</header>
<main>
    <div class="container-fluid">
        @include('flash::message')
        @yield('content')
    </div>
</main>
<footer>
    @yield('inline_scripts')
    @yield('footer')
</footer>

</body>
</html>
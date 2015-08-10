<!DOCTYPE html>
<html>
<head>
    <title>MyLogBook</title>

    <link rel="stylesheet" href="/css/all.css">

</head>

<body>
<header>
    @include('partials.nav')
</header>
<main>
    <div class="container-fluid">
        @include('flash::message')
        @yield('content')
    </div>
</main>
<footer>
    <script src="/js/all.js"></script>
    @yield('footer')
</footer>

</body>
</html>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">MyLogBook</a>
        </div>
        <div class="collapse navbar-collapse">
            @if(Auth::check())
                @include('partials.nav.user')
            @else
                @include('partials.nav.guest')
            @endif



        </div>
    </div>
</nav>
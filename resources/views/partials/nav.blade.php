<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">MyLogBook</a>
        </div>
        <div class="collapse navbar-collapse">
            @if(Auth::check())
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Log Book</a></li>
                    <li><a href="#">Stats</a></li>
                </ul>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            @else
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Get Started</a></li>
                </ul>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            @endif



        </div>
    </div>
</nav>
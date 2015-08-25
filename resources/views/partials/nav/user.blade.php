<ul class="nav navbar-nav">
    <li>
        <a href={{ url('dashboard') }}>Dashboard</a>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
            Log Book
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('drives.index') }}">
                    <span class="glyphicon glyphicon-road"></span>
                    <span>&nbsp;View Drives</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/vehicles') }}">
                    <i class="icon ion-model-s"></i>
                    <span>&nbsp;Manage Vehicles</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/supervisors') }}">
                    <i class="icon ion-person-stalker"></i>
                    <span>&nbsp;Manage Supervisors</span>
                </a>
            </li>
        </ul>
    </li>
</ul>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
            Welcome, {{$first_name}}
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a href="{{ url('/account/settings') }}">
                    <i class="icon ion-gear-b"></i>
                    <span>&nbsp;Account Settings</span>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ url('/auth/logout') }}">
                    <i class="icon ion-power"></i>
                    <span>&nbsp;Log Out</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
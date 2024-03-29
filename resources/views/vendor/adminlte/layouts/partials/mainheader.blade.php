<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo" style="background: rgb(3, 33, 76)">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>APF</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="font-family: cursive"><b>AdminPanelF</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="background: rgb(3, 33, 76)">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                <!-- User Account Menu -->
                <li class="dropdown user user-menu" id="user_menu" style="max-width: 280px;white-space: nowrap;">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                        style="max-width: 280px;white-space: nowrap;overflow: hidden;overflow-text: ellipsis">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset('/img/masculino.png') }}" class="img-circle" alt="User Image"
                            style="background: white;width: 20px;height: 20px" />
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs" data-toggle="tooltip"
                            title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" id="panel-session">
                        <!-- The user image in the menu -->
                        <li class="user-header" style="height: 150px">
                            <img src="{{ asset('/img/masculino.png') }}" class="img-circle" alt="User Image"
                                style="background: white;width: 50px;height: 50px" />
                            <p>
                                <h5><strong>Login: </strong>{{ $user->name }}</h5>
                                <h5><strong>Email: </strong>{{ $user->email }}</h5>
                                <h5><strong>Rol: </strong>
                                    @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="label label-warning"> {{ $v }} </label>
                                    @endforeach
                                    @endif
                                </h5>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Visualizar Web</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm" id="logout"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="submit" value="logout" style="display: none;">
                                </form>

                            </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
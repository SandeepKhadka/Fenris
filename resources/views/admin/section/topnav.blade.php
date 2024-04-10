<!-- START HEADER-->
<header class="header" style="z-index: 1;">
  
    <div class="flexbox flex-1">
        <div class="page-brand" style="padding: 20px; color: white; text-align: center;">
         
        </div>
        <a class="link" href="{{ route(Auth::user()->role) }}" style="text-decoration: none">
            <span class="">
                <span class="" style="font-size: 30px; ">Fenris</span>
            </span>
        </a>
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link" href="#" id="navbarDropdown" role="button"
                    aria-haspopup="true" aria-expanded="false" onclick="toggleLogoutDropdown()">
                    <i class="fa fa-user" style="margin-right: 10px;"></i>
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropdownMenu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                        <i class="fa fa-power-off"></i>Logout</a>
                    <form action="{{ route('logout') }}" method="post" class="" id="logout_form">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
<!-- END HEADER-->



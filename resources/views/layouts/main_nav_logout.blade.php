<nav class="navbar navbar-expand-lg MainNav">
    <!--navbar-light bg-light-->
    <div class="container">
        <a class="navbar-brand SingleMenu LogoImg" href="/" style="background-image: url('{{ URL::asset('assets/img/logo/logo.png') }}')">
            {{--<img src="" class="LogoImg">--}}
        </a>
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
            <span> </span>
            <span> </span>
            <span> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link SingleMenu" href="/"><i class="fas fa-home IconRight"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link SingleMenu" href="{{url('home')}}"><i class="fas fa-user IconRight"></i> {{ Auth::user()->member_name }}</a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item nav-link SingleMenu" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-user-lock IconRight"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

                {{--<li class="nav-item dropdown DropDownDesktop">--}}
                {{--<a class="nav-link dropdown-toggle NavLinkMainDropDown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Dropdown link--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu MainDropDownMenu" aria-labelledby="navbarDropdownMenuLink">--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Action</a>--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Another action</a>--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Something else here</a>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown DropDownDesktop">--}}
                {{--<a class="nav-link dropdown-toggle NavLinkMainDropDown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Set Two--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropright MainDropDownMenu" aria-labelledby="navbarDropdownMenuLink">--}}
                {{--<a class="dropdown-item  dropdown-toggle RightDropDownDesktop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Set Action</a>--}}
                {{--<div class="dropdown-menu RightDropDownMenu">--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Here 1</a>--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Here action</a>--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Here else here</a>--}}
                {{--</div>--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Another action</a>--}}
                {{--<a class="dropdown-item SingleMenu" href="#">Something else here</a>--}}
                {{--</div>--}}
                {{--</li>--}}

            </ul>
        </div>
    </div>
</nav>
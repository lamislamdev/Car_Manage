<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <ul class="contact_detail text-center text-lg-start">
                            <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                            <li><i class="ti-email"></i><span>info@cars.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <ul class="header_list">

                            @if(Cookie::get('token') !== null)
                                <li><a href="{{url("/dashboard")}}"> <i class="linearicons-user"></i>Dashboard</a></li>
                                <li><a class="btn btn-danger btn-sm" href="{{url("/logout")}}"> Logout</a></li>
                            @else
                                <li><a class="btn btn-danger btn-sm" href="{{url("/login")}}">Login</a></li>
                                <li><a class="btn btn-danger btn-sm" href="{{url("/register")}}">Singup</a></li>
                            @endif



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{url("/")}}">
                    <img class="logo_dark" src="assets/images/logo_dark.png." alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item" href="{{url("/")}}">Home</a></li>
                        <li><a class="nav-link nav_item" href="{{url("/")}}">About</a></li>
                        <li class="dropdown">
                            <a class=" nav-link" href="{{url("/car-list")}}" data-bs-toggle="nun">Rentals</a>
                            <div class="dropdown-menu">
                                <ul id="CategoryItem">

                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item" href="#"><i class="ti-contact"></i> Contact </a></li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

{{----}}

<body>
    <!--=============================
        MAIN MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container container_large">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/images/Viceroy_Realty_logo_V2-03.png') }}" alt="FaxEstate" class="img-fluid" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars bar_icon"></i>
                <i class="far fa-times close_icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('frontend.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buy') }}">Buy Property </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rent') }}">Rent Property </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('holiday') }}">Estate Management </a>
                    </li>
                    <li class="nav-item drop001">
                        <a class="nav-link" href="{{ route('about') }}">about us</a>
                    </li>
                    <li class="nav-item drop003">
                        <a class="nav-link" href="{{ route('realtors') }}">Our Realtors</a>
                    </li>
                    <li class="nav-item drop003">
                        <a class="nav-link" href="{{ route('brand') }}">Our Brands </a>
                    </li>
                    <li class="nav-item drop003">
                        <a class="nav-link" href="{{ route('testimonials') }}">Tetimonials</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <div class="drop002">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('realtors') }}">Our Realtors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('brand') }}">Our Brands </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('testimonials') }}">Tetimonials</a>
                        </li>

                    </div>
                </ul>

                <ul class="menu_right d-flex align-items-center">
                    @guest
                        <li>
                            <a class="user_icon" href="{{ route('login') }}">
                                <span>
                                    <img src="{{ asset('assets/images/user_icon_1.png') }}" alt="user"
                                        class="img-fluid w-100" />
                                </span>
                                Login
                            </a>
                        </li>
                    @endguest

                    @auth
                        <li>
                            <a class="user_icon" href="{{ route('login') }}">

                            </a>


                            <!-- <ul>
                                @can('view_backend')<li><a>Admin</a></li>@endif
                                <li><a href="{{ route('frontend.users.profile') }}">Profile</a></li>
                                <li><form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}

                                    <button class="btn btn-text" type="submit">Logout</button>
                                </form></li>
                            </ul> -->

                            <div class="dropdown">
                                <button class="dropdown-btn"> <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->first_name }} </button>
                                <div class="dropdown-content">
                                    @can('view_backend') <a>Admin</a>@endif
                                    <a href="{{ route('frontend.users.profile') }}"> Profile</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-text" type="submit">Logout</button>
                                    </form>
                                </div>
                            </div>

                        </li>
                    @endauth

                    <li>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="content">
                                <div class="test-cart" id='cart'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <p class="notify001" id="cartCount">
                                        {{ session()->has('cart') ? count(session('cart')) : 0 }}
                                    </p>
                                </div>

                            </div>
                            <div>
                                <select name="currency" id="currency">
                                    @foreach (App\Models\Currency::get(); as $currency)
                                        <option value="{{ $currency->code }}"
                                            {{ $currency->code == request()->session()->get('currency') ? 'selected' : '' }}
                                            >{{ $currency->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>

        </div>


        <style>
            /* Dropdown Button */
            .dropdown-btn {
                background-color: #fff;
                border: none;
                cursor: pointer;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            /* Links Inside the Dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change Color of Links on Hover */
            .dropdown-content a:hover {
                background-color: #ddd;
            }

            /* Show the Dropdown Content When Hovered Over Dropdown Button */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            button.dropdown-btn {
                color: #ffffff;
                background-color: black;
            }

            .dropdown {
                margin-top: -20px;
            }
            .content {

                position: relative !important;
                width: 100px !important;
                z-index: 1 !important;
            }
            p.notify001 {
                top: -15px !important;
            }
            select#currency {
                background-color: #e6b025;
                padding: 5px;
                border-radius: 5px;
                font-weight: 700;
                margin-left: -25px
            }
        </style>

        @include('frontend.includes.script')
    </nav>

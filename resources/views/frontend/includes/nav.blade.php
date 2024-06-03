<body>
    <!--=============================
        MAIN MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container container_large">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/images/logo_1.png') }}" alt="FaxEstate" class="img-fluid" />
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
                        <a class="nav-link" href="{{ route('holiday') }}">Holiday Rental </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">about us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
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
                                <button class="dropdown-btn"> <i class="fa fa-user" aria-hidden="true"></i> Hello
                                    {{ Auth::user()->last_name }} </button>
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
                        <div class="content">
                            <div class="test-cart" id='cart'>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <script>
            function RemoveFromCart(id) {
                $.ajax({
                    url: '/cart/delete',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        $('#cartItems').html('');
                        $.each(response.CartDetails, function(key, cartItem) {
                            console.log(cartItem);

                            $('#cartItems').prepend(
                                '<li class="grid_4 item container">' +
                                '<div class="preview">' +
                                '<img style="width: 100px;" src="/public/' + cartItem.image + '">' +
                                '</div>' +
                                '<div class="details" data-price="' + cartItem.price + '">' +
                                '<h3>' + cartItem.title + '</h3>' +
                                '</div>' +
                                '<div class="inner_container">' +
                                '<div class="col_1of2 align-center picker">' +
                                '<p><a href="#" onclick="RemoveFromCart(' + cartItem.id + ')" class="btn-remove">' +
                                '<i class="far fa-trash-alt"></i></a></p>' +
                                '</div>' +
                                '</div>' +
                                '</li>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });

            }
            $(document).ready(function() {

                $.ajax({
                    url: '/cart/view',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {

                        var responseData = JSON.parse(response);

                        $('#cartItems').html('');

                        $.each(responseData.CartDetails, function(key, val) {

                            var cartItems = val;

                            //console.log(cartItems);

                            $('#cartItems').prepend(
                                '<li class="grid_4 item container"><div class="preview">   <img style="width: 100px;" src="/public/' +
                                cartItems.image +
                                '"></div>                 <div class="details" data-price="15.50"><h3>' +
                                cartItems.title +
                                '</h3>      </div><div class="inner_container"><div class="col_1of2 align-center picker"><p><a href="#" OnClick="RemoveFromCart(' +
                                cartItems.id +
                                ')" class="btn-remove"><i class="far fa-trash-alt"></i></a></p></div></div></li>'
                            );

                        });

                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        </script>

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
        </style>


    </nav>

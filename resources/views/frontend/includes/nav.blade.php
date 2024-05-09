<body>
    <!--=============================
        MAIN MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
      <div class="container container_large">
        <a class="navbar-brand" href="/">
          <img
            src="assets/images/logo_1.png"
            alt="FaxEstate"
            class="img-fluid"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
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
                  <img
                    src="assets/images/user_icon_1.png"
                    alt="user"
                    class="img-fluid w-100"
                  />
                </span>
                Login
              </a>
            </li>
            @endguest

            @auth
            <li>
                <a class="user_icon" href="{{ route('login') }}">
                  <span>
                   
                  </span>
                  
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
    <button class="dropdown-btn"> <i class="fa fa-user" aria-hidden="true"></i>  Hello  {{ Auth::user()->last_name }} </button>
    <div class="dropdown-content">
        <a href="#">Admin</a>
        <a href="https://viceroy.ultimatetrueweb.com/profile">Profile</a>
        <form id="logout-form" action="https://viceroy.ultimatetrueweb.com/logout" method="POST">
            <input type="hidden" name="_token" value="acju7g63D9AE8VVQADoqm8zXJh8bGehQPD0FSae8" autocomplete="off">
            <button class="btn btn-text" type="submit">Logout</button>
        </form>
    </div>
</div>

              </li>
            @endauth


            <li>
              <a class="user_icon" href="">
                <span>
                  <img
                    src="assets/images/h2.png"
                    alt="user"
                    class="img-fluid w-100"
                  />
                </span>
                Cart
              </a>
            </li>
            <!-- <li>
                        <a class="user_icon" href="login.html">
                            <span> <img src="assets/images/h1.png" alt="user" class="img-fluid w-100">
                            </span>
                            Save
                        </a>
                    </li>-->
            <!--<li class="manu_btn">
                        <a class="common_btn" href="dashboard_add_property.html">Add Listing</a>
                    </li>-->
            <!--<li class="manu_btn">
                        <a class="common_btn" href="dashboard_add_property.html">Add Listing</a>
                    </li>-->
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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
    </style>


    </nav>

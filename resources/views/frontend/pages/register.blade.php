@extends('frontend.layouts.app')

@section('title')
    {{ app_name() }}
@endsection

@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/breadcrumbs_bg.jpg);">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Registration</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Registration</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                BREADCRUMBS END
            ==============================-->


    <!--=============================
                REGISTRATION  START
            ==============================-->
    <section class="login_area registration pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-lg-8 col-xl-11">
                    <div class="main_login_area">
                        <div class="row">
                            <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="login_text">
                                    <h4>Registration</h4>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="single_input">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                        <div class="single_input">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="single_input">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" placeholder="********">
                                            <span class="show_password" data-target="password">
                                                <i class="far fa-eye open_eye"></i>
                                                <i class="far fa-eye-slash close_eye"></i>
                                            </span>
                                        </div>
                                        <div class="single_input">
                                            <label>Confirm password</label>
                                            <input type="password" name="password_confirmation" id="confirm_password" placeholder="********"
                                                id="password">
                                            <span class="show_password"  data-target="confirm_password">
                                                <i class="far fa-eye open_eye"></i>
                                                <i class="far fa-eye-slash close_eye"></i>
                                            </span>
                                        </div>
                                        <button class="common_btn" type="submit">Registration </button>
                                    </form>


                                    <p>Don’t you have an account? <a href="{{ route('login') }}">login</a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block wow fadeInRight" data-wow-duration="1.5s">
                                <div class="login_img">
                                    <img src="assets/images/login_bg.jpg" alt="img" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.show_password').forEach(function(span) {
                span.addEventListener('click', function() {
                    var targetId = this.getAttribute('data-target');
                    var passwordField = document.getElementById(targetId);
                    var openEyeIcon = this.querySelector('.open_eye');
                    var closeEyeIcon = this.querySelector('.close_eye');

                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                        openEyeIcon.style.display = 'none';
                        closeEyeIcon.style.display = 'inline';
                    } else {
                        passwordField.type = 'password';
                        openEyeIcon.style.display = 'inline';
                        closeEyeIcon.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection

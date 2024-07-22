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
                            <h1>Login</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Login</a></li>
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
                                    LOGIN START
                                ==============================-->
    <section class="login_area pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-8 col-xl-11">
                    <div class="main_login_area">
                        <div class="row">
                            <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class=" login_text">
                                    <h4>Login</h4>
                                    <?php if ($errors->has('email')): ?>
                                    <span class="error"><?php echo $errors->first('email'); ?></span>
                                    <?php endif; ?>
                                    <?php if ($errors->has('password')): ?>
                                    <span class="error"><?php echo $errors->first('password'); ?></span>
                                    <?php endif; ?>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="single_input">

                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Email">

                                        </div>
                                        <div class="single_input">

                                            <label>Password</label>
                                            <input type="password" name="password" id="password" placeholder="********">
                                            <span class="show_password">
                                                <i class="far fa-eye open_eye"></i>
                                                <i class="far fa-eye-slash close_eye"></i>
                                            </span>
                                        </div>
                                        <div
                                            class="single_input d-flex flex-wrap align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember me
                                                </label>
                                            </div>
                                            <a class="forget_password" href="{{ route('password.email') }}">Forgot password ?</a>
                                        </div>
                                        <button class="common_btn" type="submit">Login</button>
                                    </form>

                                    <p>Don’t you have an account? <a href="{{ route('register') }}">Register</a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block wow fadeInRight" data-wow-duration="1.5s">
                                <div class=" login_img">
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
            document.querySelector('.show_password').addEventListener('click', function() {
                var passwordField = document.getElementById('password');
                var openEyeIcon = document.querySelector('.open_eye');
                var closeEyeIcon = document.querySelector('.close_eye');

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
    </script>
@endsection

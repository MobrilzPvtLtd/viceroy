@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')

<meta name="description" content="test">
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />

@endsection

@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/top_banner_about.jpg); background-position: top !important;">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>About us</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">About us</a></li>
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
            ABOUT US PAGE START
        ==============================-->
    <section class="about_area pt_80 pb_60 xs_pt_100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-sm-6 wow fadeInLeft" data-wow-duration="1.5s">
                            <div class="about_area_img_1 z001">
                                <img src="assets/images/Picture 1 .jpg" alt="img" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <div class="about_area_img_2 z002 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="assets/images/pictue 2 .jpg" alt="img" class="img-fluid w-100">
                            </div>
                            <div class="about_area_img_3 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="assets/images/picture 3.jpg" alt="img" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 wow fadeInRight" data-wow-duration="1.5s">
                    <div class="about_text">
                        <div class="section_heading section_heading_left">
                            <h2>Unlocking Opportunities. Exceeding Expectations.</h2>
                        </div>
                        <p>Welcome home! Whether you're a seasoned investor or a first-time buyer, we understand that finding the perfect property is a journey! At Viceroy Realty, we are here to guide you every step of the way. Browse through our extensive listings, explore vibrant neighbourhoods and connect with our team of dedicated realtors. Let's turn your dream into your reality.</p>

                        <h4 class="pt-4">And why just stop there?</h4>
                                                <ul class="d-flex flex-wrap pt_15">
                        <p>Unlock the Potential of Your Home… by availing of our Holiday Home rental management services. We can transform your vacation home into a thriving business thereby allowing you to maximise rental income, simplify guest communication and also ensure a seamless guest experience.</p>
                        <p>Imagine turning your underutilised property into a source of consistent income and joy for travellers. You would have the benefits of professional booking and inquiry management thereby freeing up your time along with top-notch cleaning, maintenance and guest support for worry-free rentals.</p>


                        {{-- <ul class="d-flex flex-wrap pt_15">
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_1.png" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Sell your home</h6>
                                    <span>Free Services</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_2.png" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Buy a home</h6>
                                    <span>No fees asked</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_3.png" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Free Appraisal</h6>
                                    <span>No fees asked</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_4.png" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Free Photoshoot</h6>
                                    <span>Professional services</span>
                                </div>
                            </li>
                        </ul> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="find_state" style="background: url(assets/images/find_state.jpg);">
        <div id="vbg12" data-vbg-loop="true" data-vbg="https://youtu.be/ec_fXMrD7Ow?si=m9LJu9X3lzTP5Erz">
        </div>
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-12">
                    <div class="find_state_text">
                        <h2>Residential</h2>
                        <a href="#">Discover The Project<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="find_state mt_115" style="background: url() ; height : 30vw;">

        <div class="video_player_div" style="position : relative; width : 100vw ; height : 30vw ; overflow : hidden ;">
            <video style="margin-top : -12vw ; width : 100vw ; height:auto ; position : absolute; z-index : 5 ; " data-vbg-loop="true"
                src="http://viceroy.ultimatetrueweb.com/assets/videos/198898-909564555.mp4" autoplay muted loop></video>


            <div class="container" style="position: absolute ; z-index : 10 ; transform : translate(0 , 0);">

                <div class="row wow fadeInUp"  data-wow-duration="1.5s">
                    <div class="col-xl-12">
                        <div class="find_state_text">
                            <h2 style="color:#e6b025;">Residential</h2>
                            <a href="#">Discover The Project<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--=============================
            PARTNER END
        ==============================-->
@endsection

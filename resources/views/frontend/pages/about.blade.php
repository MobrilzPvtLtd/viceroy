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
                            <div class="about_area_img_1">
                                <img src="assets/images/about_1.jpg" alt="img" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <div class="about_area_img_2 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="assets/images/about_2.jpg" alt="img" class="img-fluid w-100">
                            </div>
                            <div class="about_area_img_3 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="assets/images/about_3.jpg" alt="img" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 wow fadeInRight" data-wow-duration="1.5s">
                    <div class="about_text">
                        <div class="section_heading section_heading_left">
                            <h2>We help clients buy and Sell houses since 2001</h2>
                        </div>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <ul class="d-flex flex-wrap pt_15">
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
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="find_state" style="background: url(assets/images/find_state.jpg);">
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
    </section>


    <section class="agent_area pt_60 xs_pt_95 pb_70 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_25">
                        <h2>Our Realtors</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($professionals as $professional)
                    <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="single_agent">
                            <div class="single_agent_img">
                                @if ($professional->image)
                                    <li>
                                        <a href="agencies_details.html">
                                            <img src="{{ asset('public/images/' . $professional->image) }}" alt="img"
                                                class="img-fluid w-100" />
                                        </a>
                                    </li>
                                @else
                                    No Image
                                @endif
                                <div class="single_agent_overly">
                                    {{-- <p>4 listings</p> --}}
                                    {{-- <ul class="d-flex flex-wrap">
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                            <div class="agent_text">
                                <div class="agent_name">
                                    <a class="item_title" href="">{{ $professional->name }}</a>
                                    <span>{{ $professional->post }}</span>
                                </div>
                                <ul class="agent_contact">
                                    <li>
                                        <a href=""><i class="fas fa-phone-alt"></i>
                                            {{ $professional->number }}</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fas fa-envelope"></i>{{ $professional->email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                                    <div class="single_agent">
                                                        <div class="single_agent_img">
                                                            <img src="assets/images/agent_2.jpg" alt="img" class="img-fluid w-100" />
                                                            <div class="single_agent_overly">
                                                                <p>03 listings</p>
                                                                <ul class="d-flex flex-wrap">
                                                                    <li>
                                                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="agent_text">
                                                            <div class="agent_name">
                                                                <a class="item_title" href="#">Nathaneal Down</a>
                                                                <span>Real Estate Broker</span>
                                                            </div>
                                                            <ul class="agent_contact">
                                                                <li>
                                                                    <a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                                                </li>
                                                                <li>
                                                                    <a href="mailto:example@gmail.com"><i
                                                                            class="fas fa-envelope"></i>example@gmail.com</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
                    {{-- <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                                    <div class="single_agent">
                                                        <div class="single_agent_img">
                                                            <img src="assets/images/agent_3.jpg" alt="img" class="img-fluid w-100" />
                                                            <div class="single_agent_overly">
                                                                <p>6 listings</p>
                                                                <ul class="d-flex flex-wrap">
                                                                    <li>
                                                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="agent_text">
                                                            <div class="agent_name">
                                                                <a class="item_title" href="#">Hugh Saturation</a>
                                                                <span>Buying Agent</span>
                                                            </div>
                                                            <ul class="agent_contact">
                                                                <li>
                                                                    <a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                                                </li>
                                                                <li>
                                                                    <a href="mailto:example@gmail.com"><i
                                                                            class="fas fa-envelope"></i>example@gmail.com</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
                    {{-- <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="single_agent">
                                    <div class="single_agent_img">
                                        <img src="assets/images/agent_4.jpg" alt="img" class="img-fluid w-100" />
                                        <div class="single_agent_overly">
                                            <p>10 listings</p>
                                            <ul class="d-flex flex-wrap">
                                                <li>
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="agent_text">
                                        <div class="agent_name">
                                            <a class="item_title" href="#">Lance Bogrol</a>
                                            <span>Sales Executive</span>
                                        </div>
                                        <ul class="agent_contact">
                                            <li>
                                                <a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                            </li>
                                            <li>
                                                <a href="mailto:example@gmail.com"><i
                                                        class="fas fa-envelope"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                @endforeach
            </div>

        </div>

    </section>

    <section class="testimonial pt_60 xs_pt_95 pb_120 xs_pb_100 mt_120 xs_mt_100">
        <div class="container">
            <div class="row justify-content-between align-items-end">
                <div class="col-xxl-4 col-lg-5 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="section_heading section_heading_left">
                        <h2>Feedback From Satisfied Customers.</h2>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeInRight" data-wow-duration="1.5s">
                    <p class="client_feedback_text_right">Client Feedback</p>
                </div>
            </div>
            <div class="row mt_40 slider-for">
                <div class="col-12">
                    <div class="testimonial_item">
                        <div class="row">
                            <div class="col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="testimonial_item_tetle">
                                    <h4>Douglas Lyphe</h4>
                                    <p>Operations Manager - Static Mania</p>
                                </div>
                            </div>
                            <div class="col-lg-8 wow fadeInRight" data-wow-duration="1.5s">
                                <div class="testimonial_description">
                                    <span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni magnam amet
                                        impedit ab odit. Omnis doloribus libero obcaecati, nihil aliquam perspiciatis
                                        facilis deleniti reprehenderit velit voluptate amet ab hic nesciunt ipsa
                                        delectus recusandae provident? Deleniti minus mollitia provident quo dolore?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="testimonial_item">
                        <div class="row">
                            <div class="col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="testimonial_item_tetle">
                                    <h4>Douglas Lyphe</h4>
                                    <p>Operations Manager - Static Mania</p>
                                </div>
                            </div>
                            <div class="col-lg-8 wow fadeInRight" data-wow-duration="1.5s">
                                <div class="testimonial_description">
                                    <span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni magnam amet
                                        impedit ab odit. Omnis doloribus libero obcaecati, nihil aliquam perspiciatis
                                        facilis deleniti reprehenderit velit voluptate amet ab hic nesciunt ipsa
                                        delectus recusandae provident? Deleniti minus mollitia provident quo dolore?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="testimonial_item">
                        <div class="row">
                            <div class="col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="testimonial_item_tetle">
                                    <h4>Douglas Lyphe</h4>
                                    <p>Operations Manager - Static Mania</p>
                                </div>
                            </div>
                            <div class="col-lg-8 wow fadeInRight" data-wow-duration="1.5s">
                                <div class="testimonial_description">
                                    <span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni magnam amet
                                        impedit ab odit. Omnis doloribus libero obcaecati, nihil aliquam perspiciatis
                                        facilis deleniti reprehenderit velit voluptate amet ab hic nesciunt ipsa
                                        delectus recusandae provident? Deleniti minus mollitia provident quo dolore?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none d-lg-block wow fadeInLeft" data-wow-duration="1.5s">
                <div class="col-xl-3">
                    <div class="testimonial_img_area">
                        <div class="row slider-nav">
                            <div class="col-xl-4">
                                <div class="testimonial_img_item">
                                    <img src="assets/images/testimonial_img_1.png" alt="testimonail"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="testimonial_img_item">
                                    <img src="assets/images/testimonial_img_2.png" alt="testimonail"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="testimonial_img_item">
                                    <img src="assets/images/testimonial_img_3.png" alt="testimonail"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="testimonial_img_item">
                                    <img src="assets/images/testimonial_img_4.png" alt="testimonail"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partner_area pt_30 pb_30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="section_heading mb_25">
                        <h2>Our Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">

                <div class="col-xl-12">
                    <div class="marquee_animi">
                        <ul class="single_partner">
                            <li><a href="agencies_details.html"><img src="assets/images/partner_1.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_10.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_3.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_4.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_5.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_6.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_7.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_8.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_9.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_10.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            PARTNER END
        ==============================-->
@endsection

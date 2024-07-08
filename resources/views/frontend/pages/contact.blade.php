@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')

<meta name="description" content="test">
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
@endsection


@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/breadcrumbs_bg.jpg);">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Contact Us</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Contact Us</a></li>
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
                        CONTACT START
                    ==============================-->
    <section class="contact_area pt_40 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="section_heading mb_25">
                    <h2>Our Location</h2>
                </div>

            </div>



            <div class="row">
                <div class="col-xxl-4 col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact_address">

                        <ul>
                            <li>
                                <span><img src="assets/images/location.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>United Kingdom - London</p>
                                    <a class="item_title" href="#">Friern Barnet Road, London,
                                        United Kingdom.</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/call.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Request a call back</p>
                                    <a class="item_title" href="#">Tel: +44 2081445737</a>
                                    <a class="item_title" href="#">
                                        Mobile/WA: +44 7466 8397256</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/massage_3.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Email with us</p>
                                    <a class="item_title" href="#">sales@nanjgelgreen.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-xxl-4 col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact_address">

                        <ul>
                            <li>
                                <span><img src="assets/images/location.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>United Arab Emirates - Abu Dhabi</p>
                                    <a class="item_title" href="#">Office # 602, 6th Floor,
                                        C88 Commercial Building, Electra Street,
                                        Abu Dhabi, United Arab Emirates.</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/call.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Request a call back</p>
                                    <a class="item_title" href="#">Tel: +9712-6226301</a>
                                    <a class="item_title" href="#">
                                        Mobile/WA: +971 50 550 4827</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/massage_3.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Email with us</p>
                                    <a class="item_title" href="#">sales@nanjgelgreen.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="col-xxl-4 col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact_address">

                        <ul>
                            <li>
                                <span><img src="assets/images/location.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>United Arab Emirates - Dubai</p>
                                    <a class="item_title" href="#">Office #2916, Shatha Towers, Dubai Internet City,
                                        Dubai, United Arab Emirates.</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/call.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Request a call back</p>
                                    <a class="item_title" href="#">Tel: +9714-4428910</a>
                                    <a class="item_title" href="#">
                                        Mobile/WA: +971 56 506 7715</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/massage_3.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Email with us</p>
                                    <a class="item_title" href="#">sales@nanjgelgreen.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="col-xxl-4 col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact_address">
                        <ul>
                            <li>
                                <span><img src="assets/images/location.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>India - Mumbai</p>
                                    <a class="item_title" href="#">Andheri (East),
                                        Mumbai, Maharashtra,
                                        India.</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/call.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Request a call back</p>
                                    <a class="item_title" href="#">Tel: +91-8983736246</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/massage_3.png" alt="icon"
                                        class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Email with us</p>
                                    <a class="item_title" href="#">viceoryrealty@icloud.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-xxl-4 col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact_address">

                        <ul>
                            <li>
                                <span><img src="assets/images/location.png" alt="icon"
                                        class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>India - Goa</p>
                                    <a class="item_title" href="#">Fort Aquada Road, Calangute,
                                        Panjim Goa, Bardez, Goa
                                        India</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/call.png" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Request a call back</p>
                                    <a class="item_title" href="#">Tel: +91-8983736246</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/images/massage_3.png" alt="icon"
                                        class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Email with us</p>
                                    <a class="item_title" href="#">viceoryrealty@icloud.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>



            <div class="row justify-content-between">
                <div class="col-xxl-4 col-lg-5 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.83187883983!2d90.33728804060513!3d23.780975728310533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1701892197304!5m2!1sen!2sbd"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
                <div class="col-xxl-7 col-lg-7 wow fadeInRight" data-wow-duration="1.5s">
                    <form action="{{ route('contact.submit') }}" method="post" enctype="">
                        @csrf
                        <div class="row">
                            @include('flash::alert-message')

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="text" name="name" placeholder="Your Name">
                                    <span class="contact_input_icon">
                                        <img src="assets/images/user_icon_3.png" alt="icon" class="img-fluid w-100">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="email" name="email" placeholder="Your Email">
                                    <span class="contact_input_icon">
                                        <img src="assets/images/massage_4.png" alt="icon" class="img-fluid w-100">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="number" name="phone" placeholder="Phone Number">
                                    <span class="contact_input_icon">
                                        <img src="assets/images/call_2.png" alt="icon" class="img-fluid w-100">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="text" name="sub" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact_input">
                                    <textarea rows="6" name="message" placeholder="Write Message..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact_input">
                                    <button type="submit" class="common_btn">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

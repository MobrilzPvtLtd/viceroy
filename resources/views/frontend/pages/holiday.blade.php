@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')

<meta name="description" content="test">
<link rel="stylesheet" href="{{ asset('assets/css/holiday.css') }}" />

@endsection
@section('content')
    <style>
        .about_text {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
        }

        .single_discover {
            margin-top: 25px;
            padding: 20px 15px 10px 15px;
            border: 1px solid var(--colorWhite);
            background: var(--colorWhite);
            box-shadow: 0px 24px 60px 0px rgba(3, 26, 38, 0.14);
            transition: all linear .3s;
            -webkit-transition: all linear .3s;
            -moz-transition: all linear .3s;
            -ms-transition: all linear .3s;
            -o-transition: all linear .3s;
            text-align: center;
        }


        .single_discover h6 {
            font-size: 25px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .single_discover p {
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 10px;
        }


        .discover_img {
            width: 80px;
            height: 80px;
            background: #cf9f3f;
            font-size: 40px;
            border-radius: 40px;
            margin: 0 auto;
        }

        .discover_img h3 {
            font-size: 60px;
            color: #fff;
        }


    </style>




    <!--=============================
                                                                            BREADCRUMBS START
                                                                        ==============================-->
    <section class="breadcrumbs" style="background: url(assets/images/breadcrumbs_bg.jpg);">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Holiday Rental</h1>
                            <ul class=" d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Holiday Rental</a></li>
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

    <section class="destination_area pt_115 xs_pt_110 pb_60 xs_pb_90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="section_heading mb_50">
                        <h2>Property Management & Pro Co-Hosting Services</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">

                <div class="col-xl-6 col-lg-6 wow fadeInRight" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInRight;">
                    <div class="about_text">
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">Our Mission</h2>
                        </div>
                        <p>At Viceroy Realty we deliver unsurpassed property management services not just to you as the home
                            owner but also to your guests. We do this by offering the ultimate HOLIDAY HOME MANAGEMENT
                            SOLUTION with professionals who are passionate about travel and excellent at customer service.
                        </p>
                        <br>
                        <div class="section_heading section_heading_left">
                            <h2 style='font-size:30px;'>What We Do</h2>
                        </div>
                        <p>Our dynamic team helps your property reach its maximum potential by managing every aspect of your
                            listing for you. Our approach is simple and straightforward, comprising of a combination of
                            attention to detail and friendly communication which yields consistent results. Our resources
                            includes high-end technologies integrated with intelligent and creative minds. Our goal is to
                            deliver quality services and to reach potential guests visiting from all over the world. Our
                            team is able to provide an extensive range of services to assist you as we oversee the inner
                            workings of your short term rental listing.</p>

                        <br>
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">Looking After Your Property</h2>
                        </div>
                        <p>Your property is our priority. Our dedicated team will always be on-hand to manage any and all
                            maintenance issues that may arise at your property and will ensure that it is cleaned thoroughly
                            each time. We are just a phone call away and ready to assist with any task.</p>
                            <br>
                            <div class="section_heading section_heading_left">
                                <h2 style="font-size:30px;">Looking After Your Guest</h2>
                            </div>
                            <p>
                                We operate with your guest's best interest in mind, ensuring that their time spent in
                                your property is enjoyable and that every requirement is met with a positive and
                                professional response. You can rest assured that every guest is taken care of by us.
                            </p>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-sm-6 wow fadeInLeft" data-wow-duration="1.5s"
                            style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInLeft;">
                            <div class="about_area_img_1">
                                <img src="assets/images/about_1.jpg" alt="img" class="img-fluid w-100">
                            </div>
                            <br>
                            <div class="about_text">


                                <div class="section_heading section_heading_left">
                                    <h2 style="font-size:30px;">Maximising Your Revenue</h2>
                                </div>
                                <p>We aspire to increase the conversions and profits of your property listing on Airbnb,
                                    which is achieved by investing more time in providing more value-added service and less
                                    time on tasks that are tedious and not necessary.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>






        </div>
    </section>

    <section class="destination_area pt_115 xs_pt_110 pb_60 xs_pb_90" style="background:#fff5db;">
        <div class="container">

            <div class="row justify-content-between">

                <div class="col-xl-8 col-lg-6 wow fadeInRight" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInRight;">
                    <div class="about_text">
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">Why Short Term Rental?</h2>
                        </div>
                        <p>Platforms such as Airbnb appeal to tourists and business travellers looking for an alternative to
                            hotels for their trips in the city. Hence, property owners can make between 50% to 100% more
                            than traditional long-term lets.
                        </p>
                        {{-- <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <br> --}}
                        <br>
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">What We Do For You?</h2>
                        </div>
                        <p>We operate with the guest's best interest in mind, ensuring that their time spent in your
                            property is enjoyable and that every requirement is met with a positive and professional
                            response. Our dedicated team will always be on- hand to manage any maintenance issues that ay
                            arise at your property and will ensure that it is cleaned thoroughly each time.
                        </p>
                        {{-- <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-sm-6 wow fadeInLeft" data-wow-duration="1.5s"
                            style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInLeft;">
                            <div class="about_area_img_1">
                                <img src="assets/images/about_1.jpg" alt="img" class="img-fluid w-100">
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 1</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Requesting professional photography if required and search optimisation with a personal touch. To
                            get the right guests, you need the right listing. With our experience in short-stay rental
                            management we understand what makes a listing successful and we work hard and smart to get your
                            property noticed.
                        </p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 2</h3>
                        </div>

                        <h6>Professional Cleaning </h6>
                        <p>Want your home to look like it belongs in a glossy magazine? Our professional 5-star cleaning
                            service will keep your property looking flawless and picture-perfect.
                            We organise professional cleans paid for by your guests to ensure clean homes and high ratings
                            . </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 3</h3>
                        </div>

                        <h6>Guest Vetting</h6>
                        <p>It's important to us that you are comfortable with the guests who are staying in your home. This
                            is why we carefully vet all requests and only accept bookings from those guests who fit specific
                            criteria including positive past reviews and have verified government identification. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 4</h3>
                        </div>

                        <h6>Property Management </h6>
                        <p>You don't have time to fix a leaking tap- that's why you have a Short Stay Property Manager. All
                            you need to do is set a maintenance budget and leave the rest to us. We know who to call to
                            resolve any issues that occur while a guest is at your home, and we keep you fully informed.
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 5</h3>
                        </div>

                        <h6>Linen </h6>
                        <p>We can use your linen or supply our own. Nothing says home quite like fluffy towels and freshly
                            pressed linen, and these are the special touches that we add. If we are using your linen please
                            make sure there are at least two sets available as they are all laundered off-
                            site.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 6</h3>
                        </div>

                        <h6>Guest Communication </h6>
                        <p>Booking requests are responded to within the hour and our guest support team is on call 24/7 to
                            answer any queries. Communication is essential and we speak to your guests before, during and
                            after each stay. Peace of mind for guests as they check-in any time of day or night. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 7</h3>
                        </div>

                        <h6>Guest Vetting</h6>
                        <p>It's important to us that you are comfortable with the guests who are staying in your home. This
                            is why we carefully vet all requests and only accept bookings from those guests who fit specific
                            criteria including positive past reviews and have verified government identification. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 8</h3>
                        </div>

                        <h6>Right Price </h6>
                        <p>We use a combination of specialised technology and local knowledge to set the perfect price. </p>
                    </div>
                </div>
            </div>




        </div>
    </section>

    <!--=============================
                                                                            PROPERTY GRID VIEW START
                                                                        ==============================-->
    <section class="property_list_view pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @foreach ($holidays as $holiday)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="single_property">
                            <div class="single_property_img">
                                @php
                                    $images = json_decode($holiday->image);
                                @endphp

                                @foreach ($images as $image)
                                    <img src="{{ asset('public/uploads/' . trim($image)) }}" alt="Image"
                                        class="img-fluid w-100">
                                @endforeach
                                {{-- <a class="feature_link" href="#">for sale</a> --}}
                                @if ($holiday->featured)
                                <a class="feature_link feature" href="#">Featured</a>
                            @endif

                            </div>

                            <div class="single_property_text">
                                <div class="single_property_top">
                                    <a target="blank" class="item_title"
                                        href="{{ $holiday->url }}">{{ $holiday->name }}</a>
                                    <p>
                                        <i class="fas fa-map-marker-alt"></i>{{ $holiday->address }}
                                    </p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $holiday->beds }} Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $holiday->bath }} Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $holiday->area }} Sq Ft
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a target="blank" class="read_btn" href="{{ $holiday->url }}">More Details<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                                {{-- <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                <a class="read_btn"><i aria-hidden="true"></i>{{ $holiday->p_type }}</a>
                            </div> --}}
                                <span class="property_price">{{ $holiday->p_type }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="text-align: center">
                {!! $holidays->links() !!}
            </div>

    </section>
@endsection

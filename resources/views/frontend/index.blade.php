@extends('frontend.layouts.app')

@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')
    <meta name="description" content="test">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection
@section('content')
    <section class="banner_area" style="background: url(assets/images/banner_bg.jpg)">
        <div class="container container_large">
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-11 col-xxl-9">
                    <div class="banner_contant">
                        <div class="banner_text">
                            <h1>Buildings houses that feel like home - with us.</h1>
                            <p>
                                Through a combination of lectures, readings, and discussions,
                                students will gain a solid foundation in educational
                                psychology.
                            </p>
                        </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="form-container">
                                    <h2>Want do you want ? </h2>
                                    <form id="property-form" method="post">
                                        <div class="checkbox-group">
                                            <label>
                                                <input type="radio" name="property-action" value="rent-house">
                                                <span>I want to rent a Property</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="property-action" value="buy-house">
                                                <span>I want to buy a Property</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="property-action" value="holiday-rental">
                                                <span>I want to book a holiday rental</span>
                                            </label>
                                        </div>
                                        <button type="submit" class="submit-btn">Submit</button>
                                    </form>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_area pt_120 xs_pt_100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-sm-6 wow fadeInLeft" data-wow-duration="1.5s">
                            <div class="about_area_img_1">
                                <img src="assets/images/about_1.jpg" alt="img" class="img-fluid w-100" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <div class="about_area_img_2 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="assets/images/about_2.jpg" alt="img" class="img-fluid w-100" />
                            </div>
                            <div class="about_area_img_3 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="assets/images/about_3.jpg" alt="img" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 wow fadeInRight" data-wow-duration="1.5s">
                    <div class="about_text">
                        <div class="section_heading section_heading_left">
                            <h2>We help clients buy and Sell houses since 2001</h2>
                        </div>
                        <p>
                            Through a combination of lectures, readings, and discussions,
                            students will gain a solid foundation in educational psychology
                            With over $3 Billion in sales, due to our unparalleled results,
                            expertise and dedication.
                        </p>
                        <ul class="d-flex flex-wrap pt_15">
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_1.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <div class="about_description">
                                    <h6>Sell your home</h6>
                                    <span>Free Services</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_2.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <div class="about_description">
                                    <h6>Buy a home</h6>
                                    <span>No fees asked</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_3.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <div class="about_description">
                                    <h6>Free Appraisal</h6>
                                    <span>No fees asked</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="assets/images/about_icon_4.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <div class="about_description">
                                    <h6>Free Photoshoot</h6>
                                    <span>Professional services</span>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="common_btn">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                        ABOUT END
                                                                                    ==============================-->

    <!--=============================
                                                                                        DESTINATION START
                                                                                    ==============================-->
    <section class="destination_area pt_115 xs_pt_110 pb_60 xs_pb_90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_50">
                        <h2>Explore Your Neighborhood</h2>
                    </div>
                </div>
            </div>
            <div class="row destination_slider">
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_1.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>New York</h5>
                                <p>04 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_2.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>Colombia</h5>
                                <p>03 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_3.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>San Francisco</h5>
                                <p>02 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_4.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>United States</h5>
                                <p>05 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_5.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>Argentina</h5>
                                <p>06 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_1.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>New York</h5>
                                <p>04 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_2.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>Colombia</h5>
                                <p>03 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_3.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>San Francisco</h5>
                                <p>02 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_4.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>United States</h5>
                                <p>05 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_destination">
                        <img src="assets/images/destination_5.jpg" alt="img" class="img-fluid w-100" />
                        <div class="destination_address">
                            <a href="#"><i class="far fa-arrow-right"></i></a>
                            <div class="destination_text">
                                <h5>Argentina</h5>
                                <p>06 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                        DESTINATION END
                                                                                    ==============================-->

    <!--=============================
                                                                                        PROPERTY START
                                                                                    ==============================-->
    <section class="property_area pt_60 xs_pt_95 pb_50 xs_pb_95">
        <div class="container">
            <div class="row justify-content-center text-align-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_25">
                        <h2>Check Out the Latest Real Estate Listings.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($propertys as $property)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="single_property">
                            <div class="single_property_img">
                                @php
                                    $images = unserialize($property->image);
                                @endphp
                                @if (!empty($images) && is_array($images) && count($images) > 0)
                                    <img src="{{ asset('public/' . $images[0]) }}" alt="Image"
                                        class="img-fluid w-100">
                                @else
                                    <p>No images available</p>
                                @endif
                                <a class="feature_link" href="">for {{ $property->type }}</a>
                                @if ($property->featured)
                                    <a class="feature_link feature" href="#">Featured</a>
                                @endif
                                <ul class="d-flex flex-wrap">
                                    {{-- <li>
                                        <a href="#"><i class="fas fa-heart" aria-hidden="true"></i> SAVE</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="single_property_text">
                                <div class="single_property_top">
                                    <a class="item_title" href="{{ route('property', $property->slag) }}">{{ $property->title }}</a>
                                    <p>
                                        <i class="fas fa-map-marker-alt"></i>{{ $property->address }}
                                    </p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $property->bed }} Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $property->number_bathroom }} Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $property->area }} Sq Ft
                                        </li>
                                        <li>
                                            <span><img src="assets/images/hall.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $property->hall }}  Hall
                                        </li>
                                        <li>
                                            <span><img src="assets/images/amenities_img_7.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $property->kichan }}  kichan
                                        </li>
                                        <li>
                                            <span><img src="assets/images/dining.png" alt="img"
                                                    class="img-fluid w-100" /></span>
                                            {{ $property->dining }}  dining
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" href="{{ route('property', $property->slag) }}">More Details<i
                                            class="fas fa-arrow-right"></i></a>
                                    {{-- <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>4.5</span>
                                    </p> --}}
                                </div>
                                <span class="property_price">$ {{ $property->price }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div style="text-align: center">
                    {!! $propertys->links() !!}
                </div>

            </div>

        </div>
    </section>


    <section class="property_area pt_60 xs_pt_95 pb_50 xs_pb_95">
        <div class="container">
            <div class="row justify-content-center text-align-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_25">
                        <h2> Book your Holiday Rental Listings.</h2>
                    </div>
                </div>
            </div>
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
                <div style="text-align: center">
                    {!! $holidays->links() !!}
                </div>

            </div>

        </div>
    </section>

    <!--=============================
                                                                                        PROPERTY END
                                                                                    ==============================-->

    <!--=============================
                                                                                        AGENT START
                                                                                    ==============================-->
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
                                            <img src="{{ asset('public/images/' . $professional->image) }}"
                                                alt="img" class="img-fluid w-100" />
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
                {{-- <div style="text-align: center">
                    {!! $professionals->links() !!}
                </div> --}}
            </div>

        </div>

    </section>
    <!--=============================
                                                                                        AGENT END
                                                                                    ==============================-->

    <!--=============================
                                                                                        FIND STATE START
                                                                                    ==============================-->
    <section class="find_state" style="background: url(assets/images/find_state.jpg)">
        <div id="vbg12" data-vbg-loop="true" data-vbg="https://youtu.be/ec_fXMrD7Ow?si=m9LJu9X3lzTP5Erz"></div>
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
    <!--=============================
                                                                                        FIND STATE END
                                                                                    ==============================-->

    <!--=============================
                                                                                        BLOG START
                                                                                    ==============================-->

    <!--=============================
                                                                                        BLOG END
                                                                                    ==============================-->

    <!--=============================
                                                                                        DISCOVER START
                                                                                    ==============================-->

    <!--=============================
                                                                                        PARTNER START
                                                                                    ==============================-->
    <section class="partner_area pt_30 pb_30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s"
                    style="
              visibility: visible;
              animation-duration: 1.5s;
              animation-name: fadeInUp;
            ">
                    <div class="section_heading mb_25">
                        <h2>Our Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-xl-12">
                    <div class="marquee_animi">
                        <ul class="single_partner">
                            @foreach ($brands as $brand)
                                @if ($brand->image)
                                    <li>
                                        <a href="agencies_details.html">
                                            <img src="{{ asset('public/images/' . $brand->image) }}" alt="img"
                                                class="img-fluid w-100" />
                                        </a>
                                    </li>
                                @else
                                    No Image
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#co_name').change(function() {
                var country = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-city') }}',
                    data: {
                        country: country
                    },
                    success: function(result) {
                        console.log(result);
                        $("#city").html(result);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#rent_co_name').change(function() {
                var country = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-city') }}',
                    data: {
                        country: country
                    },
                    success: function(result) {
                        console.log(result);
                        $("#rent_city").html(result);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        document.getElementById('property-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const selectedAction = document.querySelector('input[name="property-action"]:checked').value;
            let redirectUrl = '';
            switch(selectedAction) {
                case 'rent-house':
                    redirectUrl = '/rent';
                    break;
                case 'buy-house':
                    redirectUrl = '/buy';
                    break;
                case 'holiday-rental':
                    redirectUrl = '/holiday';
                    break;
                default:
                    redirectUrl = '/';
            }
            window.location.href = redirectUrl;
        });
        </script>

@endsection

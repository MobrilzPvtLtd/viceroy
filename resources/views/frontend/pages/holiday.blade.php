@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection

@section('content')
    <style>
        .about_text {
            height: 100%;
            display: block;
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
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <br>
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">What We Do</h2>
                        </div>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <br>
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">Looking After Your Property</h2>
                        </div>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>



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
                                    <h2 style="font-size:30px;">Looking After Your Guest</h2>
                                </div>
                                <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                                    foundation in educational psychology With over $3 Billion in sales, due to our
                                    unparalleled
                                    results, expertise and dedication.</p>
                                <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                                    foundation in educational psychology With over $3 Billion in sales, due to our
                                    unparalleled
                                    results, expertise and dedication.</p>
                                <br>
                                <div class="section_heading section_heading_left">
                                    <h2 style="font-size:30px;">Maximising Your Revenue</h2>
                                </div>
                                <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                                    foundation in educational psychology With over $3 Billion in sales, due to our
                                    unparalleled
                                    results, expertise and dedication.</p>
                                <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                                    foundation in educational psychology With over $3 Billion in sales, due to our
                                    unparalleled
                                    results, expertise and dedication.</p>


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
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <br>
                        <div class="section_heading section_heading_left">
                            <h2 style="font-size:30px;">What We Do For You?</h2>
                        </div>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales, due to our unparalleled
                            results, expertise and dedication.</p>




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
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 2</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 3</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 4</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 5</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 6</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 7</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">
                        <div class="discover_img">
                            <h3> 8</h3>
                        </div>

                        <h6>Listing Management </h6>
                        <p>Through a combination of lectures, readings, and discussions, students will gain a solid
                            foundation in educational psychology With over $3 Billion in sales,
                            due to our unparalleled results, expertise and dedication. </p>
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
                    <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                        style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                        <div class=" single_property">
                            <div class="single_property_img">

                                @php
                                    $images = json_decode($holiday->image);
                                @endphp

                                @foreach ($images as $image)
                                    <img src="{{ asset('public/uploads/' . trim($image)) }}" alt="Image"
                                        class="img-fluid w-100">
                                @endforeach
                            </div>

                            <div class="single_property_text">
                                {{-- {{ $holiday->p_type }} --}}
                                <div class="single_property_top">
                                    <a class="item_title"
                                        href="https://www.airbnb.co.in/https://www.airbnb.co.in/">{{ $holiday->name }}</a>
                                    <p><i class="fas fa-map-marker-alt" aria-hidden="true"></i>{{ $holiday->address }}</p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            {{ $holiday->beds }} Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            {{ $holiday->bath }} Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            {{ $holiday->area }} Sq Ft
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" href="{{ $holiday->url }}">More Details<i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" ><i   aria-hidden="true"></i>{{ $holiday->p_type }}</a>
                                </div>


                                    {{-- <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                        <a class="read_btn" href="https://www.airbnb.co.in/">More Details<i
                                                class="fas fa-arrow-right" aria-hidden="true"></i></a>
                                        <p>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <span>4.5</span>
                                    </p>
                                    </div> --}}
                                    <span class="property_price">${{ $holiday->price }}</span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $holidays->links() !!}

        </div>
    </section>
@endsection

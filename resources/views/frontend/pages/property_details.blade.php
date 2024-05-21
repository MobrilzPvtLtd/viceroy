@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection

@section('content')
    <section class="breadcrumbs" style="background: url('{{ asset('assets/images/breadcrumbs_bg.jpg') }}')">

        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Property Details</h1>
                            <ul class=" d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Property Details</a></li>
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
                PROPERTY DETAILS START
            ==============================-->
    <section class="property_details pt_50 xs_pt_100 pb_105 xs_pb_85">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class=" col-xl-12">

                    <div id="testimonial-slider" class="owl-carousel">
                        <div class="testimonial">
                            <div class="pic">

                            </div>


                        </div>
                        <div class="testimonial">
                            <div class="pic">
                                @foreach (unserialize($property->image) as $image)
                                    <img src="{{ asset('public/' . $image) }}" alt="Image" class="img-fluid w-100">
                                @endforeach
                            </div>


                        </div>
                        {{-- <div class="testimonial">
                            <div class="pic">
                                <img src="{{asset('assets/images/property_details_img_3.jpg')}}" alt="img"
                                    class="img-fluid w-100">


                            </div>


                        </div> --}}
                        {{-- <div class="testimonial">
                            <div class="pic">
                                @foreach (unserialize($property->image) as $image)
                                    <img src="{{ asset('public/' . $image) }}" alt="Image" class="img-fluid w-100">
                                @endforeach
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div class="row mt_50">
                <div class="col-lg-8">
                    <div class="single_property_details wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" d-flex flex-wrap justify-content-between">
                            <h4>{{ $property->title }}</h4>
                            <ul class="property_details_share d-flex flex-wrap">
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                <li><a href="#"><i class="fas fa-print"></i></a></li>
                            </ul>
                        </div>
                        <div class="property_details_address d-flex flex-wrap justify-content-between">
                            <ul class="d-flex flex-wrap">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $property->address }}</li>
                                {{-- <li><i class="far fa-clock"></i>10 months ago</li> --}}
                                <li><span>{{ $property->property_status }}</span></li>
                            </ul>
                            <h3>$ {{ $property->price }}</h3>
                        </div>
                        <ul class="flat_details d-flex flex-wrap">
                            <li>
                                <span><img src="{{ asset('assets/images/bad.png') }}" alt="img"
                                        class="img-fluid w-100"></span>
                                {{ $property->bed }} Beds
                            </li>
                            <li>
                                <span><img src="{{ asset('assets/images/bathtab.png') }}" alt="img"
                                        class="img-fluid w-100"></span>
                                {{ $property->number_bathroom }} Baths
                            </li>
                            <li>
                                <span><img src="{{ asset('assets/images/squre.png') }}" alt="img"
                                        class="img-fluid w-100"></span>
                                {{ $property->area }} Sq Ft
                            </li>
                        </ul>
                    </div>
                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Description</h4>
                        <p class=" property_dtls_decription">{{ $property->desc }}.</p>
                    </div>
                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Property Details</h4>
                        <ul class=" property_apartment_details d-flex flex-wrap mt_10">
                            <li>
                                <p>Property ID:<span>{{ $property->p_id }}</span></p>
                            </li>
                            <li>
                                <p>Rooms:<span>{{ $property->number_of_room }}</span></p>
                            </li>
                            <li>
                                <p>Property Status:<span>{{ $property->property_status }}</span></p>
                            </li>
                            <li>
                                <p>Property Price:<span>${{ $property->price }}</span></p>
                            </li>
                            {{-- <li>
                                <p>Garages:<span>2</span></p>
                            </li> --}}
                            <li>
                                <p>Bedrooms:<span>{{ $property->bed }}</span></p>
                            </li>
                            <li>
                                <p>Property Type:<span>{{ $property->p_type }}</span></p>
                            </li>
                            <li>
                                <p>Baths:<span>{{ $property->number_bathroom }}</span></p>
                            </li>
                            <li>
                                <p>Originating Year:<span>{{ $property->year }}</span></p>
                            </li>
                        </ul>
                        <div class="property_facilities">
                            <h4>Facilities</h4>
                            @php
                                $facilitiesy = unserialize($property->facilities);
                            @endphp
                            @if (!empty($facilitiesy))
                                <ul class="d-flex flex-wrap">
                                    @foreach ($facilitiesy as $facility)
                                        @php
                                            $facility = App\Models\Facilities::find($facility);
                                        @endphp
                                        @if ($facility)
                                            <li>{{ $facility->name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p>No facilities available</p>
                            @endif


                            </ul>
                        </div>
                    </div>
                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Floor Plans</h4>
                        <div class=" apertment_layout">
                            {{-- <img src="assets/images/layout.jpg" alt="img" class="img-fluid w-100"> --}}
                            @php
                                $floorPlans = unserialize($property->floor_plan);
                            @endphp
                            @if ($floorPlans !== false && is_array($floorPlans))
                                @foreach ($floorPlans as $floorPlan)
                                    <img src="{{ asset('public/' . $floorPlan) }}" alt="Floor Plan" style="width: 100%">
                                @endforeach
                            @else
                                <p>No floor plans available</p>
                            @endif
                        </div>
                    </div>
                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Map Location</h4>
                        <div class=" apertment_map">
                            <iframe src={{ $property->map }} width="600" height="450" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                    </div>
                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Property Video</h4>
                        <div class=" apertment_video">
                            <iframe src="{{ $property->video }}" title="YouTube video player"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="sticky_sidebar">
                        <div class="property_details_sidebar">
                            <h4>Schedule a Call</h4>
                            <form action="#" class="schedule_form">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <input type="text" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <input type="text" placeholder="Time">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <input type="text" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="schedule_input">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="schedule_input">
                                            <textarea rows="5" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="schedule_input">
                                            <a href="#" class="common_btn">Schedule-a-Tour-Form</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="related_property">
            <div class="container">
                <div class="row mt_115 xs_mt_95">
                    <div class="row wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" col-xl-6">
                            <div class="section_heading section_heading_left mb_25">
                                <h2>Related Properties</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row related_property_slider">
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" single_property">
                            <div class="single_property_img">
                                <img src="assets/images/property_4.jpg" alt="img" class="img-fluid w-100">
                                <a class="feature_link" href="#">for sale</a>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="single_property_text">
                                <div class="single_property_top">
                                    <a class="item_title " href="#">Stunning mansion in Reno</a>
                                    <p><i class="fas fa-map-marker-alt"></i>28B Highgate Road, London</p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            6 Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            4 Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            2500 Sq Ft
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" href="#">More Details<i class="fas fa-arrow-right"></i></a>
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>4.5</span>
                                    </p>
                                </div>
                                <span class="property_price">$24,000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" single_property">
                            <div class="single_property_img">
                                <img src="assets/images/property_5.jpg" alt="img" class="img-fluid w-100">
                                <a class="feature_link" href="#">for rent</a>
                                <a class="feature_link feature" href="#">Featured</a>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="single_property_text">
                                <div class="single_property_top">
                                    <a class="item_title" href="#">Beautiful Condo in London</a>
                                    <p><i class="fas fa-map-marker-alt"></i>28B Highgate Road, London</p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            4 Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            3 Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            2200 Sq Ft
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" href="#">More Details<i class="fas fa-arrow-right"></i></a>
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>4.5</span>
                                    </p>
                                </div>
                                <span class="property_price">$9,000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" single_property">
                            <div class="single_property_img">
                                <img src="assets/images/property_3.jpg" alt="img" class="img-fluid w-100">
                                <a class="feature_link" href="#">for rent</a>
                                <a class="feature_link feature" href="#">Featured</a>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="single_property_text">
                                <div class="single_property_top">
                                    <a class="item_title" href="#">South Side Garden House</a>
                                    <p><i class="fas fa-map-marker-alt"></i>28B Highgate Road, London</p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            5 Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            4 Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            2300 Sq Ft
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" href="#">More Details<i class="fas fa-arrow-right"></i></a>
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>4.5</span>
                                    </p>
                                </div>
                                <span class="property_price">$29,000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" single_property">
                            <div class="single_property_img">
                                <img src="assets/images/property_8.jpg" alt="img" class="img-fluid w-100">
                                <a class="feature_link" href="#">for rent</a>
                                <a class="feature_link feature" href="#">Featured</a>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="single_property_text">
                                <div class="single_property_top">
                                    <a class="item_title" href="#">Beautiful Condo in London</a>
                                    <p><i class="fas fa-map-marker-alt"></i>28B Highgate Road, London</p>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <span><img src="assets/images/bad.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            4 Beds
                                        </li>
                                        <li>
                                            <span><img src="assets/images/bathtab.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            3 Baths
                                        </li>
                                        <li>
                                            <span><img src="assets/images/squre.png" alt="img"
                                                    class="img-fluid w-100"></span>
                                            2200 Sq Ft
                                        </li>
                                    </ul>
                                </div>
                                <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                    <a class="read_btn" href="#">More Details<i class="fas fa-arrow-right"></i></a>
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>4.5</span>
                                    </p>
                                </div>
                                <span class="property_price">$9,000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

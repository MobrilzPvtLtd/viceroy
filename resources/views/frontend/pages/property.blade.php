@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection
{{-- <style>
    .img-fluid img {
    height: 720px !important;
    width: 968px !important;
}

.img-fluid {
    display: flex;
    justify-content: center;
    overflow:  !important;
}
div#testimonial-slider {
    overflow: hidden !important;
    width: 82%;
    display: flex !important;
    justify-content: center;
}

.testimonial-slider-main {
    display: flex;
    justify-content: center;
}
.owl-theme .owl-controls {
    margin-top: 10px;
    text-align: center;
    width: 99% !important;
}
</style> --}}
@section('CustomCss')
    <style>
        button#addCart {
            background-color: #e6b025 !important;
            border-radius: 50px;
            border: solid 1px #e6b025;
        }
    </style>
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
                <div class=" col-xl-12 testimonial-slider-main">
                    <div id="testimonial-slider" class="">
                        @if ($property->image)
                            @php
                                $images = unserialize($property->image);
                            @endphp
                            @if ($images && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <div class="img-fluid w-100 {{ $index == 0 ? 'active' : '' }}">
                                        <img width="100" src="{{ asset('public/' . $image) }}" alt="Image">
                                    </div>
                                @endforeach
                            @endif
                        @else
                            <p>No images available</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt_50">
                <div class="col-lg-8">
                    <div class="single_property_details wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" d-flex flex-wrap justify-content-between">
                            <h4>{{ $property->title }}</h4>
                            <ul class="property_details_share d-flex flex-wrap">

                                <button type="submit" id="addToCart" data-id="{{ $property->id }}"
                                    class=" btn btn-primary"><i class="fa fa-heart"></i></button>

                            </ul>
                        </div>
                        <div class="property_details_address d-flex flex-wrap justify-content-between">
                            <ul class="d-flex flex-wrap">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $property->address }}</li>
                                <li><span>{{ $property->type }}</span></li>
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
                            <li>
                                <span><img src="{{ asset('assets/images/hall.png') }}" alt="img"
                                        class="img-fluid w-100" /></span>
                                {{ $property->hall }} Hall
                            </li>
                            <li>
                                <span><img src="{{ asset('assets/images/amenities_img_7.png') }}" alt="img"
                                        class="img-fluid w-100" /></span>
                                {{ $property->kichen }} Kitchen
                            </li>
                            <li>
                                <span><img src="{{ asset('assets/images/dining.png') }}" alt="img"
                                        class="img-fluid w-100" /></span>
                                {{ $property->dining }} dining
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
                            {{-- <li>
                                <p>Property ID:<span>{{ $property->p_id }}</span></p>
                            </li> --}}
                            <li>
                                <p>Rooms:<span>{{ $property->number_of_room }}</span></p>
                            </li>
                            <li>
                                <p>Property Status:<span>{{ $property->type }}</span></p>
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
                        <div class="apertment_map">
                            <div id="mapCanvas"></div>
                        </div>
                        <script>
                            // Initialize and add the map
                            function initMap() {
                                var map;
                                var bounds = new google.maps.LatLngBounds();
                                var mapOptions = {
                                    mapTypeId: 'roadmap'
                                };

                                // Display a map on the web page
                                map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
                                map.setTilt(50);

                                // Multiple markers location, latitude, and longitude
                                var markers = @json($markers);

                                // Info window content
                                var infoWindowContent = @json($infowindow);

                                // Add multiple markers to map
                                var infoWindow = new google.maps.InfoWindow(),
                                    marker, i;

                                // Place each marker on the map
                                for (i = 0; i < markers.length; i++) {
                                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                                    bounds.extend(position);
                                    marker = new google.maps.Marker({
                                        position: position,
                                        map: map,
                                        title: markers[i][0]
                                    });

                                    // Add info window to marker
                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                        return function() {
                                            infoWindow.setContent(infoWindowContent[i][0]);
                                            infoWindow.open(map, marker);
                                        }
                                    })(marker, i));

                                    // Center the map to fit all markers on the screen
                                    map.fitBounds(bounds);
                                }

                                // Set zoom level
                                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                                    this.setZoom(14);
                                    google.maps.event.removeListener(boundsListener);
                                });
                            }

                            window.initMap = initMap;
                        </script>

                        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key={{ env('GEO_CODE_GOOGLE_MAP_API') }}" defer>
                        </script>

                        <style>
                            #mapCanvas {
                                height: 400px;
                                /* The height is 400 pixels */
                                width: 100%;
                                /* The width is the width of the web page */
                            }
                        </style>
                    </div>

                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Property Video</h4>
                        <div class=" apertment_video">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/{{ $property->video }}?v=HieAP-xAlq4"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="sticky_sidebar">
                        <div class="property_details_sidebar">
                            <h4>Schedule a Call</h4>
                            <form action="{{ route('checkout.submit') }}" method="POST" class="schedule_form">
                                @csrf
                                <input type="hidden" name="title" value="{{ $property->title }}">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <label for="startTime"> Date</label>
                                            <input type="date" name="date" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <label for="startTime">Start Time</label>
                                            <input type="time" name="st_time" placeholder="start Time">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <label for="startTime">End Time</label>
                                            <input type="time" name="en_time" placeholder="End Time">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <label for="startTime">Name</label>
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="schedule_input">
                                            <label for="startTime">Phone</label>
                                            <input type="text" name="number" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="schedule_input">
                                            <textarea rows="5" name="massage" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="schedule_input">
                                            <button type="submit" class="common_btn">Schedule-a-Tour-Form</button>
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
                        <div class="col-xl-6">
                            <div class="section_heading section_heading_left mb_25">
                                <h2>Related Properties</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($relatedProperties as $relatedProperty)
                        <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                            <div class="single_property">
                                <div class="single_property_img">
                                    @php
                                        $images = unserialize($relatedProperty->image);
                                    @endphp
                                    @if ($images !== false && is_array($images))
                                        @foreach ($images as $image)
                                            <img src="{{ asset('public/' . $image) }}" alt="Image"
                                                style="width: 100%">
                                        @endforeach
                                    @else
                                        <p>No images available</p>
                                    @endif
                                    <a class="feature_link" href="#">{{ $relatedProperty->type }}</a>
                                    @if ($relatedProperty->featured)
                                        <a class="feature_link feature" href="#">Featured</a>
                                    @endif
                                    <div id="testimonial-slider1" class="owl-carousel">
                                        <div class="testimonial">
                                            <div class="pic">
                                                <a class="feature_link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_property_text">
                                    <div class="single_property_top">
                                        <div class="wish001">
                                            <a class="item_title"
                                                href="{{ route('property', $relatedProperty->slag) }}">{{ $relatedProperty->title }}</a>
                                            <button type="submit" id="addCart" data-id="{{ $relatedProperty->id }}"
                                                class="addCart btn btn-primary " style=""><i
                                                    class="fa fa-heart"></i></button>
                                        </div>
                                        <p>
                                            <i class="fas fa-map-marker-alt"></i>{{ $relatedProperty->address }}
                                        </p>
                                        <ul class="d-flex flex-wrap">
                                            <li>
                                                <span><img src="{{ asset('assets/images/bad.png') }}" alt="img"
                                                        class="img-fluid w-100" /></span>
                                                {{ $relatedProperty->bed }} Beds
                                            </li>
                                            <li>
                                                <span><img src="{{ asset('assets/images/bath.png') }}" alt="img"
                                                        class="img-fluid w-100" /></span>
                                                {{ $relatedProperty->number_bathroom }} Baths
                                            </li>
                                            <li>
                                                <span><img src="{{ asset('assets/images/LAND.png') }}" alt="img"
                                                        class="img-fluid w-100" /></span>
                                                {{ $relatedProperty->area }} {{ $relatedProperty->size }}
                                            </li>
                                            <li>
                                                <span><img src="{{ asset('assets/images/hall.png') }}" alt="img"
                                                        class="img-fluid w-100" /></span>
                                                {{ $relatedProperty->hall }} Hall
                                            </li>
                                            <li>
                                                <span><img src="{{ asset('assets/images/amenities_img_7.png') }}"
                                                        alt="img" class="img-fluid w-100" /></span>
                                                {{ $relatedProperty->kichen }} Kitchen
                                            </li>
                                            <li>
                                                <span><img src="{{ asset('assets/images/dining.png') }}" alt="img"
                                                        class="img-fluid w-100" /></span>
                                                {{ $relatedProperty->dining }} Dining
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                        <a class="read_btn" href="{{ route('property', $relatedProperty->slag) }}">More
                                            Details<i class="fas fa-arrow-right"></i></a>
                                    </div>
                                    <span class="property_price">${{ $relatedProperty->price }}</span>
                                </div>







                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

@endsection
@section('script')
    <script>
        var isAuthenticated = @json(Auth::check());
    </script>
    <script>
        $(document).ready(function() {
            $('#addToCart').click(function() {
                if (!isAuthenticated) {
                    window.location.href = '{{ route('login') }}';
                    return;
                }

                var itemId = $(this).data('id');
                $.ajax({
                    url: '/cart/add',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: itemId
                    },
                    success: function(response) {
                        var responseData = JSON.parse(response);
                        $('#cartItems').html('');
                        console.log(responseData);

                        var cartCount = 0;

                        $('#noProduct').html('');
                        $('.sidecart__footer').show();

                        // var cartCount = responseData.CartDetails.length;

                        $.each(responseData.CartDetails, function(key, val) {
                            var cartItems = val;

                            $('#cartItems').prepend(
                                '<li class="grid_4 item container"><div class="preview">   <img style="width: 100px;" src="/public/' +
                                cartItems.image +
                                '"></div>                 <div class="details" data-price="15.50"><h3>' +
                                cartItems.title +
                                '</h3>      </div><div class="inner_container"><div class="col_1of2 align-center picker"><p><a href="#" OnClick="RemoveFromCart(' +
                                cartItems.id +
                                ')" class="btn-remove"><i class="far fa-trash-alt"></i></a></p></div></div></li>'
                            );

                            cartCount++;
                        });

                        // Update cart count
                        $('#cartCount').text(cartCount);

                    },
                    error: function(xhr, status, error) {
                        console.log('An error occurred: ' + error);
                    }
                });
            });
        });
    </script>
    <script>
        var isAuthenticated = @json(Auth::check());
    </script>
    <script>
        $(document).ready(function() {
            $('.addCart').click(function(event) {
                event.preventDefault();

                if (!isAuthenticated) {
                    window.location.href = '{{ route('login') }}';
                    return;
                }

                var itemId = $(this).data('id');
                $.ajax({
                    url: '/cart/add',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: itemId
                    },
                    success: function(response) {
                        var responseData = JSON.parse(response);
                        console.log(responseData);

                        var cartCount = 0;

                        $('#noProduct').html('');
                        $('.sidecart__footer').show();

                        $.each(responseData.CartDetails, function(key, val) {
                            var cartItems = val;

                            $('#cartItems').append(
                                '<li class="grid_4 item container"><div class="preview"><img style="width: 100px;" src="/public/' +
                                cartItems.image +
                                '"></div><div class="details" data-price="15.50"><h3>' +
                                cartItems.title +
                                '</h3></div><div class="inner_container"><div class="col_1of2 align-center picker"><p><a href="#" OnClick="RemoveFromCart(' +
                                cartItems.id +
                                ')" class="btn-remove"><i class="far fa-trash-alt"></i></a></p></div></div></li>'
                            );

                            cartCount++;
                        });

                        $('#cartCount').text(cartCount);
                    },
                    error: function(xhr, status, error) {
                        console.log('An error occurred: ' + error);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                items: 1,
                itemsDesktop: [1000, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                pagination: false,
                navigation: true,
                navigationText: ["", ""],
                autoPlay: true
            });
        });
    </script>
@endsection

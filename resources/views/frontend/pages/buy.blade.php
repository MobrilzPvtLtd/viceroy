@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection

@section('CustomCss')
    <meta name="description" content="test">
    <link rel="stylesheet" href="{{ asset('assets/css/buy.css') }}" />
    <style>
        .modal-box {
            width: 100%;
            max-width: 500px;
        }

        .sd-multiSelect {
            position: relative;
        }

        .sd-multiSelect .placeholder {
            opacity: 1;
            background-color: transparent;
            cursor: pointer;
        }

        .sd-multiSelect .ms-offscreen {
            height: 1px;
            width: 1px;
            opacity: 0;
            overflow: hidden;
            display: none;
        }

        .sd-multiSelect .sd-CustomSelect {
            width: 100% !important;
        }

        .sd-multiSelect .ms-choice {
            position: relative;
    text-align: left !important;
    width: 250px;
    border: 1px solid #cccccc;
    background: #ffff;
    box-shadow: none;
    font-size: 15px;
    /* height: 50px; */
    font-weight: 500;
    color: #212529;
    line-height: 1.5;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    /* border-radius: 0.25rem; */
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .sd-multiSelect .ms-choice:after {
            content: "\f107 ";
            font-family: "FontAwesome";
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
        }

        .sd-multiSelect .ms-choice:focus {
            border-color: var(--theme-color);
        }

        .sd-multiSelect .ms-drop.bottom {
            display: none;
            background: #fff;
            border: 1px solid #e5e5e5;
            padding: 10px;
        }

        .sd-multiSelect .ms-drop li {
            position: relative;
            margin-bottom: 10px;
        }

        .sd-multiSelect .ms-drop li input[type="checkbox"] {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .ms-drop.bottom {
            width: 250px;
        }

        .sd-multiSelect .ms-drop li label {
            cursor: pointer;
            user-select: none;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
        }

        /* .sd-multiSelect .ms-drop li label:before {
      content: "";
      -webkit-appearance: none;
      background-color: transparent;
      border: 2px solid var(--theme-color);
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
        inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
      padding: 8px;
      display: inline-block;
      position: relative;
      vertical-align: middle;
      cursor: pointer;
      margin-right: 5px;
    }

    .sd-multiSelect .ms-drop li input:checked + span:after {
      content: "";
      display: block;
      position: absolute;
      top: 9px;
      left: 5px;
      width: 10px;
      height: 10px;
      background: var(--theme-color);
      border-width: 0 2px 2px 0;
    } */
    </style>
@endsection

@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/top_banner_buy.jpg)">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Maximising Property Value <br> Minimising Hassles</h1>
                            {{-- <ul class="d-flex flex-wrap justify-content-center">
                                <li>
                                    <a href="#"><i class="fas fa-home"></i>Home</a>
                                </li>
                                <li><a href="#">Buy Property</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="property_grid_view pb_120 xs_pb_100">
        <div class="container-fluid">
            <div class="row justify-content-center wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-12 col-lg-12 buy001">
                    <div class="banner_search" id="container2">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    Buy
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <form action="{{ route('buy') }}" method="GET">
                                    <div class="" id="home_form">
                                        <div id="cancel_rqst1" class="home_form_label">
                                            <label>Country</label>
                                            <select class="select_label s1" name="co_name" id="co_name" required focus>
                                                <option value="" disabled selected>Select country </option>

                                                @foreach ($countrys as $country)
                                                    <option value="{{ $country->id }}">{{ $country->co_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="cancel_rqst2" class="home_form_label">
                                            <label>State</label>
                                            <select class="select_label s1" name="st_name" id="st_name" required focus>
                                                <option value="" disabled selected>Select state </option>

                                                {{-- @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->st_name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>


                                        <div id="cancel_rqst3" class="home_form_label">
                                            <label>City</label>
                                            <select class="select_label s1" name="ct_name" id="city" required focus>
                                                <option value="" disabled selected> Select city</option>
                                                {{-- @foreach ($citys as $city)
                                                    <option value="{{ $city->id }}">{{ $city->ct_name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="home_form_label s2">
                                            <label>Bedrooms</label>
                                            <div class="adv_search_icon" id="select_bedroom_btn">
                                                <input class="select_label select_bedroom_btn" id="bedroomButton"
                                                    name="bedrooms" type="button" value="Select bedrooms">
                                            </div>

                                            <div class="adv_search_area show_search1" id="close001">
                                                <div id="close_btn_minmax" class="adv_search_close adv_search_close_1">
                                                    <i class="fal fa-times"></i>
                                                </div>

                                                <div id="min_max">
                                                    <select class="select_2" id="bedroomMin" name="bedrooms">
                                                        <option value="">Min</option>
                                                        @foreach ($uniqueBedrooms as $bedroom)
                                                            <option value="{{ $bedroom }}">{{ $bedroom }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <select class="select_2" id="bedroomMax" name="bedrooms">
                                                        <option value="">Max</option>
                                                        @foreach ($uniqueBedrooms as $bedroom)
                                                            <option value="{{ $bedroom }}">{{ $bedroom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="home_form_label s2">
                                            <label>Price</label>
                                            <div class="adv_search_icon2" id="select_price_btn">
                                                <input type="button" value="Select Price" class="select_label s22"
                                                    id="priceButton" name="price">
                                            </div>

                                            <div class="adv_search_area2" id="close002">
                                                <div class="adv_search_close3">
                                                </div>
                                                <div id="min_max2">
                                                    <div>
                                                        <select class="select_2" id="priceMin" name="price">
                                                            <option value="">Min</option>
                                                            @foreach ($uniquePrices as $price)
                                                                <option value="{{ $price }}">{{ $price }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <select class="select_2" id="priceMax" name="price">
                                                            <option value="">Max</option>
                                                            @foreach ($uniquePrices as $price)
                                                                <option value="{{ $price }}">{{ $price }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-box">
                                            <div id="cancel_rqst4" class="sd-multiSelect form-group">
                                                <label for="current-job-role">Property Type</label>
                                                <select multiple id="current-job-role" class="sd-CustomSelect"
                                                    aria-placeholder="yggv" placeholder="Select Property type" name="p_type">
                                                    @foreach ($uniquePropertyTypes as $p_type)
                                                        <option value="{{ $p_type }}">{{ $p_type }}</option>
                                                    @endforeach

                                                    {{-- <option value="Apartments">Apartments</option>
                                                <option value="Villa">Villa</option>
                                                <option value="House">House</option>
                                                <option value="Hotel">Hotel</option> --}}
                                                </select>
                                            </div>
                                        </div>

                                        {{-- <div id="cancel_rqst5" class="home_form_label">
                                            <label>Currency</label>
                                            <select class="select_label" name="code">
                                                <option value="" disabled selected> Select Currency</option>
                                                @foreach ($currencys as $currency)
                                                    <option value="{{ $currency->code }}" {{ $currency->code == request()->session()->get('currency') ? 'selected' : '' }}>{{ $currency->code }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="">
                                            <button class="common_btn banner_input_btn" type="submit"
                                                style="width: 100%; margin-top: 30px">
                                                search
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <form action="#">
                                    <div class="row">
                                        <div id="cancel_rqst1" class="col-lg-2">
                                            <label>Country</label>
                                            <select class="select_label" name="state">
                                                <option value="">Select Country</option>
                                                <option value="">India</option>
                                                <option value="">United Arab Emirates Dubai</option>
                                                <option value="">United Kingdom London</option>
                                            </select>
                                        </div>
                                        <div id="cancel_rqst" class="col-lg-2">
                                            <label>City</label>
                                            <select class="select_2" name="state">
                                                <option value="">Select City</option>
                                                <option value="">India</option>
                                                <option value="">United Arab Emirates Dubai</option>
                                                <option value="">United Kingdom London</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>Rooms</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="select_2" name="state">
                                                        <option value="">Min</option>
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="select_2" name="state">
                                                        <option value="">Max</option>
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>Price</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="select_2" name="state">
                                                        <option value="">Min</option>
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="select_2" name="state">
                                                        <option value="">Max</option>
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4" style="margin-top: 10px">
                                            <label>No. Of Bedrooms </label>
                                            <select class="select_2" name="state">
                                                <option value="">No. Of Bedrooms</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">2</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4" style="margin-top: 10px">
                                            <label>Currency</label>
                                            <select class="select_2" name="state">
                                                <option value="">Select</option>
                                                <option value="">India</option>
                                                <option value="">United Arab Emirates Dubai</option>
                                                <option value="">United Kingdom London</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="common_btn banner_input_btn" type="submit"
                                                style="width: 100%; margin-top: 30px">
                                                search
                                            </button>
                                        </div>
                                    </div>

                                    <!--<div class="adv_search_icon adv_search_icon_1"><i class="far fa-ellipsis-v"></i>
                                                                                                                                                                                                            </div>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <section class="discover_area pt_70 xs_pt_95 pb_70 xs_pb_100"
                style="background: url(assets/images/Discover_bg.jpg)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s"
                            style="
                  visibility: visible;
                  animation-duration: 1.5s;
                  animation-name: fadeInUp;
                ">
                            <div class="section_heading mb_25">
                                <h2>Maximising Property Value <br> Minimising Hassles</h2>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                            style="
                  visibility: visible;
                  animation-duration: 1.5s;
                  animation-name: fadeInUp;
                ">
                            <div class="single_discover card0001" style="height: 225px">
                                <div class="discover_img">
                                    <img src="assets/images/search.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <a class="item_title" href="#">Search your Location</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                            style="
                  visibility: visible;
                  animation-duration: 1.5s;
                  animation-name: fadeInUp;
                ">
                            <div class="single_discover card0001 " style="height: 225px">
                                <div class="discover_img">
                                    <img src="assets/images/house.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <a class="item_title" href="#">Check out The Residence</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                            style="
                  visibility: visible;
                  animation-duration: 1.5s;
                  animation-name: fadeInUp;
                ">
                            <div class="single_discover  card0001 " style="height: 225px">
                                <div class="discover_img">
                                    <img src="assets/images/bag.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <a class="item_title" href="#">Obtain your Perfect House</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                            style="
                  visibility: visible;
                  animation-duration: 1.5s;
                  animation-name: fadeInUp;
                ">
                            <div class="single_discover card0001 " style="height: 225px">
                                <div class="discover_img">
                                    <img src="assets/images/happy.png" alt="icon" class="img-fluid w-100" />
                                </div>
                                <a class="item_title" href="#">Delight in your Residence</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- </section> --}}


            <div class="container">
                <div class="row mt_95 xs_mt_75 ">
                    <button id="btn001" onclick="func()" name="map-view">
                        <i class="fa-solid fa-map"> Map view</i>
                    </button>
                    <button id="btn002" onclick="func()" name="list-view">
                        <i class="fa-solid fa-list"> List view</i>
                    </button>
                    <div class="col-md-9 " id="list001">
                        <div class="row" id="lits-item">
                            @if (count($propertys) > 0)
                                @foreach ($propertys as $property)
                                    <div class="col-xl-4 col-md-6 wow fadeInUp " data-wow-duration="1.5s">
                                        <div class="single_property">
                                            <div class="single_property_img">
                                                @php
                                                    $images = json_decode($property->image);
                                                @endphp
                                                @if ($images && count($images) > 0)
                                                    {{-- asset('public/uploads/' . $image) --}}
                                                    @foreach ($images as $image)
                                                        <img src="{{ asset('public/storage/' . $image) }}" alt="Image"
                                                            style="width: 100%">
                                                    @endforeach
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                                <a class="feature_link" href="">{{ $property->type }}</a>
                                                @if ($property->featured)
                                                    <a class="feature_link feature" href="#">Featured</a>
                                                @endif
                                                <div id="testimonial-slider1" class="owl-carousel">
                                                    <div class="testimonial">
                                                        <div class="pic">
                                                            @php
                                                                $images = json_decode($property->image);
                                                            @endphp
                                                            @if ($images && count($images) > 0)
                                                                {{-- asset('public/uploads/' . $image) --}}
                                                                @foreach ($images as $image)
                                                                    <img src="{{ asset('public/storage/' . $image) }}"
                                                                        alt="Image" style="width: 100%">
                                                                @endforeach
                                                            @else
                                                                <p>No images available</p>
                                                            @endif
                                                            <a class="feature_link"
                                                                href="">{{ $property->type }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single_property_text">
                                                <div class="single_property_top">
                                                    <div class="wish001">
                                                        <a class="item_title"
                                                            href="{{ route('property', $property->slag) }}">{{ $property->title }}</a>
                                                        {{-- <button type="submit" id=""
                                                            onclick="addToCartOrRemove({{ $property->id }})"
                                                            class="addToCart btn btn-primary"><i
                                                                class="fa fa-heart"></i></button> --}}
                                                        <button id="addtocart-{{ $property->id }}" type="submit"
                                                            onclick="addToCartOrRemove({{ $property->id }})"
                                                            class="addToCart btn btn-primary"><i
                                                                class="fa fa-heart"></i></button>

                                                    </div>

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
                                                            <span><img src="assets/images/bath.png" alt="img"
                                                                    class="img-fluid w-100" /></span>
                                                            {{ $property->number_bathroom }} Baths
                                                        </li>
                                                        <li>
                                                            <span><img src="assets/images/LAND.png" alt="img"
                                                                    class="img-fluid w-100" /></span>
                                                            {{ $property->area }} {{ $property->size }}
                                                        </li>
                                                        <li>
                                                            <span><img src="assets/images/hall.png" alt="img"
                                                                    class="img-fluid w-100" /></span>
                                                            {{ $property->hall }} Hall
                                                        </li>
                                                        <li>
                                                            <span><img src="assets/images/amenities_img_7.png"
                                                                    alt="img" class="img-fluid w-100" /></span>
                                                            {{ $property->kichen }} Kitchen
                                                        </li>
                                                        <li>
                                                            <span><img src="assets/images/dining.png" alt="img"
                                                                    class="img-fluid w-100" /></span>
                                                            {{ $property->dining }} dining
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="single_property_bottom d-flex flex-wrap justify-content-between">
                                                    <a class="read_btn"
                                                        href="{{ route('property', $property->slag) }}">More
                                                        Details<i class="fas fa-arrow-right"></i></a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12" style="text-align: center">No Property Found</div>
                            @endif
                            {{-- <div style="text-align: center">
                                {!! $propertys->links() !!}
                            </div> --}}
                        </div>

                    </div>

                    <div class="col-md-3" id="map001">
                        <div id="mapCanvas" style="height: 600px"></div>
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
                            var markers = <?php echo json_encode($markers); ?>;

                            // Info window content
                            var infoWindowContent = <?php echo json_encode($infowindow); ?>;

                            // Add multiple markers to map
                            var infoWindow = new google.maps.InfoWindow(),
                                marker, i;

                            // Place each marker on the map
                            for (i = 0; i < markers.length; i++) {
                                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                                bounds.extend(position); // Extend bounds to include each marker's position
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
                            }

                            // Fit the map bounds to include all markers
                            map.fitBounds(bounds);

                            // Set zoom level based on bounds
                            var boundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event) {
                                // Set the zoom level after the map bounds are changed
                                this.setZoom(Math.min(this.getZoom(), 14)); // You can adjust the max zoom level here
                                google.maps.event.removeListener(boundsListener);
                            });
                        }

                        window.initMap = initMap;
                    </script>


                    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyC5oJyFp78LqQzen5Dtp1m4zlS3a2M3de4" defer></script>


                    <style>
                        #mapCanvas {
                            height: 400px;
                            /* The height is 400 pixels */
                            width: 100%;
                            /* The width is the width of the web page */
                        }
                    </style>

                </div>

            </div>

        </div>
    </section>
    <section class="find_state mt_115" style="background: url() ; height : 30vw; margin-bottom:200px ">

        <div class="video_player_div" style="position : relative; width : 100vw ; height : 40vw ; overflow : hidden ;">
            <video style="margin-top : -12vw ; width : 100vw ; height:auto ; position : absolute; z-index : 5 ; "
                data-vbg-loop="true" src="http://viceroy.ultimatetrueweb.com/assets/videos/TopBanner.mp4" autoplay muted
                loop></video>


            <div class="container" style="position: absolute ; z-index : 10 ; transform : translate(25% , 0);">

                <div class="row wow fadeInUp" data-wow-duration="1.5s">
                    <div class="col-xl-12">

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.select3').select2({
                theme: 'bootstrap4',
                placeholder: ' --  All Property --'
            }).on('select2:select', function(e) {
                var selectedValue = e.params.data.id;
                $(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
                $(this).select2('close');
                $(this).select2('open');
            }).on('select2:unselect', function(e) {
                var unselectedValue = e.params.data.id;
                $(this).find('option[value="' + unselectedValue + '"]').prop('disabled', false);
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://bsite.net/savrajdutta/cdn/multi-select.js"></script>
    <script>
        $(document).ready(function() {
            $(".sd-CustomSelect").multipleSelect({
                selectAll: false,
                onOptgroupClick: function(view) {
                    $(view).parents("label").addClass("selected-optgroup");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#co_name').change(function() {
                var country = $(this).val();
                console.log(country);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-states') }}',
                    data: {
                        country: country
                    },
                    success: function(result) {
                        console.log(result);
                        $("#st_name").html(result);
                        $("#city").html('<option value="">Select City</option>');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#st_name').change(function() {
                var state = $(this).val();
                console.log(state);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-city') }}',
                    data: {
                        state: state
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




        window.addEventListener("scroll", function() {
            var container = document.getElementById("container");
            var scrollPosition =
                window.scrollY ||
                window.scrollTop ||
                document.getElementsByTagName("html")[0].scrollTop;

            if (scrollPosition > window.innerHeight / 4) {
                container.style.top = "11%";
                container.style.position = "fixed";
                container.style.width = "68vw";
            } else {
                container.style.top = "30%";
                container.style.width = "68vw";
            }
        });

        const mapView = document.querySelector("#btn001");
        const listView = document.querySelector("#btn002");
        const list = document.querySelector("#list001");
        const map = document.querySelector("#map001");
        console.log(map.name);
        let state = false;
        // mapView.addEventListener("click",
        const func = () => {
            // map.style.display = "block"
            // list.style.display="none";
            // console.log("map view ka data" , mapView.name)
            if (state == false) {
                state = true;
                console.log("hariom", state);
            } else {
                state = false;
                console.log("hariom22", state);
            }

            state == true ?
                ((map.style.display = "block ") &&
                    (list.style.display = "none") &&
                    (mapView.style.display = "none") &&
                    (listView.style.display = "block")
                ) :
                ((list.style.display = "block") &&
                    (map.style.display = "none") &&
                    (mapView.style.display = "block") &&
                    (listView.style.display = "none")

                );
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const bedroomButton = document.getElementById('bedroomButton');
            const bedroomMin = document.getElementById('bedroomMin');
            const bedroomMax = document.getElementById('bedroomMax');

            function updateBedroomButton() {
                const min = bedroomMin.value;
                const max = bedroomMax.value;

                let label = 'Select bedrooms';
                if (min || max) {
                    label = ` ${min } - ${max}`;
                }
                bedroomButton.value = label;
            }

            bedroomMin.addEventListener('change', updateBedroomButton);
            bedroomMax.addEventListener('change', updateBedroomButton);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const priceButton = document.getElementById('priceButton');
            const priceMin = document.getElementById('priceMin');
            const priceMax = document.getElementById('priceMax');

            function updatePriceButton() {
                const min = priceMin.value;
                const max = priceMax.value;

                let label = 'Select Price';
                if (min || max) {
                    label = ` ${min} - ${max}`;
                }
                priceButton.value = label;
            }

            priceMin.addEventListener('change', updatePriceButton);
            priceMax.addEventListener('change', updatePriceButton);
        });
    </script>
@endsection

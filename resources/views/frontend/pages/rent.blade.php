@extends('frontend.layouts.app')

@section('title')
    {{ app_name() }}
@endsection

@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/breadcrumbs_bg.jpg)">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Rent Property</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li>
                                    <a href="#"><i class="fas fa-home"></i>Home</a>
                                </li>
                                <li><a href="#">Rent Property</a></li>
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
                            PROPERTY GRID VIEW START
                        ==============================-->
    <section class="property_grid_view pb_120 xs_pb_100">
        <div class="container container-fluid">
            <div class="row justify-content-center wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-12 col-lg-12">
                    <div class="sticky" id="container">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <!-- <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                                            aria-selected="true">Rent</button>
                                                    </li> -->
                            <!--<li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-profile" type="button" role="tab"
                                                            aria-controls="pills-profile" aria-selected="false">Sell</button>
                                                    </li>-->
                            <!-- <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-contact" type="button" role="tab"
                                                            aria-controls="pills-contact" aria-selected="false">Rent</button>
                                                    </li>-->
                        </ul>

                        <div class="sticky" id="container">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <form action="#">
                                        <div class="" id="home_form">
                                            <div class="">
                                                <label>Country</label>
                                                <select class="" name="co_name" id="co_name" required focus>
                                                    <option value="" disabled selected> select Country</option>
                                                    @foreach ($countrys as $country)
                                                        <option value="{{ $country->id }}">{{ $country->co_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="">
                                                <label>City</label>
                                                <select class="" name="ct_name" id="city" required>
                                                    <option value="" disabled selected> select City</option>
                                                    {{-- @foreach ($citys as $city)
                                                        <option value="{{ $city->id }}">{{ $city->ct_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>

                                            <div class="">
                                                <label>Bedrooms</label>
                                                <div class="adv_search_icon">
                                                    <select class="select_2 as_select" name="state">
                                                        <option value="">Select Bedrooms</option>
                                                    </select>
                                                </div>

                                                <div class="adv_search_area">
                                                    <!-- <div class="adv_search_close adv_search_close_1">
                                                                  <i class="fal fa-times"></i>
                                                                </div> -->

                                                    <div id="min_max">
                                                        <select class="select_2" name="state">
                                                            <option value="">Min</option>
                                                            <option value="">01</option>
                                                            <option value="">02</option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                        </select>

                                                        <select class="select_2" name="state">
                                                            <option value="">Max</option>
                                                            <option value="">01</option>
                                                            <option value="">02</option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <label>Price</label>
                                                <div class="adv_search_icon2">
                                                    <select class="select_2 as_select rent_price" name="state">
                                                        <option value="">Select Price</option>
                                                    </select>
                                                </div>

                                                <div class="adv_search_area2">
                                                    <!-- <div class="adv_search_close2">
                                                                  <i class="fal fa-times"></i>
                                                                </div> -->

                                                    <div class="" id="min_max2">
                                                        <div class="">
                                                            <select class="select_2" name="state">
                                                                <option value="">Min</option>
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                            </select>
                                                        </div>
                                                        <div class="">
                                                            <select class="select_2" name="state">
                                                                <option value="">Max</option>
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <label>Property Type</label>
                                                <select class="select_2" name="state">
                                                    <option value="">Select Property</option>
                                                    <option value="">Rent</option>
                                                    <option value="">rent</option>
                                                    <option value="">Sell</option>
                                                </select>
                                            </div>

                                            <div class="">
                                                <label>Currency</label>
                                                <select class="select1-selection__rendered" name="code">
                                                    <option value="" disabled selected> select Currency</option>
                                                    @foreach ($currencys as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                        <div class="" id="home_form">
                                            <div class="">

                                                <label>Country</label>
                                                <select class="select_2" name="state">
                                                    {{-- <option value="">Select Country</option>
                                                    <option value="">India</option>
                                                    <option value="">United Arab Emirates Dubai</option>
                                                    <option value="">United Kingdom London</option> --}}
                                                </select>

                                            </div>
                                            <div class="">
                                                <label>City</label>
                                                <select class="select_2" name="state">
                                                    <option value="">Select City</option>
                                                    <option value="">India</option>
                                                    <option value="">United Arab Emirates Dubai</option>
                                                    <option value="">United Kingdom London</option>
                                                </select>
                                            </div>

                                            <div class="">
                                                <label>Rooms</label>
                                                <div class="adv_search_icon3">
                                                    <select class="select_2 as_select" name="state">
                                                        <option value="">Select Rooms</option>
                                                    </select>
                                                </div>
                                                <div class="adv_search_area3">
                                                    <!-- <div class="adv_search_close3">
                                                                  <i class="fal fa-times"></i>
                                                                </div> -->

                                                    <div class="row mt_15">
                                                        <div class="col-lg-6 col-sm-6">
                                                            <select class="select_2" name="state">
                                                                <option value="">Min</option>
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <select class="select_2" name="state">
                                                                <option value="">Max</option>
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <label>Price</label>
                                                <div class="adv_search_icon4">
                                                    <select class="select_2 as_select" name="state">
                                                        <option value="">Select Price</option>
                                                    </select>
                                                </div>
                                                <div class="adv_search_area4">
                                                    <!-- <div class="adv_search_area4">
                                                                  <i class="fal fa-times"></i>
                                                                </div> -->

                                                    <div class="row mt_15">
                                                        <div class="col-lg-6 col-sm-6">
                                                            <select class="select_2" name="state">
                                                                <option value="">Min</option>
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <select class="select_2" name="state">
                                                                <option value="">Max</option>
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <label>Property Type</label>
                                                <select class="select_2" name="state">
                                                    <option value="">Select Property</option>
                                                    <option value="">Rent</option>
                                                    <option value="">rent</option>
                                                    <option value="">Sell</option>
                                                </select>
                                            </div>

                                            {{-- <div class="">
                                                <label>Currency</label>
                                                <select class="select_2" name="state">
                                                    <option value="" disabled selected> select Currency</option>
                                                    @foreach ($currencys as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->code }}</option>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt_95 xs_mt_75">
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($rents as $rent)
                            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="single_property">
                                    <div class="single_property_img">
                                        @php
                                            $images = json_decode($rent->image);
                                        @endphp

                                        @foreach ($images as $image)
                                            <img src="{{ asset('public/uploads/' . trim($image)) }}" alt="Image"
                                                class="img-fluid w-100">
                                        @endforeach
                                        <a class="feature_link" href="#">for sale</a>
                                        {{-- <div id="testimonial-slider1" class="owl-carousel">
                                            <div class="testimonial">
                                                <div class="pic">
                                                    @php
                                                        $images = json_decode($rent->image);
                                                    @endphp

                                                    @foreach ($images as $image)
                                                        <img src="{{ asset('public/uploads/' . trim($image)) }}"
                                                            alt="Image" class="img-fluid w-100">
                                                    @endforeach
                                                    <a class="feature_link" href="#">for sale</a>
                                                </div>
                                            </div>
                                            <div class="testimonial">
                                                <div class="pic">
                                                    @php
                                                        $images = json_decode($rent->image);
                                                    @endphp

                                                    @foreach ($images as $image)
                                                        <img src="{{ asset('public/uploads/' . trim($image)) }}"
                                                            alt="Image" class="img-fluid w-100">
                                                    @endforeach
                                                    <a class="feature_link" href="#">for sale</a>
                                                </div>
                                            </div>
                                            <div class="testimonial">
                                                <div class="pic">
                                                    @php
                                                        $images = json_decode($rent->image);
                                                    @endphp

                                                    @foreach ($images as $image)
                                                        <img src="{{ asset('public/uploads/' . trim($image)) }}"
                                                            alt="Image" class="img-fluid w-100">
                                                    @endforeach
                                                    <a class="feature_link" href="#">for sale</a>
                                                </div>
                                            </div>
                                            <div class="testimonial">
                                                <div class="pic">
                                                    @php
                                                        $images = json_decode($rent->image);
                                                    @endphp

                                                    @foreach ($images as $image)
                                                        <img src="{{ asset('public/uploads/' . trim($image)) }}"
                                                            alt="Image" class="img-fluid w-100">
                                                    @endforeach
                                                    <a class="feature_link" href="#">for sale</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="single_property_text">
                                        <div class="single_property_top">
                                            <a class="item_title" href=" ">{{ $rent->name }}</a>
                                            <p>
                                                <i class="fas fa-map-marker-alt"></i>{{ $rent->address }}
                                            </p>
                                            <ul class="d-flex flex-wrap">
                                                <li>
                                                    <span><img src="assets/images/bad.png" alt="img"
                                                            class="img-fluid w-100" /></span>
                                                    {{ $rent->beds }} Beds
                                                </li>
                                                <li>
                                                    <span><img src="assets/images/bathtab.png" alt="img"
                                                            class="img-fluid w-100" /></span>
                                                    {{ $rent->bath }} Baths
                                                </li>
                                                <li>
                                                    <span><img src="assets/images/squre.png" alt="img"
                                                            class="img-fluid w-100" /></span>
                                                    {{ $rent->area }} Sq Ft
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                            <a class="read_btn" href="{{ $rent->url }}">More Details<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                        <div class="single_property_bottom d-flex flex-wrap justify-content-between">
                                            <a class="read_btn"><i aria-hidden="true"></i>{{ $rent->p_type }}</a>
                                        </div>
                                        <span class="property_price">${{ $rent->price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.0361376969!2d-74.30933885453035!3d40.69753995160874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1709299375137!5m2!1sen!2sin"
                        width="100%" height="1050" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div style="text-align: center">
                    {!! $rents->links() !!}
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
@endsection


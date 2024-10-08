@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')
    <meta name="description" content="test">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}" />
@endsection

@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/breadcrumbs_bg.jpg)">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Request Form</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li>
                                    <a href="#"><i class="fas fa-home"></i>Home</a>
                                </li>
                                <li><a href="#">Request Form</a></li>
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
        <div class="container d-flex">
            <div class="row justify-content-between">
                {{-- @if ($sessionData['CartDetails'] > 0) --}}
                    @foreach ($sessionData['CartDetails'] as $cartItem)
                        <div class="col-xxl-4 col-lg-5 wow fadeInLeft w-75" data-wow-duration="1.5s">
                            <li class="grid_4 item">
                                <div class="preview">
                                    <img src="{{ asset('public/storage/' . $cartItem['image']) }}" />
                                </div>
                                <div class="details" data-price="15.50">
                                    <h3>
                                        {{ $cartItem['title'] }}
                                    </h3>
                                    {{-- <p>{{ $cartItem['description'] }}</p> --}}

                                </div>
                                <div class="inner_container">

                                    <div class="col_1of2 align-center picker">
                                        <p>

                                            <a href="#" onclick="RemoveFromCart({{ $cartItem['id'] }})"
                                                class="btn-remove">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </p>
                                        <input type="hidden" class="quantity_field" name="quantity" data-price="15.50"
                                            value="1" />
                                    </div>
                                </div>

                            </li>

                        </div>
                    @endforeach
                {{-- @else
                    <p>Your cart is empty.</p>
                @endif --}}
            </div>
            <div class="col-xxl-7 col-lg-7 wow fadeInRight" data-wow-duration="1.5s">
                <form action="{{ route('checkout.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="url_type" value="checkout">
                    @php
                        $titles = [];
                        $images = []; // Initialize the $images array

                        foreach ($sessionData['CartDetails'] as $cartItems) {
                            $titles[] = $cartItems['title'];
                            $images[] = $cartItems['image'];
                        }

                        $titlesString = implode(', ', $titles);
                        $imagesString = implode(', ', $images);
                    @endphp

                    <input type="hidden" name="title[]" value="{{ $titlesString }}">
                    <input type="hidden" value="{{ $imagesString }}" name="image[]">
                    <div class="row">
                        @include('flash::alert-message')
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="contact_input">
                                <label for="Name">Name</label>
                                <input type="text"umbername="name"
                                    value="{{ auth()->check() ? auth()->user()->name : '' }}" placeholder="e.g John Paul"
                                    required />
                                <span class="contact_input_icon">
                                    <img src="assets/images/user_icon_3.png" alt="icon" class="img-fluid w-100" />
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="contact_input">
                                <label for="Phone">Phone Number</label>
                                <input type="text" name="number" placeholder="e.g 9098876234" required />
                                <span class="contact_input_icon">
                                    <img src="assets/images/call_2.png" alt="icon" class="img-fluid w-100" />
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="contact_input">
                                <label for="Phone">Email</label>
                                <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" placeholder="" required />
                                <span class="contact_input_icon">
                                    <img src="assets/images/massage_4.png" alt="icon" class="img-fluid w-100" />
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="contact_input">
                                <label for="Date">Date</label>
                                <input type="date" name="date" placeholder="" required />

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6 dt" style="display: flex">
                            <div class="contact_input">
                                <label for="startTime">Start Time</label>
                                <input type="time" id="startTime" name="st_time" placeholder="Start Time" required
                                    value="fgsdf" />
                            </div>
                            <div class="contact_input">
                                <label for="endTime">End Time</label>
                                <input type="time" id="endTime" name="en_time" placeholder="End Time" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact_input">
                                <textarea rows="6" name="massage" placeholder="Write Message..." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact_input">
                                <button type="submit" class="common_btn">Submit your inquiry</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection

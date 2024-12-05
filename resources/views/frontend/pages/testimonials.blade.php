@extends('frontend.layouts.app')
@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')

<meta name="description" content="test">
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />

@endsection

@section('content')
    <section class="breadcrumbs" style="background: url(assets/images/top_banner_about.jpg); background-position: top !important;">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Testimonials
                            </h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Testimonials</a></li>
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

        <section class="testimonial pt_60 pb_120 xs_pb_100">
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
                    @foreach ($testimonials as $testimonial)
                        <div class="col-12">
                            <div class="testimonial_item">
                                <div class="row">
                                    <div class="col-lg-4 wow fadeInLeft" data-wow-duration="1.5s">
                                        <div class="testimonial_item_tetle">
                                            <h4>{{ $testimonial->name }}</h4>
                                            <p>{{ $testimonial->company }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 wow fadeInRight" data-wow-duration="1.5s">
                                        <div class="testimonial_description">
                                            <span>
                                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </span>
                                            <p>{{ $testimonial->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row d-none wow fadeInLeft" data-wow-duration="1.5s">
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


@endsection

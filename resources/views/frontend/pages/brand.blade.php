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
                            <h1>Our Brands
                            </h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Our Brands</a></li>
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



        <section class="partner_area pt_30 pb_30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s"
                        style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                        <div class="section_heading mb_25">
                            <h2>Our Brands</h2>
                        </div>
                    </div>
                </div>
                <marquee width="100%" behavior="scroll" direction="left" scrollamount="10" loop="infinite">
                    <div class="row justify-content-between">
                        <div class="col-xl-12">
                            <div class="marquee_animi d-flex">
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

                </marquee>
            </div>
        </section>

@endsection

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
                            <h1>Our Realtors
                            </h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Our Realtors</a></li>
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



    <section class="agent_area pt_60 xs_pt_95 pb_70 xs_pb_100 custom_slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_25">
                        <h2>Our Realtors</h2>
                    </div>
                </div>
            </div>
            <div class="or001">
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
                                        @if (!empty($professional->email))
                                            <a href="mailto:{{ $professional->email }}">
                                                <i class="fas fa-envelope"></i>{{ $professional->email }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        @if (!empty($professional->email))
                                            <a href="mailto:{{ $professional->email }}">
                                                <i class="fas fa-envelope"></i>{{ $professional->email }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        @if (!empty($professional->email))
                                            <a href="mailto:{{ $professional->email }}">
                                                <i class="fas fa-envelope"></i>{{ $professional->email }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        @if (!empty($professional->email))
                                            <a href="mailto:{{ $professional->email }}">
                                                <i class="fas fa-envelope"></i>{{ $professional->email }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        @if (!empty($professional->email))
                                            <a href="mailto:{{ $professional->email }}">
                                                <i class="fas fa-envelope"></i>{{ $professional->email }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section>

@endsection

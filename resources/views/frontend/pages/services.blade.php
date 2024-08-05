@extends('frontend.layouts.app')

@section('title')
    {{ app_name() }}
@endsection
@section('CustomCss')
    <meta name="description" content="test">
    <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}" />
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
            height: 525px;
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

        .container01 {
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 50px;
        }

        .image-circle01 {
            width: 332px;
            height: 332px;
            border-radius: 50%;
            border-top: 2px dashed #ffcc00;
            border-right: 2px dashed #ffcc00;
            border-left: 2px dashed #000000;
            border-bottom: 2px dashed #000000;
            padding: 10px;
            animation: spin 10s infinite linear;
        }

        .image-circle01 img {
            animation: spin 10s infinite reverse linear;
            width: 100%;
            border-radius: 50%;
        }



        @keyframes spin {
            100% {
                transform: rotate(1turn);
            }
        }
    </style>



    <section class="breadcrumbs" style="background: url(assets/images/breadcrumbs_bg.jpg);">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Services</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Services</a></li>
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
                    ABOUT US PAGE START
                ==============================-->
    <section class="about_area pt_80 xs_pt_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_25">
                        <h2>From Maintenance to Relations <br> We’ve Got You Covered</h2>
                    </div>
                </div>
            </div>
            <div class="d-flex ">
                <a href="{{ route('india') }}" class="container01">
                    <div class="image-circle01">
                        <img src="assets/images/india.png" />
                    </div>
                    <h3 href="{{ route('india') }}" >INDIA</h3>
                </a>
                <a href="{{ route('uae') }}" class="container01">
                    <div class="image-circle01">
                        <img src="assets/images/UAE.png" />
                    </div>
                    <h3 href="{{ route('uae') }}" >UAE</h3>
                </a>
                <a href="{{ route('uk') }}" class="container01">
                    <div class="image-circle01">
                        <img src="assets/images/uk.png" />
                    </div>
                    <h3 href="{{ route('uk') }}">UK</h3>
                </a>
            </div>


            {{-- <div class="row">
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">


                        <h6>ESTATE MANAGEMENT </h6>
                        <p>Most owners face can’t take time off to get any civil, repair, legal or administrative work done
                            for their estate. To resolve this issue we are extending comprehensive estate management
                            services for the estate owner; whether it being for scheduled maintenance or earning potential
                            revenue.</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">

                        <h6>PROPERTY VERIFICATION</h6>
                        <p>Ensuring the property is thoroughly checked to confirm its ownership status, presence of all
                            required approvals, clearances, Government records, paper trail to determine and confirm a
                            property's legal ownership and determine any claims on the property and absence of any legal
                            disputes or encumbrances that could affect its marketability. It reveals any mortgages, liens,
                            judgements, or unpaid taxes that will have to be cleared before the property can be sold or
                            purchased; and details of any existing easements, restrictions or leasing affecting the
                            property. Title Search Report of the last 10-20 years & Certified Copy from the Registrar is
                            also accompanied by this report. </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">


                        <h6>PROPERTY VALUATION & REGISTRATION</h6>
                        <p>Conducting a comprehensive assessment of the economic worth of the real estate property to
                            determine a fair market value that aligns with the interests of both buyers and sellers.
                            Facilitating the proper registration of the property with the relevant authorities, ensuring
                            compliance with legal requirements, and guiding through the necessary paperwork, timelines, and
                            costs involved in the registration process. </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">

                        <h6>GOVERNMENT LIAISONING, LICENSES & APPROVALS </h6>
                        <p>Providing support in dealing with government, semi-government, and statutory bodies for obtaining
                            necessary licenses, approvals, and permissions. We assist in navigating through bureaucratic
                            processes, advocating for clients' interests, and resolving regulatory issues to ensure smooth
                            business operations and compliance.”</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">


                        <h6>LEGAL & ACCOUNTING REPRESENTATION</h6>
                        <p>Dedicated Case Manager is allocated to assist you in lawyer coordination, appointments,
                            registration process along with monetary & tax settlement. Along with our associate partners we
                            will offer Agreement to Sale drafting, legal representation for Sale Deed execution, appointment
                            at Registrar office, Tax Compliances towards Land Sale, Re-investment; along with additional
                            Hospitality Services such as personalised airport handling and accommodation with detailed
                            briefing of the itinerary/meetings, Notary services at home/hotel, payment management (cash
                            counting, bank transfer, etc.), savings against Capital Gain Tax,, etc. </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">

					   <h6>LEGAL PROPERTY REPRESENTATION</h6>
					   <p>Offering expert legal guidance and representation to address property-related legal matters, including identifying reputable legal professionals, devising effective legal strategies, and overseeing the entire legal process from initiation to resolution while safeguarding the client's interests.</p>
                    </div>
                </div>
				      <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">

					   <h6>GOVERNMENT LIAISONING, LICENSES & APPROVALS</h6>
					   <p>Providing support in dealing with government, semi-government, and statutory bodies for obtaining necessary licenses, approvals, and permissions. We assist in navigating through bureaucratic processes, advocating for clients' interests, and resolving regulatory issues to ensure smooth business operations and compliance.”</p>
                    </div>
                </div>

            </div> --}}


        </div>
    </section>




    <section class="partner_area pb_60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s"
                    style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="section_heading mb_25">
                        <h2>Our Brands</h2>
                    </div>
                </div>
            </div>

            <marquee width="100%" behavior="scroll" direction="left" scrollamount="12" loop="infinite">
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
            </marquee>
        </div>
    </section>
@endsection

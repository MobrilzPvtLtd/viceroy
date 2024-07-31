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
                            <h1>India</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">India</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection

@extends('frontend.layouts.app')

@section('title')
    {{ app_name()}}
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
	height:400px;
}


.single_discover h6{
    font-size: 25px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.single_discover p{
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
.discover_img h3{
font-size:60px;
color:#fff;
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
    <section class="about_area pt_80 pb_60 xs_pt_100">
        <div class="container">
             <div class="row justify-content-center">
                <div class="col-xl-8 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_heading mb_25">
                        <h2>Discover a new way of living</h2>
                    </div>
                </div>
            </div>

         <div class="row">
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">


					   <h6>PROPERTY VERIFICATION </h6>
					   <p>Ensuring the property, whether it's a house, flat, or land, is thoroughly
					   checked to confirm its ownership status, presence of all
					   required approvals and clearances, and absence of any legal
					   disputes or encumbrances that could affect its marketability.</p>
                    </div>
                </div>

                 <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">

					   <h6>PROPERTY REGISTRATION</h6>
					   <p>Facilitating the proper registration of the property with the relevant authorities, ensuring compliance with legal requirements, and guiding through the necessary paperwork, timelines, and costs involved in the registration process. </p>
                    </div>
                </div>
				      <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">


					   <h6>MUTATION & PARTITION</h6>
					   <p>Managing the process of transferring property ownership from one party to another (mutation) and handling cases where the property needs to be divided among multiple owners or stakeholders (partition). </p>
                    </div>
                </div>
				      <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">

					   <h6>CONVERSION SANAD </h6>
					   <p>Assisting individuals and businesses in navigating through the complex and lengthy procedures across multiple government departments required for converting land usage, obtaining necessary permissions, addressing grievances, and resolving issues related to land conversions.</p>
                    </div>
                </div>
				      <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="single_discover">


					   <h6>PROPERTY VALUATION</h6>
					   <p>Conducting a comprehensive assessment of the economic worth of the real estate property to determine a fair market value that aligns with the interests of both buyers and sellers. </p>
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

            </div>


        </div>
    </section>




    <section class="partner_area pt_60 pb_60">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12">
                    <div class="marquee_animi">
                        <ul class="single_partner">
                            <li><a href="agencies_details.html"><img src="assets/images/partner_1.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_10.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_3.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_4.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_5.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_6.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_7.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_8.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_9.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                            <li><a href="agencies_details.html"><img src="assets/images/partner_10.png" alt="img"
                                        class="img-fluid w-100"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

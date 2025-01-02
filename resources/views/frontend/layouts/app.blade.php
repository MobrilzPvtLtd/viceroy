<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->currentLocale()) }}" dir="{{ language_direction() }}">

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" sizes="76x76">
    <link type="image/png" href="{{ asset('img/favicon.png') }}" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />

    @include('frontend.includes.meta')

    <!-- Shortcut Icon -->
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <link type="image/ico" href="{{ asset('img/favicon.png') }}" rel="icon" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animated_barfiller.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/summernote.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/scroll_button.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/utilities.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.simple-bar-graph.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aryann.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    <!--jquery library js-->
    <script src="/assets/js/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">

<!-- Include intl-tel-input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    @include('frontend.layouts.style')
    @yield('CustomCss')


    {{-- @yield('style') --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('frontend.includes.nav')
    @include('frontend.includes.cart')
    <main class="bg-white dark:bg-gray-800">
        @yield('content')
    </main>

    @include('frontend.includes.footer')

    <!-- Scripts -->
    @livewireScripts
    @stack('after-scripts')
    @yield('script')

    <!-- Import Web Component -->
    <script type="module"
        src="https://unpkg.com/@porscheofficial/cookie-consent-banner@2.1.0/dist/cookie-consent-banner/cookie-consent-banner.esm.js"></script>
    <!-- Update Styles-->
    <style>
        :root {
            --cookie-consent-banner-z-index-container: 101;
            --cookie-consent-banner-colors-primary: rgba(0, 255, 255, 0.82);
            --cookie-consent-banner-colors-primary-border: var(--cookie-consent-banner-colors-primary);
            --cookie-consent-banner-colors-primary-content: #fff;

            --cookie-consent-banner-border-radius-buttons: 100px;
            --cookie-consent-banner-border-radius-body: 0;

            --cookie-consent-banner-spacings-container-padding-top: 0;
            --cookie-consent-banner-spacings-container-padding-left: 0;
            --cookie-consent-banner-spacings-container-padding-bottom: 0;
            --cookie-consent-banner-spacings-container-padding-right: 0;
        }
    </style>

    <!-- Init Web Component -->
    <cookie-consent-banner btn-label-accept-and-continue="Agree and continue"
        btn-label-only-essential-and-continue="Continue with technically required cookies only"
        btn-label-persist-selection-and-continue="Save selection and continue"
        btn-label-select-all-and-continue="Select all and continue"
        content-settings-description="You can decide which cookies are used by selecting the respective options below. Please note that your selection may impair in the functionality of the service.">
        We use cookies and similar technologies to provide certain features, enhance
        the user experience and deliver content that is relevant to your interests.
        Depending on their purpose, analysis and marketing cookies may be used in
        addition to technically necessary cookies. By clicking on "Agree and
        continue", you declare your consent to the use of the aforementioned cookies.
        <a href="javascript:document.dispatchEvent(new Event('cookie_consent_details_show'))">
            Here
        </a>
        you can make detailed settings or revoke your consent (in part if necessary)
        with effect for the future. For further information, please refer to our
        <a href="/privacy-policy">Privacy Policy</a>
        .
    </cookie-consent-banner>

    <script>
        /* Update available Cookie Categories */
        const cookieConsentBannerElement = document.querySelector(
            "cookie-consent-banner",
        );
        cookieConsentBannerElement.availableCategories = [
            {
                description:
                    "Enable you to navigate and use the basic functions and to store preferences.",
                key: "technically_required",
                label: "Technically necessary cookies",
                isMandatory: true,
            },
            {
                description:
                    "Enable us to determine how visitors interact with our service in order to improve the user experience.",
                key: "analytics",
                label: "Analysis cookies",
            },
            {
                description:
                    "Enable us to offer and evaluate relevant content and interest-based advertising.",
                key: "marketing",
                label: "Marketing cookies",
            },
        ];
    </script>

    <script>
        // =========================================================================
        // EXAMPLE
        // ANALYTICS w/o TAG MANAGER
        // =========================================================================
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "ENTERID");

        function loadAnalyticsScript() {
            // Add Script only once
            const scriptElementExists = document.querySelector("[data-scriptid='ga']");
            if (scriptElementExists || window?.ga) return;

            const firstScriptElement = document.getElementsByTagName("script")[0];

            const scriptElement = document.createElement("script");
            scriptElement.type = "text/javascript";
            scriptElement.setAttribute("async", "true");
            scriptElement.setAttribute(
                "src",
                "https://www.googletagmanager.com/gtag/js?id=ENTERID",
            );
            scriptElement.setAttribute("data-scriptid", "ga");

            firstScriptElement.parentNode.insertBefore(
                scriptElement,
                firstScriptElement,
            );
        }
        // =========================================================================
        // COOKIE CONSENT: LOAD SCRIPTS AFTER USER INTERACTION
        // =========================================================================
        function loadScripts(event) {
            const acceptedCategories = event?.detail?.acceptedCategories;

            if (acceptedCategories.includes("analytics")) {
                console.log("Analytics accepted.");

                loadAnalyticsScript();
            }
            if (acceptedCategories.includes("marketing")) {
                console.log("Marketing accepted.");
            }
        }

        window.addEventListener("cookie_consent_preferences_restored", loadScripts);
        window.addEventListener("cookie_consent_preferences_updated", loadScripts);
    </script>

</body>

</html>
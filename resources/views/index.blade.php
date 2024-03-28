<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title>IGC</title>
    <meta name="description" content="Intentionally Daring"/>
    <meta name="keywords" content="Intentionally Daring"/>
    <meta name="author" content="Leading Digital"/>

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="As the busy week winds down, a glimmer of hope emerges on the horizon as the weekend approaches, promising days of relaxation ahead. That's precisely how Thursday evenings can be described – a taste of the weekend's ambiance, though not yet fully indulgent as Friday awaits its turn.

This makes Thursday the ideal day to immerse oneself in the world of poetry and spoken word, to savour an unplugged performance by a beloved artist, all while relishing the finest treats from The Vanilla Moon. It's a simple yet sophisticated way to reconnect with friends, expand your network, and enjoy a night out without any overwhelming fuss"/>
    <meta name="twitter:site" content=""/>
    <meta name="instagram:creator" content="@weareidzw"/>
    <meta name="instagram:url" content="https://intentionallydaring.com/igc"/>
    <meta name="instagram:title" content="In Good Company"/>
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="As the busy week winds down, a glimmer of hope emerges on the horizon as the weekend approaches, promising days of relaxation ahead. That's precisely how Thursday evenings can be described – a taste of the weekend's ambiance, though not yet fully indulgent as Friday awaits its turn."/>


    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="In Good Company"/>
    <meta property="og:url" content="http://intentionallydaring.com/igc"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="In Good Company"/>
    <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="{{asset('banner.jpg')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends from here -->

    <!--  FAVICON AND TOUCH ICONS -->

    <!-- this icon shows in browser toolbar -->

    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('banner.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('banner.jpg') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/manifest.json') }}">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" media="all"/>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/font-awesome.min.css') }}" media="all"/>

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/libs/maginificpopup/magnific-popup.css') }}" media="all"/>

    <!-- Time Circle -->
    <link rel="stylesheet" href="{{ asset('assets/libs/timer/TimeCircles.css') }}" media="all"/>

    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/owl.carousel.min.css') }}" media="all"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/owl.theme.default.min.css') }}" media="all"/>

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Oswald:400,700%7cRaleway:300,400,400i,500,600,700,900"/>

    <!-- MASTER STYLESHEET -->
    <link id="lgx-master-style" rel="stylesheet" href="{{ asset('assets/css/style-default.min.css') }}" media="all"/>

    <!-- MODERNIZER CSS -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>


    <style>
        .price-header {
            font-family: 'Arial', sans-serif; /* You can change this to match your design */
            font-size: 24px; /* Adjust size as needed */
            color: #333; /* Adjust color as needed */
            /* Add other styles for your h3 element as needed */
        }

        .price-header .price {
            font-size: 48px; /* Adjust size as needed */
            font-weight: bold; /* Adjust weight as needed */
            color: #f9fc00; /* This is an orange color; adjust as needed */
            /* Add other styles for your price as needed */
        }

        .price-header .time-period {
            font-size: 24px; /* Adjust size as needed */
            font-weight: normal; /* Adjust weight as needed */
            vertical-align: super;
            margin-left: 5px; /* Adjust spacing as needed */
            /* Add other styles for your time period as needed */
        }
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .background-div {
            background: url('{{ asset('banner.jpg') }}') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }

        /* Smallest devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .background-div {
                background-size: contain;
                background-position: top center;
                height: 100%;

            }
            .lgx-registration-form-box {
                margin-top: -25px;
            }

            .lgx-about-content-area{
                margin-top: 25px;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media only screen and (min-width: 600px) and (max-width: 768px) {
            .background-div {
                background-size: cover;
                background-position: top center;
                height: 40vh;

            }
            .lgx-registration-form-box {
                margin-top: -20px;
            }

            .lgx-about-content-area{
                margin-top: 25px;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .background-div {
                background-size: cover;
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .background-div {
                background-size: cover;

            }
        }

    </style>
</head>

<body class="home">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="lgx-container ">
    <!-- ***  ADD YOUR SITE CONTENT HERE *** -->


    <!--HEADER-->
    <header>
        <div id="lgx-header" class="lgx-header">
            <div class="lgx-header-position lgx-header-position-white lgx-header-position-fixed ">
                <!--lgx-header-position-fixed lgx-header-position-white lgx-header-fixed-container lgx-header-fixed-container-gap lgx-header-position-white-->
                <div class="lgx-container"> <!--lgx-container-fluid-->
                    <nav class="navbar navbar-default lgx-navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="lgx-logo">
                                <a href="{{url('/')}}" class="lgx-scroll">
                                    {{--<img src="assets/img/logo.png" alt="Eventhunt Logo"/>--}}
                                </a>
                            </div>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <div class="lgx-nav-right navbar-right">
                                <div class="lgx-cart-area">
                                    <a class="lgx-btn lgx-btn-red" href="#buy">Buy Ticket</a>
                                </div>
                            </div>

                        </div><!--/.nav-collapse -->
                    </nav>
                </div>
                <!-- //.CONTAINER -->
            </div>
        </div>
    </header>
    <!--HEADER END-->


    <!--BANNER-->
    <section>
        <div class="{{--lgx-banner lgx-banner6--}} background-div" {{--style="background: url('{{ asset('banner.jpg') }}') top center no-repeat; background-size: cover; width: 100%; height: 100vh;"--}}>
            <div class="lgx-banner-style">
                <div class="lgx-inner lgx-inner-fixed">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-banner-info">
                                    <!--lgx-banner-info-center lgx-banner-info-black lgx-banner-info-big lgx-banner-info-bg-->
                                    <h3 class="subtitle">{{--You can learn anything--}}</h3>
                                    <h2 class="title">{{--Conference--}}{{-- <span><b>2</b><b>0</b><b>1</b><b>9</b></span>--}}</h2>
                                    <h3 class="date">{{--<i class="fa fa-calendar"></i>--}} {{--23-27 September, 2018--}}</h3>
                                    <h3 class="location">
                                        {{--<i class="fa fa-map-marker"></i> --}}{{--21 King Street, Dhaka 1205, Bangladesh--}}
                                    </h3>
                                    <div class="action-area">
                                        <div class="lgx-video-area">
                                            {{-- <a class="lgx-btn lgx-btn-red" href="#">Buy Ticket</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                    </div>
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--BANNER END-->


    <!--ABOUT-->
    <section id="buy">
        <div class="lgx-about">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div class="lgx-registration-form-box lgx-about-registration-box">
                                <h3 class="title price-header">Tickets
                                    <span class="price">$10</span>
                                </h3>
                                <form method="post" action="{{url(route('initiate_payment'))}}">
                                    @csrf
                                    <!-- Hidden fields to store total amount and currency -->
                                    <input type="hidden" name="totalAmount" value="">
                                    <input type="hidden" name="currentCurrency" value="USD">
                                    <input type="hidden" name="description" value="In Good Company Ticket">

                                    <div class="lgx-registration-form">
                                        <input style="font-size: 16px;" name="name" value=""
                                               class="wpcf7-form-control form-control"
                                               placeholder="Your Full Name ..." type="text" required>
                                        <input style="font-size: 16px;" name="email" value=""
                                               class="wpcf7-form-control form-control"
                                               placeholder="Your E-mail ..." type="email" required>
                                        <input style="font-size: 16px;" name="mobile" value=""
                                               class="wpcf7-form-control form-control"
                                               placeholder="Mobile Number ..." type="text" required>
                                        <input style="font-size: 16px;" value="1" min="1" id="ticketNumber"
                                               name="tickets"
                                               class="wpcf7-form-control form-control"
                                               placeholder="tickets" type="number" required>


                                        <button style="font-size: 16px;" id="usdButton" type="button"
                                                class="lgx-btn lgx-btn-blue">$USD
                                        </button>
                                        <button style="font-size: 16px;display: none" id="zwlButton" type="button"
                                                class="lgx-btn lgx-btn-red lgx-scroll">$ZWL
                                        </button>

                                        <input style="font-size: 25px;" value="BUY TICKET(s)"
                                               class="wpcf7-form-control wpcf7-submit lgx-submit"
                                               type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div  class="col-sm-12 col-md-6">
                            <div {{--style="margin-top: -60px;"--}} class="lgx-about-content-area">
                                <div class="lgx-heading">
                                    <h2 class="heading">IN GOOD COMPANY</h2>
                                    <h3 class="subheading">A Poetry & Spoken Word Experience</h3>
                                </div>
                                <div class="lgx-about-content">
                                    <p style="font-size: 20px;text-align: justify;" class="text">
                                        "As the busy week winds down, a glimmer of hope emerges on the horizon as the
                                        weekend approaches, promising days of relaxation ahead. That's precisely how
                                        Thursday evenings can be described – a taste of the weekend's ambiance, though
                                        not yet fully indulgent as Friday awaits its turn.

                                        <br/>
                                        <br/>
                                        This makes Thursday the ideal
                                        day to immerse oneself in the world of poetry and spoken word, to savour an
                                        unplugged performance by a beloved artist, all while relishing the finest treats
                                        from The Vanilla Moon. It's a simple yet sophisticated way to reconnect with
                                        friends, expand your network, and enjoy a night out without any overwhelming
                                        fuss."

                                    </p>
                                    <div class="section-btn-area">
                                        {{-- <button id="usdButton" class="lgx-btn">USD</button>
                                         <button id="zwlButton" class="lgx-btn lgx-btn-red lgx-scroll">ZWL
                                             Ticket
                                         </button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->


    <!--FOOTER-->
    <footer>
        <div id="lgx-footer" class="lgx-footer"> <!--lgx-footer-white-->
            <div class="lgx-inner-footer">
                <div class="lgx-subscriber-area {{--lgx-subscriber-area-indiv--}} {{--lgx-subscriber-area-black--}}">
                    <!--lgx-subscriber-area-indiv-->
                    <div class="container">
                        <div class="lgx-subscriber-inner {{--lgx-subscriber-inner-indiv--}}">
                            <!--lgx-subscriber-inner-indiv-->
                            <h3 class="subscriber-title">Join Mailing List For IGC</h3>
                            <form class="lgx-subscribe-form" method="POST">
                                @csrf <!-- Laravel Blade directive to include a CSRF token input -->
                                <div class="form-group form-group-email">
                                    <input type="email" name="email" id="email" placeholder="Enter your email Address  ..." class="form-control lgx-input-form form-control" required />
                                </div>
                                <div class="form-group form-group-submit">
                                    <button type="submit" id="lgx-submit-btn" class="lgx-btn lgx-submit">
                                        <span>Subscribe</span>
                                    </button>
                                </div>
                            </form>

                            <!--//.SUBSCRIBE-->
                        </div>
                    </div>
                </div>
                <div class="lgx-footer-bottom">
                    <div class="lgx-copyright">
                        <p><span>©</span> {{date('Y')}} In Good Company powered by <a
                                href="https://leadingdigital.africa" target="_blank">Leading Digital.</a></p>
                    </div>
                </div>

                <!-- //.CONTAINER -->
            </div>
            <!-- //.footer Middle -->
        </div>
    </footer>
    <!--FOOTER END-->


</div>
<!--//.LGX SITE CONTAINER-->
<!-- *** ADD YOUR SITE SCRIPT HERE *** -->
<!-- JQUERY  -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Smooth Scroll -->
<script src="{{ asset('assets/libs/jquery.smooth-scroll.js') }}"></script>

<!-- SKILLS SCRIPT -->
<script src="{{ asset('assets/libs/jquery.validate.js') }}"></script>

<!-- Google Maps API (Make sure to replace the API key if it's expired or if you have your own) -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQvRGGtL6OrpP5xVMxq_0NgiMiRhm3ycI"></script>

<!-- CUSTOM GOOGLE MAP -->
<script type="text/javascript" src="{{ asset('assets/libs/gmap/jquery.googlemap.js') }}"></script>

<!-- Magnific Popup -->
<script type="text/javascript" src="{{ asset('assets/libs/maginificpopup/jquery.magnific-popup.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- COUNTDOWN -->
<script src="{{ asset('assets/libs/countdown.js') }}"></script>
<script src="{{ asset('assets/libs/timer/TimeCircles.js') }}"></script>

<!-- Counter JS -->
<script src="{{ asset('assets/libs/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/libs/counterup/jquery.counterup.min.js') }}"></script>

<!-- Smooth SCROLL -->
<script src="{{ asset('assets/libs/jquery.smooth-scroll.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.easing.min.js') }}"></script>

<!-- Typed JS -->
<script src="{{ asset('assets/libs/typed/typed.min.js') }}"></script>

<!-- Header Parallax JS -->
<script src="{{ asset('assets/libs/header-parallax.js') }}"></script>

<!-- Instafeed JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script> -->
<script src="{{ asset('assets/libs/instafeed.min.js') }}"></script>

<!-- CUSTOM SCRIPT -->
<script src="{{ asset('assets/js/custom.script.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Assuming an exchange rate of 1 USD to 100 ZWL
        const exchangeRate = 38000;

        // Base price in USD
        let basePriceUSD = 1.00;

        // Function to update price display and hidden fields
        function updatePriceDisplay(currency) {
            // Determine the number of tickets
            const numberOfTickets = document.getElementById('ticketNumber').value;

            // Calculate the total amount
            let totalAmount = basePriceUSD * numberOfTickets;
            if (currency === 'ZWL') {
                totalAmount *= exchangeRate;
            }

            // Update the display with the correct currency symbol and total
            const priceSpan = document.querySelector('.price');
            priceSpan.textContent = currency === 'USD' ? `$${totalAmount}` : `ZWL ${totalAmount}`;

            // Update the hidden fields
            document.getElementsByName('totalAmount')[0].value = totalAmount;
            document.getElementsByName('currentCurrency')[0].value = currency;
        }

        // Event listener for USD button
        document.getElementById('usdButton').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission
            updatePriceDisplay('USD');
        });

        // Event listener for ZWL button
        document.getElementById('zwlButton').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission
            updatePriceDisplay('ZWL');
        });

        // Event listener for ticket number input changes
        document.getElementById('ticketNumber').addEventListener('input', function () {
            // Check the current currency from the hidden field
            const currency = document.getElementsByName('currentCurrency')[0].value;
            updatePriceDisplay(currency);
        });

        // Initial update to set the default state
        updatePriceDisplay('USD');
    });

</script>

<script>
    $(document).ready(function () {
        $('#lgx-submit-btn').click(function (e) {
            e.preventDefault(); // Prevent the default form submit action

            var email = $('#email').val();
            if (email.length === 0) {
                alert('Please enter your email address.');
                return; // Stop the function if the email field is empty
            }

            var formData = {
                'email': email,
                '_token': $('meta[name="csrf-token"]').attr('content'), // CSRF token
            };

            $.ajax({
                type: 'POST',
                url: '/subscribe',
                data: formData,
                success: function (response) {
                    console.log('Success:', response);
                    alert('Subscription successful!');
                },
                error: function (response) {
                    console.error('Error:', response);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });


</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6603b5691ec1082f04dbcf0e/1hpv7p9nj';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>

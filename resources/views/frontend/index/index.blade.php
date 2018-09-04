<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Greenergy LED</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Providing Technical Support and Services Capabilities from Concepts, Designs, and Constructions through facilities managements">
    <meta name="author" content="">
    <meta name="keywords" content="Greenergy LED,Greenergy Technologies,greenergy group of companies,greenergy sale,LED,greenergy technology,greenergy malaysia,greenergy-led,greenergyled">
    <!--load google fonts-->
    <link href='http://fonts.googleapis.com/css?family=PT+Mono%7cOpen+Sans:400italic,400' rel='stylesheet'
          type='text/css'>
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/custom.css') }}"/>

</head>
<body>

<div id="all" class="">
    <!-- ////////////////////// START TOP HEADER /////////////////////// -->
        @include('frontend.global.header')
    <!-- ////////////////////// END   TOP HEADER /////////////////////// -->

    <div class="container warp">
        <!-- ////////////////////// start slider-bg /////////////////////// -->

        <div class="slider-bg">
            <p> {{ $slider_desc->slider_desc }}</p>
            <h1 class="cd-headline letters rotate-2">
                <span>LED is</span>
                <span class="cd-words-wrapper">
                    @if(!empty($text))
                        @foreach($text   as  $key    =>  $st)
                            @if($key    ==  0)
                                <b class="is-visible">{{ $st }}</b>
                            @else
                                <b>{{ $st }}</b>
                            @endif
                        @endforeach
                    @endif

                </span>
            </h1>
            <div class="btn-group">
                <a href="#our-services" class="primary-btn">see more</a>
            </div><!--end btn grop-->

        </div><!--end bg -->


        <!-- ////////////////////// end  slider-bg /////////////////////// -->


        <!-- ////////////////////// start    our services /////////////////////// -->

        <div class="section our-services" id="our-services">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-blck block">
                        <div class="block-title">
                            <h3>OUR SERVICES</h3>
                        </div><!--end title -->
                        <p>{{ $service_data->service_desc }}</p>
                    </div><!--end text-block -->
                </div>


                <div class="col-md-4">
                    <div class="img-blck ">
                        {{-- 350/233 --}}
                        <img src="{{ $service_data->service_img }}" alt="" class="img-responsive"/>

                    </div><!--end text-block -->
                </div>


            </div><!--end row -->

            <div class="row">

                <div class="services-items">
                    <div class="block-title">
                        <h3>Strategy</h3>
                    </div>


                    <div class="col-md-3">
                        <div class="services-item">
                            <span><i class="fa fa-lightbulb-o"></i></span>
                            <h4>Energy Saving</h4>
                            <p>{{$service_data->service_strat1 }}</p>
                        </div><!--end services-item-->
                    </div>

                    <div class="col-md-3">
                        <div class="services-item">
                            <span><i class="fa fa-desktop"></i></span>
                            <h4>Technology</h4>
                            <p>{{$service_data->service_strat2 }}</p>
                        </div><!--end services-item-->
                    </div>

                    <div class="col-md-3">
                        <div class="services-item">
                            <span><i class="fa fa-globe"></i></span>
                            <h4>Green Technology</h4>
                            <p>{{$service_data->service_strat3 }}</p>
                        </div><!--end services-item-->
                    </div>


                    <div class="col-md-3">
                        <div class="services-item">
                            <span><i class="fa fa-check-circle"></i></span>
                            <h4>Reliability</h4>
                            <p>{{$service_data->service_strat4 }}</p>
                        </div><!--end services-item-->
                    </div>
                </div><!--end services-items-->
            </div><!--end row -->

        </div><!--end our services -->

        <!-- ////////////////////// end   our services /////////////////////// -->


        <!-- ////////////////////// start    our  portfolio /////////////////////// -->
        <div class="section-top-line our-portflio" id="our-portflio">
            <div class="block-title">
                <h3>Our Products</h3>
            </div><!--end title -->
            <div class="row">
                <div class="col-sm-2">

                    <div class="portfolioFilter">
                        <ul>

                            <li><a href="#" data-filter="*" class="current">all Categories</a></li>
                            <li><a href="#" data-filter=".LEDLighting">LED Lighting</a></li>
                            <li><a href="#" data-filter=".InteriorLEDLighting">Interior LED Lighting</a></li>
                            <li><a href="#" data-filter=".StreetLights">Street Lights</a></li>
                            <li><a href="#" data-filter=".FloodLights">Flood Lights</a></li>

                        </ul>
                    </div>

                </div>



                <div class="col-sm-10">
                    <ul class="portfolioContainer clearfix">
                        @foreach($product_array as $pa)
                            <li class="col-md-4 col-sm-6 {{ str_replace(' ', '', $pa['product_type'])   }}">
                                <div class="portfolio-item">

                                    @foreach($pa['gallery'] as  $gallery)
                                        <img src="{{ $gallery->product_img  }}" alt="image" class="img-responsive">

                                        <div class="mask">
                                            <h4>{{ $pa['product_name'] }}</h4>
                                            <a href="{{ $gallery->product_img  }}" class="sb" data-fancybox-group="gallery"
                                               title="{{ $pa['product_name'] }}"><i class="fa fa-search-plus"></i></a>
                                            <a href="/product/{{ $pa['product_id'] }}"><i class="fa fa-link"></i></a>
                                        </div><!--end mask -->
                                    @endforeach

                                </div><!-- end portfolio-item-->
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div><!--end row -->

        </div><!--end our portfolio -->

        <!-- ////////////////////// end    our  portfolio /////////////////////// -->


        <!-- ////////////////////// start testimonial/////////////////////// -->
        <div class="section testimoniol" style=" background:#EDEDED url('{{ $quote_data->quote_img }}') no-repeat center center fixed;">
            <ul class="testimoniol-slider">

                <li>
                    <p>{{ $quote_data->quote_desc }}</p>
                    <a href="">{{ $quote_data->quote_name }}, <span>{{ $quote_data->quote_pos }}</span></a>
                </li>

            </ul>


        </div><!--end testimoniol-->

        <!-- ////////////////////// end    testimonial /////////////////////// -->


        <!-- ////////////////////// start about us/////////////////////// -->
        <div class="section about-us" id="about-us">
            <div class="row">

                <div class="col-md-8">
                    <div class="text-blck block">
                        <div class="block-title">
                            <h3>about us</h3>
                        </div><!--end title -->

                        <p>
                            <span>Greenergy LED</span> is set-up to tap into the growing LED lighting market. With the
                            increasingly
                            cost <span>effective</span> & innovative products, <span>energy efficient</span> LED
                            lighting is set to replace
                            conventional lighting systems in all sectors.

                        <p> Greenergy LED is the sales & marketing partner to Regent Lighting who is a manufacturer of
                            LED lighting products. Unlike some other LED
                            products in the market, we are committed to supply only <span>durable & reliable</span> long
                            lifespan
                            products which is reflected in the longer warranty period that we are willing to offer.</p>

                        <p>Our LED lighting products include street lights, flood lights, high bay lights, panel lights,
                            T8
                            tube lights & downlights. Our manufacturer's continuous R&D efforts also ensure that our
                            products keep up to date with the <span>latest technology</span> & applications to to
                            provide the highest
                            <span>reliability & energy efficiency</span> together with application flexibility to all
                            our LED
                            solutions.</p>


                    </div><!--end text-block -->
                </div>


                <div class="col-md-4">
                    <div class="img-blck ">

                        <img src="{{$about_data->about_img}}" alt="" class="img-responsive" width="350" height="233">

                    </div><!--end text-block -->
                </div>




            </div><!--end row-->
        </div><!--end about us -->
        <!-- ////////////////////// end  about us   /////////////////////// -->





        <!-- ////////////////////// start contact us/////////////////////// -->
        <div class="section-top-line contact-us" id="contact-us">
            <div class="block-title text-center">
                <h3>contact us</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form">
                        <form method="post" action="/contact" id="cform" autocomplete="on">
                            {{ csrf_field() }}
                            @if(Session::has('success'))
                                <br /><br />
                                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                                    <i class="icon wb-check" aria-hidden="true"></i> {{Session::get('success')}}
                                </div>
                            @endif
                            @if(Session::has('fail'))
                                <br /><br />
                                <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                                    <i class="icon wb-check" aria-hidden="true"></i> {{Session::get('fail')}}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <br /><br />
                                @foreach ($errors->all() as $error)
                                    <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                                        <i class="icon wb-close" aria-hidden="true"></i> {{$error}}

                                    </div>
                                @endforeach
                            @endif

                            <input type="text" id="name" name="name" placeholder="NAME"/>

                            <input type="email" id="email" name="email" placeholder="Email"/>

                            <textarea id="message" name="message" placeholder="enter your message"></textarea>

                            <div class="g-recaptcha" data-sitekey="6Lc-fhYUAAAAAIMV8HNRihO0245bE6xh3uj_3Oml"></div>
                            <br>
                            <button type="submit" class="success-btn">send message</button>
                        </form>
                    </div><!--contact-form-->
                </div>

                <div class="col-md-6">
                    <div class="contact-details">
                        <h4>FACTORY LOCATION</h4>
                        <p>{{ $contact_data->factory_location }}</p>

                        <h4>COMPANY LOCATION</h4>
                        <p>{{ $contact_data->company_location }}</p>

                        <h4>TELEPHONE</h4>
                        <p>{{ $contact_data->telephone }}</p>


                        <h4>E-MAIL</h4>
                        <p>{{ $contact_data->email }}</p>

                        {{--<ul class="social-links">--}}
                            {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-youtube"></i></a></li>--}}

                        {{--</ul>--}}
                    </div><!-- contact-details-->
                </div>
            </div><!--end from-->

            <div id="map"></div>
        </div><!--end contact us-->

        <!-- ////////////////////// end    contact us /////////////////////// -->
    </div><!--end warp-->


    <!-- ////////////////////// START FOOTER /////////////////////// -->
    @include("frontend.global.footer")
    <!-- ////////////////////// END FOOTER /////////////////////// -->
    <!-- //////////////////////START GO UP////////////////////// -->

    <div class="go-up">
        <a href=""><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- //////////////////////END GO UP////////////////////// -->

</div>

<!--js fils-->
<script src="{{ asset('/assets/frontend/js/jquery-1.11.3.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('/assets/frontend/js/plugins.js') }}"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmObGpBjZRss2VEWd8FOmKbRWrVsqbxhU&sensor=false"></script>
<script src="{{ asset('/assets/frontend/js/custom.js') }}"></script>
<script>
    /*video bg*/

    $(".slider-bg").vegas({
        overlay: true,
        transition: 'fade',
        transitionDuration: 4000,
        delay: 10000,
        animation: 'random',
        animationDuration: 20000,
        slides: [
            {src: "http://unsplash.it/1920/800/?random&times=1"},
            {src: "http://unsplash.it/1920/800/?random&times=2"},
            {src: "http://unsplash.it/1920/800/?random&times=3"}
        ]
    });

</script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>
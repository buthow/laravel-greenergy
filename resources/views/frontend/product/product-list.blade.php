<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Greenergy | Product List </title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--load google fonts-->
    <link href='http://fonts.googleapis.com/css?family=PT+Mono%7cOpen+Sans:400italic,400' rel='stylesheet' type='text/css'>
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/custom.css') }}"/>

</head>
<body>

<div id="all" class="animsition">
    <!-- ////////////////////// START TOP HEADER /////////////////////// -->
        @include('frontend.global.header')
    <!-- ////////////////////// END   TOP HEADER /////////////////////// -->

    <div class="container warp">

        <!-- ////////////////////// start page title /////////////////////// -->
        <div class="page-title text-center"  data-background='http://unsplash.it/1920/800'>
            <h2>Our Products</h2>
        </div><!--end page-title -->
        <!-- ////////////////////// END   page title/////////////////////// -->


        <div class="section-top-line our-portflio" id="our-portflio">



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

                        @foreach($array as $pa)
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
    </div><!--end warp-->

    <!-- ////////////////////// START FOOTER /////////////////////// -->
        @include('frontend.global.footer')
    <!-- ////////////////////// END FOOTER /////////////////////// -->
    <!-- //////////////////////START GO UP////////////////////// -->

    <div class="go-up">
        <a href="" ><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- //////////////////////END GO UP////////////////////// -->

</div>
<!--js fils-->
<script src="{{ asset('/assets/frontend/js/jquery-1.11.3.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('/assets/frontend/js/plugins.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="{{ asset('/assets/frontend/js/custom.js') }}"></script>

</body>
</html>
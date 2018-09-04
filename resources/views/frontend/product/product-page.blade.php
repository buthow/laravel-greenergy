<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>{{ $product_data->product_name }} | Greenergy LED </title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{ $product_data->product_name }}, Greenergy LED Product">
    <meta name="author" content="">
    <meta name="keywords" content="{{ $product_data->product_name }}, LED, Interior LED Lighting, LED Lighting, Street Light, Flood Lights">
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


    <div class="container warp" style="min-height: 950px">
        <div class="single-post">

            <div class="row">
                <div class="col-md-4">

                    <ul class="single-post-img">

                        @foreach($product_image as $pi)
                            <li>  <img src="{{$pi->product_img}}" alt="" class="" width="350" height="233"></li>
                        @endforeach

                    </ul>


                </div>
                <div class="col-md-8">
                    <h2>{{ $product_data->product_name }}</h2>
                    <hr>
                    <h3>Key features</h3>

                    <div class="row">
                        <div class="col-xs-3"><b>Brand Name:</b></div>
                        <div class="col-xs-9">{{ $product_brand->brand_name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3"><b>Model:</b></div>
                        <div class="col-xs-9">{{ $product_data->product_model }}</div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3"><b>Product Type:</b></div>
                        <div class="col-xs-9">{{ $product_data->product_type }}</div>
                    </div>

                    @if(!empty($product_data->product_pdf))
                        <div class="row">
                            @if(auth('user')->check())
                                <div class="col-xs-3"><b>Product PDF:</b></div>
                                <div class="col-xs-9">
                                    <a class="success-btn" href="/product/download/pdf/{{ $product_data->product_id }}" download="/casestudy/download/pdf/{{ $product_data->product_id }}">Download PDF</a>
                                </div>

                            @else
                                <div class="col-xs-3"><b>Product PDF:</b></div>
                                <div class="col-xs-9">  <h4><a href="/login">Please login download pdf.</a></h4></div>

                             @endif
                        </div>
                    @endif




                </div>
            </div>

            <hr>

            <div class="row margin-top-40 margin-bottom-40">
                <div class="col-md-12">
                    {!! $product_data->product_desc !!}
                </div>

            </div>

        </div><!-- end single-post -->


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



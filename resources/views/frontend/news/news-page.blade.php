<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Greenergy | {{ $news_data->news_name }} </title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">
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

    <div class="container warp" style="min-height: 1000px">
        <div class="single-post">
            <ul class="single-post-img">

                @foreach($news_images as $ni)
                    <li>  <img src="{{$ni->news_img}}" alt="" class="img-responsive"></li>
                @endforeach

            </ul>

            <h2>{{ $news_data->news_name }}</h2>

            <div class="single-post-meta">
                <p><span><i class="fa fa-calendar"></i>Posted at {{ date('F d, Y', strtotime($news_data['updated_at'])) }}</span></p>
            </div>
            <div>
                <p>{!! $news_data->news_desc !!}</p>
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



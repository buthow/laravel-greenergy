<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Greenergy | News</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--load google fonts-->
    <link href='http://fonts.googleapis.com/css?family=PT+Mono%7cOpen+Sans:400italic,400' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
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
            <h2>Greenergy News</h2>
        </div><!--end page-title -->
        <!-- ////////////////////// END   page title/////////////////////// -->

        <div class="all-posts">
            <div class="row">
                @foreach($news_array as  $nd)
                    <div class="blog-post-2">
                        <div class="post  post-slide">
                            <div class="col-md-3">
                                <ul>
                                    @foreach($nd['gallery'] as  $gallery)
                                            {{-- Limit 3 pics per item if this gone then it will show--}}
                                        <li><img src="{{ $gallery->news_img }}" alt="" width="255" height="170"></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-md-9" >
                                <h3><a href="/news/{{ $nd['news_id'] }}">{{ $nd['news_name'] }} </a></h3>
                                <p> {!! str_limit($nd['news_desc'], $limit = 700, $end = '...') !!} </p>
                                <div class="post-meta">
                                    <p>Posted at {{ date('F d, Y', strtotime($nd['updated_at'])) }}</p>
                                </div><!--end post meta -->
                                <a href="/news/{{ $nd['news_id'] }}" class="primary-btn">read more</a>
                            </div>

                        </div><!--end post img -->
                    </div><!--end blog post -->
                @endforeach

            </div><!--end row-->
            <div class="pull-right">
                {!! $news_data->links() !!}
            </div>


        </div><!--end all posts -->
    </div><!--end warp-->

    <!-- ////////////////////// START FOOTER /////////////////////// -->
        @include('backend.global.footer')
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
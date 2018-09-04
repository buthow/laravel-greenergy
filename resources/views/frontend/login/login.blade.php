<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Greenergy | Login</title>
    <link rel="icon" href="{{ asset('/assets/frontend/img/logo-only.png') }}" type="image/gif" sizes="16x16">
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


    <div class="container warp ">

        <div class="col-md-12 ">
            @if(Session::has('success'))
                <br /><br />
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="icon wb-check" aria-hidden="true"></i> {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('fail'))
                <br /><br />
                <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="icon wb-check" aria-hidden="true"></i> {{Session::get('fail')}}
                </div>
            @endif

            @if (count($errors) > 0)
                <br /><br />
                @foreach ($errors->all() as $error)
                    <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="icon wb-close" aria-hidden="true"></i> {{$error}}

                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-md-6">
            <div class="row text-center">
                <h3>Login</h3>
            </div>

            <hr>
            <form action="/login" method="post">
                {{ csrf_field() }}
                <div class="row form-group margin-top-25">
                    <div class="col-sm-3 text-right xs-left">
                        <label>Username</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="login-username" type="text" class=""/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-3 text-right xs-left">
                        <label>Password</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="login-pwd" type="password" class=""/>
                    </div>
                </div>

                {{--<div class="row form-group">--}}
                {{--<div class="col-sm-3"></div>--}}
                {{--<div class="col-sm-9 text-right margin-bottom-10">--}}
                {{--<a href="#">Forgot Password</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-left">
                        <button type="submit" id="login" class="btn success-btn">Login</button>
                        <div class="margin-top-15 not-user margin-bottom-15">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="row text-center">
                <h3>Register</h3>
            </div>

            <hr>

            <form action="/register" method="post">
                {{ csrf_field() }}


                <div class="row form-group margin-top-25">
                    <div class="col-sm-3 text-right xs-left">
                        <label>Username</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="username" type="text" class=""/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-3 text-right xs-left">
                        <label>Password</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" name="password" class=""/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-3 text-right xs-left">
                        <label>Confirm Password</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="password_confirmation" type="password" class=""/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-left">
                        <div class="margin-top-15 not-user margin-bottom-15">
                            <label>By submitting, I agree to the </label> <a href="#">Terms & Condition</a>
                        </div>

                        <button id="register" type="submit" class="btn success-btn">Register</button>


                    </div>
                </div>
            </form>
        </div>

    </div><!--end warp-->

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
<script src="{{ asset('/assets/frontend/js/bootstrap.min.js') }}"></script>

</body>
</html>



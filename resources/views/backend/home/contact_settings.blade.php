<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Greenergy | Contact</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/font-awesome/css/font-awesome.min.css') }}">


    <!-- Custom Theme Style -->
    <link href="{{asset('/assets/backend/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/main.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- sidebar navigation -->
        @include("backend.global.sidebar")
        <!-- /sidebar navigation -->

            <!-- top navigation -->
        @include("backend.global.header")
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>{{!empty($id) ?  "Edit Contact Content" :   "Add Contact Content"}}</h3>
                    </div>

                </div>

                <div class="clearfix"></div>

                <form  class="form-horizontal form-label-left" role="form" action="/admin/contact" method="post">
                    {{ csrf_field() }}

                    @if(!empty($id))

                        <input type="hidden" name="id" id="id" value="{{$id}}">

                    @endif

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

                    <!-- Contact Description-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Contact Information</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Company Address<span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea name="company-address" class="form-control textarea-box" rows="3"  placeholder="Enter your Description here.">{{ (old('company-address') ? old('company-address'): (!empty($id) ? $data->company_location : "")) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Factory Location Address<span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea name="factory-address" class="form-control textarea-box" rows="3" placeholder="Enter your Description here.">{{ (old('factory-address') ? old('factory-address'): (!empty($id) ? $data->factory_location : "")) }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Email Address: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input name="contact-email" type="email" id="email" class="form-control" data-parsley-trigger="change" required="" data-parsley-id="22" value="{{ (old('company-email') ? old('company-email'): (!empty($id) ? $data->email : "")) }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Telephone Address: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input name="contact-number" type="text" class="form-control" data-inputmask="'mask' : '+609-99999999'" value="{{ (old('company-number') ? old('company-number'): (!empty($id) ? $data->telephone : "")) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('backend.global.footer')
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('/assets/backend/css/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/assets/backend/css/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/assets/backend/css/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('/assets/backend/css/vendors/nprogress/nprogress.js')}}"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset('/assets/backend/css/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tags_1').tagsInput({
            width: 'auto'
        });
    });
</script>
<!-- /jQuery Tags Input -->

<!-- jquery.inputmask -->
<script src="{{ asset('/assets/backend/css/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- jquery.inputmask -->
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>
<!-- /jquery.inputmask -->

<!-- Custom Theme Scripts -->
<script src="{{ asset('/assets/backend/js/custom.min.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Greenergy | Slider</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- Dropzone.js -->
    <link href="{{ asset('/assets/backend/css/vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">

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
                        <h3>Slider Settings</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                {{--<form method="post" enctype="multipart/form-data" action="/admin/slider/upload" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">--}}
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Slider Image</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Drag multiple files to the box below for multi upload or click to select files.</p>
                                    <form action="/admin/slider/upload" id="sliderDropzone" class="dropzone">{{ csrf_field() }}</form>
                                </div>
                            </div>
                        </div>
                    </div>
                {{--</form>--}}
                <form data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post">

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

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Slider Information</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider Description<span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea name="slider-description" class="form-control" rows="3" placeholder="Enter your Description here.">{{ (old('slider-description') ? old('slider-description') : (!empty($id) ? $data->slider_desc : "")) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Points</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="tags_1" name="points" type="text" class="tags form-control" value="{{ (old('points') ? old('points') : (!empty($id) ? $data->slider_text : "")) }}" />
                                            <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
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
        @include("backend.global.footer")
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
<!-- Dropzone.js -->
<script src="{{ asset('/assets/backend/css/vendors/dropzone/dist/dropzone.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset('/assets/backend/css/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tags_1').tagsInput({
            width: 'auto'
        });
    });

    Dropzone.options.sliderDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        removedfile: function(file) {
            console.log(file)
            var name = file.name;
            $.ajax({
                type: 'get',
                url: '/admin/slider/image/delete',
                data: "image="+name,
                dataType: 'json',
                success: function(message){
                   alert(message.message)
                    window.location.reload();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        init: function() {
            var thisDropzone = this;
            $.ajax({
                type: "GET",
                url: '/admin/slider/image/list',
                dataType: "json",
                success: function(data){
                    $.each(data.data, function(index, value) {

                        var mockFile = { name: value.slider_img};
                        thisDropzone.emit("addedfile", mockFile);
                        thisDropzone.emit("success", mockFile);
                        thisDropzone.emit("thumbnail", mockFile, 'http://greenergyled.localhost.com'+value.slider_img)
                    });
                }
            });
        },
        accept: function(file, done) {
            window.location.reload();
            return done();
        }
    };



</script>
<!-- /jQuery Tags Input -->

<!-- Custom Theme Scripts -->
<script src="{{ asset('/assets/backend/js/custom.min.js') }}"></script>


</body>
</html>

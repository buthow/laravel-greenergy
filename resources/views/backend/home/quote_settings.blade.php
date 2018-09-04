<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Greenergy | Quotes</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- Dropify.js -->
    <link href="{{ asset('/assets/backend/css/dropify.min.css') }}" rel="stylesheet">

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
                        <h3>{{ !empty($id) ?  "Edit Quote Content" :   "Add Quote Content"}}</h3>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>
            <form class="form-horizontal form-label-left" role="form" action="/admin/quote" method="post" enctype="multipart/form-data">
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
                                <h2>Quote Image</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <input type="file" id="input-file-now1" class="dropify" name="quote-image" data-show-remove="false" @if(!empty($id))data-default-file="{{ asset($data->quote_img) }}"@endif/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quote Info-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Quote Settings</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Quote Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="e.g Jon Doe" required="required" type="text" value="{{(old('name') ? old('name') : (!empty($id) ? $data->quote_name : ""))}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Quote Position
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="quote-position" placeholder="e.g CEO" required="required" type="text" value="{{(old('quote-position') ? old('quote-position') : (!empty($id) ? $data->quote_pos : ""))}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Quote Description<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea name="quote-description" class="form-control textarea-box" rows="3" placeholder="Enter your Description here.">{{(old('quote-description') ? old('quote-description') : (!empty($id)) ?  $data->quote_desc : "")}}</textarea>
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

<!-- Dropify -->
<script src="{{ asset('/assets/backend/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-d閜osez un fichier ici ou cliquez',
                replace: 'Glissez-d閜osez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'D閟ol? le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('.dropify').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('.dropify').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('/assets/backend/js/custom.min.js') }}"></script>
</body>
</html>

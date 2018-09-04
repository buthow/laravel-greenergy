<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Greenergy | User List</title>
    <link rel="icon" href="{{ asset('/assets/logo-only.png') }}" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- Datatables -->
    <link href="{{ asset('/assets/backend/css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}/assets/backend/css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/assets/backend/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/css/main.css') }}" rel="stylesheet" >

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('backend.global.sidebar')


        <!-- top navigation -->
        @include('backend.global.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>User List</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Product List-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <a href="/admin/user/add" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Users</a>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
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
                                <div id="datatable-responsive_wrapper"
                                     class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if(!empty($user_list))
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>Type</th>
                                                        <th>Actions</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($user_list as  $ul)
                                                            <tr>
                                                                <td>{{ $ul['username'] }}</td>
                                                                <td>{{ $ul['type'] }}</td>
                                                                @if($ul['type'] ==  "admin")
                                                                    <td>
                                                                        <a href="/admin/user/edit/{{ $ul['user_id'] }}?type={{ $ul['type'] }}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                                        <a onclick="return confirm('Are you sure you want to delete user?')" href="/admin/user/delete/{{ $ul['user_id'] }}?type={{ $ul['type'] }}" type="button" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <a href="/admin/user/edit/{{ $ul['user_id'] }}?type={{ $ul['type'] }}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                                        <a onclick="return confirm('Are you sure you want to delete user?')" href="/admin/user/delete/{{ $ul['user_id'] }}?type={{ $ul['type'] }}" type="button" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
                                                                    </td>
                                                                @endif

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('backend.global.footer')
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('/assets/backend/css/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/assets/backend/css/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/assets/backend/css/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('/assets/backend/css/vendors/nprogress/nprogress.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('/assets/backend/css/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('/assets/backend/css/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<!-- Datatables -->
<script>
    $(document).ready(function () {


        $('#datatable-responsive').DataTable({
            "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
            "pageLength": 5
        });

    });
</script>
<!-- /Datatables -->


<!-- Custom Theme Scripts -->
<script src="{{asset('/assets/backend/js/custom.min.js')}}"></script>


</body>
</html>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/admin" class="site_title"><i class="fa fa-home"></i> <span>Admin</span></a>
        </div>

        <div class="clearfix"></div>


        <br />
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">

                <ul class="nav side-menu">
                    <li><a href="/admin"><i class="fa fa-line-chart"></i>Dashboard</a></li>
                </ul>

                <br/>
                <br/>
                <h3>Page Settings</h3>

                <ul class="nav side-menu">


                    <li class="{{ $active == "home" ?  "active" :   ""}}"><a><i class="fa fa-home"></i> Main Page <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/slider">Slider</a></li>
                            <li><a href="/admin/service">Services</a></li>
                            <li><a href="/admin/about">About</a></li>
                            <li><a href="/admin/contact">Contact</a></li>
                            <li><a href="/admin/quote">Quote</a></li>
                        </ul>
                    </li>
                    <li class="{{ $active   ==  "brand" ? "active" : "" }}"><a href="/admin/brand/list"><i class="fa fa-tags"></i>Brands</a></li>
                    <li class="{{ $active   ==  "product" ? "active" : "" }}"><a href="/admin/product/list"><i class="fa fa-edit"></i>Products</a></li>
                    <li class="{{ $active   ==  "user" ? "active" : "" }}"><a href="/admin/user/list"><i class="fa fa-user"></i>User</a></li>
                    <li class="{{ $active   ==  "case" ? "active" : "" }}"><a href="/admin/case/list"><i class="fa fa-sticky-note-o"></i>Case Study</a></li>
                    <li class="{{ $active   ==  "news" ? "active" : "" }}"><a href="/admin/news/list"><i class="fa fa-newspaper-o"></i>News</a></li>
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        {{--<div class="sidebar-footer hidden-small">--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="Settings" style="display: none">--}}
                {{--<span class="glyphicon glyphicon-cog" aria-hidden="true" ></span>--}}
            {{--</a>--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
                {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
            {{--</a>--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
                {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
            {{--</a>--}}
            {{--<a data-toggle="tooltip" data-placement="top" title="Logout" href="/admin/logout">--}}
                {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
            {{--</a>--}}
        {{--</div>--}}
        <!-- /menu footer buttons -->
    </div>
</div>
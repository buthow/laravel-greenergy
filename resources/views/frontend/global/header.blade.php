<header id="top-header">
    <div class="container">
        <div class="logo">
            <h2><a href="/"><img src="{{ asset('/assets/frontend/img/greenergyled_logo.png') }}" alt="logo"></a></h2>
        </div><!--end logo-->
        <span id="btn-menu"><i class="fa fa-list"></i></span>
        <nav id="main-nav">
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/#about-us'>about</a></li>
                <li><a href='/product'>products</a></li>
                <li><a href='/casestudy'>case studies</a></li>
                <li><a href='/news'>news</a></li>
                <li><a href='/#contact-us'>contact</a></li>

                @if(auth('user')->check())
                    <li style="cursor: pointer;"><a><b>{{ auth('user')->user()->username }}</b></a>
                        <ul>
                            <li><a href="/logout"><i class="fa fa-sign-out"></i> Log Out </a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </nav>
    </div><!--end container -->
</header>
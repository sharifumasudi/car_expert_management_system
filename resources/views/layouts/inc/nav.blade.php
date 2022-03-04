<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search waves-effect waves-light">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->hasRole('expert'))
            <a href="{{route('expert.dashboard')}}" class="logo  ml-4">
              <h2 style="font-family:broadway; color:Azure; letter-spacing: 10px;">CEMS</h2>
              <!--
                <img class="img-fluid img-rounded border border-info" src="" alt="Theme-Logo" />
              -->
            </a>
            @endif

            @if(Auth::user()->hasRole('administrator'))
            <a href="{{route('admin_dash')}}" class="logo ml-4">
              <h2 style="font-family:broadway; color:Azure; letter-spacing: 10px;">CEMS</h2>
              <!--
                <img class="img-fluid img-rounded border border-info" src="" alt="Theme-Logo" />
              -->
            </a>
            @endif

            @if(Auth::user()->hasRole('user'))
            <a href="{{route('car_user.dashboard')}}" class="logo ml-4">
              <h2 style="font-family:broadway; color:Azure; letter-spacing: 10px;">CEMS</h2>
              <!--
                <img class="img-fluid img-rounded border border-info" src="" alt="Theme-Logo" />
              -->
            </a>
            @endif
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>

        <!--Side Bar-->
        @include('layouts.inc.sidebar')
        <!--/Side Bar/-->
    </div>
</nav>

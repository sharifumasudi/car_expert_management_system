<div class="navbar-container container-fluid">
    <ul class="nav-left">
        <li>
            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
        </li>
        <li>
            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                <i class="ti-fullscreen"></i>
            </a>
        </li>
    </ul>
    <ul class="nav-right">
        <li class="user-profile header-notification">
          @if (Auth::user()->user_image)
            <a href="#!" class="waves-effect waves-light">
                <img src="{{asset('/storage/Profile/'.auth()->user()->user_image)}}" class="img-radius" alt="">
                <span>{{Auth::user()->name}}</span>
                <i class="ti-angle-down"></i>
            </a>
          @else
            <a href="#!" class="waves-effect waves-light">
                <img src="{{asset('assets/images/avatar-blank.jpg')}}" class="img-radius" alt="User-Profile-Image">
                <span>{{Auth::user()->name}}</span>
                <i class="ti-angle-down"></i>
            </a>
            @endif
            <ul class="show-notification profile-notification">
                <li class="waves-effect waves-light">
                    <a href="#!">
                        <i class="ti-settings"></i> Settings
                    </a>
                </li>
                @if(Auth::user()->hasRole('administrator'))
                <li class="waves-effect waves-light">
                    <a href="{{route('adminProfile')}}">
                        <i class="ti-user"></i> Profile
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole('expert'))
                <li class="waves-effect waves-light">
                    <a href="{{route('showProfile')}}">
                        <i class="ti-user"></i> Profile
                    </a>
                </li>
                @endif

                @if(Auth::user()->hasRole('user'))
                <li class="waves-effect waves-light">
                    <a href="{{route('profile')}}">
                        <i class="ti-user"></i> Profile
                    </a>
                </li>
                @endif
                <li class="waves-effect waves-light">
                  <a href="#" data-target="#logout" data-toggle="modal"
                    class="waves-effect waves-dark" >
                    <span class="pcoded-micon"><i class="ti-power-off"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">{{ __('Logout') }}</span>
                    <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

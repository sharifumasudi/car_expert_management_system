@role('expert')
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
              @if(Auth::user()->user_image)
                <img class="img-80 img-radius" src="{{asset('/storage/Profile/'.auth()->user()->user_image)}}" alt="User-Profile-Image">
              @else
                <img class="img-80 img-radius" src="{{asset('assets/images/avatar-blank.jpg')}}" alt="User-Profile-Image">
              @endif
                <div class="user-details">
                    <span id="more-details">{{Auth::user()->name}}</span>
                </div>
            </div>

        </div>
        <ul class="pcoded-item pcoded-left-item pt-3">
            <li class="active">
                <a href="{{route('expert.dashboard')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="{{route('problems_route.create')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-car"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Car  Problems</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
              <li class=" ">
                  <a href="{{route('carsolutions.create')}}" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-list"></i></span>
                      <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Car Solutions</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
              <li class=" ">
                  <a href="{{route('carsolutions.index')}}" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-eye"></i></span>
                      <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View Solutions</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>

            <li>
                <a href="{{route('messages')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-help"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Asked Problem</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li>
                <a href="{{route('showProfile')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Profile</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{route('ChangePSWD')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-key"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Change Password</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!--Logout Form-->
            <li>
              <a href="#" data-toggle="modal" data-target="#logout">
                <span class="pcoded-micon"><i class="ti-power-off"></i></span>
                {{ 'Logout' }}
                </a>
            </li>
            <!--//logout//-->
        </ul>
    </div>
</nav>
@endrole
<!--Expert Panel-->

<!--Administrator Panel-->
@role('administrator')
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
              @if(Auth::user()->user_image)
                <img class="img-80 img-radius" src="{{asset('/storage/administrator/'.auth()->user()->user_image)}}" alt="User-Profile-Image">
              @else
                <img class="img-80 img-radius" src="{{asset('assets/images/avatar-blank.jpg')}}" alt="User-Profile-Image">
              @endif
                <div class="user-details">
                    <span id="more-details">{{Auth::user()->name}}</span>
                </div>
            </div>

        </div>
        <ul class="pcoded-item pcoded-left-item pt-3">
            <li class="active">
                <a href="{{route('admin_dash')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-car"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Cars <strong>|</strong> Magari</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{route('problem_category.create')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Problem Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('view_carsolutions.index')}}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View Solutions</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('messages')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-help"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Asked Problem</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{route('registerExpert')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-plus"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">{{ 'Manage Workers' }}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{route('adminProfile')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Profile</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{route('adminchangePSWD')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-key"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Change Password</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!--Logout Form-->
            <li>
              <a href="#" data-toggle="modal" data-target="#logout">
                <span class="pcoded-micon"><i class="ti-power-off"></i></span>
                {{ 'Logout' }}
                </a>
            </li>
            <!--//logout//-->
        </ul>
    </div>
</nav>
@endrole

<!--Normal user Or Car User-->
@role('user')
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
              @if(Auth::user()->user_image)
                <img class="img-80 img-radius" src="{{asset('/storage/Profile/'.auth()->user()->user_image)}}" alt="User-Profile-Image">
              @else
                <img class="img-80 img-radius" src="{{asset('assets/images/avatar-blank.jpg')}}" alt="User-Profile-Image">
              @endif
                <div class="user-details">
                    <span id="more-details">{{Auth::user()->name}}</span>
                </div>
            </div>

        </div>
        <ul class="pcoded-item pcoded-left-item pt-3">
            <li class="active">
                <a href="{{route('car_user.dashboard')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ route('problems.create') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-car"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Car Information</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('car_soln.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-eye"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">View Car Solution</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('contact_expert') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-location-pin"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Contact Car Expert</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{route('profile')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Profile</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{route('passwordChange')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-pencil-alt"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Change Password</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <!--Logout Starts-->
            <li>
              <a href="#" data-toggle="modal" data-target="#logout">
                <span class="pcoded-micon"><i class="ti-power-off"></i></span>
                {{ 'Logout' }}
                </a>
            </li>
            <!--//logout//-->
        </ul>

    </div>
</nav>
@endrole

<!--Logout Modal-->
<div class="modal fade" id="logout">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{ "Logout Now" }}
                <button type="button" class="btn btn-default" data-dismiss="modal" role="close">&times;</button>
            </div>
            <div class="modal-body alert alert-danger m-2">
            <p>{{ "Are You Sure Want To Logout?? " }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button"
                class="waves-effect waves-dark btn btn-danger" >
                <span class="pcoded-micon"><i class="ti-power-off"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">{{ __('Logout') }}</span>
                <span class="pcoded-mcaret"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Logout Modal-->

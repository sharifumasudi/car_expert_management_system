@include('layouts.inc.header')
  <!-- Pre-loader start -->
  @include('layouts.inc.pre_loader')
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        @include('layouts.inc.nav')
        <!--NavBar ends Here-->
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  @include('layouts.inc.sidebarmain')

                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h4 class="m-b-10">{{Auth::user()->name}}: Profile</h4>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="#"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Profile</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                          <div class="col-md-4">
                                            @if(count($errors) > 0)
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger text-justify text-wrap">
                                            <button type='button' data-dismiss='alert' class='close pl-4'>&times;</button>
                                            {{$error}}
                                            </div>
                                            @endforeach
                                            @endif
                                            <!-- Profile Image -->
                                            <div class="card card-primary card-outline">
                                              <div class="card-body box-profile">

                                                <div class="text-center">

                                                  @if (Auth::user()->user_image)
                                                  <img class="img-80 img-radius"
                                                  src="{{asset('/storage/Profile/'.auth()->user()->user_image)}}">
                                                  @else
                                                  <img class="profile-user-img img-fluid img-circle"
                                                  src="{{asset('assets/images/avatar-blank.jpg')}}"
                                                  alt="User profile picture">
                                                  @endif
                                                </div>

                                                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                                <p class="text-muted text-center">{{ Auth::user()->skills }}</p>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                  @if(Auth::user()->user_image)
                                                  <li class="list-group-item">
                                                    <button type="submit" data-toggle='modal' data-target='#imageChange' class="btn btn-primary btn-block"><b>{{('Change Image')}}</b></button>
                                                  </li>
                                                  @else
                                                  <li class="list-group-item">
                                                    <button type="submit" data-toggle='modal' data-target='#imageChange' class="btn btn-danger btn-block"><b>{{('Change Image')}}</b></button>
                                                  </li>
                                                  @endif
                                                  <li class="list-group-item">
                                                    <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                                                  </li>
                                                  <li class="list-group-item">
                                                    <b>UserName</b> <a class="float-right">{{Auth::user()->username}}</a>
                                                  </li>
                                                  <li class="list-group-item">
                                                    <b>Role</b> <a class="float-right">{{Auth::user()->role}}</a>
                                                  </li>
                                                </ul>

                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                          </div>
                                          <!-- /.col -->
                                          <div class="col-md-8">
                                            <div class="card">
                                              <div class="card-header p-2">
                                                <ul class="nav nav-pills">
                                                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Settings</a></li>
                                                </ul>
                                              </div><!-- /.card-header -->
                                              <div class="card-body">
                                                @include('sweetalert::alert')
                                                <div class="tab-content">
                                                  <div class="tab-pane show active" id="activity">
                                                    <form action="{{ route(htmlspecialchars('update')) }}" method="POST" class="form-horizontal">
                                                      @csrf
                                                      <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="name" class="form-control" id="inputName" value="{{Auth::user()->name}}" placeholder="Name" autofocus>
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{Auth::user()->email}}" placeholder="Email" autofocus>
                                                          @error('email')
                                                          <span role="alert">{{ $message }}</span>
                                                          @enderror
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">username</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" id="inputName2" placeholder="UsernPame" autofocus>
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Contact</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="contact" value="{{Auth::user()->contact}}" class="form-control" id="inputName2" placeholder="Your Telephone Contact" autofocus>
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                                        <div class="col-sm-10">
                                                          <textarea class="form-control" value="{{Auth::user()->experience}}" name="experience" id="inputExperience" placeholder="Experience" autofocus>{{Auth::user()->experience}}</textarea>
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="skills" value="{{Auth::user()->skills}}" class="form-control" id="inputSkills" placeholder="Skills">
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="inputSkills" class="col-sm-2 col-form-label">Location</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="location" value="{{Auth::user()->location}}" class="form-control" id="inputSkills" placeholder="Location">
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                          <div class="checkbox">
                                                            <label>
                                                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                            </label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                          <button type="submit" class="btn btn-danger super">Submit</button>
                                                        </div>
                                                      </div>
                                                    </form>
                                                  </div>
                                                  <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
                                              </div><!-- /.card-body -->
                                            </div>
                                            <!-- /.nav-tabs-custom -->
                                          </div>
                                          <!-- /.col -->
                                        </div>
                                        <!--Change Image Modal-->
                                        <div class="modal fade" id="imageChange" role="document">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3>Choose Image</h3>
                                                <button data-dismiss="modal" class="close">&times</button>
                                              </div>
                                              <div class="modal-body">
                                                <form class="form" action="{{route('imgUpdate')}}" method="post" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                  <div class="form-group">
                                                    <input type="file" name="user_image" class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!--/Modal//-->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Jquery -->
@include('layouts.inc.scripts')

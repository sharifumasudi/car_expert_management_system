@include('layouts.inc.header')
  <!-- Pre-loader start -->
  @include('layouts.inc.pre_loader')
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        @include('layouts.inc.nav')
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  @include('layouts.inc.sidebarmain')

                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">New Car Expert</h5>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="#"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
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
                                          <div class="col-md-12">
                                              <div class="card">
                                                  <div class="card-header">
                                                    <h4>Register New Expert</h4>
                                                  </div>
                                                  <div class="card-block">
                                                    @include('sweetalert::alert')
                                                    <form method="POST" action="{{ route('postNewExpert') }}" class="md-float-material form-material">
                                                        @csrf
                                                        <div class="auth-box card">
                                                            <div class="card-block">
                                                                <div class="form-group form-primary">
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Full Name</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Your Email Address</label>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                      <div class="form-group form-primary">
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus>
                                                                          @error('password')
                                                                          <span class="invalid-feedback" role="alert">
                                                                          <strong>{{ $message }}</strong>
                                                                          </span>
                                                                          @enderror
                                                                          <span class="form-bar"></span>
                                                                          <label class="float-label">Password</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group form-primary">
                                                                          <input type="password" name="password_confirmation" class="form-control" required>
                                                                          <span class="form-bar"></span>
                                                                          <label class="float-label">Confirm Password</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row m-t-25 text-left">
                                                                    <div class="col-md-12">
                                                                      <div class="checkbox-fade fade-in-primary">
                                                                      <label>
                                                                       <input type="checkbox" value="">
                                                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                        <span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row m-t-30">
                                                                    <div class="col-md-4">
                                                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Save</
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
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
    @include('sweetalert::alert')
    <script>
    $('#submit').click(function(){
        swal({
            title:'Confirm',
            text:'Are You Sure brooh',
        });

    });
    </script>
@include('layouts.inc.scripts')

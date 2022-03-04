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
                                          <h5 class="m-b-10">Password Change</h5>
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
                                                      <h3>Password Change | Badili Nywila</h3>
                                                      <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                  </div>
                                                  <div class="card-block">
                                                    @include('sweetalert::alert')
                                                      <form action="{{route(htmlspecialchars('updatepswd'))}}" method="post" class="form-material">
                                                        @csrf
                                                          <div class="form-group row form-default">
                                                            <div class="col-md-6">
                                                              <input type="password" name="current_password" class="form-control" required="">
                                                              <span class="form-bar"></span>
                                                              <label class="float-label">Old Password</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <input type="password" name="new_password" class="form-control" required="">
                                                              <span class="form-bar"></span>
                                                              <label class="float-label">New Password</label>
                                                            </div>
                                                          </div>
                                                          <div class="form-group row form-default">
                                                            <div class="col-md-6">
                                                              <input type="password" name="new_confirm_password" class="form-control" required="">
                                                              <span class="form-bar"></span>
                                                              <label class="float-label">Confirm New Password</label>
                                                            </div>
                                                          </div>
                                                          <div class="form-group">
                                                            <button type="submit" id='submit' class="btn btn-primary">Update Password</button>
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

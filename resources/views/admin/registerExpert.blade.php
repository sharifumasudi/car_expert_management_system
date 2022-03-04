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
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">All Car Car Solutions</h5>
                                          <p class="m-b-0">Matatizo Yote ya Magari Huoneshwa apa</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="#"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Employee Management</a>
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
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4 class="text-uppercase text-info">Register New Employee</h4>
                                          </div>
                                          <div class="card-block">
                                              @if(Session()->has('user'))
                                                <div class="alert alert-success">
                                                    <strong>Successifully Added: </strong>{{ Session('user') }}
                                                </div>
                                              @endif
                                            <form action="{{ route('newEmployee') }}" class="form" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="name">{{ "Expert Full Name" }}</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Type Employee Full Name" autofocus>
                                                    </div>
                                                      <div class="col-md-6">
                                                          <label for="email">{{ "Email" }}</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Type Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="contact">{{ "Expert Contact" }}</label>
                                                        <input type="text" name="contact" class="form-control" placeholder="Type Employee Contact. e.g 0683039393" autofocus>
                                                    </div>
                                                      <div class="col-md-6">
                                                          <label for="location">{{ "Location Of the Expert" }}</label>
                                                        <input type="text" name="location" class="form-control" placeholder="Type Employee Location Available">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary">Submit</button>
                                            </form>
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
@include('layouts.inc.scripts')

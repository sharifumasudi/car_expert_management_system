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
                                          <h5 class="m-b-10">All Car Solutions</h5>
                                          <strong class="m-b-0">Car Solutions are Provided Here Are Related TO the One Sent To the Car Expert</strong>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="#"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">All Solutions</a>
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
                                            <h4 class="text-uppercase text-success">Car Solutions</h4>
                                          </div>
                                          <div class="card-block table-responsive">
                                            @if(count($soln) != null)

                                            @foreach ($soln as $item)
                                            @if($item->user_id == Auth::user()->id AND auth::user()->hasRole('user'))
                                              <div class="card">
                                                <div class="card-header text-danger">
                                                    <strong>Car Problem: {{ $item->problem_desc }}</strong>
                                                </div>
                                                <div class="card-block">
                                                  <div class='text-justify p-2'>
                                                      <h4>{{ "Solution" }}</h3>
                                                      <p>{{ $item->soln }}</p>
                                                      Posted: <small>{{ $item->created_at }}</small>
                                                  </div>
                                                </div>
                                              </div>
                                          @elseif(Auth::user()->hasRole('administrator|expert'))
                                            <div class="card">
                                              <div class="card-header text-danger">
                                                  <strong>Car Problem: {{ $item->problem_desc }}</strong>
                                              </div>
                                              <div class="card-block">
                                                <div class='text-justify p-2'>
                                                    <h4>{{ "Solution" }}</h3>
                                                    <p>{{ $item->soln }}</p>
                                                    Posted: <small>{{ $item->created_at }}</small>
                                                </div>
                                              </div>
                                            </div>
                                            @endif
                                            @endforeach

                                            @endif
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

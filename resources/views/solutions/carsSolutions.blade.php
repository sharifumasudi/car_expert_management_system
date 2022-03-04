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
                                          <h5 class="m-b-10">Car Solution Page</h5>
                                          <p class="m-b-0">Engineer unaruhusiwa kuhifadhi taarifa za Solutions ya magari, NB hakikisha Tatizo liwe Limetumwa Kwanza</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="/expert/dashboard"> <i class="fa fa-home"></i> </a>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Car Problem Solution</h3>
                                                    <button class="btn btn-toolbar-primary" data-toggle="modal" data-target="#newSoln" data-placement="top"><i class="fas ti-plus"></i> Add Car Solution</button>
                                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                </div>
                                                <div class="card-block table-responsive">
                                                  @include('sweetalert::alert')
                                                  @if(count($soln) != null)
                                                  @foreach ($soln as $item)
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
                                                  @endforeach
                                                  @endif

                                                  <!--Register New Car Solution-->
                                                  <div class="modal fade" id="newSoln">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content p-3">
                                                            <div class="modal-header">
                                                                <h3>{{ "Feed Solution for the Car Problem" }}</h3>
                                                                <button class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        @if(count($problems) > 0)
                                                                        <form class="form-material" action="{{route('carsolutions.store')}}" method="post">
                                                                          @csrf
                                                                            <div class="form-group row">
                                                                              <div class="col-md-12">
                                                                                <select name="problem_id" class="form-control">
                                                                                    <option value="" class="text-primary" selected>Select Problem</option>
                                                                                    @foreach ($problems as $value)
                                                                                      <option value="{{$value->p_id}}">{{$value->problem_desc}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span class="form-bar"></span>
                                                                                <label class="float-label">{{('Car Problem/ Tatizo')}}</label>
                                                                              </div>
                                                                              <div class="col-md-12">
                                                                                <textarea class="form-control" name="soln" required=""></textarea>
                                                                                <span class="form-bar"></span>
                                                                                <label class="float-label">Solution/Suluhisho</label>
                                                                              </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <button type="submit" name="button" class="btn btn-danger">Save Now</button>
                                                                            </div>
                                                                        </form>
                                                                      @else
                                                                        <div class="alert alert-danger font-weight-bolder text-justify">
                                                                          {{'You can not Add problem Solution Because No Added Car problem in CEMS, Please You need To Register Car Problem So that Its Solution follws'}}
                                                                          <a class="btn btn-danger mt-2" href="#" data-target="#AddProblem" data-toggle="modal">Register Problem</a>
                                                                        </div>
                                                                      @endif
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>

                                                  <div class="modal" id="AddProblem">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                      <div class="modal-content">
                                                        <div class="modal-header text-uppercase text-center text-danger">
                                                          Register New Car Problem
                                                          <button class="btn btn-dafault" data-dismiss="modal">&times</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-material" action="{{route(htmlspecialchars('problems.store'))}}" method="post">
                                                                @csrf
                                                                <div class="form-group row form-default form-static-label">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" name="carproblem" class="form-control" placeholder="Tatizo la Gari" required="">
                                                                        <span class="form-bar"></span>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <select name="carType" class="form-control">
                                                                            <option value="" class="m-3" selected>Aina Ya Gari</option>
                                                                            <option value="auto">Auto</option>
                                                                            <option value="manual">Manual</option>
                                                                            <option value="auto+geared">All Type</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row form-default form-static-label">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" name="source" class="form-control" placeholder="Eneo Hutokea katika Ghari" required="">
                                                                        <span class="form-bar"></span>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" name="impact" class="form-control" required="" placeholder="Athari Zake katika Ghari">
                                                                        <span class="form-bar"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary" name="button">Hifadhi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!--Add Modal End-->
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

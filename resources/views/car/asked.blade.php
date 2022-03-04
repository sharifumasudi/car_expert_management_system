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
                                          <h5 class="m-b-10">Asked Problem</h5>
                                          <p class="m-b-0">Asked Problems By The Car User</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="#"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Asked Problem</a>
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
                                                      <h3 class="text-danger">Problem Asked</h3>
                                                      <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                  </div>
                                                  <div class="card-block table-responsive">
                                                    @include('sweetalert::alert')
                                                      <table class="table table-striped table-hover table-bordered ">
                                                        <thead>
                                                            <tr>
                                                                <th>S/No</th>
                                                                <th>Poster Name</th>
                                                                <th>Poster Contact</th>
                                                                <th>Problem</th>
                                                                <th>Image</th>
                                                                <th>Posted Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($problem))
                                                            @foreach($problem as $problems => $value)
                                                                <tr>
                                                                    <td>{{ $value->p_id }}</td>
                                                                    <td>{{ $value->name }}</td>
                                                                    @if($value->contact)
                                                                    <td>{{ $value->contact }}</td>
                                                                    @else
                                                                    <td><b class="text-danger">{{ "No Contact" }}</b></td>
                                                                    @endif
                                                                    <td>{{ $value->problem_desc }}</td>
                                                                    @if($value->image)
                                                                    <td><img src="{{ asset('/storage/problems/'.$value->image) }}" alt="" srcset="" width="150px" height="90px"></td>
                                                                    @else
                                                                    <td><b class="text-danger">{{ "No Image" }}</b></td>
                                                                    @endif
                                                                    <td>{{ $value->created_at->diffForHumans() }}</td>
                                                                </tr>
                                                            @endforeach
                                                            @else
                                                            <div class="alert alert-danger">
                                                                {{ "No Problem Registered Until Now" }}
                                                            </div>
                                                            @endif
                                                        </tbody>
                                                      </table>
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

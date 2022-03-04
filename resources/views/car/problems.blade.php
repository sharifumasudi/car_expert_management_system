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
                                          <h5 class="m-b-10">Car Problem Page</h5>
                                          <p class="m-b-0">Tuma Tatizo La Gari kwa Ajili ya Kushughulikwa</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Car Problem</a>
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
                                            <h4 class="text-primary">Car Problem</h4>
                                              <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                            </div>
                                          <div class="card-block">
                                                @include('sweetalert::alert')
                                                @if(count($errors) > 0)
                                                  @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger">
                                                      <ul>
                                                        <li>{{$error}}</li>
                                                      </ul>
                                                    </div>
                                                  @endforeach
                                                @endif
                                                @if(Auth::user()->hasRole('expert') AND count($category) > 0)
                                                <form class="form-material" action="{{ route('problems_route.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="form-group row form-default form-static-label">
                                                    <div class="col-sm-12">
                                                        <label for="c_id">{{ "Car Problem Category" }}</label>
                                                        <select name="problem_catgory_id"  class="form-control" id="">
                                                            <option value="" selected>{{ "Choose Category" }}</option>
                                                            @foreach ($category as $item)
                                                            <option value="{{ $item->catgory_id  }}">{{ $item->cate_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    <span class="form-bar"></span>
                                                    </div>
                                                    </div>

                                                    <div class="form-group row form-default form-static-label">
                                                        <div class="col-md-12">
                                                            <label for="problem_desc">Problem Description</label>
                                                            <textarea name="problem_desc" id="" cols="5" rows="5" class="form-control" placeholder="Type Car Description"></textarea>
                                                        </div>
                                                    </div>
                                                <div class="form-group row form-default form-static-label">
                                                    <div class="col-md-12">
                                                        <label for="problem_desc">Any Image</label>
                                                        <input type="file" name="image" id="image"class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" name="button">Hifadhi</button>
                                                </div>
                                                </form>
                                                @endif

                                                @if(Auth::user()->hasRole('user') AND count($category) != null)
                                                <form class="form-material" action="{{ route('problems.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="c_id">{{ "Car Problem Category" }}</label>
                                                        <select name="problem_catgory_id"  class="form-control" id="">
                                                            <option value="" selected>{{ "Choose Category" }}</option>
                                                            @foreach ($category as $item)
                                                            <option value="{{ $item->catgory_id  }}">{{ $item->cate_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group row form-default form-static-label">
                                                        <div class="col-md-12">
                                                            <label for="problem_desc">Problem Description</label>
                                                            <textarea name="problem_desc" id="" cols="5" rows="5" class="form-control" placeholder="Type Car Description"></textarea>
                                                        </div>
                                                    </div>
                                                <div class="form-group row form-default form-static-label">
                                                    <div class="col-md-12">
                                                        <label for="problem_desc">Any Image</label>
                                                        <input type="file" name="image" id="image"class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" name="button">Hifadhi</button>
                                                </div>
                                                </form>
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
    <script type="text/javascript">
    $(document).ready(function() {
  $("#btnFetch").click(function() {
    // disable button
    $(this).prop("disabled", true);
    // add spinner to button
    $(this).html(
      `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
    );
  });
});
    </script>
@include('layouts.inc.scripts')

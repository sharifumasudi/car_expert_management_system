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
                                    <h3 class="m-b-10">Car Management</h3>
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                        <a href="/expert/dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="/expert/dashboard">Dashboard</a>
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
                                            <h3 class="text-primary">Car Details</h3>
                                            <button data-toggle="modal" data-target="#addNewCar"class="btn btn-primary">Register New Car</button>
                                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                            </div>
                                            <div class="card-block" id="block1">
                                            <!-- Row start -->
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                                        <div class="sub-title">
                                                        <h3>Car Informations</h3>
                                                        @if(session()->has('message'))
                                                        <div class="alert alert-danger">
                                                        {{ session('message') }}
                                                         </div>
                                                        @endif
                                                        </div>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block table-responsive">
                                                             @include('sweetalert::alert')

                                                             <table class="table table-bordered table-striped table-hover" id="example1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Car Name</th>
                                                                        <th>Fuel Type</th>
                                                                        <th>Engine Transmision Mode</th>
                                                                        <th>License Number</th>
                                                                        <th>Brand Name</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(count($cars) > 0)

                                                                        @foreach($cars as  $value)
                                                                        @if(Auth::user()->id == $value->id)
                                                                            <tr>
                                                                                <td>{{ $value->c_name }}</td>
                                                                                <td>{{ Str::ucfirst($value->fuel_type) }}</td>
                                                                                <td>{{ Str::ucfirst($value->transimission_mode) }}</td>
                                                                                <td>{{ $value->licence}}</td>
                                                                                <td>{{ $value->brand_name }}</td>
                                                                                @if($value->c_id)
                                                                                <td><a href="{{ route('problems_route.show', $value->c_id) }}" class="btn btn-link">{{ "Send Problem" }}</a></td>
                                                                                @endif
                                                                            </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        @else
                                                                        {{ "No Record Found" }}
                                                                    @endif
                                                                </tbody>
                                                             </table>

                                                        </div>
                                                        </div>
                                                        <!--col end-->
                                                </div>
                                                <!-- Row end -->

                                            <!--New Cat-->
                                            <div class="modal fade" id="addNewCar">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Register Car Informations</h3>
                                                            <button class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('car_manage.store') }}" method="post">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <label for="c_name">Car name</label>
                                                                        <input type="text" name="c_name" placeholder="Type Car Name" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="brand_name">Brand Name</label>
                                                                        <select name="brand_name" id="brand_name" class="form-control">
                                                                            <option value="" selected>Choose Car Brand</option>
                                                                            <option value="Mercedes-Benz">{{ "Mercedes-Benz" }}</option>
                                                                            <option value="Toyota">{{ "Toyota" }}</option>
                                                                            <option value="Nissan">{{ "Nissan" }}</option>
                                                                            <option value="Honda">{{ "Honda" }}</option>
                                                                            <option value="Yutong">{{ "Yutong" }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <select name="fuel_type" id="" class="form-control">
                                                                            <option value="" selected>Choose Fuel Type</option>
                                                                            <option value="gas">{{ "Gas Fuel" }}</option>
                                                                            <option value="electricity">{{ "Electricity" }}</option>
                                                                            <option value="diesel">{{ "Diesel" }}</option>
                                                                            <option value="petrol">{{ "Petrol" }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select name="transimission_mode" id="" class="form-control">
                                                                            <option value="" selected>Choose Transimission Mode</option>
                                                                            <option value="auto">Auto System</option>
                                                                            <option value="manual">Manual System</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="licence">Car License Number</label>
                                                                        <input type="text" name="licence" class="form-control" placeholder="Insert Car License Number" >
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--New Car-->
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

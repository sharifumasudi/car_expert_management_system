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
                                    <h3 class="m-b-10">Car Problem Categories</h3>
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
                                            <button data-toggle="modal" data-target="#addNewCar"class="btn btn-primary">Register New Category</button>
                                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                            </div>
                                            <div class="card-block" id="block1">
                                            <!-- Row start -->
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                                        <div class="sub-title">
                                                        <h3>Problem Category Informations</h3>
                                                        @if(session()->has('message'))
                                                        <div class="alert alert-danger">
                                                        {{ session('message') }}
                                                         </div>
                                                        @endif
                                                        </div>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block">
                                                             @include('sweetalert::alert')

                                                             <table class="table table-bordered table-striped table-hover" id="example1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ "S/NO" }}</th>
                                                                        <th>Problem Category</th> Name</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @if(count($categories) != null)
                                                                    @foreach ($categories as $item)
                                                                        <tr>
                                                                            <td>{{ $item->catgory_id }}</td>
                                                                            <td>{{ $item->cate_name }}</td>
                                                                        </tr>
                                                                    @endforeach
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
                                                            <h3 class="modal-title">Register Problem Category Informations</h3>
                                                            <button class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('problem_category.store') }}" method="post">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <label for="cate_name">Category  name</label>
                                                                        <input type="text" name="cate_name" placeholder="Type Car Name" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="description">Catgory Description</label>
                                                                    <textarea name="description" id="" cols="2" rows="2" class="form-control"></textarea>
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

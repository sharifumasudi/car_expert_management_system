@extends('layouts.app')
@section('content')   <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-xs-8 col-sm-8 offset-md-2">
                    <!--Card Results Starts Here-->
                    <div class="well">
                        <div class="card-header text-primary" style="background-image: url({{ asset('assets/images/bhnana.gif') }})">
                        <h4 class="text-center font-weight-bold logo">{{ "CAR PROBLEM's SOLUTIONS" }}</h4>
                        </div>
                        <div class="card-block pt-2">
                            <!--Search Form-->
                            @livewire('fetch-car-problem')
                            <!--End Search Form-->

                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="text-dark font-italic font-weight-bold">&#169; Noble-codes CEMS {{ date('Y') }} All Right Reserved</a>
                        </div>
                        <!--Footer//-->
                    </div>
                    <!--Results Ends Here-->
                </div>
            </div>
        </div>
    </section>
@endsection

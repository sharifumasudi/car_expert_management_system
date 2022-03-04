@extends('layouts.app')
@section('content')   <!-- Main content -->
    <section class="content" style="padding-top: 10%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!--Card Results Starts Here-->
                    <div class="well">
                        <div class="card-header text-center text-primary"><h1 class="card-title">Car Experties at {{ config('app.name') }}</h1></div>
                        <div class="card-body table-responsive">
                            <table class="table table-dark table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Experience</th>
                                        <th>Location</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($experts as $users => $value)
                                        <tr>
                                            @if($value->hasRole('expert'))
                                            <td>{{ $value->name }}</td>
                                            <td> <a href="tel:{{ $value->contact }}"  class="btn btn-link">{{ $value->contact }}</a></td>
                                            <td>{{ $value->experience }}</td>
                                            <td>{{ $value->location }}</td>
                                            <td><a href="mailto:{{ $value->email }}" class="btn btn-link">{{ $value->email }}</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button onclick="history.go(-1);" class="btn btn-danger">Go Back Home</button>

                         </div>
                        <div class="card-footer text-center">
                            <a href="#" class="text-dark font-italic font-weight-bold">CEMS {{ date('Y') }} All Right Reserved</a>
                        </div>
                        <!--Footer//-->
                    </div>
                    <!--Results Ends Here-->
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('frontEnd.master')
@section('title')
    Appointment
@endsection
@section('content')
    <div class="container mb-5" style="margin-top: 50px;">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <h1 class="text-center">Appointment Table</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Phone</th>
                                    <th>Doctor</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1 @endphp
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$appointment->app_name}}</td>
                                        <td>{{$appointment->app_email}}</td>
                                        <td>{{$appointment->app_date}}</td>
                                        <td>{{$appointment->app_number}}</td>
                                        <td>{{$appointment->app_doctor}}</td>
                                        <td>{{$appointment->app_message}}</td>
                                        <td>{{$appointment->status}}</td>
                                        <td>
                                            <form action="{{route('appointment-delete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                <input type="submit" value="Cancel Appointment" class="btn btn-danger" onclick="return confirm('Are you sure delete this')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

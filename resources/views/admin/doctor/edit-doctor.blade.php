@extends('admin.master')
@section('title')
    Update Doctor
@endsection
@section('content')
    <div class="row" style="margin-left: 230px;margin-top: 110px;">
        <div class="col-xl-9 mx-auto">
            <div class="align-items-center">
                <h5 class="text-center">Doctor Update Form</h5>
                <h5 class="text-center text-primary">{{session('message')}}</h5>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <hr/>
            <form action="{{route('doctor-update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Your Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="doctor_name" value="{{$doctor->doctor_name}}" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                    <input type="text" name="doctor_phone" value="{{$doctor->doctor_phone}}" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Speciality" class="col-sm-3 col-form-label">Speciality</label>
                                <div class="col-sm-9">
                                    <select name="doctor_speciality" id="" class="form-control">
                                        @foreach($doctor as $doctors)
                                        <option value="Skin">---Select----</option>
                                        @endforeach
{{--                                        <option value="Heart">Heart</option>--}}
{{--                                        <option value="Eye">Eye</option>--}}
{{--                                        <option value="Nose">Nose</option>--}}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="room" class="col-sm-3 col-form-label">Room No</label>
                                <div class="col-sm-9">
                                    <input type="text" name="doctor_room" value="{{$doctor->doctor_room}}"class="form-control" id="room" placeholder="Room No">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="doctor_image" class="form-control" id="Image">
                                    <img src="{{asset($doctor->doctor_image)}}" style="width: 100px;height: 100px;" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

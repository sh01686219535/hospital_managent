@extends('frontEnd.master')
@section('title')
    Doctor
@endsection
@section('content')
    <h5 class="text-center text-success">{{session('message')}}</h5>

    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('frontEndAsset')}}/assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Our Doctors</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="row">

                        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                            @foreach($doctors as $doctor)
                                <div class="item">
                                    <div class="card-doctor">
                                        <div class="header">
                                            <img src="{{asset($doctor->doctor_image)}}" alt="">
                                            <div class="meta">
                                                <a href="#"><span class="mai-call"></span></a>
                                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p class="text-xl mb-0">Name: {{$doctor->doctor_name}}</p>
                                            <p class="text-xl mb-0">Phone: {{$doctor->doctor_phone}}</p>
                                            <p class="text-xl mb-0">Room No: {{$doctor->doctor_room}}</p>
                                            <span class="text-sm text-grey">Speciality: {{$doctor->doctor_speciality}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
            <h5 class="text-center text-success">{{session('message')}}</h5>
            <form class="main-form" action="{{route('appointment')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" name="app_name" class="form-control" placeholder="Full name">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="email" name="app_email" class="form-control" placeholder="Email address..">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <input type="date" name="app_date" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        @if(Session::get('userId'))
                            <select name="app_doctor" id="departement" class="custom-select">
                                <option value="">---Select doctor---</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->doctor_name}}">{{$doctor->doctor_name}} --Speciality-- {{$doctor->doctor_speciality}}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="app_doctor" id="departement" class="custom-select">
                                <option value="general">General Health</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="dental">Dental</option>
                                <option value="neurology">Neurology</option>
                                <option value="orthopaedics">Orthopaedics</option>
                            </select>
                        @endif
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" name="app_number" class="form-control" placeholder="Number..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea  name="app_message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
            </form>
        </div>
    </div> <!-- .page-section -->


    <div class="page-section banner-home bg-image" style="background-image: url({{asset('frontEndAsset')}}/assets/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="{{asset('frontEndAsset')}}/assets/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                    <a href="#"><img src="{{asset('frontEndAsset')}}/assets/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="{{asset('frontEndAsset')}}/assets/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> <!-- .banner-home -->
@endsection

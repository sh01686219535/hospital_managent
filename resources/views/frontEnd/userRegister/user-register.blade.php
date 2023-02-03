@extends('frontEnd.master')
@section('title')
    User Register
@endsection
@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('frontEndAsset')}}/assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Register</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">User Registration</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Get in Touch</h1>
            <h5 class="text-center text-success">{{session('message')}}</h5>
            <form class="contact-form mt-5" action="{{route('user-register-form')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userName">User Name</label>
                        <input type="text" name="user_name" id="userName" class="form-control" placeholder="User Name">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userEmail">User Email Address</label>
                        <input type="email" name="user_email" id="userEmail" class="form-control" placeholder="User Email address">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userPhone">User Phone</label>
                        <input type="text" name="user_phone" id="userPhone" class="form-control" placeholder="User Phone Number">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInUp">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInUp">
                        <label for="Image">Image</label>
                        <input type="file" name="user_image" id="Image" class="form-control">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userAddress">Address</label>
                        <textarea name="user_Address" id="userAddress" class="form-control" placeholder="User Phone Number"></textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
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


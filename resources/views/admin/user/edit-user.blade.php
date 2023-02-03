@extends('admin.master')
@section('title')
    User Edit
@endsection
@section('content')

    <div class="page-section" style="margin-left: 320px;margin-top: 110px;">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Get in Touch</h1>
            <form class="contact-form mt-5" action="{{route('user-update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="row mb-3">
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userName">User Name</label>
                        <input type="text" name="user_name" value="{{$user->user_name}}" id="userName" class="form-control" placeholder="User Name">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userEmail">User Email Address</label>
                        <input type="email" name="user_email" value="{{$user->user_email}}" id="userEmail" class="form-control" placeholder="User Email address">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userPhone">User Phone</label>
                        <input type="text" name="user_phone" value="{{$user->user_phone}}" id="userPhone" class="form-control" placeholder="User Phone Number">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInUp">
                        <label for="Image">Image</label>
                        <input type="file" name="user_image" id="Image" class="form-control">
                        <img src="{{asset($user->user_image)}}"  style="width: 100px;height: 100px;" alt="">
                    </div>
                    <div class="col-md-9 py-2 wow fadeInRight">
                        <label for="userAddress">Address</label>
                        <textarea name="user_Address" id="userAddress" class="form-control" placeholder="User Phone Number">{{$user->user_Address}}</textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection

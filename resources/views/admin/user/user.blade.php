@extends('admin.master')
@section('title')
    User
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10" style="margin-left: 215px;margin-top: 131px;">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1 @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->user_name}}</td>
                                    <td>{{$user->user_email}}</td>
                                    <td>{{$user->user_phone}}</td>
                                    <td>
                                        <img src="{{asset($user->user_image)}}" style="width: 100px;height:100px;" alt="">
                                    </td>
                                    <td>{{$user->user_Address}}</td>
                                    <td>
                                        <a href="{{route('user-edit',['id'=>$user->id])}}" class="btn btn-primary" title="Edit">Edit</a>
                                        <form action="{{route('user-delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure delete this')">
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

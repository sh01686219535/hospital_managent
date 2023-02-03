@extends('admin.master')
@section('title')
    Manage Doctor
@endsection
@section('content')
    <div class="container" style="margin-left: 320px;margin-top: 110px;">
        <div class="row">
           <div class="col-md-9">
               <div class="card">
                   <div class="card-body">
                       <div class="table-responsive">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                               <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Doctor Name</th>
                                   <th>Doctor Phone</th>
                                   <th>Doctor Speciality</th>
                                   <th>Doctor Room</th>
                                   <th>Doctor Image</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @php $i = 1 @endphp
                               @foreach($doctors as $doctor)
                               <tr>
                                   <td>{{$i++}}</td>
                                   <td>{{$doctor->doctor_name}}</td>
                                   <td>{{$doctor->doctor_phone}}</td>
                                   <td>{{$doctor->doctor_speciality}}</td>
                                   <td>{{$doctor->doctor_room}}</td>
                                   <td>
                                       <img src="{{asset($doctor->doctor_image)}}" style="width: 100px;height: 100px;" alt="">
                                   </td>
                                   <td>{{$doctor->status==1?'Published':'Unpublished'}}</td>
                                   <td>
                                       @if($doctor->status==1)
                                           <a href="{{route('doctor-status',['id'=>$doctor->id])}}" class="btn btn-success">Unpublished</a>
                                       @else
                                           <a href="{{route('doctor-status',['id'=>$doctor->id])}}" class="btn btn-success">Published</a>
                                       @endif
                                       <a href="{{route('doctor-edit',['id'=>$doctor->id])}}" class="btn btn-primary" title="Edit">Edit</a>
                                       <form action="{{route('doctor-delete')}}" method="post">
                                           @csrf
                                           <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                                           <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure delete this')">
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

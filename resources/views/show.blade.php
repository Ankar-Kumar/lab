@extends('layout')

@section('page-content')

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Name :{{$employs->name}}</h5>
        <p class="card-text">Job_title : {{$employs->job_title}}</p>
        <p class="card-text">Salary : {{$employs->salary}}</p>
        <p class="card-text">Mobile_No : {{$employs->mobile_no}}</p>
        <p class="card-text">Address : {{$employs->address}}</p>
        <p class="card-text">Email : {{$employs->email}}</p>
        <a href="" class="btn btn-primary">Edit</a>
        <a href="{{route('employees.index')}}" class="btn btn-secondary">Cancel</a>

    </div>
</div>
@endsection
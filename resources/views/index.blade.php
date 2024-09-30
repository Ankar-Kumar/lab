@extends('layout');
@section('page-content')


<div class="d-flex justify-content-between mb-3">
    <form action="{{route('employees.search')}}" method="get">
        <div class="input-group">
            <input type="text"  class="form-control" name="search" placeholder="Search books">
            <div class="ms-2">
                <button class="btn btn-danger" type="submit" >Search</button>
            </div>
        </div>
    </form>
    <a href="{{Route('employees.create')}}" class="btn btn-success">Add Employee</a>
</div>



 <table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
        <th>Name</th>
        <th>Job_title</th>
        <th>Salary</th>
        <th>Email</th>
        <th>Mobile_no</th>
        <th>Address</th>
        <th>other</th>
    </tr>
  </thead>
  <tbody>
     @foreach($employees as $employ)
    <tr>
      <td>{{$employ->id}}</td>
            <td>{{$employ->name}}</td>
            <td>{{$employ->job_title}}</td>
            <td>{{$employ->salary}}</td>
            <td>{{$employ->email}}</td>
             <td>{{$employ->mobile_no}}</td>
            <td>{{$employ->address}}</td>
             <td class="d-flex justify-content-center">
                <a href="{{route('employees.show', $employ->id)}}" class="ms-1 btn btn-sm btn-secondary">View</a>
                <a href="{{route('employees.edit', $employ->id)}}" class="ms-1 btn btn-sm btn-primary">Edit</a>
                <form action="{{route('employees.destroy',$employ->id)}}" method="post">
                   @csrf
                    <button type="submit" class="ms-1 btn btn-danger" onclick="return confirm('are you sure?')">Delete</button>
                </form>
            </td>
    </tr>
    @endforeach
    
  </tbody>
</table>  
{{$employees->links()}} 
@endsection
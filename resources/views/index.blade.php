@extends('layout')

@section('content')
<table class="table  table-inverse ">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $students)
        <tr>
                <td>{{$students->id}}</td>
                <td>{{$students->name}}</td>
                <td>{{$students->email}}</td>
                <td><div><a href="user/{{$students->id}}/edit" class="btn btn-warning">Edit</a>
                <a href="user/{{$students->id}}/delete" class="btn btn-danger">Delete</a></div></td>
            </tr>
        
    @endforeach
        </tbody>
</table>
    
@endsection
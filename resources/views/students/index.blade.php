@extends('students.layout')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-success" href="{{ route('students.create') }}"> Add User</a>
    </div>
    <div class="row mt-5">
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($student as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
</div>

@endsection
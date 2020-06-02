@extends('students.layout')

@section('content')
<div class="container">
    <div class="row mt-5">
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($data as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($action)
                <form action="javaScript:void(0)" method="POST">
    
                    <a href="JavaScript:void(0)"><button {{$action}} class="btn btn-warning">Edit</button></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button {{$action}} type="submit" class="btn btn-danger">Delete</button>
                </form>
                @else
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button  type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
                
            </td>
        </tr>
        @endforeach
        
    </table>
    </div>
</div>

@endsection
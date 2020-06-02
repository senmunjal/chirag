@extends('students.layout')

@section('content')

<form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$user->name}}"  class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value='{{$user->email}}'  class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" value='{{$user->phone}}'  class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>

@endsection
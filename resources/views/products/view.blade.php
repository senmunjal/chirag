<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Multiple Form Submit</title>
    <script type="text/javascript">

    </script>
</head>

<body>
    <div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th >Price</th>
            <th >Quantity</th>
            <th >Photo</th>
            <th >Action</th>
        </tr>
        @foreach ($student as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->title }}</td>
            <td>{{ $student->description }}</td>
            <td>{{ $student->price }}</td>
            <td>{{ $student->total_quantity }}</td>
            <td><img src='{{ asset('test/' . $student->photo) }}'width="75"></td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
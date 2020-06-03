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
        <div class="row mt-5">
            <form class="col-lg-12" action="/products" method="get">
                <label class="col-lg-2 ">Number of Form</label>
                <select class="col-lg-4 btn" name="f_count" id="selectBox">
                    <option class="dropdown-item" value="10">10</option>
                    <option class="dropdown-item" value="20">20</option>
                    <option class="dropdown-item" value="30">30</option>
                    <option class="dropdown-item" value="40">40</option>
                    <option class="dropdown-item" value="50">50</option>
                </select>
                <input class="btn btn-primary ml-2" type="submit" value="Go">
            </form>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="{{ route('products.store') }}" method="post">
                    @for($i = 0; $i < 5 ; $i++)
                   
                        @csrf
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="title[{{$i}}]" class="form-control" placeholder="title[{{$i}}]">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="description[{{$i}}]" class="form-control" placeholder="description">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="price[{{$i}}]" class="form-control" placeholder="price">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="total_quantity[{{$i}}]" class="form-control" placeholder="total quantity">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="file" name="photo[{{$i}}]">
                                </div>
                            </td>
                        </tr>
                    @endfor      
                    </tbody>
                        <tr>
                            <td><input class="btn btn-primary" type="submit" value="Submit"></td> 
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
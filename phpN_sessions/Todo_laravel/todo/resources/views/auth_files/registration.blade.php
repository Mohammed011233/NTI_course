<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>




    <div class="container">

        {{session()->get('message')}}

        <form action="{{ url('user/insert') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="name"
                    placeholder="Enter Name" value="{{old('name')}}">

                    <span class="text-danger"> @error ('name'){{ $message }} @enderror </span>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" placeholder="Enter email" value="{{old('email')}}">
                    <span class="text-danger"> @error ('email'){{ $message }} @enderror </span>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
                    <span class="text-danger"> @error ('password'){{ $message }} @enderror </span>
            </div>


            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
                <span class="text-danger"> @error ('image'){{ $message }} @enderror </span>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{url('ToDo/login')}}" class="btn btn-primary">LogIn</a>
        </form>
    </div>


</body>

</html>

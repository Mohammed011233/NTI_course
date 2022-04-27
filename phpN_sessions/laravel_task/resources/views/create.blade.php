
<!doctype html>
<html lang="en">

<head>
    <title>Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <style>
        .all {
            /*background-color: lightblue;*/
            background-image: linear-gradient(to right, lightblue, azure);
        }

        .box {
            width: 50%;
            height: 80vh;
            margin: 10vh  auto ;
            /*background-color:azure;*/
            background-image: linear-gradient(to left, lightblue, azure);
            border-radius: 20px;
        }


        .box div {
            margin: 15px 20px;
        }

        .box button {
            margin-left: 45%;
        }

        .reg_header {
            text-align: center;
            padding-top: 10px;
            margin-bottom: 5px;
        }
    </style> --}}


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="all">
    <div class="box">
        <form action=" {{ url('blog/store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <h2 class="reg_header"> Post </h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Title </label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}" id="exampleInputName1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" name="content" value="{{old('content')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Your Image</label>
                <input class="form-control" type="file" name="image" value="" id="formFile">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
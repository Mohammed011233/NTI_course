<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="style/stylesheet.css">
    <title>To-Do page</title>

    <style>
        .logout {
            display: inline-block;
            position: absolute;
            right: 0%;
        }

    </style>

</head>

<body>

    <div class="card text-center">
        <div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Task</h5>
                </div>

                <div class="card-body">
                    <form action="{{ url('ToDo/Store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="input_todo input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                            </div>
                            <input type="text" class="input_todo form-control" name="title" value="{{ old('title') }}"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <span class="text-danger"> @error('title')
                                {{ $message }}
                            @enderror </span>

                        <div class="input_todo input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">Task</span>
                            </div>
                            <textarea class=" form-control" name="content" value="{{ old('content') }}" aria-label="With textarea"></textarea>
                        </div>
                        <span class="text-danger"> @error('content')
                                {{ $message }}
                            @enderror </span>

                        <br>

                        <div class="date_todo input-group mb-3">
                            <div class=" input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Start_date</span>
                                </div>
                                <input type="date" class="input_todo form-control" name="start_date"
                                    value="{{ old('start_date') }}" autocomplete="on" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                            <span class="text-danger"> @error('start_date')
                                    {{ $message }}
                                @enderror </span>


                            <div class=" input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">End_date</span>
                                </div>
                                <input type="date" class="input_todo form-control" name="end_date"
                                    value="{{ old('end_date') }}" value="{{ old('end_date') }}"
                                    aria-describedby="basic-addon1">

                            </div>
                            <span class="text-danger"> @error('end_date')
                                    {{ $message }}
                                @enderror </span>
                        </div>

                        <div class="input_todo input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">Image</span>
                            </div>
                            <input type="file" name="image" class="form-control">

                        </div>
                        <span class="text-danger"> @error('image')
                                {{ $message }}
                            @enderror </span>
                        <br>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Add
                                Task</button>
                        </div>

                    </form>



                </div>
            </div>

            <div class="card text-center">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">messions</h5>
                        </div>

                        <div class="card-body">

                            <div class="display_todo">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Task</th>
                                            <th scope="col">Starting</th>
                                            <th scope="col">End Time</th>
                                            <th scope="col">image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ substr($value->content, 0, 45) }}</td>
                                                <td>{{  $value->start_date}}</td>
                                                <td>{{ $value->end_date  }}</td>


                                                @php

                                                    $image = empty($value->image) ? '03.jpg' : $value->image;

                                                @endphp


                                                <td> <img src=" {{ url('/task_image/' . $image) }}" alt=""
                                                        width="70px" height="70px"> </td>

                                                <td>


                                                    <a href='{{url('/ToDo/delete/'.$value->id) }}' class='btn btn-danger m-r-1em'>Delete </a>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>



            </div>

</body>

</html>

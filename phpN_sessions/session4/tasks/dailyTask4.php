<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>dailyTask4</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label  class="form-label">your full name</label>
            <input type="text" class="form-control" name="fullname"  aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label class="form-label">your location address</label>
            <input type="text" class="form-control" name="address" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label  class="form-label">linkedin url</label>
            <input type="text" class="form-control" name="linkedin"  aria-describedby="emailHelp">
        </div>

        <div class="mb-3 form-check">
            <select name="gender" id="">
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
            <label class="form-check-label" for="exampleCheck1">select your gender</label>
        </div>

        <div class="mb-3">
            <label  class="form-label">upload your C.V</label>
            <input type="file" class="form-control" name="cvfile" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>

<?php

function clear($input)
{
    trim($input);
    strip_tags($input);
    stripslashes($input);

    return $input;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = clear($_POST['fullname']);
    $email = clear($_POST['email']);
    $password = clear($_POST['password']);
    $address = clear($_POST['address']);
    $linkedin = clear($_POST['linkedin']);
    $gender = $_POST['gender'];

    $namefile = $_FILES['cvfile']['name'];
    $tmpPathfile = $_FILES['cvfile']['tmp_name'];
    $typefile = $_FILES['cvfile']['type'];
    $sizefile = $_FILES['cvfile']['size'];

    $divType = explode('/',$typefile) ;
    $extentFile = strtolower(end($divType)) ;

    $finalname =  rand().time() . '.' . $extentFile ;
    $dispath = 'uploads/'.  $finalname ;

    $errors = [];
    $extentions = ['pdf'];
    if (isset($_POST['submit'])) {

        if (empty($fullname)) {
            $errors['name'] = "must enter your name";
        } elseif (is_numeric($fullname)) {
            $errors['name'] = "your name is not vaild";
        }

        if (empty($email)) {
            $errors['e-mail'] = "must enter your e-mail";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['e-mail'] = "your e-mail is not vaild";
        }

        if (empty($password)) {
            $errors['password'] = "must enter your password";
        } elseif (strlen($password) <= 6) {
            $errors['password'] = "your password is very short ,it must be greater than 6 char";
        }

        if (empty($address)) {
            $errors['address'] = "must enter your address";
        } elseif (strlen($address) > 10) {
            $errors['address'] = "your address is very long , it must be less than 10 char";
        }

        if (empty($linkedin)) {
            $errors['linkedin'] = "must enter your linkedin url";
        } elseif (!filter_var($linkedin, FILTER_VALIDATE_URL) && !strrchr($linkedin, 'linkedin')) {
            $errors['linkedin'] = "your  is not vaild";
        }
        if(empty($namefile)){
            $errors['c.v'] = 'you must upload your C.V';
        }elseif(!in_array($extentFile , $extentions)){
           $errors['c.v'] = "please uploud 'pdf' file only";
        }



        if (count($errors) > 0) {
            foreach ($errors as $index => $message) {
                # code...
                echo '*' . $index . ' :: ' . $message . '<br>';
            }
        } else {
            echo '<h2>your data is vaild';
            move_uploaded_file($tmpPathfile , $dispath);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">your full name</label>
            <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" aria-describedby="emailHelp">
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
            <label for="exampleInputEmail1" class="form-label">your address</label>
            <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">linkedin url</label>
            <input type="text" class="form-control" name="linkedin" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="check" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $linkedin = $_POST['linkedin'];
    $errors = [];
    if(isset($_POST['submit'])){
    
    if(empty($fullname) ){
        $errors['name'] = "must enter your name";
    }elseif(is_numeric($fullname)){
        $errors['name'] = "your name is not vaild";
    }

    if(empty($email) ){
        $errors['e-mail'] = "must enter your e-mail";
    }elseif(!strrchr($email,'@gmail.com')){
        $errors['e-mail'] = "your e-mail is not vaild";
    }

    if(empty($password) ){
        $errors['password'] = "must enter your password";
    }elseif(strlen($password) <= 6){
        $errors['password'] = "your password is very short ,it must be greater than 6 char";
    }

    if(empty($address) ){
        $errors['address'] = "must enter your address";
    }elseif(strlen($address) > 10){
        $errors['address'] = "your address is very long , it must be less than 10 char";
    }

    if(empty($linkedin) ){
        $errors['linkedin'] = "must enter your linkedin url";
    }elseif(!strrchr($linkedin,'www.linkedin.com')){
        $errors['linkedin'] = "your  is not vaild";
    }

    if(count( $errors) > 0){
        foreach ($errors as $index => $message) {
            # code...
            echo '*'.$index . ' :: ' . $message . '<br>';
        }
        }else{
            echo '<h2>your data is vaild';
    }

}

}

?>
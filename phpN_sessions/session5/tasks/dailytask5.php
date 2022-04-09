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
            <label class="form-label">Enter title</label>
            <input type="text" class="form-control" name="title" aria-describedby="title">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter content</label>
            <textarea class="form-control" name="content" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
        </div>


        <div class="mb-3">
            <label class="form-label">upload image ,it must to be only [ .png , .jpg , .jpeg ]</label>
            <input type="file" class="form-control" name="uploadedImg" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <button type="button" name="displayPage" class="btn btn-primary"><a href="displayPage.php" target="_blank" style="color: white; text-decoration: none;">Display Page</a></button>
    <br>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function clean($input)
    {
        return trim(stripslashes(strip_tags($input)));
    }

    if (isset($_POST['submit'])) {
        $title = clean($_POST['title']);
        $content = clean($_POST['content']);

        $vaildExtents = ['jpg', 'jpeg', 'png'];

        $errors = [];

        if (empty($_FILES['uploadedImg']['name'])) {
            $errors['img'] = 'the image required';
        } else {
            $imgTmppath = $_FILES['uploadedImg']['tmp_name'];
            $imgtype = $_FILES['uploadedImg']['type'];
            $imgsize = $_FILES['uploadedImg']['size'];

            $divtype = explode('/', $imgtype);
            $extenImg = strtolower(end($divtype));

            $finlname = time() . rand() . '.' . $extenImg;
            $dispath = "uploads/" . $finlname;

            if (!in_array($extenImg, $vaildExtents)) {
                $errors['img'] = 'your image is not vaild , it must to be only (.png , .jpg , .jpeg)';
            }
        }


        if (empty($title)) {
            $errors['title'] = "the title  required";
        } elseif (is_numeric($title)) {
            $errors['title'] = "the title must to be string";
        }

        if (empty($content)) {
            $errors['content'] = 'you shoud enter content';
        } elseif (strlen($content) <= 50) {
            $errors['content'] = 'your content is very little ,it must to be greater than 50 characters';
        }





        if (!empty($errors)) {
            foreach ($errors as $key => $message) {
                # code...
                echo $key . " : => " . $message . "<br>";
            }
        } else {

            move_uploaded_file($imgTmppath, $dispath);

            $filePath = 'blogData.text';

            $blogData = fopen($filePath, 'a', true) or die('not found the bloging file');

            $userdata = 'The Title :=> ' . $title . ' ||| The Content:=>' . $content . ' |||' . $dispath . "\n";

            fwrite($blogData, $userdata);

            fclose($blogData);

            setcookie('filePath', $filePath, time() + (60 * 60), '/');

            echo '<h3>your data becomed blogged </h3>';
        }
    }
}

?>
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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Enter title</label>
            <input type="text" class="form-control" name="dltTitle" aria-describedby="title">
        </div>

        <button type="submit" name="delete" class="btn btn-primary"> delete </button>
        <br>
    </form>
</body>

</html>



<?php

$filePath = $_COOKIE['filePath'];

$dataFile = fopen($filePath, 'a+');

while (!feof($dataFile)) {

    $lineOfData = explode("|||", fgets($dataFile));
    $imagePathe  = end($lineOfData);
    array_pop($lineOfData);

    foreach ($lineOfData as $index => $partOfLine) {
        echo  $partOfLine . '<br>';
    }
    if (!empty($imagePathe)) {
        echo '<img src="' . $imagePathe . '" alt="image in blogs file" width="100" >' . '<br>';
    }
}
fclose($dataFile);

function delete($input)
{
    global $filePath;
    $dataFile = fopen($filePath, 'a+');

    unlink($filePath);
    // while(!feof($dataFile)){
    //    $line = fgets($dataFile);
    //    if(strchr($line , $input)){
    //     $content =file_get_contents($filePath);
    //       preg_replace($line,'' ,$content);
    //    }
    // }


}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    delete($_POST['dltTitle']);
}
?>
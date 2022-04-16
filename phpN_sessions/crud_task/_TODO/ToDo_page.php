<?php
require('included_files/connection_db.php');
require('included_files/functions.php');
if(isset($_SESSION['user_id'])){

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="style/stylesheet.css">
    <title>To-Do page</title>

<style>
    .logout{
        display: inline-block;
        position: absolute;
        right: 0%;
    }
</style>

</head>

<body>

    <p class="wellcom"> Wellcom <?php echo $_SESSION['name'] ?></p>
    
    <a class="logout btn btn-danger" href="crud_oprations/logout.php" > logout </a>
    
    
    <div class="imgcontainer">
        <img class="avatar" src="<?php echo $_SESSION['image_path'] ?>" alt="avatar">
    </div>
    

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="input_todo input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Title</span>
            </div>
            <input type="text" class="input_todo form-control" name="title" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input_todo input-group">
            <div class="input-group-prepend">
                <span class="input-group-text ">Task</span>
            </div>
            <textarea class=" form-control" name="content_task" aria-label="With textarea"></textarea>
        </div>
        <div class="date_todo input-group mb-3">
            <div class=" input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Start_date</span>
                </div>
                <input type="date" class="input_todo form-control" name="start_date" default value="<?php echo time(); ?>" placeholder="Task's Title" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class=" input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">End_date</span>
                </div>
                <input type="date" class="input_todo form-control" name="end_date" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Add Task</button>
        </div>

    </form>





    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $title = clean($_POST['title']);
        $content_task = clean($_POST['content_task']);
        $start_date = clean($_POST['start_date']);
        $end_date = clean($_POST['end_date']);
        $theUserID = $_SESSION['user_id'];

        $errors = [];
        if (empty($title)) {
            $errors['title'] = "Enter the title of task";
        }
        if (empty($content_task)) {
            $errors['content'] = "Enter the content of task";
        }

        if (empty($start_date)) {
            $errors['str_dt'] = "Enter the start date of task";
        }

        if (empty($end_date)) {
            $errors['end_dt'] = "Enter the end of task";
        }

        if (count($errors) > 0) {
            foreach ($errors as $index => $message) {
                echo $message . '<br>';
            }
        } else {

            $insert_query = "INSERT INTO todo (`title` , `content` , `start_date` , `end_date` , `theUser_id`	) VALUES ( '$title' , '$content_task' , $start_date , $end_date , $theUserID)";

            $insert = mysqli_query($connect, $insert_query);
        }
    }


    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>







    <br>

    <div class="display_todo">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Task</th>
                    <th scope="col">Starting</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $select_query = "SELECT * FROM todo ";
                $run_query = mysqli_query($connect, $select_query);

                while ($fetch_row = mysqli_fetch_assoc($run_query)) {
                    //todo_id	title	content	start_date	end_date	theUser_id

                    if ($fetch_row['theUser_id'] == $_SESSION['user_id']) {
                ?>
                        <tr>
                            <td><?php echo $fetch_row['todo_id'] ?></td>
                            <td><?php echo $fetch_row['title'] ?></td>
                            <td><?php echo $fetch_row['content'] ?></td>
                            <td><?php echo $fetch_row['start_date'] ?></td>
                            <td><?php echo $fetch_row['end_date'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="crud_oprations/delete.php?id=<?php echo $fetch_row['todo_id']?>" > Delete </a>
                            </td>

                        </tr>
                <?php

                    }
                }

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>

<?php
}

?>
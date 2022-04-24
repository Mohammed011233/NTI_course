<?php require './crud.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>



    <main>
        <div class="container-fluid">

            <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="title" placeholder="Enter Name">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail">Content</label>
                    <textarea class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="content" placeholder="Enter email"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Image</label>
                    <input type="file" name="image">
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Blogs Data
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>




                                <?php
                                $oprations = new crud;

                                $oprations->insert();

                                # LOOP .... 
                                $i = 0;
                                $select = $oprations->select();
                                while ($raw = mysqli_fetch_assoc($select)) {

                                    if (isset($_SESSION['editMode']) && $_SESSION['editMode'] == $raw['id']) {
                                ?>

                                        <form action="<?php echo  htmlspecialchars('edit.php'); ?>" method="post" enctype="multipart/form-data">
                                            <tr>
                                                <td><?php echo ++$i; ?></td>
                                                <input type="number" name="id" value="<?php echo $row['id'] ?>" hidden>
                                                <td><input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="title" value="<?php echo $raw['title']?>"></td>
                                                <td><textarea class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="content" value="<?php echo $raw['content'];?>"></textarea>
                                                </td>

                                                <td> <input type="file" name="image"></td>
                                                <td>
                                                    <a href='show.php?id=<?php echo $raw['id']; ?>' class='btn btn-primary m-r-1em'>Show</a>
                                                    <a href='<?php echo $_SERVER['PHP_SELF'] . '?id=' . $raw['id']; ?>' class='btn btn-danger m-r-1em'>Delete</a>

                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                        $oprations->delet($_GET['id']);
                                                        header('location: ' . $_SERVER['PHP_SELF']);
                                                    }
                                                    ?>

                                                    <button type="submit" href='' class='btn btn-primary m-r-1em'>Edit</button>
                                                </td>
                                            </tr>

                                        </form>


                                    <?php
                                        unset($_SESSION['editMode']);
                                        continue;
                                    } else {
                                    ?>




                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo $raw['title']; ?></td>
                                            <td><?php echo  substr($raw['content'], 0, 49); ?></td>

                                            <td> <img src="<?php echo $raw['image']; ?>" alt="UserImage" height="70px" width="70px"> </td>
                                            <td>
                                                <a href='show.php?id=<?php echo $raw['id']; ?>' class='btn btn-primary m-r-1em'>Show</a>
                                                <a href='<?php echo $_SERVER['PHP_SELF'] . '?id=' . $raw['id']; ?>' class='btn btn-danger m-r-1em'>Delete</a>

                                                <?php
                                                if (isset($_GET['id'])) {
                                                    $oprations->delet($_GET['id']);
                                                    header('location: ' . $_SERVER['PHP_SELF']);
                                                }
                                                ?>


                                                <a href='./editMode.php?id=<?php echo $raw['id']; ?>' class='btn btn-primary m-r-1em'>Edit</a>
                                            </td>
                                        </tr>






                                <?php }
                                    // header('location: index.php');
                                } ?>





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymo"></script>
</body>

</html>
<?php
require './include/db.php';
require './include/functions.php';


class crud
{
    private $database;

    function __construct()
    {
        $this->database = new DB;
    }


    var $title;
    var $content;

    var $img_name;
    var $img_tmppath;
    var $img_type;
    var $img_size;
    var $disPath;

    #get extention of image


    function validataData()
    {
        $vaidate = new validation;


        #get extention of image
        $div_type = explode('/', $this->img_type);
        $extension = strtolower(end($div_type));



        $FinalName = uniqid() . '.' . $extension;

        $this->disPath = 'uploads/' . $FinalName;



        $vaidate->validator($this->title, 'required');
        $vaidate->validator($this->title, 'string');
        $vaidate->validator($this->title, 'maxlength',  30);

        $vaidate->validator($this->content, 'required');
        $vaidate->validator($this->content, 'string');
        $vaidate->validator($this->content, 'maxlength', 255);

        $vaidate->validator($this->img_name, 'required');
        $vaidate->validat_image($extension, $this->disPath, $this->img_tmppath);

        $vaidate->displayMessage("<h3> data is valid </h3>");
    }



    function insert()
    {
        $vaidate = new validation;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->title      = $vaidate->clean($_POST['title']);
            $this->content    = $vaidate->clean($_POST['content']);

            $this->img_name = $_FILES['image']['name'];
            $this->img_tmppath = $_FILES['image']['tmp_name'];
            $this->img_type = $_FILES['image']['type'];
            $this->img_size = $_FILES['image']['size'];

            crud::validataData();

            if (!isset($_SESSION['message'])) {
                $title = $this->title;
                $content = $this->content;
                $disPath = $this->disPath;

                $query = "INSERT INTO `blogs` (`title` , `content` , `image`) VALUES ('$title' , '$content' , '$disPath')";

                return $this->database->doQuery($query);
            }
        }
    }



    function select()
    {



        $select_query = "SELECT * FROM `blogs` ";

        return $this->database->doQuery($select_query);
    }


    function delet($id)
    {

        $del_query = "DELETE FROM `blogs` WHERE id = $id";

        return $this->database->doQuery($del_query);
    }



    function update()
    {
        $vaidate = new validation;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->title      = $vaidate->clean($_POST['title']);
            $this->content    = $vaidate->clean($_POST['content']);

            $this->img_name = $_FILES['image']['name'];
            $this->img_tmppath = $_FILES['image']['tmp_name'];
            $this->img_type = $_FILES['image']['type'];
            $this->img_size = $_FILES['image']['size'];
            $id = $_POST['id'];

            $select = "SELECT * FROM `blogs` WHERE id= $id";

            $op = $this->database->doQuery($select);

            crud::validataData();
            if (!isset($_SESSION['message'])) {
            $title = $this->title;
            $content = $this->content;
            $disPath = $this->disPath;

            $raw = mysqli_fetch_assoc($op);
            $query = "UPDATE `blogs` SET `title`='$title',`content`='$content',`image`='$disPath' WHERE id=$id ";
            return $this->database->doQuery($query);
            }
        }
    }
}

<?php 
session_start();

    $_SESSION['editMode'] = $_GET['id'];


header('location: create_blog.php');
exit;

?>
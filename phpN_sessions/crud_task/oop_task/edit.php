<?php require './crud.php';

$oprations = new crud;

$oprations->update();

unset($_SESSION['editMode']);
header('location: create_blog.php');
exit;
?>
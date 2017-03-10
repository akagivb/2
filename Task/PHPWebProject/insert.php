<?php
include('config.php');

$title=addslashes($_POST['title']);
$author=addslashes($_POST['author']);
$format=$_POST['format'];
$pdate=$_POST['pdate'];
$pspan=$_POST['pspan'];
$isbn=$_POST['isbn'];
$resume=addslashes($_POST['resume']);
$cover=addslashes($_POST['pic']);
$date = date('Y-m-d H:i:s');

$insert= mysqli_query($mysqli,"INSERT INTO books(isbn,title,author,formats,publishdate,pages,resume,cover,createdon)
VALUES('".$isbn."','".$title."','".$author."','".$format."','".$pdate."','".$pspan."','".$resume."','".$cover."','".$date."')");
?>
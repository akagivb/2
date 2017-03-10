<?php
include('config.php');

$id=intval($_POST['isbn']);
$c = "SELECT COUNT(*) AS total from books where isbn=".$id;
$r1 = $mysqli->query($c);
while($r2 = $r1->fetch_assoc()){
    echo $r2["total"];
};
?>
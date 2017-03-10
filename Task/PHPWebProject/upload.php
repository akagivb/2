<?php
if(isset($_FILES['pic'])){
    $errors= array();
    $file_name = $_FILES['pic']['name'];
    $file_size =$_FILES['pic']['size'];
    $file_tmp =$_FILES['pic']['tmp_name'];
    $file_type=$_FILES['pic']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['pic']['name'])));

    $expensions= array("jpeg","jpg","png");

    if($file_size > 2100000 || $file_size < 1){
        $errors = 'Cover file size must be no more than 2 MB.;';
    }

    if(in_array($file_ext,$expensions) === false){
        $errors ='Cover file extension must be JPEG or PNG file.;';
    }

    if (file_exists('uploaded/'.$file_name)) {
        $errors = 'Cover already exists.;';
    }
    if($file_name === null || $file_name === ""){
        $errors = 'No cover selected;';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"uploaded/".$file_name);
        echo "Cover uploaded.";
    }else{
        echo $errors;
    }
}
?>
<?php

session_start();

$mysqli = new mysqli('localhost','ahtun','mypass123','info') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$phone = '';

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
    $chknew = "";
    
    foreach ($hobby as $chknew1){
         $chknew .= $chknew1 . ", ";
    }
    
    $mysqli->query("INSERT INTO data(name,phone,gender,hobby) VALUES('$name','$phone','$gender','$chknew')") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id")or die($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $name = $row['name'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $hobby = $row['hobby'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
     $chknew = "";
    
    foreach ($hobby as $chknew1){
         $chknew .= $chknew1 . ", ";
    }
    
    $mysqli->query("UPDATE data SET name='$name',phone='$phone',gender='$gender',hobby='$chknew' WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');
}
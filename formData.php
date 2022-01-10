<?php
require_once 'connect.php';
$update=false;
$name = "";
$email = '';
$id=0;
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `crud` (`Id`, `Name`, `Email`) VALUES (NULL, '$name','$email');";
    mysqli_query($con, $sql);

    $_SESSION['message'] = "Record inserted successfully";
    $_SESSION['msgType'] = "success";
    header("location: index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM `crud` WHERE `Id` = $id";
    mysqli_query($con, $sql);
    $_SESSION['message'] = "Record deleted successfully";
    $_SESSION['msgType'] = "danger";
    header("location: index.php");
}

if (isset($_GET['update'])) {
    $update=true;
    $id = $_GET['update'];
    $sql = "SELECT * FROM `crud` WHERE `Id`=$id;";
    $result=mysqli_query($con,"SELECT * FROM `crud` WHERE `Id`=".$id) ;
    
        $row = mysqli_fetch_array($result);
        $name = $row['Name'];
        $email = $row['Email']; 
}
if(isset($_POST['edit'])){

    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    echo $name;
    
    $sql="UPDATE `crud` SET `Name` ='$name', `Email` ='$email' WHERE `Id` ='$id'";
    mysqli_query($con,$sql);
     $_SESSION['message']='Record updated';
     $_SESSION['msgType']='warning';

     header("location:index.php");
}
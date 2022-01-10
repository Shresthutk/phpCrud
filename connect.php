<?php
$user='root';
$host='localhost';
$password='';
$database='phpdata';
$con=mysqli_connect($host,$user,$password,$database);
if(!$con){
    echo 'Failed to connect';
}

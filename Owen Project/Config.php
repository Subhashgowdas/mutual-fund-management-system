<?php
$server="localhost";
$user="root";
$pass="";
$database="datab"

$conn=mysqli_connect($server,$user,$pass,$datab);

if(!$conn){
    die("<script>alert('connection Failed.')</script>");
}
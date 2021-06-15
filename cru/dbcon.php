<?php

$host="localhost";
$user="root";
$password="";
$dbname = "registration";
$connection=  mysqli_connect($host,$user,$password,$dbname);

if($connection){
    echo "connected";
}

?>



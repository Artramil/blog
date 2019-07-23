<?php
require_once('dbconfig.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Pomilka");
};
var_dump($_GET) ;
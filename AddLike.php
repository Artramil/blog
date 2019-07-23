<?php 
require_once('dbconfig.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Pomilka");
};
$idRec=$_GET["Id"];
$sql="UPDATE record SET `like`=`like`+1 WHERE `id`='{$_GET["Id"]}' ";
    $conn->query($sql);
    $conn->close();
    header ('Location: pereglad.php?Id='.$idRec);
    
?>

<?php

require_once('dbconfig.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Pomilka");
};
$role=$_GET["Role"];
$login=$_GET["login"];
    $sql="UPDATE `users` SET `Role`='{$role}' where `login`='{$login}';";
    $conn->query($sql);
    $conn->close();
    header ('Location: users.php');

?>     



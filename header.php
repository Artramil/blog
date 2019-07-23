<?php
session_start();
require_once('dbconfig.php');
if(isset($_SESSION["Autorization"]) && $_SESSION["Autorization"]==TRUE){
    $conn= new mysqli(Servername,UserName,Password,DBName);
    $sql="SELECT `Role`, `urlAvatar` FROM `users` WHERE `login`='{$_SESSION["login"]}'";

    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $role=$row["Role"];
    $urlAvatar=$row["urlAvatar"];
    $conn->close();
    echo $role;

} else {
  $role='guest';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="blog.css" />
    <title>My Blog</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="index.php">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">ГОЛОВНА <span class="sr-only">(current)</span></a>
      </li>

<?php
   if ($role=="Autor" || $role=="Admin"){
?>  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Мої записи 
        </a>
<!-- <?php echo $role; ?> -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="addrecord.php">Додати записи</a>
          <a class="dropdown-item" href="editrecords.php">Редагувати запси</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
<?php
}
?>
<?php 
   if ($role=="Admin"){  
?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Адміністратор
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="users.php">Користувачі</a>
          <a class="dropdown-item" href="recordings.php">Записи</a>
          <a class="dropdown-item" href="comets.php">Коментарі</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      
<?php
   }
?>
</ul>
<?php 

        
        if(isset($_SESSION["Autorization"]) && $_SESSION["Autorization"]==TRUE){
     
?>
    <div class="nav-item dropdown">
        <a  class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img  class="avatar" src="Image/<?=$urlAvatar?>" alt="">
        <?=$_SESSION["login"]?>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit.php">Редагувати</a>
          <a class="dropdown-item" href="logout.php">Вийти</a>
          <div class="dropdown-divider"></div>
        </div>
        </a>
    </div>
<?php 
        } else {
?>
        <a class="nav-link" href="enter.php">УВІЙТИ <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="userInsert.php">ЗАРЕЄСТРУВАТИСЯ <span class="sr-only">(current)</span></a>
<?php 
      } 
?>
   
  </div>
</nav>
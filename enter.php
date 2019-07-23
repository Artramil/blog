<?php
require_once('header.php');
    require_once('dbconfig.php');
    require_once('functioins.php');
    require_once('footer.php');
?>
<body>
<form class="w-50 mr-auto ml-auto p-5" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" name="login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php 
  if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn= new mysqli(Servername,UserName,Password,DBName);
    if($conn->connect_error){
      die("Gjvbkrf");
    };
    $login=$_POST['login'];
    $Password=Password ($_POST['password']);
    $sql="SELECT * FROM `users` WHERE `login`='{$login}'";
    $result=$conn->query($sql);
    if ($result->num_rows<1){
        Echo "Користувач відсутній";
    } else {
      echo"OK";
        $row=$result->fetch_assoc();
        if($Password==$row['Password']){
          Autorization($login);
          header('Location: index.php');
        } else {
          Echo "No";
        };
    }
    $conn->close();
  }
  require_once('footer.php');
  ?>
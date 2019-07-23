<?php
    require_once('header.php');
    require_once('dbconfig.php');
    $conn= new mysqli(Servername,UserName,Password,DBName);
    // if($conn->connect_error){
    //     die ("Помилка з'єднання з БД - ".$conn->connect_error);

    // } else {
    //     echo "З'єднання з БД успішне";
    // };
    require_once('functioins.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>My Blog</title>
</head>
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
  <label for="basic-url">Avatar</label>
  <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="Avatar">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nick</label>
    <input type="login" class="form-control" id="exampleInputPassword1" placeholder="Nick" name="Nick">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php 
  if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn= new mysqli(Servername,UserName,Password,DBName);
    if($conn->connect_error){
      die("Gjvbkrf");
    };
    if ($_FILES['Avatar']["name"]!=""){
      $expantion=explode('.', $_FILES['Avatar']["name"]);
      $FileName=md5(microtime()).".".$expantion[count($expantion)-1];
      move_uploaded_file($_FILES['Avatar']["tmp_name"],"Image/".$FileName);
    }
    $login=$_POST['login'];
    $Password=Password ($_POST['password']);
    $Nick=$_POST['Nick'];
    $sql="SELECT * FROM `users` WHERE `login`='{$login}'";
    $result=$conn->query($sql);
    if ($result->num_rows<1){
      //$sql="INSERT INTO `users`(`login`, `Password`, `Nick`, `urlAvatar`) VALUES ('{$login}','{$Password}','{$Nick}', '{$FileName}')";
      $stmt=$conn->prepare("INSERT INTO `users`(`login`, `Password`, `Nick`, `urlAvatar`) VALUES (?,?,?,?)");
      $stmt->bind_param("ssss", $login, $Password, $Nick, $FileName);
      $login=trim(htmlspecialchars($login));
      $Password=trim(htmlspecialchars($Password));
      $Nick=trim(htmlspecialchars($Nick));
      if ($stmt->execute()){
        Autorization($login);
        header ('Location: index.php');
      } else {
        echo "Данні не збережено".$stmt->error;
      }
    } else {
      $row=$result->fetch_assoc();
      echo "Користувач {$row['login']} вже зареєстрований";
    }
    $stmt->close();
    $conn->close();
  }
  require_once('footer.php');
  ?>
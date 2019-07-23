<?php
require_once('header.php');
require_once('dbconfig.php');
require_once('functioins.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
$sql="SELECT * FROM `users` WHERE `login`='{$_SESSION["login"]}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$oldNick=$row["Nick"];
$oldPassword=$row["Password"];
?>
<body>
<form class="w-50 mr-auto ml-auto p-5" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Nick</label>
    <input type="Nick" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="<?=$oldNick?>" name="Nick">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="oldPassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="newPassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password again</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="newPassword2">
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
<?php 
  if ($_SERVER["REQUEST_METHOD"]=="POST"){

    
    if ($oldPassword==Password($_POST['oldPassword'])){
    $Nick=$_POST['Nick'];
    $newPassword=Password($_POST['newPassword']);
    $newPassword2=Password($_POST['newPassword2']);
    if ( $newPassword==$newPassword2){
    $sql="UPDATE `users` SET `Password`='$newPassword', `Nick`='$Nick' WHERE `login`='{$_SESSION["login"]}'";
    $result=$conn->query($sql);
    $conn->close();
    
  }else { echo "бла бла бла ";}
  }else { echo "не вірний пароль";}
  header ('Location: index.php');
}

  require_once('footer.php');
  ?>
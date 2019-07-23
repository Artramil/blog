<?php
require_once('header.php');
require_once('footer.php');
require_once('functioins.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
$sql="SELECT * FROM `users` WHERE `login`='{$_SESSION["login"]}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$Nick=$row["Nick"];
$id=$row["id"];
?>
<form action="" method="post">
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Автор: <?=$Nick?></h5>
    
    <div class="form-group">
    <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Post</button>
  </div> 
</div>
</form>
<?php
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Text=$_POST['text'];
    $date=date("D M j Y G:i:s");
    $sql="INSERT INTO `record`(`text`,`idAutor`,`date`,`status`) VALUES  ('{$Text}', '{$id}', '{$date}', 'new')";
    $conn->query($sql);
    $conn->close();
 }
?>
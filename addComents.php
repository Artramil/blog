<?php
require_once('header.php');
require_once('footer.php');
require_once('dbconfig.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
$idRecord=$_GET["Id"];
if($conn->connect_error){
    die("Gjvbkrf");
};
echo "</br>";
?>
<form action="" method="post">  
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
      <div class="blogCardfooter">
        <div class="d-flex  bd-highlight mb-3">
        <div class="d-flex bd-highlight mb-3">
        <button style="margin-top: 0.5rem;" type="submit" class="btn btn-primary">Коментувати</button>
               <div style="margin: 0.5rem;" class="ml-auto p-2 bd-highlight"><a href="pereglad.php?Id=<?=$idRecord?>" class="card-link">Назад</a></div>
            </div>
          </div>
      </div>
  </div>
</div>
</form>
<?php
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $sql1="SELECT * FROM `users` WHERE `login`='{$_SESSION["login"]}'";
  $result1=$conn->query($sql1);
  $row=$result1->fetch_assoc();
  $id= $row['id'];
    $Text=$_POST['text'];
    $date=date("D M j Y G:i:s");
    // INSERT INTO `comment`(`idAutor`, `idRecord`, `date`, `status`, `text`, `like`, `disLike`) VALUES ()
    $sql="INSERT INTO `comment`(`idAutor`, `idRecord`, `date`, `text`) VALUES  ( '{$id}', '{$idRecord}' ,'{$date}', '{$Text}')";
    $conn->query($sql);
    $conn->close();
    header ('Location: pereglad.php?Id='.$idRecord);
 }
?>
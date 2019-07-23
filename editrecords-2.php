<?php
require_once('header.php');
require_once('footer.php');
require_once('dbconfig.php');

$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Gjvbkrf");
};
$IdRecord=$_GET["Id"];
$sql="SELECT * FROM `record` where `id`='{$IdRecord}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<form action="" method="post">  
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <h6 class="card-subtitle mb-2 text-muted">Дата: <?=$row["date"]?></h6>
    <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"><?=$row["text"]?></textarea>
      <div class="blogCardfooter">
        <div class="d-flex  bd-highlight mb-3">
        <div class="d-flex bd-highlight mb-3">
        <button type="submit" class="btn btn-primary">Зберігти</button>
               <div class="ml-auto p-2 bd-highlight"><a href="editrecords.php" class="card-link">Назад</a></div>
            </div>
          </div>
      </div>
  </div>
</div>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Text=$_POST['text'];
    $date=date("D M j Y G:i:s");
    $sql="UPDATE `record` SET `text`='$Text', `date`='$date' WHERE `id`='{$IdRecord}'";
    $conn->query($sql);
    $conn->close();
    header ('Location: editrecords.php');
 }
?>
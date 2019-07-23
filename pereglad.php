<?php
require_once('header.php');
require_once('footer.php');
require_once('dbconfig.php');

$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Gjvbkrf");
};
$IdRecord=$_GET["Id"];
$sql="select users.Nick as Autor, `date`, `text`, `like`, `disLike`
from record inner join users on users.id=record.idAutor where `record`.`id`='{$IdRecord}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
    echo "</br>";
?>
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Автор: <?=$row["Autor"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Дата: <?=$row["date"]?></h6>
    <p class="card-text"><?=$row["text"]?></p>
      <div class="blogCardfooter">
        <div class="d-flex  bd-highlight mb-3">
          <div class="p-2 bd-highlight"><a href="AddLike.php?Id=<?=$IdRecord?>" class="card-link"><i class="fas fa-thumbs-up"></i></a></div>
          <div class="p-2 bd-highlight"><?=$row["like"]?></div>
          <div class="p-2 bd-highlight"> <a href="AddDisLike.php?Id=<?=$IdRecord?>" class="card-link"><i class="fas fa-thumbs-down"></i></a></div>
          <div class="p-2 bd-highlight"><?=$row["disLike"]?></div>
          <!-- <div class="ml-auto p-2 bd-highlight">Коментарі: <?=$row["CountComment(idAutor)"]?></div>
          <div class="p-2 bd-highlight">0</div> -->
          
            <div class="d-flex bd-highlight mb-3">
               <div class="ml-auto p-2 bd-highlight"><a href="addComents.php?Id=<?=$IdRecord?>" class="card-link">Додати Коментарі</a></div>
            </div>
          </div>
      </div>
  </div>
    
</div>
<?php
$sqlCom="SELECT `date`, `disLike`, `like`, `text`, `idAutor` from `comment` where `IdRecord`='{$IdRecord}'";
$resultCom=$conn->query($sqlCom);
foreach ($resultCom as $row){
?> 
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
<?php 
    $sqlName="SELECT `Nick` from `users` inner join comment where users.Id=comment.idAutor;";
    $resultName=$conn->query($sqlName);
    $row1=$resultName->fetch_assoc();
?>
    <h5 class="card-title">Автор: <?=$row1["Nick"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Дата: <?=$row["date"]?> </h6>
    <p class="card-text"><?=$row["text"]?></p>
      <div class="blogCardfooter">
        <div class="d-flex  bd-highlight mb-3">
          <div class="p-2 bd-highlight"><a href="#" class="card-link"><i class="fas fa-thumbs-up"></i></a></div>
          <div class="p-2 bd-highlight"><?=$row["like"]?></div>
          <div class="p-2 bd-highlight"> <a href="#" class="card-link"><i class="fas fa-thumbs-down"></i></a></div>
          <div class="p-2 bd-highlight"><?=$row["disLike"]?></div>
          <div class="p-2 bd-highlight"></div>
          </div>
      </div>
  </div>
</div>
<?php   
}
?>
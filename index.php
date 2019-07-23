<?php
require_once('header.php');
require_once('footer.php');
require_once('dbconfig.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Gjvbkrf");
};
$sql="select users.Nick as Autor, `date`, `text`, `like`, record.id as id,`disLike`, `idAutor`, CountComment(record.id) as CountCom
from record LEFT join users on users.id=record.idAutor";
$result=$conn->query($sql);
foreach ($result as $row){
  //var_dump($row);
  echo "<br>";
?>    
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Автор: <?=$row["Autor"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Дата: <?=$row["date"]?></h6>
    <p class="card-text"><?=$row["text"]?></p>
      <div class="blogCardfooter">
        <div class="d-flex  bd-highlight mb-3">
          <div class="p-2 bd-highlight"><a href="#" class="card-link"><i class="fas fa-thumbs-up"></i></a></div>
          <div class="p-2 bd-highlight"><?=$row["like"]?></div>
          <div class="p-2 bd-highlight"> <a href="#" class="card-link"><i class="fas fa-thumbs-down"></i></a></div>
          <div class="p-2 bd-highlight"><?=$row["disLike"]?></div>
          <div class="ml-auto p-2 bd-highlight">Коментарі: <?=$row["CountCom"]?></div>
          <div class="p-2 bd-highlight"></div>
            <div class="d-flex bd-highlight mb-3">
               <div class="ml-auto p-2 bd-highlight"><a href="pereglad.php?Id=<?=$row["id"]?>" class="card-link">Переглянути</a></div>
            </div>
          </div>
      </div>
  </div>
</div>
<?php
}


?>


<?php
require_once('header.php');
require_once('footer.php');
require_once('dbconfig.php');

$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Gjvbkrf");
};
$sql="SELECT * FROM `users` INNER JOIN `record` ON record.idAutor=users.id";
$result=$conn->query($sql);
foreach ($result as $row){
    
?>
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Автор: <?=$row["Nick"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Дата: <?=$row["date"]?></h6>
    <p class="card-text"><?=$row["text"]?></p>
      <div class="blogCardfooter">
        <div class="d-flex  bd-highlight mb-3">
        <div class="d-flex bd-highlight mb-3">
               <div class="ml-auto p-2 bd-highlight"><a href="editrecords-2.php?Id=<?=$row["id"]?>" class="card-link">Редагувати</a></div>
            </div>
          </div>
      </div>
  </div>
    
</div>
<?php
}
?>

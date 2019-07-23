<?php
require_once('header.php');
require_once('footer.php');
require_once('dbconfig.php');
$conn= new mysqli(Servername,UserName,Password,DBName);
if($conn->connect_error){
    die("Gjvbkrf");
};
$sql="SELECT `login`, `Role`, `Nick` FROM `users`";
$result=$conn->query($sql);
foreach ($result as $row){
  //var_dump($row);
  echo "<br>";
?>    
<div class="card mx-auto" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Автор: <?=$row["login"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Роль: <?=$row["Role"]?></h6>
    <h6 class="card-text"><?=$row["Nick"]?></h6>
      <div>
        <form action="role.php?role=<?=$_POST['Role']?>" method="link">
            <select class="form-control form-control" style="width: 8.5rem" name="Role">
                <option value="Follower">Follower</option>
                <option value="Autor">Autor</option>
                <option value="Admin">Admin</option>
            </select>
            <input type="text" name='login' value=<?=$row["login"]?> hidden>
            <button style="margin-top: 0.5rem;" type="submit" class="btn btn-primary">Змінити роль</button>
        </form>
      </div>
        <form action="deleteUsers.php?Dl=<?=$row["login"]?>" method="link">
            <button style="margin-top: 0.5rem;" type="submit" class="btn btn-primary">Видалити користувача</button>
        </form>
    </div>
  </div>
</div>
<?php
}
?>


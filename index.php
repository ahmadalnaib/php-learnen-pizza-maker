<?php
// mysqli
require("config/db_conenct.php");

$sql="SELECT title, ingredients,id FROM pizzas ORDER BY created_at";

$result = mysqli_query($conn, $sql);

$pizzas= mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);


//explode(",",$pizzas[0]["ingredients"]);


?>


<!DOCTYPE html>
<html lang="en">
<?php require("templates/header.php") ?>

<h4 class="center grey-text">Pizzas</h4>
<div class="container">
<div class="row">
<?php foreach ($pizzas as $pizza) : ?>
  
  <div class="col s6 md3">
  <div class="card">
  <div class="card-content center">
  <h3> <?php echo htmlentities($pizza["title"]);?></h3>
  <ul>
  <?php foreach (explode(",", $pizza["ingredients"]) as $ingred) : ?>
 
 <li><?php echo htmlentities($ingred) ?></li>

  <?php endforeach;?>
  </ul>
  </div>
  <div class="card-action right-align">
  <a href="details.php?id=<?php echo $pizza["id"]?>" class="brand-text">More info</a>
  </div>
  </div>
  </div>

<?php  endforeach;?>
</div>
</div>

<?php require("templates/footer.php")?>
  

</html>
<?php

require("config/db_conenct.php");

$title=$email=$ingredients="";
$err=["email"=>"","title"=>"","ingredients"=>""];

if(isset($_POST['submit'])){
  
 if(empty($_POST["email"])){
   $err["email"] ="Email field require";
 } else {
  $email=$_POST["email"];
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $err["email"]= "Email must be a valid email";
  }
 }
 if(empty($_POST["title"])){
   $err["title"]= "title field require";
 } else {
  $title=$_POST["title"];
  if(!preg_match("/^[a-zA-Z\s]+$/",$title)){
    $err[$title]= "title field require not match";
  }
 }
 if(empty($_POST["ingredients"])){
   $err["ingredients"] = "ingredients field require";
 } else {
  $ingredients=$_POST["ingredients"];
  if(!preg_match("/^[a-zA-S\s]+$/",$ingredients)){
    $err["ingredients"]= "ingredients field require not match";
  }
 }






if(array_filter($err)){
 // echo "erro in form";
} else {

  $email= mysqli_real_escape_string($conn, $_POST['email']);

  $title= mysqli_real_escape_string($conn, $_POST['title']);

  $ingredients= mysqli_real_escape_string($conn, $_POST['ingredients']);


  $sql="INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";


  if(mysqli_query($conn, $sql)){
 
    header("Location:index.php");

  }else{
    echo "query failed" . mysqli_error($conn);
  }
 // echo "form is ok";

}


}



?>


<!DOCTYPE html>
<html lang="en">

<?php require("templates/header.php") ?>

<section class="container grey-text">
<h4 class="center">Add a Pizza</h4>
<form action="add.php" method="post" class="white">
<input type="text" placeholder="EMAIL" name="email" value="<?php echo $email;  ?>">
<div class="red-text"><?php echo $err["email"]; ?></div>
<input type="text" placeholder="TITLE" name="title" value="<?php echo $title; ?>">
<div class="red-text"><?php echo $err["title"]; ?></div>
<input type="text" placeholder="INGREDIENTS"  name="ingredients" value="<?php echo $ingredients;  ?>">
<div class="red-text"><?php echo $err["ingredients"]; ?></div>


<div class="center">
<input type="submit" value="submit" name="submit" class="btn btn-brand">
</div>


</form>
</section>

<?php require("templates/footer.php")?>
  

</html>
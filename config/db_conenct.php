<?php

$conn=mysqli_connect("localhost","root","","ahmed_pizza");

// check conn

if(!$conn){
  echo "Connection err:" . mysqli_connect_errno();
}




?>
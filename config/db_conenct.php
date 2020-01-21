<?php

$conn=mysqli_connect("localhost","ahmed","30.12.1988ahmed","ahmed_pizza");

// check conn

if(!$conn){
  echo "Connection err:" . mysqli_connect_errno();
}




?>
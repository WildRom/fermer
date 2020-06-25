<?php 

if($_GET) {

  // echo "<pre>";
  // var_dump($_GET);
  // echo "</pre>";

  $user = $_GET['NickName'];
  echo "Welcome to a game, ".$user;
} else {
  echo "It's a game, but something is wrong";
}


?>
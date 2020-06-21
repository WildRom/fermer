<?php 
//get POST info
if($_POST) {
  // Connect to DB
  //Check user name and email for unique
  // Register and send data to DB

  $data = $_POST;

  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  
} else {
  header("Location: index.php");
}





?>
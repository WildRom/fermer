<?php 

if($_GET) {

  // echo "<pre>";
  // var_dump($_GET);
  // echo "</pre>";
  // exit;
  
  require_once('inc/config.php');

  $newGame = false;

  if(isset($_GET['NewGame']) && $_GET['NewGame'] === 'true'){
    $newGame = true;
  }

  $user = $_GET['NickName'];
  // TODO check authenification

  if($newGame){
    // NEW GAME, INSERT NEW GAME DATA TO DB
    echo "Welcome to a NEW game, ".$user;

    //TODO New Data to DB
    require_once('inc/insert_new_data.php');
    

  } else {
    echo "Welcome back, " .$user;
  }
  // ********************* GAME SCREEN ******************************************



  // *********************END GAME SCREEN ***************************************
} else {
  // NO GET data
  echo "It's a game, but something is wrong";
}


?>
<?php 

if($_GET) {
  
  require_once('inc/config.php');

  $newGame = false;

  if(isset($_GET['NewGame']) && $_GET['NewGame'] === 'true'){
    $newGame = true;
  }

  $user = $_GET['nick'];
  // TODO check authenification

  if($newGame){
    // NEW GAME, INSERT NEW GAME DATA TO DB
    echo "Welcome to a NEW game, ".$user;

    //TODO New Data to DB
    require_once('inc/insert_new_data.php');    

  }
  // IF NOT NEW GAME, $user_data DO NOT EXIST YET
  if(!isset($user_data)) {
    //SELECT USER INFO
    $stmt = $db->prepare("SELECT character_money, sessionID, user_id, level, experience FROM farm_users WHERE nick_name=:name");
    $stmt->execute(["name"=>$user]);
    $user_data = $stmt->fetch();
  }

  $aNickName = $user;
  $aMoney = $user_data["character_money"];
  $aSession = $user_data["sessionID"];
  $aUserId = $user_data["user_id"];
  $aLevel = $user_data["level"];
  $aExperience = $user_data["experience"];

  //FIELD_DATA
  $stmt = $db->prepare("SELECT * FROM farm_fields WHERE user_id=:user_id ORDER BY field_no");
  $stmt->execute(["user_id"=>$aUserId]);
  $fields_data = $stmt->fetchAll();

  // ********************* GAME SCREEN ******************************************

  require_once('game.html.php');

  // *********************END GAME SCREEN ***************************************
} else {
  // NO GET data
  echo "It's a game, but something is wrong";
}


?>
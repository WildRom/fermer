<?php

// Connect to DB
require_once('config.php');
session_start();

//get POST info
if($_POST['login'] === 'login') {
  if(empty($_POST['user_nick']) || empty($_POST['password'])){
    header("Location: ../index.php");
  } else {
    // Get data from DB
    $data = $_POST;
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    
    $user_nick = $data['user_nick'];
    $user_pass = $data['password'];

    //Check user name for unique
    $stmt = $db->prepare("SELECT * FROM ferm_users WHERE nick_name=:name");
    $stmt->execute(["name"=>$user_nick]);
    $userCount = $stmt->rowCount();
    $user = $stmt->fetch();

    if(!$userCount){
      echo "No such user"; 
    } elseif($userCount === 1){
      if(password_verify($user_pass, $user['password'])){
        //Password good
        $sessionID = rand(1, 1000000000);

        // UPDATE SESSIONID
        $stmt = $db->prepare("UPDATE ferm_users SET sessionID=:sessionID WHERE nick_name=:name");
        $stmt->execute(["sessionID"=>$sessionID, "name"=>$user_nick]);

        print('<script>setCookie("FERMER_NICK_NAME", "'.$user.'");</script>');
        print('<script>setCookie("FERMER_SESSION", "'.$sessionID.'");</script>');
        print('<script>location.href="../game.php?NickName='.$user['nick_name'].'"</script>');        
      } else {
       print('<script>location.href="../index.php?msg=wrong"</script>');
      }
    }     
  };

}
?>
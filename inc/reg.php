<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- <script src="../js/cookies.js"></script> -->
  <script>
  function setCookie(name, value) {
    document.cookie = name + "=" + escape(value) + "; path=/";
  }
  </script>
</head>
<?php

// Connect to DB
require_once('config.php');
session_start();

//get POST info
if($_POST['register'] === 'register') {
  if(empty($_POST['user_nick']) || empty($_POST['email']) || empty($_POST['password'])){
    header("Location: ../index.php");
  } else {
    // Register and send data to DB
    $data = $_POST;
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    
    $user = $data['user_nick'];
    $email = $data['email'];

    //Check user name for unique
    $stmt = $db->prepare("SELECT * FROM farm_users WHERE nick_name=:name");
    $stmt->execute(["name"=>$user]);
    $userCount = $stmt->rowCount();

    //Check user email for unique
    $stmt = $db->prepare("SELECT * FROM farm_users WHERE user_email=:email");
    $stmt->execute(["email"=>$email]);
    $emailCount = $stmt->rowCount();

    if($userCount > 0) {
      //user exists!
      echo "Toks nickas jau yra, pasirinkite kitą!";
    } else if($emailCount > 0) {
      //email exists
      echo "Toks emailas jau yra, pasirinkite kitą!";
    } else {
      // Good, no user nick, no email, - send data to DB
      $password = $data['password'];
      $password = password_hash($password, PASSWORD_DEFAULT);
      $time = time();
      $sessionID = rand(1, 1000000000);
        
      $query = "INSERT INTO farm_users(
        nick_name, 
        password, 
        sessionID, 
        user_email, 
        character_birth_day) VALUES(
          :name, 
          :password,
          :sessionID,
          :user_email,
          :character_birth_day)";

      $stmt = $db->prepare($query);
      $stmt->execute([
        'name'=> $user,
        'password'=> $password,
        'sessionID'=> $sessionID,
        'user_email'=> $email,
        'character_birth_day'=> $time
      ]);

      // SET COOKIE
      print('<script>setCookie("FARMER_SESSION", "'.$sessionID.'");</script>');
      print('<script>setCookie("FARMER_NICK_NAME", "'.$user.'");</script>');
      print('<script>location.href="game.php?NewGame="true"&NickName='.$user.'"</script>');
    }    
  };

} else {
  header("Location: ../index.php");
}
?>

</html>
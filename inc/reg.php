<?php

// Connect to DB
require_once('../inc/config.php');
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
    $stmt = $db->prepare("SELECT * FROM ferm_users WHERE nick_name=:name");
    $stmt->execute(["name"=>$user]);
    $userCount = $stmt->rowCount();

    //Check user email for unique
    $stmt = $db->prepare("SELECT * FROM ferm_users WHERE user_email=:email");
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

      $query = "INSERT INTO ferm_users(
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
      echo "All Ok!";
    }    
  };

} else {
  header("Location: ../index.php");
}

?>
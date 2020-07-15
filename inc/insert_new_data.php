<?php 

require_once('config.php');

//SELECT USER
$stmt = $db->prepare("SELECT character_money, sessionID, user_id, level, experience FROM farm_users WHERE nick_name=:name");
$stmt->execute(["name"=>$user]);
$user_data = $stmt->fetch();


// echo "<pre>";
// var_dump($user_data);
// echo "</pre>";
// die;
$user_id = $user_data['user_id'];

for($i = 1; $i <= 18; $i++){
  $query = 'INSERT INTO farm_fields (user_id, field_no) VALUES (:user_id, :no)';
  $stmt = $db->prepare($query);
  $stmt->execute(['user_id'=>$user_id, 'no'=>$i]);
}

?>
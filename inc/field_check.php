<?php 

require_once('config.php');

$retMsg = "0#Neapdirbtas laukas.";
$aSession = "";
$aUserId = 0;

if(!empty($_GET['nick'])){
  
  $aNickName = $_GET['nick'];
  $aFld = $_GET['fld'];
  $aMode = $_GET['mode'];

  //SELECT USER INFO
  $stmt = $db->prepare("SELECT character_money, sessionID, user_id, level, experience 
                        FROM farm_users WHERE nick_name=:name");
  $stmt->execute(["name"=>$aNickName]);
  $user_data = $stmt->fetch();

  $aMoney = $user_data["character_money"];
  $aSession = $user_data["sessionID"];
  $aUserId = $user_data["user_id"];
  $aLevel = $user_data["level"];
  $aExperience = $user_data["experience"];

  //FIELD_DATA
  $stmt = $db->prepare("SELECT * FROM farm_fields WHERE user_id=:user_id ORDER BY field_no");
  $stmt->execute(["user_id"=>$aUserId]);
  $fields_data = $stmt->fetchAll();  

  foreach($fields_data as $field){
    $aFieldId = $field["field_id"];
    $aFieldNo = $field["field_no"];
    $aFieldInfo = $field["field_info"];
    if($aFieldNo == $aFld){
      $aFId = $aFieldId;
      $aFinfo = $aFieldInfo;
    }
  }
  if(($aFinfo == 0) && ($aMode == 2)) {
    $query = "UPDATE farm_fields SET field_info = 1 WHERE user_id =:user_id AND field_no =:no";
    $stmt = $db->prepare($query);
    $stmt->execute(['user_id'=>$aUserId, 'no'=>$aFld]);
    $retMsg = "3#Laukas sukastas sėkmingai!";   
  }
  if ( ($aFinfo == 1) && ($aMode == 2)){
    $retMsg = "4#Šitas laukas jau sukastas!";
  }
  print( $retMsg );
}
?>
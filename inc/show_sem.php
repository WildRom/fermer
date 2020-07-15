<?php 

require_once('config.php');

$aSession = "";
$aUserId = 0;

if(!empty($_GET['nick'])){
  
  $aNickName = $_GET['nick'];

  //SELECT USER INFO
  $stmt = $db->prepare("SELECT character_money, sessionID, `level`, experience 
                        FROM farm_users WHERE nick_name=:name");
  $stmt->execute(["name"=>$aNickName]);
  $user_data = $stmt->fetch();

  $aMoney = $user_data["character_money"];
  $aSession = $user_data["sessionID"];
  $aLevel = $user_data["level"];
  $aExperience = $user_data["experience"];

  print("<table width=500 style='BACKGROUND-COLOR: #ffffff; color: #000000; border-style: solid; border-width:1px'>");
  print("<tr><td><a href='#' onClick='javascript: info_div.style.display = \"none\";'>x</a></td><td colspan=5 align=center><strong>SĖKLOS PARDUOTUVĖJE</strong></td><td></td></tr>");
  print("<tr><td></td><td>Pavadinimas</td><td>Kaina</td><td>Level</td><td>Augimas, val.</td>
<td>Rekomend.<br>laistymas</td><td>Pelnas</td></tr>");
 
 //SELECT ALL VEGGIES
  $query = "SELECT plant_id,plant_name_lt,plant_input_price,plant_output_koef,water_rec,grow_interval,`level`,plant_pic
  FROM farm_plants ORDER BY `level`,plant_input_price";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $plants = $stmt->fetchAll();
  foreach($plants as $plant){
    $aPID = $plant["plant_id"];
    $aPNAME = $plant["plant_name_lt"];
    $aPRICE = $plant["plant_input_price"];
    $aOUTPUT = $plant["plant_output_koef"];
    $aWATER = $plant["water_rec"];
    $aGROW = $plant["grow_interval"];
    $aLEVEL = $plant["level"];
    $aPIC = $plant["plant_pic"];
    print("<tr><td><img src='img/$aPIC' align='left'></td><td>$aPNAME</td>
    <td>$aPRICE</td><td>$aLEVEL</td><td>$aGROW</td><td>$aWATER</td><td>$aOUTPUT</td><td style=\"cursor: pointer\"><img
src='img/buy.jpg' id='img$aPID' onClick='init_buy_item($aPID,$aPRICE)'></td></tr>");
  }

  print("</table>");

}

?>
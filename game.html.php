<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game screen</title>
  <link rel="stylesheet" href="css/farm.css">
  <script src="http://localhost/farmer/js/main.js" defer></script>
</head>
<style> 
</style>
<body>
  <table border="0" width="800" id="table1" height="600" background="img/farm.jpg" cellspacing="1">
    <tr> 
      <td height="38" width="791" colspan="3">

      <table border="0" width="100%" id="table3">
        <tr>
          <td width="90" class="level_cell" style="padding-top: 4px" valign="top"><div id="level">&nbsp; Lvl: <?=$aLevel?></div></td>
          <td width="75" class="money_cell" style="padding-top: 4px" valign="top"><div id="money">&nbsp;<?=$aMoney?></div></td>
          <td width="35">&nbsp;</td>
          <td width="100"><img src="img/kupit_semena.jpg" onClick="show_sem( '<?=$aNickName?>')"></td>
          <td width="100"><img src="img/prodat_ur.jpg"></td>
          <td width="100"><img src="img/kupit_jiv.jpg"></td>
          <td width="100"><img src="img/prodat_pr.jpg"></td>
          <td width="100"><nobr><img src="img/bio-btn.jpg" alt="Priemonės prieš parazitus"><img src="img/udob-btn.jpg" alt="Trašos"></td>
        </tr>
      </table>

      </td> 
    </tr>
  
    <tr>
      <td height="57" colspan="3">
        <table border="0" width="100%" id="table3" height="10">
          <tr>
            <td width="65" class="exp_cell" style="padding-top: 4px" valign="bottom" align="center"><?=$aExperience?></td>
            <td width="60">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
    
    </td></tr>

    <tr>
    <td align="center" width="243">
    <div id="ani1">
      <!-- <img src="img/a_hen.gif"> -->
    </div>
    <div id="ani1prod">
      <!-- <img src="img/eggs.gif"> -->
    </div>
    </td>
    <td align="center" width="300">
    
    <table id="table4" border="0" width="300" id="table2" cellpadding="0" cellspacing="0">

       <!--   ЗДЕСЬ БУДУТ ПОЛЯ ДЛЯ ПОСЕВОВ   -->      
      <?php

      foreach($fields_data as $field) {
        $aFieldNo    = $field["field_no"];
        $aFieldInfo  = $field["field_info"];

        if ( $aFieldInfo == 0 ){
          print('<td><img border="1" id="img'.$aFieldNo.'" src="img/uch_trava.jpg" alt="Field '.$aFieldNo.'" width="48" height="44" onClick="field_action(\''.$aNickName.'\','.$aFieldNo.')"></td>');
       }
       elseif ( $aFieldInfo == 1 ){
          print('<td><img border="1" id="img'.$aFieldNo.'" src="img/uch_ground.jpg" alt="Field '.$aFieldNo.'" width="48" height="44" onClick="field_action(\''.$aNickName.'\','.$aFieldNo.')"></td>');
       }
       if ( ($aFieldNo == 6) || ($aFieldNo == 12) ){
         print('</tr><tr>');
       }
       if ( ($aFieldNo == 18) ){
         print('</tr>');
       }
      }
      ?>      




    </table>
    </td>
    <td align="center" width="247">
    
    <div id="ani2">
      <!-- <img src="img/a_cow.gif"> -->
    </div>
    <div id="ani2prod">
      <!-- <img src="img/milk.gif"> -->
    </div>
        
    </td>
  </tr>
  <tr>
    <td align="center" width="800" colspan="3" height="22">
    
    &nbsp;</td>
  </tr>
  <tr>
  <td align="center" width="800" height="65" colspan="3">
    
    <table border="0" width="796" id="table2" height="55">
      <tr>
        <td width="23">&nbsp;</td>
        <td width="48"></td>
        <td width="52">&nbsp;</td>
        <td width="49">&nbsp;</td>
        <td width="66">&nbsp;</td>
        <td width="80">&nbsp;</td>
        <td width="11">&nbsp;</td>
        <td id="tools" width="89"></td> 
        <td width="8">&nbsp;</td>
        <td width="78">&nbsp;</td>
        <td width="166">&nbsp;</td>
        <td width="43">&nbsp;</td>
        <td width="29">&nbsp;</td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
  <td align="center" width="800" height="7" colspan="3">
    
    </td>
  </tr>
  
</table>
<div id="lejka_div" border="1" style="position:absolute; display:none; left:300px; top:200px; width:50px; height:50px; z-index:12;z-index:12">
    <img src="img/lejka.png">
</div>
  <!-- для лопатки -->
<div id="lopatka_div" border="1" style="position:absolute; display:none; left:300px; top:200px; width:50px; height:50px; z-index:12;z-index:12">
    <img src="img/lopatka.png">
</div>
<div id="info_div" border="3px solid black" style="BACKGROUND-COLOR: #ffffff; position:absolute; display:none;
left:450px; top:56px; width:500px; z-index:12">
</div>
</body>
</html>
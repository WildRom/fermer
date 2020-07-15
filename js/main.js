let mode = 0;
let lejka_div = document.getElementById('lejka_div');
let lopatka_div = document.getElementById('lopatka_div');
let tools = document.getElementById('tools');
let info_div = document.getElementById('info_div');

tools.addEventListener('click', function(){
  mode++;  
  if(mode > 2) {
    mode = 0;
  }
  switch( mode ){
    case 0: {
      document.body.style.cursor = 'default';
      break;
    }
    case 1: {
      document.body.style.cursor = 'url("img/lejka.png"),auto';
      break;
    }
    case 2: {
      document.body.style.cursor = 'url("img/lopatka2.png"),auto';
      break;
    }
  }
})

/**
 * return AJAX object
 */
function ajaxobj()
{
   var objXMLHttp = null;
   if (window.XMLHttpRequest)
   {
      objXMLHttp = new XMLHttpRequest();
   }
   else if (window.ActiveXObject)
   {
      objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   return objXMLHttp;
}

function field_action( nick, fld ){
  var r = parseInt(Math.random()*1000000000000000);
  m = ajaxobj();
  m.open('GET', 'inc/field_check.php?nick='+nick+'&fld='+fld+'&mode='+mode+'&r='+r,false);
  m.send(null);

  if((m.readyState == 4) && (m.status == 200)) {
    resp = m.responseText;
    arResp = resp.split('#');
    alert( arResp[1] );
    if ( arResp[0] == "3" ){
      document.getElementById("img"+fld).src="img/uch_ground.jpg";
    }
  }
}
function show_sem(nick) {
  var r = parseInt(Math.random()*1000000000000000);
  m = ajaxobj();
  m.open('GET', 'inc/show_sem.php?nick='+nick+'&r='+r, false);
  m.send(null);

  if((m.readyState == 4) && (m.status == 200)) {
    info_div.innerHTML = m.responseText;
    info_div.style.display = "block";
  }

}

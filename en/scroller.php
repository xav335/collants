<?php include_once("../include/_connexion.php"); ?>
<?
 $ChaineSQL = "SELECT * FROM ticker WHERE actif=1";
 //echo $ChaineSQL;
 $result = mysql_query($ChaineSQL);
 if (mysql_num_rows($result)==0) {
 	$texte = "";
 }else{
 	while($row=mysql_fetch_array($result)){
 		$texte = $row["texte_en"];
	}
 }
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - spécialiste du collant</title>
<script language="JavaScript">
//----------------------------------------   TICKER   -----------------------------------------------------------------------------
//Specify the collants's width (in pixels)
var collantswidth=475
//Specify the collants's height
var collantsheight=20
//Specify the collants's collants speed (larger is faster 1-10)
var collantsspeed=1
//configure background color:
var collantsbgcolor="#B60734"
//Pause collants onMousever (0=no. 1=yes)?
var pauseit=1

//Specify the collants's content (don't delete <nobr> tag)
//Keep all content on ONE line, and backslash any single quotations (ie: that\'s great):

var collantscontent='<nobr><font face="Arial, Helvetica"; font size="2";font color="#FFFFFF"><? echo $texte ?></font></nobr>'

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=collantsspeed
var pausespeed=(pauseit==0)? copyspeed: 0
var iedom=document.all||document.getElementById
if (iedom)
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100;left:-1000">'+collantscontent+'</span>')
var actualwidth=''
var cross_collants, ns_collants

function populate(){
if (iedom){
cross_collants=document.getElementById? document.getElementById("iecollants") : document.all.iecollants
cross_collants.style.left=collantswidth+8
cross_collants.innerHTML=collantscontent
actualwidth=document.all? cross_collants.offsetWidth : document.getElementById("temp").offsetWidth
}
else if (document.layers){
ns_collants=document.ns_collants.document.ns_collants2
ns_collants.left=collantswidth+8
ns_collants.document.write(collantscontent)
ns_collants.document.close()
actualwidth=ns_collants.document.width
}
lefttime=setInterval("scrollcollants()",20)
}

function scrollcollants(){
if (iedom){
if (parseInt(cross_collants.style.left)>(actualwidth*(-1)+8))
cross_collants.style.left=parseInt(cross_collants.style.left)-copyspeed
else
cross_collants.style.left=collantswidth+8

}
else if (document.layers){
if (ns_collants.left>(actualwidth*(-1)+8))
ns_collants.left-=copyspeed
else
ns_collants.left=collantswidth+8
}
}
//----------------------------------------   TICKER  END -----------------------------------------------------------------------------

</script>
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
</head>
<body id="fond_rouge" onLoad="populate()" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
           <script>
			if (iedom||document.layers){
			with (document){
			document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
			if (iedom){
				write('<div style="position:relative; width:'+collantswidth+';height:'+collantsheight+';overflow:hidden">')
				write('<div style="position:absolute;width:'+collantswidth+';height:'+collantsheight+';background-color:'+collantsbgcolor+'" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=collantsspeed">')
				write('<div id="iecollants" style="position:absolute;left:0;top:0"></div>')
				write('</div>')
				}
				else if (document.layers){
				write('<ilayer width='+collantswidth+' height='+collantsheight+' name="ns_collants" bgColor='+collantsbgcolor+'>')
				write('<layer name="ns_collants2" left=0 top=0 onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=collantsspeed"></layer>')
				write('</ilayer>')
				}
				document.write('</td></table>')
				}
				}
               </script>
               
	</body>
</html>

<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function VerifForm(){
	if (document.formul1.choix_adresse.value==0)
	{
		alert("Vous devez saisir votre adresse de livraison");
		document.formul1.choix_adresse.focus();
		return(false);
	}
}
//-->
</script>
<style type="text/css">
<!--
.Style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
}
.Style2 {font-size: 18px}
-->
</style>
</head>
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif')" border="0">
<div align="center">
	<p><br>
		</p>
	<p><span class="Style1">Une erreur est survenue dans le processus de commande</span></p>
	<p>&nbsp;</p>
	<p><span class="Style1">Veuillez recommencer s'il vous plait.</span></p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p class="Style2"> <a href="panier.php" target="_parent" class="Style1">Recommencer</a> </p>
</div>

</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
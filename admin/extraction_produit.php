<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php"); ?>

<?
function formatdate($strdate) {
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
	function MM_swapImgRestore() { //v3.0
		var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	
	function MM_preloadImages() { //v3.0
		var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
		var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
		if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}
	
	function MM_findObj(n, d) { //v4.01
		var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_swapImage() { //v3.0
		var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}
	
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	
	function trim(sString) {
		while (sString.substring(0,1) == ' ') {
			sString = sString.substring(1, sString.length);
		}
		while (sString.substring(sString.length-1, sString.length) == ' '){
			sString = sString.substring(0,sString.length-1);
		}
		return sString;
	}
//-->
</script>
</head>
<body id="fond_gris"  onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif')" border="0">
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
		<td colspan="3" align=center>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" id="texte3" align=center><?=$row["civilite"]?>&nbsp;<?=$row["prenom"]?>&nbsp;<?=$row["nom"]?></td>
	</tr>
	<tr>
		<td colspan="3" align="center" id="texte3"><br> <img src="../images/pixel_rouge.jpg" width="100%" height="1"></td>
	</tr>
	<tr>
		<td colspan="3" align=center>&nbsp;</td>
	</tr>
	<tr>
		<td id="texte3" colspan="3" align=center>Modules d'extraction :</td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td width="100" align="right">Extraction 1</td>
		<td width="30">&nbsp;</td>
		<td><a href="./extraction/extraction_1.php">Lien</a></td>
	</tr>
	</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php"); ?>
 <?
 $ChaineSQL = "SELECT * FROM accueil WHERE actif=1";
 //echo $ChaineSQL;
 $result = mysql_query($ChaineSQL);
 if (mysql_num_rows($result)==0) {
 	$texte_accueil = "";
 }else{
 	while($row=mysql_fetch_array($result)){
		$titre = nl2br($row["titre_en"]);
 		$texte_accueil = nl2br($row["texte_en"]);
	}
 }
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - specialist in stockings</title>
<META NAME="description" content="Stocking and tights of high quality: for women and for men!">
<META NAME="keywords" content=" tights, stocking, knee-highs, socks, pantyhose, hold-ups, stockings, sheer stockings, hosiery, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon,woman, women, wellness, emotion, dax, collants, collant">
<META content="ALL" name="robots">
<META content="document" name="resource-type">
<META content="15 days" name="revisit-after">
<META name="dc.description" content="Stocking and tights of high quality: for women and for men!">
<META name="dc.keywords" content="tights, stocking, knee-highs, socks, pantyhose, hold-ups, stockings, sheer stockings, hosiery, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon,woman, women, wellness, emotion, dax, collants, collant">
<META name="author" CONTENT ="collants.fr">
<META name="dc.subject" content="Stocking and tights of high quality: for women and for men!">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
</head>
<body div id="fond_rouge", marginleft="0", topmargin="2", leftmargin="0", align="left">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="left" valign="top" id="texte2">
    <span id="texte2_blanc"><? echo $titre?></span>
    <p><? echo $texte_accueil?></p>
	</td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
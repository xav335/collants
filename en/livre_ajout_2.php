<?php include_once("../include/_connexion.php"); ?>
<?
	$maintenant = date("Y-m-d H\:i\:s\ ");

		$query  = "INSERT INTO livre_or_en (nom, mail, message, date_creation, valide) VALUES (";
		$query .= "'  ". $_POST["nom"] ."' " ;
		$query .= ", '". $_POST["mail"] ."' " ;
		$query .= ", '". $_POST["message"] ."' " ;
		$query .= ", '". $maintenant  ."' " ;
		$query .= ",0 " ;
		$query .= ")";
		//echo $query ."<br>";
		$rstemp = mysql_query($query);


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
<body Id="fond_rose" onLoad="MM_preloadImages('images/envoyer_over.gif')" marginleft="0" scroll=no>
<table id="texte1_blanc" width="359"  border="0" cellpadding="0" cellspacing="0" marginleft="0">
  <tr> 
    <td width="358"  valign="top">
		<table width="352" height="120" border="0" align="center" cellpadding="3" cellspacing="0">
		  <tr> 
            <td align="center" valign="middle" id="texte2_rouge" height="21" colspan="3" valign="top" id="texte1"><br>
<br>
<br>
<br>
		
			Your message is saved.
		
            </td>
          </tr>
          
          <tr> 
            <td id="texte1" colspan="3" height="20"></font></td>
          </tr>
          
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

<?php include_once("../include/_connexion.php"); ?>

<?php include_once("_fonctions.php"); ?>

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

<body id="fond_rouge" border="0">

<?

	$query="SELECT * FROM  liens ";

	$query .=" ORDER BY ordre ";	

	$rstemp = mysql_query($query);

?>

<table width="90%" border="0" cellpadding="0" align="left" >

    <td width="327" colspan="3" align="left" valign="top" id="texte2"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="21">

        <? while ($row = mysql_fetch_array($rstemp)) { 

			

		?>

			<? if ($row["logo"]==""){?>

			<tr> 

			  <td colspan="2" ><div align="left"><a href="<? echo $row["url"] ?>" target="_blank"><b><? echo $row["libelle"] ?></b></a></div></td>

			</tr>

			<? }else{ ?>

			<tr> 

			  <td ><div align="left"><a href="<? echo $row["url"] ?>" target="_blank"><img src="../liens/<? echo $row["logo"] ?>" border="0" ></a></div></td>

			  <td ><div align="left"><a href="<? echo $row["url"] ?>" target="_blank"><b><? echo $row["libelle"] ?></b></a></div></td>

			</tr>

			<? } ?>

		<? } ?>

      </table>

      <p>&nbsp;</p>

</td>

  </tr>

</table>

</body>

</html>

<?php include_once("../include/_connexion_fin.php"); ?>


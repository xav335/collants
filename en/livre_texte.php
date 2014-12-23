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


<body Id="fond_rose">

<?

	$query="SELECT * FROM  livre_or_en ";

	$query .=" WHERE valide=1";	

	$query .=" ORDER BY date_creation DESC";	

	$rstemp = mysql_query($query);

?>

<table width="437" height="414" border="0" cellpadding="14" cellspacing="0">

  <tr> 

    <td width="450" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td id="texte2_rouge"><p>Content, not content?<br>
              Leave us a small word here (!):</p></td>

        </tr>

		<? while ($row = mysql_fetch_array($rstemp)) { ?>

        <tr>

          <td id="texte2b">

            <img src="../images/pixel_rouge.jpg" width="100%" height="1px"> 

			<p><br>
              <img src="../images/carres.gif"> Message from<? echo $row["nom"] ?> 
              - <? echo format_date_ss_heure($row["date_creation"]) ?></p>

		  </td>

        </tr>

        <tr>

          <td id="texte1_blanc"><p><br><? echo $row["message"] ?></p>

              

            </td>

        </tr>

		<? } ?>

      </table></td>

  </tr>

</table>

<p>&nbsp;</p>

</body>

</html>

<?php include_once("../include/_connexion_fin.php"); ?>


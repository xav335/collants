<?php include_once("../include/_connexion.php"); ?>

<?

$query = "SELECT produit.num_produit, produit.photo, reference_produit, SUM(quantite) as quantite_totale FROM ligne_commande ";
$query .= " INNER JOIN commande ON commande.num_commande = ligne_commande.num_commande ";
$query .= " INNER JOIN produit ON produit.reference = ligne_commande.reference_produit ";
$query .= " WHERE (commande.statut_paiement=2 OR commande.statut_paiement=1) ";
$query .=" AND produit.actif=1";
$query .=" AND produit.visible=1";
$query .= " GROUP BY reference_produit ";
$query .= " ORDER BY quantite_totale DESC limit 0,10 ";
//echo $query;
$result3 = mysql_query($query);
$nb_enr = mysql_num_rows($result3);


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

<body id="fond_rouge" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" scroll=no  >



					<? if (mysql_num_rows($result3)>0) {

						$cpt = 2;

						while($row=mysql_fetch_array($result3)){ 

							$url_photo .="../photo/grande/". $row["photo"] ."&urlphoto". $cpt ."=";

							$num_produit .= $row["num_produit"] ."&numproduit". $cpt ."=";

							$cpt++;

						}

					?>

					<table width="469" id="border3"height="434" border="0" cellpadding="0" cellspacing="0">

                    <tr> 

                    	<td width="458" height="410" align="center" valign="middle">

							<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="300" height="410">

                            	<param name="movie" value="images/top5.swf?numproduit1=<? echo $num_produit ?>&urlphoto1=<? echo $url_photo ?>">

                            	<param name="quality" value="high">

                            	<embed src="images/top5.swf?numproduit1=<? echo $num_produit ?>&urlphoto1=<? echo $url_photo ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="410"></embed>

							</object>

						</td>

					</tr>

                  </table>

				 

				   <? }?>

				 

</body>

</html>

<?php include_once("../include/_connexion_fin.php"); ?>


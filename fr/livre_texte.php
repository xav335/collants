<?php include_once("../include/_connexion.php"); ?>

<?php include_once("_fonctions.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>collants.fr - spécialiste du collant</title>

<META NAME="description" content="Le spécialiste du collant, lingerie, bas, accessoire féminin, pour la sensualité des femmes.">

<META NAME="keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">

<META content="ALL" name="robots">

<META content="document" name="resource-type">

<META content="15 days" name="revisit-after">

<META name="dc.description" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">

<META name="dc.keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">

<META name="author" CONTENT ="collants.fr">

<META name="dc.subject" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">



<body Id="fond_rose">

<?

	$query="SELECT * FROM  livre_or ";

	$query .=" WHERE valide=1";	

	$query .=" ORDER BY date_creation DESC";	

	$rstemp = mysql_query($query);

?>

<table width="437" height="414" border="0" cellpadding="14" cellspacing="0">

  <tr> 

    <td width="450" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td id="texte2_rouge"><p>Content, pas content ? <br>

            Laissez nous un petit mot ici (!) :</p></td>

        </tr>

		<? while ($row = mysql_fetch_array($rstemp)) { ?>

        <tr>

          <td id="texte2b">

            <img src="../images/pixel_rouge.jpg" width="100%" height="1px"> 

			<p><br><img src="../images/carres.gif"> Message de <? echo $row["nom"] ?> - <? echo format_date_ss_heure($row["date_creation"]) ?></p>

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


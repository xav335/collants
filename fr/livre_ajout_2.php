<?php include_once("../include/_connexion.php"); ?>
<?
	$maintenant = date("Y-m-d H\:i\:s\ ");

		$query  = "INSERT INTO livre_or (nom, mail, message, date_creation, valide) VALUES (";
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
		
			Votre message a bien été pris en compte.
		
            </td>
          </tr>
          
          <tr> 
            <td id="texte1" colspan="3" height="20"></font></td>
          </tr>
          
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

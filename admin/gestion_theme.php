<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	// Récupération des données passées en paramètres
	$num_theme = $_POST["num_theme"];

	//  On met à jour la table avec le nouveau thème sélectionné
	if ($num_theme != "") {
		
		// On ré-initialise la table
		$requete = "UPDATE theme SET actif = 0";
		mysql_query($requete);
		
		// On active un thème précis
		$requete = "UPDATE theme SET";
		$requete .= " actif = 1";
		$requete .= " WHERE num_theme = " . $num_theme;
		mysql_query($requete);
	}

	// Liste des thèmes disponibles
	$requete = "SELECT * FROM theme ORDER BY nom_theme";
	//echo $requete . "<br>";
	$liste_theme = mysql_query($requete);
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
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script Language="JavaScript">
<!--
	function valider() {
		
	}
//-->
</script>
</head>
<body id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" valign="middle">
			<table width="64%" border="0" cellpadding="10" cellspacing="0" align="center">
				<form name="formulaire" action="gestion_theme.php" method="POST">
					<tr>
						<td align="center" id="texte3">Gestion des thèmes</td>
					</tr>
					<tr>
						<td align="center" id="texte3_blanc"><br><img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
					</tr>
					<tr>
						<td>
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr>
								<td  height="30" id="texte2b">Thème sélectionné :</td>
								<td>
									<select name="num_theme">
										<?
										while($data = mysql_fetch_assoc($liste_theme)) {
										?>
											<option value="<?=$data["num_theme"]?>" <? if ($data["actif"] == 1){ ?> selected <? } ?>><?=$data["nom_theme"]?></option>
										<? } ?>
									</select>
								</td>
							</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
					</tr>
					<tr>
						<td>
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="right"><input type="submit" name="vvv" value="Valider"></td>
							</tr>
							</table>
						</td>
					</tr>
				</form>
			</table>
		</td>
	</tr>
	</table>
</body>
</html>
<? include_once("../include/_connexion_fin.php"); ?>
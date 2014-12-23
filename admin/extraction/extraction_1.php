<? include_once("../../include/_session.php");?>
<? include_once("../../include/_securite.php");?>
<? include_once("../../include/_connexion.php"); ?>
<? include_once("../_fonctions.php"); ?>

<?
	// Liste des produits vendus
	$requete = "SELECT * FROM produit";
	$requete .= " ORDER BY designation";
	//echo $requete . "<br>";
	$liste_produit = mysql_query($requete);
	
	$contenu_fichier = "";
	
	if (mysql_num_rows($liste_produit)!=0) {
		$contenu_fichier .= "<table border=0 cellpadding=0 cellspacing=0 width=100%>";
		$contenu_fichier .= "<tr>";
		$contenu_fichier .= "		<td align=center>Référence</td>";
		$contenu_fichier .= "		<td align=center>Nom</td>";
		$contenu_fichier .= "		<td align=center>Prix d'achat</td>";
		$contenu_fichier .= "</tr>";
		
		while($data = mysql_fetch_array($liste_produit)) {
			$contenu_fichier .= "<tr>";
			$contenu_fichier .= "		<td align=center>" . $data["reference"] . "</td>";
			$contenu_fichier .= "		<td align=center>" . $data["designation"] . "</td>";
			$contenu_fichier .= "		<td align=center>" . $data["prix"] . "</td>";
			$contenu_fichier .= "</tr>";
		}
		
		$contenu_fichier .= "</table>";
	}
	else {
		$contenu_fichier .= "<table border=0 cellpadding=0 cellspacing=0 width=100%>";
		$contenu_fichier .= "<tr>";
		$contenu_fichier .= "		<td align=center>Aucun enregistrement disponible.</td>";
		$contenu_fichier .= "</tr>";
	}

	// On enregistre le contenu dans un fichier
	$fichier = "./extraction.csv";
	
	$inF = fopen($fichier,"w");
	fwrite($inF,$contenu_fichier);
	fclose($inF);
	?>
	<html>
		<head>
			<link href="../../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
			<script language="JavaScript" type="text/JavaScript">
			<!--
				function retourner() {
					document.formulaire.target = "";
					document.formulaire.action = "../extraction_produit.php";
					document.formulaire.submit();
				}
			//-->
			</script>
		</head>
		
		<body id="fond_gris" onLoad="document.formulaire.submit();">
			<form name="formulaire" action="download.php" target="_blank" method="POST"></form>
			<table align="center" border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
				<td id="texte3" align=center>Extraction terminée</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center"><input type="button" onClick="javascript:retourner();" value="Retour"></td>
			</tr>
		</body>
	</html>

<?php include_once("../../include/_connexion_fin.php"); ?>
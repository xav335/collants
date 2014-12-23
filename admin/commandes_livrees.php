<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
function formatdate($strdate) {
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}
	
	// Récupération des données passées en paramètres
	$num_commande = $_POST["num_commande"];
	$mois = $_POST["mois"];
	$annee = $_POST["annee"];
	
	// Premier affichage
	if ($mois == "") $mois = date("m");
	if ($annee == "") $annee = date("Y");
	//echo $mois . "<br>";
	//echo $annee . "<br>";
	
	// Initialisation des dates de départ et de fin de la recherche
	$date_debut = mktime(0, 0, 0, $mois , 1, $annee);
	//echo "debut : " . date("Y-m-d", $date_debut) . "<br>";
	$date_fin = mktime(0, 0, 0, $mois+1 , 1, $annee);
	//echo "fin : " . date("Y-m-d", $date_fin) . "<br>";
	
	// Tableau contenant le nom des mois
	$tab_mois = array ("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre");
		
	// Liste des commandes répondant à la recherche
	$requete = "SELECT * FROM commande";
	$requete .= " WHERE statut_commande=2 AND (statut_paiement=2 OR statut_paiement=1) ";
	
	
	// On souhaite une commande en particulier
	if ($num_commande != "") {
		$requete .= " AND num_commande = " . $num_commande;
	}
	else {
		$requete .= " AND date_commande >= '" . date("Y-m-d", $date_debut) . "'";
		$requete .= " AND date_commande < '" . date("Y-m-d", $date_fin) . "'";
	}
	
	$requete .= " ORDER BY commande.num_commande DESC ";
	//echo $requete . "<br>";
	$result = mysql_query($requete);
	
	// Liste des numéros de commandes
	$requete = "SELECT num_commande FROM commande";
	$requete .= " WHERE statut_commande=2 AND (statut_paiement=2 OR statut_paiement=1) ";
	$requete .= " ORDER BY num_commande DESC";
	//echo $requete . "<br>";
	$liste_commande = mysql_query($requete);
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
<script language=javascript>
<!--
	function confirmation(id) {
		if (confirm("Etes vous sur de vouloir supprimer cette commande?")) {
			document.location.href = "suppr_commande.php?id="+id+"&retour=2";
		}
	}
	
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
//-->
</script>
</head>
<body id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
		<td width=10>&nbsp;</td>
		<td align=center><b>Liste des commandes livrées.</b></td>
		<td width=10>&nbsp;</td>
	</tr>
	<tr>	
		<td colspan=3>&nbsp;</td>
	</tr>
	<tr>
		<td width=10>&nbsp;</td>
		<td align=center>
			<form name="formulaire" action="commandes_livrees.php" method="POST">
				<table border=0 cellpadding=0 cellspacing=0 width=70%>
				<tr>
					<td width="300"><b>Commandes du mois de : </b></td>
					<td align="left" valign="middle">
						<select name="mois">
							<? for ($i=1; $i<13; $i++) { ?>
								<option value="<?=$i?>" <? if ($mois == $i) { ?> selected <? } ?>><?=$tab_mois[$i]?></option>
							<? } ?>
						</select>
						&nbsp;
						<select name="annee">
							<? for ($i=2005; $i<=date("Y"); $i++) { ?>
								<option value="<?=$i?>" <? if ($annee == $i) { ?> selected <? } ?>><?=$i?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><b>Numéro de commande livrées : </b></td>
					<td align="left" valign="middle">
						<select name="num_commande">
							<option value="" selected >Toutes</option>
							<? while($data=mysql_fetch_array($liste_commande)) { ?>
								<option value="<?=$data["num_commande"]?>"><?=$data["num_commande"]?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" value="Rechercher"></td>
				</tr>
				</table>
			</form>
		</td>
		<td width=10>&nbsp;</td>
	</tr>
	<tr>	
		<td colspan=3>&nbsp;</td>
	</tr>
	<?
	// Aucune commande trouvée
	if(mysql_num_rows($result)==0) {
	?>
	<tr>
		<td width=10>&nbsp;</td>
		<td align=center>il n'y a aucune commande livrée.</td>
		<td width=10>&nbsp;</td>
	</tr>
	<?
	}
	else {
	?>
		<tr>
			<td width=10>&nbsp;</td>
			<td align=center>
			<table border=1 bordercolor=#000000 cellpadding=0 cellspacing=0 width=90%>
				<tr>
					<td align=center id=texte2>&nbsp;N° commande&nbsp;</td>
					<td align=center id=texte2>&nbsp;Date&nbsp;</td>
					<td align=center id=texte2>&nbsp;Paiement&nbsp;</td>
					<td align=center id=texte2>&nbsp;Statut&nbsp;</td>
					<td align=center id=texte2>&nbsp;N° collisimo&nbsp;</td>
					<td align=center id=texte2>&nbsp;Fact Compta&nbsp;</td>
					<td align=center id=texte2>&nbsp;Fact Client&nbsp;</td>
					<td align=center id=texte2>&nbsp;Supp.&nbsp;</td>
				</tr>
				
	<? while($row=mysql_fetch_array($result)) { ?>
				<tr>
					<td id=texte2><?=$row["num_commande"]?></td>
					<td id=texte2><?=formatdate($row["date_commande"])?>&nbsp;<?=$row["heure_commande"]?></td>
					<?
					if ($row["mode_paiement"]==1) {
					?>
						<td id=texte2>Chèque bancaire</td>
					<?
					}
					else
					{
					?>
						<td id=texte2>CB</td>
					<?
					}
					?>
					<?
					switch($row["statut_paiement"])
					{
						case 1 :
					?>
							<td id=texte2>payé</td>
					<?
						break;
						case 2 :
					?>
						<td id=texte2>en attente</td>
					<?
						break;
						case 3 :
					?>
						<td id=texte2>refusé</td>
					<?
						break;
						default : 
					?>
						<td id=texte2>refusé</td>
					<?
						break;
					}
					?>
					<td align=center id=texte2><?=$row["num_colissimo"]?></td>
					
					<td align=center id=texte2><a href="javascript:MM_openBrWindow('print_commande.php?id=<?=$row["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Imprimer</a></td>
					<td align=center id=texte2><a href="javascript:MM_openBrWindow('print_commande_client.php?id=<?=$row["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Imprimer</a></td>
					<td align=center id=texte2><a href="javascript:confirmation('<?=$row["num_commande"]?>')">Supp.</a></td>
				</tr>
			
	<?
		}
	?>
			</table>
			</td>
			<td width=10>&nbsp;</td>
		</tr>
	<?
	}
	?>
</table>


</body>
</html>



<? include_once("../include/_connexion_fin.php"); ?>
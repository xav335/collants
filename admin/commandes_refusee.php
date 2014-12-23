<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
function formatdate($strdate)
{
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}
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
function confirmation(id)
{
	if (confirm("Etes vous sur de vouloir supprimer cette commande?"))
	{
		document.location.href = "suppr_commande.php?id="+id+"&retour=3";
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
		<td align=center><b>Liste des commandes refusées.</b></td>
		<td width=10>&nbsp;</td>
	</tr>
	<tr>	
		<td colspan=3>&nbsp;</td>
	</tr>
	<?
	$ChaineSQL = "SELECT * FROM commande";
	$ChaineSQL .= " WHERE statut_paiement=3 ";
	$ChaineSQL .= " ORDER BY commande.num_commande DESC ";
	$result = mysql_query($ChaineSQL);
	
	if(mysql_num_rows($result)==0)
	{
	?>
	<tr>
		<td width=10>&nbsp;</td>
		<td align=center>il n'y a aucune commande refusée.</td>
		<td width=10>&nbsp;</td>
	</tr>
	<?
	}
	else
	{
	?>
		<tr>
			<td width=10>&nbsp;</td>
			<td align=center>
			<table border=1 bordercolor=#000000 cellpadding=0 cellspacing=0 width=90%>
				<tr>
					<td align=center id=texte2>&nbsp;Numéro commande&nbsp;</td>
					<td align=center id=texte2>&nbsp;Date commande&nbsp;</td>
					<td align=center id=texte2>&nbsp;Mode de paiement&nbsp;</td>
					<td align=center id=texte2>&nbsp;Statut paiement&nbsp;</td>
					<td align=center id=texte2>&nbsp;Imprimer&nbsp;</td>
					<td align=center id=texte2>&nbsp;Supp.&nbsp;</td>
				</tr>
	<?
		while($row=mysql_fetch_array($result))
		{
	?>

				<tr>
					<td id=texte2><?=$row["num_commande"]?></td>
					<td id=texte2><?=formatdate($row["date_commande"])?>&nbsp;<?=$row["heure_commande"]?></td>
					<?
					if ($row["mode_paiement"]==1)
					{
					?>
						<td id=texte2>Chèque bancaire</td>
					<?
					}
					else
					{
					?>
						<td id=texte2>CB en ligne</td>
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
					<td align=center id=texte2><a href="javascript:MM_openBrWindow('print_commande.php?id=<?=$row["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Imprimer</a></td>
					
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
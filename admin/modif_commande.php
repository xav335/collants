<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); 
function formatdate($strdate)
{
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}

function selector($ref_value,$value_to_check)
{
	if ($ref_value == $value_to_check)
	{
		return(" selected ");
	}
	else
	{
		return("");
	}
}

if(!isset($_GET["id"]))
{

	//redirection
	
	switch($_GET["retour"])
	{
		case 1 : // retour liste commande a exped
			
			header("Location: commandes_liste.php");
		break;
		
		case 2 : // retour commande expédiées
		
			header("Location: commandes_livrees.php");
		break;
		
		case 3 : // retour liste commande refusées
		
			header("Location: commandes_refusee.php");
		break;
		
		default : // hein ?
		// retour liste commande a exped
			
			header("Location: commandes_liste.php");
		break;
		
	}

}
else
{
	$ChaineSQL = "SELECT * FROM commande WHERE num_commande='".$_GET["id"]."'";
	$result=mysql_query($ChaineSQL);
	
	if (mysql_num_rows($result) ==0)
	{
		//redirection
		
		switch($_GET["retour"])
		{
			case 1 : // retour liste commande a exped
				
				header("Location: commandes_liste.php");
			break;
			
			case 2 : // retour commande expédiées
			
				header("Location: commandes_livrees.php");
			break;
			
			case 3 : // retour liste commande refusées
			
				header("Location: commandes_refusee.php");
			break;
			
			default : // hein ?
				// retour liste commande a exped
				header("Location: commandes_liste.php");
			break;
		}

	}
	else
	{
		$row=mysql_fetch_array($result);
	}
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

//-->
</script>
</head>
<body id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
		<td width=10>&nbsp;</td>
		<td align=center><b>Modification d'une commande.</b></td>
		<td width=10>&nbsp;</td>
	</tr>
	<tr>	
		<td colspan=3>&nbsp;</td>
	</tr>
	
	
	
		<tr>
			<td width=10>&nbsp;</td>
			<td align=center>
			<form name=formul1 method=post action="enreg_commande.php">
			<input type=hidden name="id" value="<?=$_GET["id"]?>">
			<table border=1 bordercolor=#000000 cellpadding=0 cellspacing=0 width=90%>
				<tr>
					<td align=center id=texte2>&nbsp;Numéro commande&nbsp;</td>
					<td align=center id=texte2>&nbsp;Date commande&nbsp;</td>
					<td align=center id=texte2>&nbsp;Mode de paiement&nbsp;</td>
					<td align=center id=texte2>&nbsp;Statut paiement&nbsp;</td>
					<td align=center id=texte2>&nbsp;Statut commande&nbsp;</td>
					<td align=center id=texte2>&nbsp;Numéro collisimo&nbsp;</td>
				</tr>
				<tr>
					<td id=texte2><?=$row["num_commande"]?></td>
					<td id=texte2><?=formatdate($row["date_commande"])?></td>
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
					
					<td id=texte2>
						<select name=statut_paiement>
							<option <?=selector(1,$row["statut_paiement"])?> value=1>payé</option>
							<option <?=selector(2,$row["statut_paiement"])?> value=2>en attente</option>
							<option <?=selector(3,$row["statut_paiement"])?> value=3>paiement refusé</option>
						</select>
					</td>
					<td id=texte2>
						<select name=statut_commande>
							<option <?=selector(1,$row["statut_commande"])?> value=1>en préparation</option>
							<option <?=selector(2,$row["statut_commande"])?> value=2>envoyée</option>
						</select>
					</td>
					<td id=texte2>
						<input size=15 type=texte name="num_colissimo" value="<?= $row["num_colissimo"]?>">
					</td>
				</tr>
				<tr>
					<td id=texte2 align=right colspan=6>&nbsp;</td>
				</tr>
				<tr>
					<td id=texte2 align=right colspan=6><input type=submit value="enregistrer"></td>
				</tr>
			</table>
			</form>
			</td>
			<td width=10>&nbsp;</td>
		</tr>
</table>


</body>
</html>



<? include_once("../include/_connexion_fin.php"); ?>
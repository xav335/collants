<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?
	//-----------  Quantité dans le panier  -------//
	$query="SELECT SUM(quantite) as qte FROM  panier ";
	$query .=" WHERE num_session='". session_id() ."'";	
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	while ($row = mysql_fetch_array($rstemp)) { 
		$qte = $row["qte"];
	}
	
	//----------- Prix dans le panier  -------//
	$prix_total = 0;
	$query  ="SELECT produit.num_produit,produit.prix,panier.quantite, ";//,produit_remise.num_remise,";
	$query .=" produit.lot, produit.promo_lot, produit.lib_lot ";	
	$query .=" FROM  panier ";
	$query .=" INNER JOIN produit_sousref ON panier.num_produit_sousref=produit_sousref.num_produit_sousref";	
	$query .=" INNER JOIN produit ON produit.num_produit=produit_sousref.num_produit";	
	//$query .=" LEFT JOIN produit_remise ON produit_remise.num_produit=produit.num_produit";
	$query .=" WHERE panier.num_session='". session_id() ."'";	
	//echo $query ."<br>";
	$rstemp2 = mysql_query($query);
	$bon_achat_affichage = 0;
	while ($row = mysql_fetch_array($rstemp2)) { 
		$estUnCodeRemiseParProduit = false;
		if ($row["lot"]>0 && $row["quantite"]>=$row["lot"]) { //c'est une promotion
			//calcul du prix des lots
			$nb_de_lot = (int)($row["quantite"] / $row["lot"]);
			$nb_article_avec_promo = $nb_de_lot * $row["lot"];
			$nb_article_sans_promo = $row["quantite"] - $nb_article_avec_promo;
			//echo "nb_de_lot: ". $nb_de_lot ."  nb_article_avec_promo: ". $nb_article_avec_promo."  nb_article_sans_promo: ". $nb_article_sans_promo;
			$prix_total += $row["promo_lot"] * $nb_article_avec_promo;
			$prix_total += $row["prix"] * $nb_article_sans_promo;
		}else{
			
			if ($_SESSION["pourcentage"] <>"") {  //code remise par produit
				$query="SELECT num_remise FROM produit_remise ";
				$query.=" WHERE num_produit=". $row["num_produit"];	
				$query.=" AND num_remise=". $_SESSION["num_remise"];	
				//echo $query;
				$rstemp34 = mysql_query($query);
				$nb_enr34 = mysql_num_rows($rstemp34);
				if ($nb_enr34 > 0) {
					$prix_total += $row["prix"]*(1-($_SESSION["pourcentage"]/100)) * $row["quantite"];
					$estUnCodeRemiseParProduit = true;
				}else{
					$prix_total += $row["prix"] * $row["quantite"];
				}		
			}else{
				$prix_total += $row["prix"] * $row["quantite"];
			}	
		}
		//------- bon d'achat ------//
		if ($_SESSION["bon_achat"] <>"" && $bon_achat_affichage ==0) {
			if ($prix_total >= $_SESSION["minimum_commande"]) {
				$prix_total -= $_SESSION["bon_achat"];
				$bon_achat_affichage = $_SESSION["bon_achat"];
			}else{
				$bon_achat_affichage = 0;
			}
		}
	}
	
	//echo "bon achat : " . $_SESSION["bon_achat"];
	//$frais_port = 5.95;	
	
	//$prix_total += $frais_port;
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
</head>
<body  leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" class="fond_gris" marginleft="0" >
<table width="110"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="36" align="center" valign="top" background="../images/fondpanier.jpg" id="texte1">
		<? 	if ($qte==NULL){ ?>
			Panier vide
		<? }else{ ?>
		contenu panier <br>
		 <b><?php echo $qte ?></b> articles
		 <? }?>
	</td>
  </tr>
  <tr>
    <td  align="right" valign="top" background="../images/fondpanier.jpg" id="texte2">
		<? 	if ($qte!=NULL){ ?>
			total: <b> <?php echo number_format($prix_total, 2, ',', ' ') ?>  €</b>
		<? }else{ ?>
			&nbsp;
		<? }?>
	</td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
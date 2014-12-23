<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php"); ?>
 <?
	$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix";
	$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot, produit.lib_flash1, produit.lib_flash2  ";	
	$query .=" FROM  produit ";	
	$query .=" WHERE produit.vente_flash=1";	
	$query .=" AND produit.actif=1";
	$query .=" AND produit.visible=1";
	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
 if (mysql_num_rows($rstemp)==0) {
 	$texte_accueil = "";
 }else{
 	while($produit=mysql_fetch_array($rstemp)){
		$num_produit = $produit["num_produit"];
		$designation =  $produit["designation"];
		$vignette =  $produit["vignette"];
		$prix = $produit["prix"];
		$lot = $produit["lot"];
		$promo_lot = $produit["promo_lot"];
		$lib_lot = $produit["lib_lot"];
		$lib_flash1 = $produit["lib_flash1"];
		$lib_flash2 = $produit["lib_flash2"];
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

<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="javascript" >
fen_parent = window.opener;
function ouvre(num_produit){
	fen_parent.location.href="vente_flash_frame.php?num_produit="+ num_produit;
	this.close();
	return false;
}

</script>
</head>
<body background="../images/popup2.gif", marginleft="0", topmargin="2", leftmargin="0", align="left", scroll=no >
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 	<td align="center"><br>
<br>

		<font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Vente flash</font>
	</td>
 </tr>
  <tr>
   <? if ($lot>0 || $lib_flash1<>"" || $lib_flash2<>"") { //affichage des promotions ou des pub flash?> 
					<td valign="top" align="center">
						<table width="20%" border="0" cellspacing="0" cellpadding="0">
						<tr> 
			          		<td><a href="#" onClick="ouvre(<? echo $num_produit ?>)"><img width="105" height="142" src="../photo/petite/<? echo $vignette ?>" border="0"></a></td>
			        	</tr>
						<tr> 
						  <td align="center"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr> 
								<td id="texte1"><? echo $designation?></td>
							  </tr>
							   <? if ($lot>0) { //affichage des promotions?> 
							  <tr> 
								<td align="center"><span class="prixbarre" ><? echo $prix?> €</span></td>
							  </tr>
							   <tr> 
								<td id="texte1_blanc"  align="center" ><? echo $lib_lot?></td>
							  </tr>
							  <? }else{ ?>
							   <tr> 
								<td align="center" id="texte2_blanc"><? echo $prix?> &#8364;</td>
							  </tr>
							  <?  } ?>
							</table></td>
						</tr>
						
						</table>
					</td>
				<? }else{ ?>
			    <td  valign="top" align="center">
					<table width="20%" border="0" cellspacing="0" cellpadding="0">
			        <tr> 
			          <td><a href="#" onClick="ouvre(<? echo $num_produit ?>)"><img width="105" height="142" src="../photo/petite/<? echo $vignette ?>" border="0"></a></td>
			        </tr>
			        <tr> 
			          <td align="center"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
			              <tr> 
			                <td id="texte1" align="center"><? echo $designation?></td>
			              </tr>
			              <tr> 
			                <td id="texte2_blanc" align="center"><? echo $prix?> &#8364;</td>
			              </tr>
			            </table></td>
			        </tr>
			        
			      	</table>
				</td>
				<?  } ?>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?
	$affiche_pas_de_remise = false;
	if ($_GET["remise"]<>""){
		$query  ="SELECT * FROM remise ";
		$query .=" WHERE code='". $_GET["remise"] ."'";	
		$query .=" AND date_debut <= NOW() AND NOW() <= date_fin ";
		//echo $query ."<br>";
		$rstemp6 = mysql_query($query);
		$nb_enr6 = mysql_num_rows($rstemp6);
		if ($nb_enr6>=1){ // un code remise a été trouvé
			while ($row = mysql_fetch_array($rstemp6)) {
				$num_remise = $row["num_remise"];
				$date_debut = $row["date_debut"];
				$date_fin = $row["date_fin"];
				$pourcentage =  $row["pourcentage"];
				$bon_achat =  $row["bon_achat"];
				$minimum_commande =  $row["minimum_commande"];
				$cadeau =  $row["cadeau"];
				$cadeau_en =  $row["cadeau_en"];
				$frais_port_fr =  $row["frais_port_fr"];
				$frais_port_ext =  $row["frais_port_ext"];
				$code =  $row["code"];
			}
				// ------  bon d'achat valide ------- //
			if ($bon_achat!=0 && is_numeric($bon_achat) && is_numeric($minimum_commande)){
				$_SESSION["num_remise"] = $num_remise;
				$_SESSION["pourcentage"] = "";
				$_SESSION["bon_achat"] = $bon_achat;
				$_SESSION["minimum_commande"] = $minimum_commande;
				$_SESSION["cadeau"] = $cadeau;
				$_SESSION["frais_port_fr"] = $frais_port_fr;
				$_SESSION["frais_port_ext"] = $frais_port_ext;
				
				// ------  remise par produit valide ------- //	
			}elseif ($pourcentage!=0 && is_numeric($pourcentage)){	
				$_SESSION["num_remise"] = $num_remise;
				$_SESSION["pourcentage"] = $pourcentage;
				$_SESSION["bon_achat"] = "";
				$_SESSION["minimum_commande"] = "";
				$_SESSION["cadeau"] = $cadeau;
				$_SESSION["frais_port_fr"] = $frais_port_fr;
				$_SESSION["frais_port_ext"] = $frais_port_ext;
			}else{
				$affiche_pas_de_remise = true;
			}
		}else{
			$affiche_pas_de_remise = true;
		}
	}
//echo "code rem : ". $_SESSION["minimum_commande"] ;
			
?>
<?
	if ($_GET["action"]=="suppr" && $_GET["num_produit_sousref"]<>""){
		$query="DELETE FROM  panier ";
		$query .=" WHERE num_session='". session_id() ."'";	
		$query .=" AND num_produit_sousref=". $_GET["num_produit_sousref"] ."";	
		//echo $query ."<br>";
		$rstemp = mysql_query($query);
	?>
		<script language="JavaScript" type="text/JavaScript">
		parent.panier.location.href ="panier_texte.php"
		</script> 
	<?		
	}
?>
<?
	$prix_total = 0;
	$query  ="SELECT panier.quantite, produit.designation, produit.prix, panier.quantite, couleur.couleur, taille.taille, ";
	$query .=" couleur.num_couleur, produit.num_produit, produit_sousref.num_produit_sousref, ";
	$query .=" produit.lot, produit.promo_lot, produit.lib_lot, panier.num_panier ";//,produit_remise.num_remise ";	
	$query .=" FROM  panier ";
	$query .=" INNER JOIN produit_sousref ON panier.num_produit_sousref=produit_sousref.num_produit_sousref";	
	$query .=" INNER JOIN produit ON produit.num_produit=produit_sousref.num_produit";	
	$query .=" INNER JOIN couleur ON couleur.num_couleur=produit_sousref.num_couleur";	
	$query .=" INNER JOIN taille ON taille.num_taille=produit_sousref.num_taille";	
	//$query .=" LEFT JOIN produit_remise ON produit_remise.num_produit=produit.num_produit";
	$query .=" WHERE panier.num_session='". session_id() ."'";	
	$query .=" ORDER BY produit.designation";	
	//echo $query ."<br>";
	$rstemp3 = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp3);
?>
<?	
	if ($_GET["action"]=="maj") {
		
		while ($row = mysql_fetch_array($rstemp3)) {
			$nouvelle_qte = $_GET["panier_".$row["num_panier"]];
			if ($nouvelle_qte != $row["quantite"]){
				//TODO : Rajouter le test de stock ici pour eviter de commander plus que le stock
						//eviter de commander plus que le stock
					$query="SELECT stock FROM produit_sousref ";
					$query.=" WHERE num_produit_sousref=". $row["num_produit_sousref"];	
					//echo $query;
					$rstemp344 = mysql_query($query);
					while ($row344 = mysql_fetch_array($rstemp344)) { 
						$stock = $row344["stock"];
					}
					$depassementDuStock = false;
					if ($nouvelle_qte <= $stock){			
						$query  = "UPDATE panier ";
						$query .= "Set quantite=". $nouvelle_qte ." " ;
						$query .= ", date_ajout=NOW() ";
						$query .=" WHERE num_panier=". $row["num_panier"];	
						//echo $query ."<br>";
						$rstemp4 = mysql_query($query);
					}else{
						$depassementDuStock = true;
					}
			}
		}
	?>
		<script language="JavaScript" type="text/JavaScript">
		parent.panier.location.href ="panier_texte.php"
		</script> 
	<?		
	}
?>
<?
	$prix_total = 0;
	$query  ="SELECT panier.quantite, produit.designation, produit.prix, panier.quantite, couleur.couleur, taille.taille, ";
	$query .=" couleur.num_couleur, produit.num_produit, produit_sousref.num_produit_sousref, ";
	$query .=" produit.lot, produit.promo_lot, produit.lib_lot, panier.num_panier";//,produit_remise.num_remise ";	
	$query .=" FROM  panier ";
	$query .=" INNER JOIN produit_sousref ON panier.num_produit_sousref=produit_sousref.num_produit_sousref";	
	$query .=" INNER JOIN produit ON produit.num_produit=produit_sousref.num_produit";	
	$query .=" INNER JOIN couleur ON couleur.num_couleur=produit_sousref.num_couleur";	
	$query .=" INNER JOIN taille ON taille.num_taille=produit_sousref.num_taille";	
	//$query .=" LEFT JOIN produit_remise ON produit_remise.num_produit=produit.num_produit";
	$query .=" WHERE panier.num_session='". session_id() ."'";	
	$query .=" ORDER BY produit.designation";	
	//echo $query ."<br>";
	$rstemp2 = mysql_query($query);
	$rstemp4 = mysql_query($query); //uniquement pour le test javascript
	$nb_enr = mysql_num_rows($rstemp2);
	?>
	
	<script language="JavaScript" type="text/JavaScript">
	function Form1_Validator(theForm){
		<?
		$liste_produit="";
		while ($row = mysql_fetch_array($rstemp4)) { 
			$liste_produit .= $row["num_produit"] . ",";
		?>
	 		if (!est_entier(theForm.panier_<? echo $row["num_panier"] ?>.value)){
				alert("Veuillez indiquez un nombre valide");
				theForm.panier_<? echo $row["num_panier"] ?>.focus();
				return (false);
			 }  
		<? } ?>
	 return true;
	}
	</script>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function est_entier(le_nombre){
	var checkOK = "0123456789-";
	var checkStr = le_nombre;
	var allValid = true;
	var decPoints = 0;
	var allNum = "";
	for (i = 0;  i < checkStr.length;  i++)
	{
	    ch = checkStr.charAt(i);
	    for (j = 0;  j < checkOK.length;  j++)
	      if (ch == checkOK.charAt(j))
	        break;
	    if (j == checkOK.length)
	    {
	      allValid = false;
	      break;
	    }
	    allNum += ch;
	}
	if (checkStr <=0) allValid = false;
	if (!allValid){
		return (false);
	}else{
		return (true);
	}
}	  

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function validform(){
	return true;
}

//-->
</script>
</head>
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','file:///E|/mesdocs/_BOULOT/collants/save_14-05-2005/fr/5.jpg','images/continuer_achats_over.gif','images/passer_commande_over.gif')" border="0">
<table width="100%" border="0" align="left" cellpadding="10" >
    <td colspan="3" align="left" valign="top" id="texte3_blanc">Articles dans votre panier pour un achat imm&eacute;diat<br>
      	<br>
    	<br>
		<? if ($nb_enr>=1){ ?>
			 <form name="formulaire" method="GET" action="panier_commande_actif.php"  onsubmit="return Form1_Validator(this)">  
			 	<input name="action" type="hidden" value="maj">
		  		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="B9133C" id="texte2">
				<tr align="left" valign="middle">
				  <td height="30" class="entete_panier">Désignation</td>
				  <td height="30" class="entete_panier">Taille</td>
				  <td height="30" class="entete_panier">Coloris</td>
				  <td height="30" class="entete_panier">Qté.</td>
				  <td height="30" class="entete_panier">Prix unitaire/&euro;</td>
				  <td height="30" class="entete_panier">Prix Total /&euro;</td>
				  <td height="30" class="entete_panier">Supprimer</td>
				</tr>
				
				 <?  
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
						}
					}
					
					?>
					
				<tr align="left" valign="top"><? //echo $row["lot"] ."  ". $row["quantite"] ?> 
				  <td bgcolor="#FFFFFF"><b><a href="produit_detail.php?num_produit=<? echo $row["num_produit"] ?>&num_couleur=<? echo $row["num_couleur"] ?>"><? echo $row["designation"] ?></a></b></td>
				  <td bgcolor="#FFFFFF"><b><? echo $row["taille"] ?></b></td>
				  <td bgcolor="#FFFFFF"><b><? echo $row["couleur"] ?></b></td>
				  <td bgcolor="#FFFFFF"> <input name="panier_<? echo $row["num_panier"] ?>" type="text" value="<? echo $row["quantite"] ?>" size="3"> </td>
				  <? if ($row["lot"]>0 && $row["quantite"] >=$row["lot"]) { //c'est une promotion?>
						<? if ($row["lot"] >1) { // si c'est une remise par lot?>
							<td bgcolor="#FFFFFF" align="right">
									<? echo $nb_de_lot ?>&nbsp;lots(X<? echo $row["lot"] ?>)&nbsp;à&nbsp;<span class="prixbarre_noir"><? echo number_format($row["prix"], 2, ',', ' ') ?></span>&nbsp;&nbsp;<b><? echo number_format($row["promo_lot"], 2, ',', ' ') ?></b><br>
									<? if ($nb_article_sans_promo == 1) { // juste pour le (s) de article?>
										<? echo $nb_article_sans_promo ?>&nbsp;article&nbsp;à&nbsp;<b><? echo number_format($row["prix"], 2, ',', ' ') ?></b>
									<? }elseif ($nb_article_sans_promo >1){  ?>
										<? echo $nb_article_sans_promo ?>&nbsp;articles&nbsp;à&nbsp;<b><? echo number_format($row["prix"], 2, ',', ' ') ?></b>
									<? } ?>	
							</td>
							<td bgcolor="#FFFFFF" align="right">
								<b><? echo number_format($row["promo_lot"] *  $nb_article_avec_promo, 2, ',', ' '); ?></b><br>
								<? if ($nb_article_sans_promo != 0) { ?>	
									<b><? echo number_format($row["prix"] * $nb_article_sans_promo, 2, ',', ' '); ?></b>
								<? } ?>
							</td>
						<? }else{ // si c'est une remise par article ?>
							<td bgcolor="#FFFFFF" align="right">
								<span class="prixbarre_noir"><? echo number_format($row["prix"], 2, ',', ' ') ?></span>&nbsp;&nbsp;<b><? echo number_format($row["promo_lot"], 2, ',', ' ') ?></b>
							</td>
							<td bgcolor="#FFFFFF" align="right">
								<b><? echo number_format($row["promo_lot"] *  $nb_article_avec_promo, 2, ',', ' '); ?></b>
							</td>
						<? } ?>	
				  <? }else{  //ce n'est PAS une promotion ?>
				  	<?  if ($estUnCodeRemiseParProduit) { // c'est une remise en pourcentage et par produit?>
						<td bgcolor="#FFFFFF" align="right">
							<span class="prixbarre_noir"><? echo number_format($row["prix"], 2, ',', ' ') ?></span><br>
							<b><? echo number_format($row["prix"]*(1-($_SESSION["pourcentage"]/100)), 2, ',', ' ') ?></b>
						</td>
						<td bgcolor="#FFFFFF" align="right"><b><? echo number_format($row["prix"]*(1-($_SESSION["pourcentage"]/100)) * $row["quantite"], 2, ',', ' '); ?></b></td>
					<? }else{ ?>
				  		<td bgcolor="#FFFFFF" align="right"><b><? echo number_format($row["prix"], 2, ',', ' ') ?></b></td>
				  		<td bgcolor="#FFFFFF" align="right"><b><? echo number_format($row["prix"] * $row["quantite"], 2, ',', ' '); ?></b></td>
					<? } ?>
				  <? } ?>
				  <td bgcolor="#FFFFFF" align="center"><a href="panier_commande_actif.php?action=suppr&num_produit_sousref=<? echo $row["num_produit_sousref"] ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/supprimer_over.gif',1)"><img src="images/supprimer_off.gif" name="Image4" width="13" height="13" border="0"></a></td>
				</tr>
				<? } //FIN While?>
				<?
					//$_SESSION["prix_total"] = $prix_total;
				?>
				<?  if ($_SESSION["bon_achat"] <>"") { ?>
					<tr align="left" valign="top"> 
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF" id="texte2_rouge">Bon d'achat <br><? echo number_format($_SESSION["bon_achat"], 2, ',', ' ')  ?>€</td>
					  <td colspan="2" bgcolor="#FFFFFF" id="texte2_rouge">Commande minimum <br><? echo number_format($_SESSION["minimum_commande"], 2, ',', ' ')?>€</td>
					  <td bgcolor="#FFFFFF" align="right" id="texte2_rouge">-&nbsp;<? echo number_format($bon_achat_affichage, 2, ',', ' ') ?></td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					</tr>
				<? } ?>
				<?  if ($_SESSION["cadeau"] <>"") { ?>
					<tr align="left" valign="top"> 
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td colspan="3" bgcolor="#FFFFFF" id="texte2_rouge">Cadeau : <? echo $_SESSION["cadeau"] ?></td>
					   <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					</tr>
				<? } ?>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Montant total</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($prix_total, 2, ',', ' ') ?></span></td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				</tr>
			  	</table>
	<div align="right"><br>
		
	 <input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/recalculer_over.gif',1)" name="Image3" type="image" src="images/recalculer_on.gif"  width="108" height="13" border="0" >
	<br>
	<br>
				code remise : 
	 <input name="remise" type="text" size="30">
	 &nbsp;&nbsp;
	 <input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image30','','images/valider_over.gif',1)" name="Image30" type="image" src="images/valider_on.gif"  width="108" height="13" border="0" >
	 <br>

    <br>
	<br>
    <br>
						</div>
   </form>
				
				
   <table width="100%" border="0" cellspacing="0" cellpadding="1">
	<tr>
	 <td align="left"><a href="boutique.php?num_rubrique=1" target="_parent" onMouseOver="MM_swapImage('Image21','','images/continuer_achats_over.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/continuer_achats_on.gif" name="Image21" width="200" height="26" border="0" id="Image21"></a>&nbsp;	 </td>
	 <td align="right">&nbsp;&nbsp;&nbsp;<a href="commande_1.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/passer_commande_over.gif',1)"><img src="images/passer_commande_on.gif" name="Image6" width="200" height="26" border="0"></a>
				
				
				
				
				
				
   	  <? 
					$query  ="SELECT DISTINCT  produit_associe.num_produit_associe,   ";
					$query .=" produit.num_produit,produit.designation,produit.vignette,produit.prix, ";
					$query .=" produit.lot, produit.promo_lot, produit.lib_lot , produit.lib_flash1, produit.lib_flash2";	
					$query .=" FROM  produit ";
					$query .=" INNER JOIN produit_associe ON produit.num_produit=produit_associe.num_produit_associe";	
					$query .=" WHERE produit_associe.num_produit IN (". $liste_produit ."0)";	
					$query .=" AND produit.actif=1";
					$query .=" AND produit.visible=1";
					$query .=" ORDER BY produit.designation";	
					//echo $query ."<br>";
					$rstemp5 = mysql_query($query);
					$nb_enr = mysql_num_rows($rstemp5);

				?>
				
   	  <? if ($nb_enr>0){?>
	 </td>
	</tr>
   </table>
   <p><br>
   </p>
   <p><br>
      					<img src="../images/pixel_rouge.jpg" width="100%" height="1">
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;Produits similaires : <br>
						
				
					</p>
   <table width="1" border="0" cellpadding="20" align="left" >
						 <tr> 
						<? $cpt_col=1 ?>
						<? while ($produit = mysql_fetch_array($rstemp5)) { ?>
						<?		
							$num_produit = $produit["num_produit"];
							$designation =  $produit["designation"];
							$vignette =  $produit["vignette"];
							$prix = $produit["prix"];
							$lot = $produit["lot"];
							$promo_lot = $produit["promo_lot"];
							$lib_lot = $produit["lib_lot"];
							$lib_flash1 = $produit["lib_flash1"];
							$lib_flash2 = $produit["lib_flash2"];
						?>
									<? if ($lot>0 || $lib_flash1<>"" || $lib_flash2<>"") { //affichage des promotions ou des pub flash?> 
										<td valign="top">
											<table width="20%" border="0" cellspacing="0" cellpadding="0">
											<tr> 
											  <td> 
														<!--<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="105" height="142" id="promotion" align="middle">
														<param name="allowScriptAccess" value="sameDomain" />
														<param name="movie" value="images/promotion.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo urlencode($lib_flash1) ?>&promo2txt=<? echo urlencode($lib_flash2) ?>" />
														<PARAM NAME="wmode" VALUE="transparent">
														<param name="quality" value="high" />
														<param name="bgcolor" value="#ffffff" />
														<embed src="images/promotion.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo urlencode($lib_flash1) ?>&promo2txt=<? echo urlencode($lib_flash2) ?>" quality="high" bgcolor="#ffffff" width="105" height="142" name="promotion" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
														</object> -->
														<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="105" height="142" id="promotion" align="middle">
														<param name="allowScriptAccess" value="sameDomain" />
														<param name="movie" value="images/promotion.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo str_replace("%","%25",$lib_flash1) ?>&promo2txt=<? echo str_replace("%","%25",$lib_flash2) ?>" />
														<PARAM NAME="wmode" VALUE="transparent">
														<param name="quality" value="high" />
														<param name="bgcolor" value="#ffffff" />
														<embed src="images/promotion.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo str_replace("%","%25",$lib_flash1) ?>&promo2txt=<? echo str_replace("%","%25",$lib_flash2) ?>" quality="high" bgcolor="#ffffff" width="105" height="142" name="promotion" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
														</object>
												</td>
											</tr>
											<tr> 
											  <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr> 
													<td id="texte1"><? echo $designation?></td>
												  </tr>
												 <? if ($lot>0) { //affichage des promotions?> 
												  <tr> 
													<td><span class="prixbarre"><? echo $prix?> €</span></td>
												  </tr>
												   <tr> 
													<td id="texte1_blanc"><? echo $lib_lot?></td>
												  </tr>
												  <? }else{ ?>
												   <tr> 
													<td id="texte2_blanc"><? echo $prix?> &#8364;</td>
												  </tr>
												  <?  } ?>
												</table></td>
											</tr>
											<tr> 
											  <td><div align="left"><A HREF="produit_seul.php?num_produit=<? echo $num_produit ?>"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image<? echo $cpt_col?>','','images/ajouter_over.jpg',1)"><img src="images/ajouter_on.jpg" name="Image<? echo $cpt_col?>" width="99" height="13" border="0" id="Image61"></a></div></td>
											</tr>
											</table>
										</td>
									<? }else{ ?>
									<td  valign="top">
										<table width="20%" border="0" cellspacing="0" cellpadding="0">
										<tr> 
										  <td> <a href="produit_detail.php?num_produit=<? echo $num_produit ?>"><img width="105" height="142" src="../photo/petite/<? echo $vignette ?>" border="0"></a></td>
										</tr>
										<tr> 
										  <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr> 
												<td id="texte1"><? echo $designation?></td>
											  </tr>
											  <tr> 
												<td id="texte2_blanc"><? echo $prix?> &#8364;</td>
											  </tr>
											</table></td>
										</tr>
										<tr> 
										  <td><div align="left"><A HREF="produit_seul.php?num_produit=<? echo $num_produit ?>"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image<? echo $cpt_col?>','','images/ajouter_over.jpg',1)"><img src="images/ajouter_on.jpg" name="Image<? echo $cpt_col?>" width="99" height="13" border="0" id="Image61"></a></div></td>
										</tr>
										</table>
									</td>
									<?  } ?>
								<? if ($cpt_col%4 ==0) {?> 
						</tr>
									<tr>
								<? }?>
							<? $cpt_col++ ?>	  
						<? } ?>
						</tr>
					</table>
					<? } ?>
			<? }else{ ?>		
				
				<br>
				<br>
				
				
					Votre panier est vide pour le moment.
			
				  
			<? } ?>		  
			
			
    
	</td>
  </tr>
</table>
<script language="javascript">
<? if ($affiche_pas_de_remise) { ?>
	alert("Votre code remise n\'est pas valide !")
<? } ?>
<? if ($depassementDuStock) { ?>
	alert("depassement du stock");
<? } ?>
</script>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
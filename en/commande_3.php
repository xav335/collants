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
				alert("this is not a number");
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



function soumettre_form(Button_Value)
{
	document.formul1.mode_paiement.value=Button_Value;
	document.formul1.submit();
	
}


//-->
</script>
</head>
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif')" border="0">
<table width="100%" border="0" align="left" cellpadding="10" >
    <td colspan="3" align="left" valign="top" id="texte3_blanc">Summary of your order<br><br>
    <?
    //adresse principale, victoria!
    $ChaineSQL = "SELECT * FROM adresse INNER JOIN pays ON pays.num_pays = adresse.num_pays INNER JOIN civilite ON civilite.num_civilite = client.num_civilite INNER JOIN client ON client.num_addresse_defaut = adresse.num_adresse WHERE client.num_client='".$_SESSION["num_client"]."'";
    //echo $ChaineSQL;
    $mon_result_adresse = mysql_query($ChaineSQL);
    
    $row_result_adresse = mysql_fetch_array($mon_result_adresse);
   
   // adresse de livraison
   $ChaineSQL = "SELECT * FROM adresse INNER JOIN pays ON pays.num_pays = adresse.num_pays INNER JOIN civilite ON civilite.num_civilite = client.num_civilite INNER JOIN client ON client.num_client = adresse.num_client WHERE adresse.num_adresse='".$_POST["choix_adresse"]."'";
   $mon_result_adresse_liv = mysql_query($ChaineSQL);
    
    $row_result_adresse_liv = mysql_fetch_array($mon_result_adresse_liv);
   
   
    ?>
    <table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
	  		<td id="texte2"><b>Your bill-address :</b><br><br>
	  		 <?=$row_result_adresse["civilite"]?> <?=$row_result_adresse["prenom_liv"]?> <?=$row_result_adresse["nom_liv"]?><br>
	  		 <?
	  		 if ($row_result_adresse["batiment"] != "")
	  		 {
	?>
	  		 building <?=$row_result_adresse["batiment"]?>,
	<?
			 }
			 if ($row_result_adresse["porte"] != "")
	  		 {
	?>
	  		 door <?=$row_result_adresse["porte"]?>, 
	<?		 
			 }
	  		 if ($row_result_adresse["etage"] != "")
	  		 {
	?>
	  		 floor <?=$row_result_adresse["etage"]?>
	<?
			 }
	?>
	  		 <br>
	  		 <?=$row_result_adresse["adresse1"]?><br>
	  		 <? if ($row_result_adresse["adresse2"]!=""){ echo($row_result_adresse["adresse2"]."<br>");}?>
	  		 <br>
	  		 <?=$row_result_adresse["cp"]?> <?=$row_result_adresse["ville"]?> <? if ($row_result_adresse["num_pays"] != 73) { echo("(".$row_result_adresse["pays"]).")";}?>
	  		 </td>
	  		 
	  		 
	  		<td id="texte2"><b>Votre delivery address:</b><br><br>
	  		 <?=$row_result_adresse_liv["civilite"]?> <?=$row_result_adresse_liv["prenom_liv"]?> <?=$row_result_adresse_liv["nom_liv"]?><br>
	  		 <?
	  		 if ($row_result_adresse_liv["batiment"] != "")
	  		 {
	?>
	  		 building <?=$row_result_adresse_liv["batiment"]?>,
	<?
			 }
			 if ($row_result_adresse_liv["porte"] != "")
	  		 {
	?>
	  		 door <?=$row_result_adresse_liv["porte"]?>, 
	<?		 
			 }
	  		 if ($row_result_adresse_liv["etage"] != "")
	  		 {
	?>
	  		 floor <?=$row_result_adresse_liv["etage"]?>
	<?
			 }
	?>
	  		 <br>
	  		 <?=$row_result_adresse_liv["adresse1"]?><br>
	  		 <? if ($row_result_adresse_liv["adresse2"]!=""){ echo($row_result_adresse_liv["adresse2"]."<br>");}?>
	  		 <br>
	  		 <?=$row_result_adresse_liv["cp"]?> <?=$row_result_adresse_liv["ville"]?> <? if ($row_result_adresse_liv["num_pays"] != 73) { echo("(".$row_result_adresse_liv["pays"]).")";}?>
	  		 </td>	  		 
	</tr>
     </table> 
    
    
    
      	<br>
    	<br>
		<? if ($nb_enr>=1){ ?>
			 <form name="formul1" method="POST" action="enreg_commande.php" >  
			 	 <input name="email_banque" type="hidden" value="<?= $_POST["email_banque"]?>">
			 	<input name="choix_adresse" type="hidden" value="<?= $_POST["choix_adresse"]?>">
			 	
		  		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="B9133C" id="texte2">
				<tr align="left" valign="middle">
				  
				  <td height="30" class="entete_panier">Designation </td>
							  
				  <td height="30" class="entete_panier">Size</td>
				  <td height="30" class="entete_panier">Colour</td>
							  
				  <td height="30" class="entete_panier">Quantity.</td>
							  
				  <td height="30" class="entete_panier">Unit price /&euro;</td>
							  
				  <td height="30" class="entete_panier">Total Price/&euro;</td>
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
				  <td bgcolor="#FFFFFF"><b> <? echo $row["quantite"] ?> </b></td>
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
				</tr>
				<? } //FIN While?>
				<?
					//$_SESSION["prix_total"] = $prix_total;
				?>
				<?  if ($_SESSION["bon_achat"] <>"") { ?>
					<tr align="left" valign="top"> 
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF" id="texte2_rouge">Purchase voucher <br><? echo number_format($_SESSION["bon_achat"], 2, ',', ' ')  ?>€</td>
					  <td colspan="2" bgcolor="#FFFFFF" id="texte2_rouge">minimum order <br><? echo number_format($_SESSION["minimum_commande"], 2, ',', ' ')?>€</td>
					  <td bgcolor="#FFFFFF" align="right" id="texte2_rouge">-&nbsp;<? echo number_format($bon_achat_affichage, 2, ',', ' ') ?></td>
					</tr>
				<? } ?>
				<?  if ($_SESSION["cadeau"] <>"") { ?>
					<tr align="left" valign="top"> 
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td colspan="3" bgcolor="#FFFFFF" id="texte2_rouge">Gift : <? echo $_SESSION["cadeau"] ?></td>
					   <td bgcolor="#FFFFFF">&nbsp;</td>
					</tr>
				<? } ?>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Total Amount</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($prix_total, 2, ',', ' ') ?></span></td>
				</tr>
				<?
				
				
				
				
					
					//calcul des frais de port...
					
					// dans quel pays livrer ??
					//echo $_POST["choix_adresse"];
					$MaChaineSQL = "SELECT num_pays FROM adresse WHERE num_adresse = '".$_POST["choix_adresse"]."'";
					$mon_result = mysql_query($MaChaineSQL);
					if (mysql_num_rows($mon_result)!=0)
					{
						$ma_row = mysql_fetch_array($mon_result);
						$mon_pays = $ma_row["num_pays"];
					}
					else
					{
						// pas de pays?? on est pas en france
						$mon_pays = "0";
					}
					
					
					// si code remise entré!
					
					if ($_SESSION["num_remise"] !="")
					{
						// deux cas se présentent...
						//remise en bon d'achat avec mini commande
						// remise en % sans mini de commande..
						
						
						if ($_SESSION["bon_achat"] != "") //remise en bon d'achat
						{
							if ($mon_pays ==73)
							{
								// en france!
								if ( $prix_total >= $_SESSION["minimum_commande"])
								{
									$frais_port = $_SESSION["frais_port_fr"];
								
								}
							}
							else
							{
								//a l'étranger
								if ($prix_total >= $_SESSION["minimum_commande"])
								{
									$frais_port = $_SESSION["frais_port_ext"];
								}
							}
						}
						else // remise en %
						{
							if ($mon_pays ==73)
							{
								// en france!
								$frais_port = $_SESSION["frais_port_fr"];
								
							}
							else
							{
								$frais_port = $_SESSION["frais_port_ext"];
							}
						}
						
						
						
					}
					
					
					
					
					// si pas de remise

					if (!isset($frais_port))
					{
						echo "dfdsf";
						// pas de remise entrée, on utilise les frais de port standard, avec ou sans remise
						
						// on selectionne les remises sur frais de port actuelles seulement si le montant de la commande le permet...
					
						$ChaineSQL = "SELECT * FROM frais_port WHERE actif='1' AND '". Date("Y-m-d h:m:s") ."' BETWEEN date_debut AND date_fin AND minimum_commande <= '".$prix_total."'";
						$result_frais= mysql_query($ChaineSQL);
						
						
						
					
						
						//echo($ChaineSQL2);
						
						if (mysql_num_rows($result_frais)!=0)
						{
							// il y a une remise...
							$row_frais=mysql_fetch_array($result_frais);
							
							//encore des verifs
							
								if ($mon_pays == 73)
								{
									// france
									$frais_port = $row_frais["frais_port_fr_promo"];
								}
								else
								{
									//etranger
									$frais_port = $row_frais["frais_port_ext_promo"];
								}
						}
						else
						{
							// pas de remise, on rappatrie les frais de port standard
							$ChaineSQL = "SELECT * FROM frais_port";
							$result_frais_2= mysql_query($ChaineSQL);
							$row_frais_2=mysql_fetch_array($result_frais_2);
							
							//encore des verifs
							
							
							
								if ($mon_pays == 73)
								{
									// france
									$frais_port = $row_frais_2["frais_port_fr"];
								}
								else
								{
									//etranger
									$frais_port = $row_frais_2["frais_port_ext"];
								}
						}
					
				}
				
				
				
				
				
				
				
				
				?>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Delivery</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($frais_port, 2, ',', ' ') ?></span></td>
				</tr>
				<?
				
				
				
				
				$prix_total += $frais_port;
				?>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Total TTC</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($prix_total, 2, ',', ' ') ?></span></td>
				</tr>
				
			  	</table><br>
			  	<table align="right" width="510" border="0" cellpadding="0" cellspacing="0">
			  	<tr>
			  		
			  		<td width=250>
			  		<?
			  		if ($mon_pays ==73)
					{
			  		?>
			  			<a href="javascript:soumettre_form('1');"><img border="0" src="../images/cheque.gif"></a>
			  		<?
			  		}
			  		else
			  		{
			  		?>
			  			&nbsp;
			  		<?
			  		}
			  		?>
			  		</td>
			  		<td width=10>&nbsp;</td>
			  		<td width=250><a href="javascript:soumettre_form('2');"><img border=0 src="../images/cbgif.gif"></a></td>
			  	</tr>
			  	</table>
			  	<input type=hidden name="mode_paiement">
				</form>
				
				
				
				
				
			<? }else{ ?>		
				
				<br>
				<br>
				
				
					Your basket is empty for the moment.
			
				  
			<? } ?>		  
			
			
    
	</td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

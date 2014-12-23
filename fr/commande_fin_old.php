<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");

// fin de la commande

//$_SESSION["num_commande"]




// on teste les valeurs 
//test : si pas de post ET pas de ssesion ...

if ( ( !(isset($_POST["email"])) || !(isset($_POST["pass"])) ) && ( !(isset($_SESSION["num_client"])) ) )
{
?>
	<script language=javascript>
	<!--
		window.history.go(-1);
	//-->
	</script>
<?
}
else
{
	
	$ChaineSQL = "SELECT * FROM client ";
	$ChaineSQL.= " INNER JOIN civilite ON civilite.num_civilite = client.num_civilite ";
	if (isset($_POST["email"]))
	{
		$ChaineSQL.= " WHERE client.email = '".$_POST["email"]."' AND client.mdp='".$_POST["pass"]."'";
	}
	else
	{
		$ChaineSQL.= " WHERE client.num_client = '".$_SESSION["num_client"]."'";
	}
	
	//echo $ChaineSQL;
	
	$result = mysql_query($ChaineSQL);
	
	if(mysql_num_rows($result) != 1 )
	{
	?>
		<script language=javascript>
		<!--
			window.history.go(-1);
		//-->
		</script>	
	<?
	}
	else
	{
		$row=mysql_fetch_array($result);
		
		$_SESSION["num_client"] = $row["num_client"];	
	}
}



//panier
	

//fin panier .. pas de recalcul, pas de maj de qtité, tout est en dur!



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function VerifForm(){
	if (document.formul1.choix_adresse.value==0)
	{
		alert("Vous devez saisir votre adresse de livraison");
		document.formul1.choix_adresse.focus();
		return(false);
	}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

//-->
</script>
</head>
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif','images/imprimer_over.gif')" border="0">

<table width="100%" border="0" cellspacing="0" cellpadding="15">
 <tr>
  <td>
   <table width="100%" border="0" cellpadding="10" cellspacing="0">
 
    <tr>
  	 <td class="entete_panier"><b>
	  <?=$row["civilite"]?>
	&nbsp;
	
   	  <?=$row["prenom"]?>
	&nbsp;
	
   	  <?=$row["nom"]?>
	  </b><br>
	  <br>
	  	  Pour recevoir votre commande, imprimez ce bon et envoyez le accompagné de votre règlement par chèque a l'ordre de collants.fr a l'adrese suivante : <br>
	  <br>
  	collants.fr, zac du sablar, 25 allée pampara, 40100 dax France </td>
	</tr>
   </table>
  </td>
 </tr>
</table>
<table border=0 cellpadding=15 cellspacing=0>
<tr>
  		
  <td id="texte2"><b>
   <?

// données propres a la commande et non aux lignes!!!!
//(client, adresse, cadeau, bon d'achat, etc..)

$ChaineSQL = " SELECT * FROM commande INNER JOIN pays ON pays.num_pays = adresse.num_pays INNER JOIN adresse ON adresse.num_adresse= commande.num_adresse ";
$ChaineSQL .= " WHERE num_commande = '".$_SESSION["num_commande"]."'";

$result = mysql_query($ChaineSQL);

$row2 = mysql_fetch_array($result);

?>
   Votre adresse de livraison :</b><br>
   <br>
  		 <?=$row2["civilite"]?> <?=$row2["prenom_liv"]?> <?=$row2["nom_liv"]?><br>
  		 <?
  		 if ($row2["batiment"] != "")
  		 {
?>
  		 batiment <?=$row2["batiment"]?>,
<?
		 }
		 if ($row2["porte"] != "")
  		 {
?>
  		 porte <?=$row2["porte"]?>, 
<?		 
		 }
  		 if ($row2["etage"] != "")
  		 {
?>
  		 étage <?=$row2["etage"]?>
<?
		 }
?>
  		 <br>
  		 <?=$row2["adresse1"]?><br>
  		 <? if ($row2["adresse2"]!=""){ echo($row2["adresse2"]."<br>");}?>
  		 <br>
  		 <?=$row2["cp"]?> <?=$row2["ville"]?> <? if ($row2["num_pays"] != 73) { echo("(".$row2["pays"]).")";}?>
  		 </td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="15">
 <tr>
  <td id="texte2">Voici le récapitulatif de votre commande : </td>
 </tr>
</table>
<form name="formul1" method=POST action="enreg_commande.php" onsubmit="return VerifForm()">
 <table width="100%" border="0" align="left" cellpadding="10" >
  <tr>
    <td align="left" valign="top" id="texte3_blanc">Commande n°<?=$row2["num_commande"]?></td>
  </tr>
  <tr>
    <td align="left" valign="top" id="texte3_blanc">
		<?
		
		// données des lignes commande avec remises par lots ou par pourcentage!!
		
		$ChaineSQL = " SELECT * FROM commande ";
		$ChaineSQL .= " INNER JOIN ligne_commande ON ligne_commande.num_commande= commande.num_commande ";
		$ChaineSQL .= " WHERE commande.num_commande = '".$_SESSION["num_commande"]."'";
		
		
		$result = mysql_query($ChaineSQL);
		
		
		
		?>
		<? if (mysql_num_rows($result)>=1){ ?>
		  		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="B9133C" id="texte2">
				<tr align="left" valign="middle">
				  <td height="30" class="entete_panier">Désignation</td>
				  <td height="30" class="entete_panier">Taille</td>
				  <td height="30" class="entete_panier">Coloris</td>
				  <td height="30" class="entete_panier">Qté.</td>
				  <td height="30" class="entete_panier">Prix unitaire/&euro;</td>
				  <td height="30" class="entete_panier">Prix Total /&euro;</td>
				</tr>
				
				 <?  while ($row = mysql_fetch_array($result)) {
					if ($row["remise_lot_quantite"]>0 && $row["quantite"]>=$row["remise_lot_quantite"]) { //c'est une promotion
						//calcul du prix des lots
						$nb_de_lot = (int)($row["quantite"] / $row["remise_lot_quantite"]);
						$nb_article_avec_promo = $nb_de_lot * $row["remise_lot_quantite"];
						$nb_article_sans_promo = $row["quantite"] - $nb_article_avec_promo;
						//echo "nb_de_lot: ". $nb_de_lot ."  nb_article_avec_promo: ". $nb_article_avec_promo."  nb_article_sans_promo: ". $nb_article_sans_promo;
						$prix_total += $row["remise_lot_prix_unitaire"] * $nb_article_avec_promo;
						$prix_total += $row["prix_unitaire_produit"] 	 * $nb_article_sans_promo;
					}else{
						if ($row["remise_pourcentage"]>0)
							{
								$prix_total += $row["prix_unitaire_produit"]*(1-($row["remise_pourcentage"]/100)) * $row["quantite"];
							}
						else
							{
								$prix_total += $row["prix_unitaire_produit"] * $row["quantite"];
							}
					}
					
					?>
					
				<tr align="left" valign="top"><? //echo $row["lot"] ."  ". $row["quantite"] ?> 
				  <td bgcolor="#FFFFFF"><b><? echo $row["designation_produit"] ?></b></td>
				  <td bgcolor="#FFFFFF"><b><? echo $row["taille_produit"] ?></b></td>
				  <td bgcolor="#FFFFFF"><b><? echo $row["couleur"] ?></b></td>
				  <td bgcolor="#FFFFFF"><b><? echo $row["quantite"] ?></b></td>
				  <? if ($row["remise_lot_quantite"]>0 && $row["quantite"] >=$row["remise_lot_quantite"]) { //c'est une promotion?>
						<? if ($row["remise_lot_quantite"] >1) { // si c'est une remise par lot?>
							<td bgcolor="#FFFFFF" align="right">
									<? echo $nb_de_lot ?>&nbsp;lots(X<? echo $row["remise_lot_quantite "] ?>)&nbsp;à&nbsp;<span class="prixbarre_noir"><? echo number_format($row["prix_unitaire_produit"], 2, ',', ' ') ?></span>&nbsp;&nbsp;<b><? echo number_format($row["remise_lot_prix_unitaire"], 2, ',', ' ') ?></b><br>
									<? if ($nb_article_sans_promo == 1) { // juste pour le (s) de article?>
										<? echo $nb_article_sans_promo ?>&nbsp;article&nbsp;à&nbsp;<b><? echo number_format($row["prix_unitaire_produit"], 2, ',', ' ') ?></b>
									<? }elseif ($nb_article_sans_promo >1){  ?>
										<? echo $nb_article_sans_promo ?>&nbsp;articles&nbsp;à&nbsp;<b><? echo number_format($row["prix_unitaire_produit"], 2, ',', ' ') ?></b>
									<? } ?>	
							</td>
							<td bgcolor="#FFFFFF" align="right">
								<b><? echo number_format($row["remise_lot_prix_unitaire"] *  $nb_article_avec_promo, 2, ',', ' '); ?></b><br>
								<? if ($nb_article_sans_promo != 0) { ?>	
									<b><? echo number_format($row["prix_unitaire_produit"] * $nb_article_sans_promo, 2, ',', ' '); ?></b>
								<? } ?>
							</td>
						<? }else{ // si c'est une remise par article ?>
							<td bgcolor="#FFFFFF" align="right">
								<span class="prixbarre_noir"><? echo number_format($row["prix_unitaire_produit"], 2, ',', ' ') ?></span>&nbsp;&nbsp;<b><? echo number_format($row["remise_lot_prix_unitaire"], 2, ',', ' ') ?></b>
							</td>
							<td bgcolor="#FFFFFF" align="right">
								<b><? echo number_format($row["quantite"] *  $row["remise_lot_prix_unitaire"], 2, ',', ' '); ?></b>
							</td>
						<? } ?>	
				  <? }else{  //ce n'est PAS une promotion ?>
				  	<?  if ($row["remise_pourcentage"]>0) { // c'est une remise en pourcentage et par produit?>
						<td bgcolor="#FFFFFF" align="right">
							<span class="prixbarre_noir"><? echo number_format($row["prix_unitaire_produit"], 2, ',', ' ') ?></span><br>
							<b><? echo number_format($row["prix_unitaire_produit"]*(1-($row["remise_pourcentage"]/100)), 2, ',', ' ') ?></b>
						</td>
						<td bgcolor="#FFFFFF" align="right"><b><? echo number_format($row["prix_unitaire_produit"]*(1-($row["remise_pourcentage"]/100)) * $row["quantite"], 2, ',', ' '); ?></b></td>
					<? }else{ ?>
				  		<td bgcolor="#FFFFFF" align="right"><b><? echo number_format($row["prix_unitaire_produit"], 2, ',', ' ') ?></b></td>
				  		<td bgcolor="#FFFFFF" align="right"><b><? echo number_format($row["prix_unitaire_produit"] * $row["quantite"], 2, ',', ' '); ?></b></td>
					<? } ?>
				  <? } ?>
				</tr>
				<? } //FIN While?>
				<?
					//$prix_total += $frais_port;
					
					
					//------- bon d'achat ------//
					if ($row2["remise"] >0) {

							$prix_total -= $row2["remise"];
					}
					
					
				?>
				<?  if ($row2["remise"] >0) { ?>
					<tr align="left" valign="top"> 
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <?
					  // plus de verif si le minimum de commande est atteint, on verifie dans l'insertion en base!!!
					  ?>
					  <td colspan=3 bgcolor="#FFFFFF" id="texte2_rouge">Bon d'achat <? echo number_format($row2["remise"], 2, ',', ' ')  ?>€</td>
					  <td bgcolor="#FFFFFF" align="right" id="texte2_rouge">-&nbsp;<? echo number_format($row2["remise"], 2, ',', ' ') ?></td>
					</tr>
				<? } ?>
				<?  if ($row2["cadeau"] <>"") { ?>
					<tr align="left" valign="top"> 
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					  <td colspan="3" bgcolor="#FFFFFF" id="texte2_rouge">Cadeau : <? echo $row2["cadeau"] ?></td>
					  <td bgcolor="#FFFFFF">&nbsp;</td>
					</tr>
				<? } ?>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Montant total</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($prix_total, 2, ',', ' ') ?></span></td>
				</tr>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Frais de port</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($row2["frais_port"], 2, ',', ' ') ?></span></td>
				</tr>
				<tr align="left" valign="top"> 
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td bgcolor="#FFFFFF">&nbsp;</td>
				  <td colspan="2" bgcolor="#FFFFFF"><b>Total</b></td>
				  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($prix_total+$row2["frais_port"], 2, ',', ' ') ?></span></td>
				</tr>
			  	</table>
			  	<br>
				
				
			<? }else{ ?>		
				
				<br>
				<br>
				
				
					Votre Panier est vide.
			
				  
			<? } ?>		  
			
			
    
	</td>
  </tr>
  <?
  // deux cas.. 
  
  //par cheque on preconise l'envoi
  //par CB on met le numéro de transaction
  
  
switch($row2["mode_paiement"])
{
	case 1: // cheque
	// il faut en profiter pour vider le panier !!!
	
	$ChaineSQL = "DELETE FROM panier WHERE num_session='".$row2["num_session"]."'";
	$ma_suppr= mysql_query($ChaineSQL);
?>
  <tr>
  	
   <td id="texte2"><a href="#" onClick="MM_openBrWindow('print_commande.php?id=<?=$_SESSION["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/imprimer_over.gif',1)"><img src="images/imprimer_on.gif" name="Image1" width="85" height="13" border="0"></a>
	
	
  	</td>
  </tr>
<?
		
	break;
	
	case 2: // cb en ligne

		switch($_GET["etat"])
		{
			case 1 :
				// pas d'erreur
				//on corrige le statut paiement de la commande + le num_transac
				//$ChaineSQL = "UPDATE commande num_transaction ='".$_GET["num_transac"]."'";
				//$result=mysql_query($ChaineSQL);
				// on affiche le retour
				?>
				<tr>
  					<td id="texte2"><b>Votre paiement a été accepté par notre banque. Vous recevrez votre commande dans les plus brefs délais.<br>
  					 Merci d'avoir choisi Collants.fr</b>
  					</td>
  				</tr>
				<?
				// on peut vider le panier la...(eventuellement)
				
				
			break;
			case 2 :
				//erreur
				//on corrige le statut paiement de la commande + le num_transac
				/*
				$ChaineSQL = "Update commande SET statut_paiement='3'";
				$result=mysql_query($ChaineSQL);
				*/
				?>
				<tr>
  					<td id="texte2"><b>Votre paiement a été refusé par notre banque.</b><b<br>
  					</td>
  				</tr>
				<?
				
			break;
		}

		
	break;
	
	default: // hein ? -> cheque
?>
<tr>
  	<td id="texte2">Pour recevoir votre commande, imprimez ce bon et envoyez le accompagné de votre règlement par cheque a l'ordre de collants.fr a l'adrese suivante : <br>
  	collants.fr, zac du sablar, 25 allée pampara, 40100 dax France  	
  	</td>
  </tr>
<?
	break;
	
	
}
  ?>
  
  </table>
</form>






</body>
</html>



<?php include_once("../include/_connexion_fin.php"); ?>

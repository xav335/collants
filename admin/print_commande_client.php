<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); 

function formatdate($strdate)
{
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}



if(!isset($_GET["id"]))
{
?>
	<script language=javascript>
	<!--
		window.close();
	//-->
	</script>
<?
}
else
{
	$ChaineSQL = "SELECT * FROM commande ";
	$ChaineSQL .= " INNER JOIN ligne_commande ON commande.num_commande = ligne_commande.num_commande ";
	$ChaineSQL .= " INNER JOIN client on client.num_client = commande.num_client ";
	$ChaineSQL .= " INNER JOIN adresse ON client.num_addresse_defaut = adresse.num_adresse ";
	$ChaineSQL .= " INNER JOIN civilite on civilite.num_civilite = client.num_civilite ";
	$ChaineSQL .= " WHERE commande.num_commande='". $_GET["id"] ."'";
	
	//echo ($ChaineSQL);
	
	$result=mysql_query($ChaineSQL);
	
	if (mysql_num_rows($result)<1)
	{
	?>
		<script language=javascript>
		<!--
			window.close();
		//-->
		</script>
	<?	
	}
	else
	{
		
	// selectionnons le client...

	$row_cli = mysql_fetch_array($result);
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
	<title>visualisation de la commande</title>
	</head>
	<body onload=window.print();>
	
	<?
//panier

	$query = " SELECT * FROM commande ";
	$query .= " INNER JOIN ligne_commande ON ligne_commande.num_commande= commande.num_commande ";
	$query .= " WHERE commande.num_commande = '".$_GET["id"]."'";
		
	

	
	//echo $query ."<br>";
	$rstemp2 = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp2);
	

//fin panier .. pas de recalcul, pas de maj de qtité, tout est en dur!







// adresse et données de la COMMANDE !
$ChaineSQL = " SELECT * FROM commande ";
$ChaineSQL .= " INNER JOIN adresse ON adresse.num_adresse= commande.num_adresse ";
$ChaineSQL .= " INNER JOIN pays ON pays.num_pays = adresse.num_pays  INNER JOIN civilite ON civilite.num_civilite= adresse.num_civilite ";
$ChaineSQL .= " WHERE num_commande = '".$_GET["id"]."'";



$result = mysql_query($ChaineSQL);

$row2 = mysql_fetch_array($result);

?>
	
	<table cellpadding=0 cellspacing=0  width="100%"  border="0">
		<tr>
			<td class="td_normal">
				<table cellpadding=0 cellspacing=0  width="100%"  border="0">
		        		<tr>
		        			<td class="td_normal" width="30%">
		        				<p><img src="../images/logo_facture.gif"><br>
		        				Zac du sablar<br>
		        					25, all&eacute;e pampara</p>
		   					<p>40100 DAX</p>
		   					<p>T&eacute;l. : 05 58 74 14 27<br>
		   					Fax : 05 58 74 14 27</p>
		   					<p>Mode de paiement : 
		   					<?
		   					if($row_cli["mode_paiement"]==2)
		   					{
		   					?>
		   						carte bancaire
		   					<?
		   					}
		   					else
		   					{
		   					?>
		   						chèque
		   					<?
		   					}
		   					?>
		   					<br>
		   					Date d'&eacute;ch&eacute;ance : <?=formatdate($row_cli["date_commande"])?>
		   					</p>
						</td>
						<td class="td_normal" width=10>&nbsp;</td>
		        			<td class="td_normal" valign="top" width="69%">
		        				<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
		                        			<tr>
		                        				<td class="td_normal" align=center><b>FACTURE</b></td>
		                        			</tr>
		                        		</table>
							<br>
							<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
		                                		<tr>
		                                			<td class="td_normal" align=center>N&deg; facture </td>
		                                			<td class="td_normal" align=center> Date </td>
		                                			<td class="td_normal" align=center>Code client </td>
		                           			</tr>
		                                		<tr>
		                                			<td class="td_normal" align=center>
		                                			FC<?=Date("Y",strtotime($row_cli["date_commande"]))?><?=Date("m",strtotime($row_cli["date_commande"]))?><?=Date("d",strtotime($row_cli["date_commande"]))?><?=$row_cli["num_commande"]?>
		                                			</td>
		                                			<td class="td_normal" align=center><?=formatdate($row_cli["date_commande"])?></td>
		                                			<td class="td_normal" align=center>CL<?=$row_cli["num_client"]?></td>
		                           			</tr>
		                                	</table>
							<br>
						        				<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
		                                		<tr>
		                                			
		                                			<td align="center" class="td_normal">Adresse de facturation</td>
		                           				</tr>
		                                		<tr>
		                                			<td class="td_normal">
														<table width="100%"  border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="190">&nbsp;</td>
																<td class="td_normal">
																			<br>
																	<?=$row_cli["civilite"]?> <?=$row_cli["prenom_liv"]?> <?=$row_cli["nom_liv"]?><br>
																	<?
																	if ($row_cli["batiment"]!="")
																	{
																	?>
																		batiment <?=$row_cli["batiment"]?>&nbsp;
																	<?
																	}
																	?>
																	<?
																	if ($row2["porte"]!="")
																	{
																	?>	
																		porte <?=$row_cli["porte"]?>&nbsp;
																	<?
																	}
																	?>
																	<?
																	if ($row_cli["etage"]!="")
																	{
																	?>	
																		étage <?=$row_cli["etage"]?>&nbsp;
																	<?
																	}
																	?>
																	<?
																	if (($row_cli["etage"]!="") || ($row_cli["batiment"]!="") || ($row_cli["porte"]!=""))
																	{
																	?>
																	<br>
																	<?
																	}
																	?>
																	<?=$row_cli["adresse1"]?><br>
																	<?if ($row_cli["adresse2"]!=""){ echo($row_cli["adresse2"]."<br>");}?>
																	<br>
																	<?=$row_cli["cp"]?> <?=$row_cli["ville"]?> <?if ($row_cli["num_pays"] != 73) { echo("(".$row_cli["pays"]).")";}?>
																					<br>

																</td>
															</tr>
														</table>

		                                				
		                                			</td>
		                           			</tr>
		                                	</table>
						</td>
		   			</tr>
		        	</table>
		        	<br>
		        	<br>
			</td>
		</tr>
		<tr>
			<td class="td_normal">
				
				
				<table width="100%" border="0" align="left" cellpadding="10" >
			  <tr>
			    <td align="left" valign="top" id="texte3_blanc">
					<? if ($nb_enr>=1){ ?>
					  		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="B9133C" id="texte2">
							<tr align="left" valign="middle">
							  <td height="30" class="entete_panier">Désignation</td>
							  <td height="30" class="entete_panier">Taille</td>
							  <td height="30" class="entete_panier">Coloris</td>
							  <td height="30" class="entete_panier">Qté.</td>
							  <td height="30" class="entete_panier">Prix unitaire/&euro;</td>
							  <td height="30" class="entete_panier">Prix Total /&euro;</td>
							</tr>
							 <?  while ($row = mysql_fetch_array($rstemp2)) {
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
							  <td colspan="2" bgcolor="#FFFFFF"><b>Dont TVA 19,6%</b></td>
							  <?
							  // on ajoute les frais de port
							  $prix_total+=$row2["frais_port"];
							  $tva = $prix_total * 0.16387;
							  ?>
							  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($tva, 2, ',', ' ') ?></span></td>
							</tr>
							<tr align="left" valign="top"> 
							  <td bgcolor="#FFFFFF">&nbsp;</td>
							  <td bgcolor="#FFFFFF">&nbsp;</td>
							  <td bgcolor="#FFFFFF">&nbsp;</td>
							  <td colspan="2" bgcolor="#FFFFFF"><b>Total</b></td>
							  <?
							  // on ajoute les frais de port
							  //$prix_total+=$row2["frais_port"];
							  ?>
							  <td id="fond_rouge" align="right"><span id="texte2_blanc"><? echo number_format($prix_total, 2, ',', ' ') ?></span></td>
							</tr>
						  	</table>
						  	<br>
						<? }else{ ?>		
							
							<br>
							<br>
								<table width="100%" border="0" align="left" cellpadding="10" >
								  <tr>
								    <td align="left" valign="top" id="texte2">
									Votre Panier est vide.
								    </td>
								  </tr>
								</table>
						<? } ?>		  
						
						
			    
				</td>
			  </tr>
			</table>
				
				
			</td>
		</tr>
		<!--<tr>
			<td class="td_normal">
				<p>TVA non applicable<br>
				Article 239b du code des imp&ocirc;ts</p>
				<p>&nbsp;</p>
			</td>
		</tr>
		 <tr>
			<td class="td_normal">
				<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
					<tr>
						<td class="td_normal" align=center>% TVA </td>
						<td class="td_normal" align=center>BASE</td>
						<td class="td_normal" align=center>Montant TVA </td>
						<td class="td_normal" align=center>Total TVA </td>
						<td class="td_normal" align=center>Total TTC </td>
						<td class="td_normal" align=center>D&eacute;ja r&eacute;gl&eacute; TTC </td>
					</tr>
					<tr>
						<td class="td_normal" align=right>Exon&eacute;r&eacute;</td>
						<td class="td_normal" align=right><?=$prix_total?></td>
						<td class="td_normal" align=right>N/A</td>
						<td class="td_normal" align=right>0</td>
						<td class="td_normal" align=right><?=$prix_total?></td>
						<td class="td_normal" align=right><?=$prix_total?></td>
					</tr>
				</table>
			</td>
		</tr> -->
		<tr>
			<td class="td_normal">&nbsp;</td>
		</tr>
		<tr>
			<td class="td_normal">
				<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
					<tr>
						<td class="td_normal">Entreprise individuelle - SIRET 34803517100043 </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="td_normal">
				<br><p>Madame, Monsieur,<br>
				Nous vous remercions de votre commande et esp&eacute;rons qu'elle vous donnera toute satisfaction.
				</p>
			</td>
		</tr>
		<tr>
			<td class="td_normal">&nbsp;</td>
		</tr>
	</table>
	</body>
	</html>
	<?
	}
	
	
}

?>
<? include_once("../include/_connexion_fin.php"); ?>
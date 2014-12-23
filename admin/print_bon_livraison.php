<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); 

function formatdate($strdate) {
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}



if(!isset($_GET["id"])) {
?>
	<script language=javascript>
	<!--
		window.close();
	//-->
	</script>
<?
}
else {
	$ChaineSQL = "SELECT * FROM commande ";
	$ChaineSQL .= " INNER JOIN ligne_commande ON commande.num_commande = ligne_commande.num_commande ";
	$ChaineSQL .= " INNER JOIN client on client.num_client = commande.num_client ";
	$ChaineSQL .= " INNER JOIN adresse ON client.num_addresse_defaut = adresse.num_adresse ";
	$ChaineSQL .= " INNER JOIN civilite on civilite.num_civilite = client.num_civilite ";
	$ChaineSQL .= " WHERE commande.num_commande='". $_GET["id"] ."'";
	
	//echo ($ChaineSQL);
	
	$result=mysql_query($ChaineSQL);
		
	// selectionnons le client...

	$row_cli = mysql_fetch_array($result);
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
	<title>Bon de livraison</title>
	</head>
	<body onload=window.print();>
	<!--<body>-->
	
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
						</p>
					</td>
					<td class="td_normal" width=10>&nbsp;</td>
					<td class="td_normal" valign="top" width="69%">
						<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
						<tr>
							<td class="td_normal" align=center><b>Bon de livraison</b></td>
						</tr>
						</table>
						<br>
						
						<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
						<tr>
							<td class="td_normal" align=center>Code client </td>
							<td class="td_normal" align=center> Date </td>
						</tr>
						<tr>
							<td class="td_normal" align=center>CL<?=$row_cli["num_client"]?></td>
							<td class="td_normal" align=center><?=formatdate($row_cli["date_commande"])?></td>
						</tr>
						</table>
						<br>
						
						<table cellpadding=0 cellspacing=0  width="100%"  border="1" bordercolor="#000000">
						<tr>
							<td align="left" class="td_normal">Adresse de livraison</td>
						</tr>
						<tr>
							<td class="td_normal">
								<br>
								<?=$row2["civilite"]?> <?=$row2["prenom_liv"]?> <?=$row2["nom_liv"]?><br>
								<?
								if ($row2["batiment"]!="") {
								?>
								batiment <?=$row2["batiment"]?>&nbsp;
								<? 
								}
								if ($row2["porte"]!="") {
								?>	
								porte <?=$row2["porte"]?>&nbsp;
								<?
								}
								if ($row2["etage"]!="") {
								?>	
								tage <?=$row2["etage"]?>&nbsp;
								<?
								}
								if (($row2["etage"]!="") || ($row2["batiment"]!="") || ($row2["porte"]!="")) {
								?>
								<br>
								<? } ?>
								<?=$row2["adresse1"]?><br>
								<?if ($row2["adresse2"]!=""){ echo($row2["adresse2"]."<br>");}?>
								<br>
								<?=$row2["cp"]?> <?=$row2["ville"]?> <?if ($row2["num_pays"] != 73) { echo("(".$row2["pays"]).")";}?>
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
				<br><br>
			</td>
		</tr>
		<tr>
			<td class="td_normal">
				<table width="100%" border="0" align="left" cellpadding="10" >
			  <tr>
			    <td align="left" valign="top" id="texte3_blanc">
				  	<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="B9133C" id="texte2">
						<tr align="left" valign="middle">
						  <td height="30" class="entete_panier">Désignation</td>
						  <td height="30" class="entete_panier">Taille</td>
						  <td height="30" class="entete_panier">Coloris</td>
						  <td height="30" class="entete_panier">Qté.</td>
						</tr>
						
						<? while ($row = mysql_fetch_array($rstemp2)) { ?>
							<tr align="left" valign="top"><? //echo $row["lot"] ."  ". $row["quantite"] ?> 
							  <td bgcolor="#FFFFFF"><b><? echo $row["designation_produit"] ?></b></td>
							  <td bgcolor="#FFFFFF"><b><? echo $row["taille_produit"] ?></b></td>
							  <td bgcolor="#FFFFFF"><b><? echo $row["couleur"] ?></b></td>
							  <td bgcolor="#FFFFFF"><b><? echo $row["quantite"] ?></b></td>
							</tr>
						<? 
						}
						if ($row2["remise"] >0) {
							?>
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
					</td>
			  </tr>
			</table>
			</td>
		</tr>
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
<? } ?>
<? include_once("../include/_connexion_fin.php"); ?>
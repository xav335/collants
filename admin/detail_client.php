<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php"); ?>

<?
function formatdate($strdate) {
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}

// on teste les valeurs 
//test : si pas de post ou pas de session ...

if (!(isset($_GET["num_client"]))) {
?>
	<script language=javascript>
	<!--
		window.history.go(-1);
	//-->
	</script>
<?
}
else {
	
	// récupération des données passées en paramètres
	$maj = $_POST["maj"];
	$num_adresse = $_POST["num_adresse"];
	$civilite = $_POST["civilite"];
	$prenom_liv = $_POST["prenom_liv"];
	$nom_liv = $_POST["nom_liv"];
	$batiment = $_POST["batiment"];
	$porte = $_POST["porte"];
	$etage = $_POST["etage"];
	$adresse1 = $_POST["adresse1"];
	$adresse2 = $_POST["adresse2"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$pays = $_POST["pays"];
	$date_naissance = $_POST["date_naissance"];
	$email = $_POST["email"];
	$mdp = $_POST["mdp"];
	$tel = $_POST["tel"];
	$fax = $_POST["fax"];
	$gsm = $_POST["gsm"];
	
	// On met à jour la base
	if($maj != "") {
			
			// MAJ dela table "ADRESSE"
			$requete = "UPDATE adresse SET";
			$requete .= " num_civilite = " . $civilite . ",";
			$requete .= " nom_liv = '" . addslashes($nom_liv) . "',";
			$requete .= " prenom_liv = '" . addslashes($prenom_liv) . "',";
			$requete .= " batiment = '" . addslashes($batiment) . "',";
			$requete .= " porte = '" . addslashes($porte) . "',";
			$requete .= " etage = '" . addslashes($etage) . "',";
			$requete .= " adresse1 = '" . addslashes($adresse1) . "',";
			$requete .= " adresse2 = '" . addslashes($adresse2) . "',";
			$requete .= " cp = '" . addslashes($cp) . "',";
			$requete .= " ville = '" . addslashes($ville) . "',";
			$requete .= " num_pays = " . $pays . ",";
			$requete .= " tel = '" . addslashes($tel) . "',";
			$requete .= " fax = '" . addslashes($fax) . "',";
			$requete .= " gsm = '" . addslashes($gsm) . "',";
			$requete .= " email = '" . addslashes($email) . "'";
			$requete .= " WHERE num_adresse=" . $num_adresse;
			//echo $requete . "<br>";
			mysql_query($requete);
			
			// MAJ de la table "CLIENT"
			if($mdp != "") {
				$requete = "UPDATE client SET";
				$requete .= " num_civilite = " . $civilite . ",";
				$requete .= " nom = '" . addslashes($nom_liv) . "',";
				$requete .= " prenom = '" . addslashes($prenom_liv) . "',";
				$requete .= " date_naissance = '" . addslashes($date_naissance) . "',";
				$requete .= " email = '" . addslashes($email) . "',";
				$requete .= " mdp = '" . addslashes($mdp) . "'";
				$requete .= " WHERE num_client=" . $_GET["num_client"];
				//echo $requete . "<br>";
				mysql_query($requete);
			}
	}
	
	$ChaineSQL = "SELECT * FROM client ";
	$ChaineSQL.= " INNER JOIN civilite ON civilite.num_civilite = client.num_civilite ";
	$ChaineSQL.= " WHERE client.num_client = '".$_GET["num_client"]."'";
	//echo $ChaineSQL;
	$result = mysql_query($ChaineSQL);
	
	if(mysql_num_rows($result) != 1 ) {
	?>
		<script language=javascript>
		<!--
			window.history.go(-1);
		//-->
		</script>	
	<?
	}
	else {
		$row=mysql_fetch_array($result);
	}
}
	
	// Liste des civilités disponibles
	$requete_civilite = "SELECT * FROM civilite ORDER BY num_civilite";
	$liste_civilite = mysql_query($requete_civilite);
	
	// Liste des commandes pour le client sélectionné
	$requete = "SELECT * FROM commande";
	$requete .= " INNER JOIN client ON client.num_client=commande.num_client";
	$requete .= " WHERE client.num_client = '".$_GET["num_client"]."'";
	$requete .= " ORDER BY date_commande DESC, heure_commande DESC";
	//echo $requete . "<br>";
	$liste_commande = mysql_query($requete);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
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
	
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	
	function trim(sString) {
		while (sString.substring(0,1) == ' ') {
			sString = sString.substring(1, sString.length);
		}
		while (sString.substring(sString.length-1, sString.length) == ' '){
			sString = sString.substring(0,sString.length-1);
		}
		return sString;
	}
	
	function modifier_adresse_principale() {
		var erreur = 0;
		
		if (trim(document.formulaire_principal.nom_liv.value) == "") {
			erreur = 1;
			alert("Le nom est oblidatoire");
			document.formulaire_principal.nom_liv.focus();
		}
		
		else if (trim(document.formulaire_principal.prenom_liv.value) == "") {
			erreur = 1;
			alert("Le prénom est oblidatoire");
			document.formulaire_principal.prenom_liv.focus();
		}
		
		else if (trim(document.formulaire_principal.adresse1.value) == "") {
			erreur = 1;
			alert("L'adresse est oblidatoire");
			document.formulaire_principal.adresse1.focus();
		}
		
		else if (trim(document.formulaire_principal.cp.value) == "") {
			erreur = 1;
			alert("Le code postal est oblidatoire");
			document.formulaire_principal.cp.focus();
		}
		
		else if (trim(document.formulaire_principal.ville.value) == "") {
			erreur = 1;
			alert("La ville est oblidatoire");
			document.formulaire_principal.ville.focus();
		}
		
		else if (trim(document.formulaire_principal.email.value) == "") {
			erreur = 1;
			alert("L'adresse électronique est oblidatoire");
			document.formulaire_principal.email.focus();
		}
		
		if (erreur == 0) {
				//alert("On poste");
				document.formulaire_principal.maj.value = "maj";
				document.formulaire_principal.submit();
		}
	}
	
	function modifier_autre_adresse(num) {
		var erreur = 0;
		formulaire = eval("document.formulaire_autre_" + num);
		
		if (trim(formulaire.nom_liv.value) == "") {
			erreur = 1;
			alert("Le nom est oblidatoire");
			formulaire.nom_liv.focus();
		}
		
		else if (trim(formulaire.prenom_liv.value) == "") {
			erreur = 1;
			alert("Le prénom est oblidatoire");
			formulaire.prenom_liv.focus();
		}
		
		else if (trim(formulaire.adresse1.value) == "") {
			erreur = 1;
			alert("L'adresse est oblidatoire");
			formulaire.adresse1.focus();
		}
		
		else if (trim(formulaire.cp.value) == "") {
			erreur = 1;
			alert("Le code postal est oblidatoire");
			formulaire.cp.focus();
		}
		
		else if (trim(formulaire.ville.value) == "") {
			erreur = 1;
			alert("La ville est oblidatoire");
			formulaire.ville.focus();
		}
		
		else if (trim(formulaire.email.value) == "") {
			erreur = 1;
			alert("L'adresse électronique est oblidatoire");
			formulaire.email.focus();
		}
		
		if (erreur == 0) {
				//alert("On poste");
				formulaire.maj.value = "maj";
				formulaire.submit();
		}
	}
//-->
</script>
</head>
<body id="fond_gris"  onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif')" border="0">

<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td  id="texte3" align=center><?=$row["civilite"]?>&nbsp;<?=$row["prenom"]?>&nbsp;<?=$row["nom"]?></td>
	</tr>
	<tr>
		<td align="center" id="texte3"><br> <img src="../images/pixel_rouge.jpg" width="100%" height="1"></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td  id="texte3" align=center>Adresse de livraison principale</td>
	</tr>
	
	<tr>
		<td>
		
		<?
		$requete = "SELECT * FROM adresse";
		$requete .= " INNER JOIN pays ON pays.num_pays = adresse.num_pays";
		$requete .= " INNER JOIN civilite ON civilite.num_civilite = adresse.num_civilite";
		$requete .= " WHERE num_adresse = '" . $row["num_addresse_defaut"] . "'";
		$result=mysql_query($requete);
		
		if (mysql_num_rows($result) ==0) {
			echo "Vous n'avez pas défini d'adresse de livraison principale";
		}
		else {
			$row2 =  mysql_fetch_array($result);
			?>
			<br><br>
			<form name="formulaire_principal" action="detail_client.php?num_client=<?=$_GET["num_client"]?>" method="POST">
				<input type="hidden" name="maj">
				<input type="hidden" name="num_adresse" value="<?=$row2["num_adresse"]?>">
				
				<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td>Nom : </td>
					<td>
						<select name="civilite">
							<? while($data=mysql_fetch_array($liste_civilite)) { ?>
								<option value="<?=$data["num_civilite"]?>" <? if ($data["num_civilite"] == $row2["num_civilite"]) { ?> selected <? } ?>><?=$data["civilite"]?></option>
							<? } ?>
						</select>
						&nbsp;
						<input type="text" name="prenom_liv" value="<?=$row2["prenom_liv"]?>">&nbsp;<input type="text" name="nom_liv" value="<?=$row2["nom_liv"]?>">
					</td>
				</tr>
				<tr>
					<td>Batiment :</td>
					<td>
						<? if ($row2["batiment"]!="") { $batiment = $row2["batiment"];}?>
						<input type="text" name="batiment" value="<?=$batiment?>" size="10" maxlength="10">
					</td>
				</tr>
				<tr>
					<td>Porte :</td>
					<td>
						<? if ($row2["porte"]!="") { $porte = $row2["porte"];}?>
						<input type="text" name="porte" value="<?=$porte?>" size="10" maxlength="10">
					</td>
				</tr>
				<tr>
					<td>Etage :</td>
					<td>
						<? if ($row2["etage"]!="") { $etage = $row2["etage"];}?>
						<input type="text" name="etage" value="<?=$etage?>" size="10" maxlength="10">
					</td>
				</tr>
				<tr>
					<td>Adresse :</td>
					<td>
						<input type="text" name="adresse1" value="<?=$row2["adresse1"]?>" size="50" maxlength="150">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<? if ($row2["adresse2"]!="") { $adresse2 = $row2["adresse2"];}?>
						<input type="text" name="adresse2" value="<?=$adresse2?>" size="50" maxlength="100">
					</td>
				</tr>
				<tr>
					<td>Code postal :</td>
					<td><input type="text" name="cp" value="<?=$row2["cp"]?>" size="10" maxlength="10"></td>
				</tr>
				<tr>
					<td>Ville :</td>
					<td><input type="text" name="ville" value="<?=$row2["ville"]?>" size="30" maxlength="60"></td>
				</tr>
				<tr>
					<td>Pays :</td>
					<td>
						<?
						$requete = "SELECT * FROM pays ORDER BY num_pays";
						$valeur = mysql_query($requete);
						?>
						<select name="pays">
							<? while($data=mysql_fetch_array($valeur)) { ?>
								<option value="<?=$data["num_pays"]?>" <? if ($data["num_pays"] == $row2["num_pays"]) { ?>selected <? } ?>><?=$data["pays"]?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Date de naissance :</td>
					<td><input type="text" name="date_naissance" value="<?=format_date_anniversaire($row["date_naissance"])?>" size="10" maxlength="10">
				</tr>
				<tr>
					<td>Email :</td>
					<td><input type="text" name="email" value="<?=$row["email"]?>" size="50" maxlength="100">
				</tr>	
				<tr>
					<td>Mot de passe :</td>
					<td><input type="text" name="mdp" value="<?=$row["mdp"]?>" size="20" maxlength="20">
				</tr>
				<tr>
					<td>Tel  :</td>
					<td><input type="text" name="tel" value="<?=$row2["tel"]?>" size="15" maxlength="15">
				</tr>
				<tr>
					<td>Fax  :</td>
					<td><input type="text" name="fax" value="<?=$row2["fax"]?>" size="15" maxlength="15">
				</tr>
				<tr>
					<td>Gsm  :</td>
					<td><input type="text" name="gsm" value="<?=$row2["gsm"]?>" size="15" maxlength="15">
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="button" name="modifier" value="Modifier" onClick="javascript:modifier_adresse_principale();">
				</tr>
				</table>
			</form>
		<?
		}
		?>
		</td>
	</tr>
	
	<?
	$requete = "SELECT * FROM adresse";
	$requete .= " INNER JOIN pays ON pays.num_pays = adresse.num_pays";
	$requete .= " INNER JOIN civilite ON civilite.num_civilite = adresse.num_civilite";
	$requete .= " WHERE num_client='" . $row["num_client"] . "'";
	$requete .= " AND num_adresse !='" . $row2["num_adresse"] . "'";
	$result = mysql_query($requete);
	
	if (mysql_num_rows($result)!=0) {
	?>
		<tr>
			<td align=center>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="100%" height="1"></td>
		</tr>
		<tr>
			<td align=center>&nbsp;</td>
		</tr>
		<tr>
			<td  id="texte3" align=center>Autres adresses de livraison</td>
		</tr>
		
		<?
		$i=0;
		while($row3 = mysql_fetch_array($result)) {
			
			// On relance la requete pour avoir la listes des civilités
			$liste_civilite = mysql_query($requete_civilite);
			
			$i++;
			if ($i>1) {
			?>
				<tr>
					<td align="center" id="texte3_blanc"><br><img src="../images/pixel_rouge.jpg" width="40%" height="1"></td>
				</tr>
			<? } ?>
			<tr>
				<td>
					<br><br>
					
					<form name="formulaire_autre_<?=$i?>" action="detail_client.php?num_client=<?=$_GET["num_client"]?>" method="POST">
						<input type="hidden" name="maj">
						<input type="hidden" name="num_adresse" value="<?=$row3["num_adresse"]?>">
						
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr>
							<td>Nom : </td>
							<td>
								<select name="civilite">
									<? while($data=mysql_fetch_array($liste_civilite)) { ?>
										<option value="<?=$data["num_civilite"]?>" <? if ($data["num_civilite"] == $row2["num_civilite"]) { ?> selected <? } ?>><?=$data["civilite"]?></option>
									<? } ?>
								</select>
								&nbsp;
								<input type="text" name="prenom_liv" value="<?=$row3["prenom_liv"]?>">&nbsp;<input type="text" name="nom_liv" value="<?=$row3["nom_liv"]?>">
							</td>
						</tr>
						<tr>
							<td>Batiment :</td>
							<td>
								<? if ($row3["batiment"]!="") { $batiment = $row3["batiment"];}?>
								<input type="text" name="batiment_ value="<?=$batiment?>" size="10" maxlength="10">
							</td>
						</tr>
						<tr>
							<td>Porte :</td>
							<td>
								<? if ($row3["porte"]!="") { $porte = $row3["porte"];}?>
								<input type="text" name="porte" value="<?=$porte?>" size="10" maxlength="10">
							</td>
						</tr>
						<tr>
							<td>Etage :</td>
							<td>
								<? if ($row3["etage"]!="") { $etage = $row3["etage"];}?>
								<input type="text" name="etage" value="<?=$etage?>" size="10" maxlength="10">
							</td>
						</tr>
						<tr>
							<td>Adresse :</td>
							<td>
								<input type="text" name="adresse1" value="<?=$row3["adresse1"]?>" size="50" maxlength="150">
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<? if ($row3["adresse2"]!="") { $adresse2 = $row3["adresse2"];}?>
								<input type="text" name="adresse2" value="<?=$adresse2?>" size="50" maxlength="100">
							</td>
						</tr>
						<tr>
							<td>Code postal :</td>
							<td><input type="text" name="cp" value="<?=$row3["cp"]?>" size="10" maxlength="10"></td>
						</tr>
						<tr>
							<td>Ville :</td>
							<td><input type="text" name="ville" value="<?=$row3["ville"]?>" size="30" maxlength="60"></td>
						</tr>
						<tr>
							<td>Pays :</td>
							<td>
								<?
								$requete = "SELECT * FROM pays ORDER BY num_pays";
								$valeur = mysql_query($requete);
								?>
								<select name="pays">
									<? while($data=mysql_fetch_array($valeur)) { ?>
										<option value="<?=$data["num_pays"]?>" <? if ($data["num_pays"] == $row3["num_pays"]) { ?>selected <? } ?>><?=$data["pays"]?></option>
									<? } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Email :</td>
							<td><input type="text" name="email" value="<?=$row3["email"]?>" size="50" maxlength="100">
						</tr>	
						<tr>
							<td>Tel  :</td>
							<td><input type="text" name="tel" value="<?=$row3["tel"]?>" size="15" maxlength="15">
						</tr>
						<tr>
							<td>Fax  :</td>
							<td><input type="text" name="fax" value="<?=$row3["fax"]?>" size="15" maxlength="15">
						</tr>
						<tr>
							<td>Gsm  :</td>
							<td><input type="text" name="gsm" value="<?=$row3["gsm"]?>" size="15" maxlength="15">
						</tr>
						<tr>
							<td colspan="2" align="right"><input type="button" name="modifier_<?=$i?>" value="Modifier" onClick="javascript:modifier_autre_adresse(<?=$i?>);">
						</tr>
						</table>
					</form>
				</td>
			</tr>
		<? } ?>
		
		<tr>
			<td align=center>&nbsp;</td>
		</tr>
	<? } ?>
	
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td  id="texte3" align=center>Historique des commandes :</td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<table border=1 cellpadding=0 cellspacing=0 width=100%>
			<? 
			// Affichage de l'historique des commandes du client sélectionné
			if (mysql_num_rows($liste_commande)!=0) {
			?>
				<tr bordercolor="B9133C"> 
		          <td align=center id="texte2">&nbsp;Numéro commande&nbsp;</td>
		          <td align=center id="texte2">&nbsp;Date commande&nbsp;</td>
		          <td align=center id="texte2">&nbsp;Mode de paiement&nbsp;</td>
		          <td align=center id="texte2">&nbsp;Statut paiement&nbsp;</td>
		          <td align=center id="texte2">&nbsp;Statut commande&nbsp;</td>
		          <td align=center id="texte2">&nbsp;Commande&nbsp;</td>
					 <td align=center id="texte2">&nbsp;Facture&nbsp;</td>
		    </tr>
				<?
				// Affichage de tous les enregistrements
				while($data = mysql_fetch_array($liste_commande)) {
				?>
					<tr valign="middle"> 
						<td height=30 align="center" id=texte2><?=$data["num_commande"]?></td>
						<td align="center" id=texte2>
							<?=formatdate($data["date_commande"])?>
							<div align="center">&nbsp;<?=$data["heure_commande"]?></div>
						</td>
						
						<? if ($data["mode_paiement"]==1) { ?>
							<td align="center" id=texte2><div align="center">Chèque bancaire</div></td>
						<?
						}
						else {
						?>
							<td align="center" id=texte2><div align="center">CB en ligne</div></td>
						<? 
						}
		
						switch($data["statut_paiement"]) {
							case 1 :
							?>
								<td align="center" id=texte2><div align="center">payé</div></td>
								<?
								break;
							case 2 :
							?>
								<td align="center" id=texte2><div align="center">en attente</div></td>
								<?
								break;
							case 3 :
							?>
								<td align="center" id=texte2><div align="center">refusé</div></td>
								<?
								break;
							default : 
							?>
								<td align="center" id=texte2><div align="center">refusé</div></td>
								<?
								break;
						}
						
						switch($data["statut_commande"]) {
							case 1 :
							?>
								<td align="center" id=texte2><div align="center">en préparation</div></td>
								<?
								break;
							case 2 :
							?>
								<td align="center" id=texte2>
									<div align="center">
										envoyée : numéro collisimo : <a href="http://www.coliposte.net/particulier/suivi_particulier.jsp?colispart=<?=$data["num_colissimo"]?>" target="_blank"><b><?=$data["num_colissimo"]?></b></a>
									</div>
								</td>
								<?
								break;
							case 3 :
							?>
								<td align="center" id=texte2><div align="center">refusé</div></td>
								<?
								break;
							default : 
							?>
								<td align="center" id=texte2><div align="center">refusé</div></td>
								<?
								break;
						}
						?>
					
						<td align=center id=texte2><div align="center"><a href="javascript:MM_openBrWindow('print_commande.php?id=<?=$data["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Imprimer</a></div></td>
						<td align=center id=texte2><div align="center"><a href="javascript:MM_openBrWindow('print_commande_client.php?id=<?=$data["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Imprimer</a></div></td>
					</tr>
				<?
				}
			}
			else {
				?>
				<tr>
					<td align="center">Aucune commande enregistrée</td>
				</tr>
			<? } ?>
		</table>
	</td>
</tr>
</table>
</body>
</html>

<?php include_once("../include/_connexion_fin.php"); ?>
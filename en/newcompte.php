<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?
$query  = "SELECT num_client FROM client WHERE client.email='". $_POST["email"] ."'";
$result = mysql_query($query);
$nb_enr = mysql_num_rows($result);
if ($nb_enr>0){
?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<link href="include/collants_styles.css" rel="stylesheet" type="text/css">
		</script>
		</head>
		<body background="/fr/images/fond_collants.gif" bgproperties="fixed" id="fond_rose" border="0">
		<table width="100%" border="0" cellspacing="0" cellpadding="15">
		  <tr>
			<td>
			  Your account already exists in our customer base.<br> <br>
			  If you lost your password, <br> <br> <a target=_self href="lost_pass.php">click 
			  here</a> for receiving it by e-mail</td>
		  </tr>
		</table>
		</body>
		</html>

<?
}else{
		if (isset($_POST["newsletter"])){
			$maintenant = date("Y-m-d H\:i\:s\ ");
			$query  = "SELECT num_mailing FROM mailing WHERE mail='". $_POST["email"] ."'";
			$result = mysql_query($query);
			$nb_enr = mysql_num_rows($result);
			
			if ($nb_enr >0){
				while ($row = mysql_fetch_array($result)) { 
					$num_mailing = $row["num_mailing"];
				}
				$query  = "UPDATE mailing ";
				$query .= "Set nom='". $_POST["nom"] ."' " ;
				$query .= ", prenom='". $_POST["prenom"] ."' " ;
				$query .= ", num_civilite=". $_POST["civilite"] ." " ;
				$query .= ", date_creation='". $maintenant ."' " ;
				$query .= ", actif=1";
				$query .= " WHERE num_mailing=". $num_mailing ;
				//echo $query ."<br>";
				$rstemp = mysql_query($query);
			}else{
				$query  = "INSERT INTO mailing (nom, prenom, num_civilite, mail, date_creation, actif) VALUES (";
				$query .= "'  ". $_POST["nom"] ."' " ;
				$query .= ", '". $_POST["prenom"] ."' " ;
				$query .= ", ". $_POST["civilite"] ." " ;
				$query .= ", '". $_POST["email"] ."' " ;
				$query .= ", '". $maintenant  ."' " ;
				$query .= ",1 " ;
				$query .= ")";
				//echo $query ."<br>";
				$rstemp = mysql_query($query);
			}
		}
		
		//enregistrement des données clients.
		$ChaineSQL = "INSERT INTO client (num_addresse_defaut, num_civilite, email, mdp, nom, prenom, date_naissance, date_creation, actif)";
		$ChaineSQL .= "VALUES  ('0', '".$_POST["civilite"]."', '".$_POST["email"]."', '".$_POST["pwd"]."', '".$_POST["nom"]."', '".$_POST["prenom"]."', '".$_POST["an"]."-".$_POST["mois"]."-".$_POST["jour"]."', '".Date("Y-m-d")."', '1' )";
		
		$result=mysql_query($ChaineSQL);
		$id_client=@mysql_insert_id($mysql_link);
		
		
		$ChaineSQL = "INSERT INTO adresse (num_client, num_civilite, nom_liv, prenom_liv, batiment, porte, etage, adresse1, adresse2, cp, ville, region, num_pays, tel, fax, gsm, email)";
		$ChaineSQL .= " VALUES ('".$id_client."','".$_POST["civilite"]."','".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["batiment"]."','".$_POST["numporte"]."','".$_POST["etage"]."','".$_POST["adresse1"]."','".$_POST["adresse2"]."','".$_POST["cp"]."','".$_POST["ville"]."','','".$_POST["pays"]."','".$_POST["tel"]."','".$_POST["fax"]."','".$_POST["gsm"]."','".$_POST["email"]."')";
		
		$result2=mysql_query($ChaineSQL);
		
		
		
		$id_adresse=@mysql_insert_id($mysql_link);
		
		
		
		$ChaineSQL = "UPDATE client SET num_addresse_defaut='".$id_adresse."' WHERE num_client='".$id_client."'";
		
		$result3 = mysql_query($ChaineSQL);
		
		
		
		
		
		// on logge le client et on lui signifie sont login / mot de passe par email
		
		// avec un lien pour valider le panier
		
		
		
		
		
		//identification client
		
		
		
		$_SESSION["num_client"] = $id_client;
		
		$_SESSION["num_adresse"] = $id_adresse;
		
		
		
		
		
		
		
		//envoi du mot de passe par email
		
		
		
		//on envoi un mail
		
				include("../include/libmail.php");
		
				$mail=new Mail;
		
				$mail->AutoCheck(false);
		
				$mail->From("contact@collants.fr");
		
				$mail->To ($_POST["email"]);
		
				$mail->Subject("Site collants.fr - vos identifiants");
		
				$message="Vos identifiants pour le site collants.fr\n\n";
		
			
		
			
		
				$message.="Cher client.\n\n";
		
				$message.="Nous avons enregistré votre inscription sur le site collants.fr\n\n";
		
				$message.="Voici vos identifiants et mot de passe qui vous permettront de vous connecter sur notre site.\n\n";
		
				$message.="identifiant : ".$_POST['email']."\n\n";
		
				$message.="Mot de passe : ".$_POST["pwd"]."\n\n";
		
				$message.="Nous espérons vous revoir très bientot sur le site.\n\n";
		
				$message.="Cordialement, \n\n";
		
				$message.="L'equipe commerciale de collants.fr.\n\n";
		
				$mail->Body($message,"iso-8859-15");
		
				$mail->Format("text");
		
				$mail->Priority(1);
		
				$mail->Send();
		
				$mail->Get();
		
		
		
		
		
		
		
		
		
		
		
		?>
		
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		
		<html>
		
		<head>
		
		<link href="include/collants_styles.css" rel="stylesheet" type="text/css">
		
		
		
		</script>
		
		</head>
		
		<body background="/fr/images/fond_collants.gif" bgproperties="fixed" id="fond_rose" border="0">
		<table width="100%" border="0" cellspacing="0" cellpadding="15">
		  <tr>
			<td>Félicitations!<br> <br>
			  Votre compte a été créé.<br> <br>
			  Votre login et votre mot de passe ont été envoyés par e-mail.<br> <br> <a target=_self href="commande_2.php">Cliquez 
			  ici pour valider votre commande</a> </td>
		  </tr>
		</table>
		</body>
		
		</html>
<? } ?>
<?php include_once("../include/_connexion_fin.php"); ?>
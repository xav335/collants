<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?php

include("../include/libmail.php");


/*
echo "chaine querystring : " . $HTTP_SERVER_VARS["QUERY_STRING"] ."<br><br>";
*/



/*
 l'autoresponse doit : 
 
 - envoyer un mail de confirmation / d'infirmation a l'internaute -- [ok]
 - envoyer un mail de confirmation / d'infirmation a collants -- [ok]
 - changer l'etat de la commande -- [ok]
 - décrémenter le stock si necessaire -- [ok]
 - vider le panier dans tous les cas -- [ok]
 
 */
 
 

// recup du num_commande...




$tab_num_commande = split("_",$_GET["reference"]);
if (sizeof($tab_num_commande) == 2)
{
	$num_commande = $tab_num_commande[sizeof($tab_num_commande)-1];
}
else
{
	$num_commande = 0; // comme ca on ne trouvera pas de commande et on n'aura pas d'erreur..
}


$query .="INSERT INTO bidon (bidon, num_commande)  VALUES ('". urldecode($HTTP_SERVER_VARS["QUERY_STRING"]) ."','".$num_commande."')";	
$rstemp = mysql_query($query);




// vider le panier dans tous les cas!!!

$ChaineSQL = "SELECT num_session FROM commande WHERE num_commande = '".$num_commande."'";
$result= mysql_query($ChaineSQL);
if (mysql_num_rows($result) !=0)
{
	$row=mysql_fetch_array($result);
	$ChaineSQL = "DELETE FROM panier WHERE num_session='".$row["num_session"]."'";
	$result=mysql_query($ChaineSQL);

}



 //if ($_GET["etat"] == 1 || $_GET["etat"] == 4) 
 if ($_GET["etat"] == 1 || $_GET["etat"] == 99) // en production et test 99 actif
 //if ($_GET["etat"] == 1) // en production
 {
	//paiement accepté ??!! voir codes retour page 28 du doc!!
	
	// décrémentons le sotck...

	$ChaineSQL = "SELECT sous_reference_produit, quantite FROM ligne_commande WHERE num_commande = '".$num_commande."'";
	$result = mysql_query($ChaineSQL);

	while($row=mysql_fetch_array($result))
	{
		$ChaineSQL = "UPDATE produit_sousref SET stock = stock-".$row["quantite"]." WHERE sous_reference='".addslashes($row["sous_reference_produit"])."'";
		$mon_update = mysql_query($ChaineSQL);	
	}
	
	// changeons l'etat commande en payé!

	$ChaineSQL = "UPDATE commande SET statut_paiement=1 WHERE num_commande = '".$num_commande."'";
	$result=mysql_query($ChaineSQL);
	
	
	// envoi des emails...
	// client
	$ChaineSQL = "SELECT email  FROM client ";
	$ChaineSQL .= " INNER JOIN commande ON commande.num_client = client.num_client";
	$ChaineSQL .= " WHERE num_commande = '".$num_commande."'";
	
	$result=mysql_query($ChaineSQL);
	if (mysql_num_rows($result) !=0)
	{
		$row=mysql_fetch_array($result);
	
		$message ="";
		
		$mail=new Mail;
		$mail->AutoCheck(false);
		$mail->From("contact@collants.fr");
		$mail->To ($row["email"]);
		$mail->Subject("Site collants.fr - votre commande");
		$message.="Cher client.\n\n";
		$message.="Votre paiement a été accepté.\n\n";
		$message.="Vous recevrez votre commande tres prochainement.\n\n";
		$message.="Vous pouvez à tout moment contrôler l'état de votre commande (préparation, expédition) sur le site Collants.fr dans la rubrique mes infos.\n\n";
		$message.="sur http://www.collants.fr/fr/mesinfos.php \n\n";
		$message.="Votre commande est enregistrée sous la référence n° ".$num_commande."\n\n";
		$message.="Nous espérons vous revoir très bientot sur le site collants.fr.\n\n";
		$message.="Cordialement, \n\n";
		$message.="L'equipe commerciale de collants.fr.\n\n";
		$mail->Body($message,"iso-8859-15");
		$mail->Format("text");
		$mail->Priority(1);
		$mail->Send();
		$mail->Get();
	}
	// collants
	$mail=new Mail;
	$mail->AutoCheck(false);
	$mail->From("contact@collants.fr");
	//$mail->To ("collants@collants.fr");
	$to = array("contact@collants.fr", "admin@planetereseau.com");
	//$to = array("contact@collants.fr");
	$mail->To ($to);
	if ($_GET["etat"] == 99){
		$mail->Subject("Site collants.fr - nouvelle commande TEST  TEST ");
	}else{
		$mail->Subject("Site collants.fr - nouvelle commande");
	}
	$message ="";
	$message.="La commande n° ".$num_commande." a été payée en ligne par l'internaute. Le paiement a été accepté.\n\n";
	$mail->Body($message,"iso-8859-15");
	$mail->Format("text");
	$mail->Priority(1);
	$mail->Send();
	$mail->Get();
	
	
	
}
if ($_GET["etat"] == 2) 
{
// changeons l'etat commande en paiement refusé!

$ChaineSQL = "UPDATE commande SET statut_paiement=3 WHERE num_commande = '".$num_commande."'";
$result=mysql_query($ChaineSQL);

// envoi des emails...
	// client
	$ChaineSQL = "SELECT email  FROM client ";
	$ChaineSQL .= " INNER JOIN commande ON commande.num_client = client.num_client";
	$ChaineSQL .= " WHERE num_commande = '".$num_commande."'";
	
	$result=mysql_query($ChaineSQL);
	if (mysql_num_rows($result) !=0)
	{
		$row=mysql_fetch_array($result);	
		$mail=new Mail;
		$mail->AutoCheck(false);
		$mail->From("contact@collants.fr");
		$mail->To ($row["email"]);
		$mail->Subject("Site collants.fr - votre commande");
		
		$message ="";
		
		$message.="Cher client.\n\n";
		$message.="Votre paiement a été refusé.\n\n";
		$message.="Votre commande est enregistrée sous la référence n° ".$num_commande."\n\n";
		$message.="Si vous souhaitez recevoir votre commande, contactez nous à l'adresse suivante : \n\n";
		$message.="collants.fr, zac du sablar, 25 allée pampara, 40100 dax France.\n\n";
		$message.="Ou par email à l'adresse : \n\n";
		$message.="collants@collants.fr \n\n";
		$message.="Nous espérons vous revoir très bientot sur le site collants.fr.\n\n";
		$message.="Cordialement, \n\n";
		$message.="L'equipe commerciale de collants.fr.\n\n";
		$mail->Body($message,"iso-8859-15");
		$mail->Format("text");
		$mail->Priority(1);
		$mail->Send();
		$mail->Get();
	}
	// collants
	$mail=new Mail;
	$mail->AutoCheck(false);
	$mail->From("contact@collants.fr");
	//$mail->To ("collants@collants.fr");
	$to = array("contact@collants.fr", "admin@planetereseau.com");
	//$to = array("contact@collants.fr");
	$mail->To ($to);
	$mail->Subject("Site collants.fr - nouvelle commande");
	
	$message ="";
	
	$message.="Le paiement pour la commande n° ".$num_commande." a été refusé.\n\n";
	$mail->Body($message,"iso-8859-15");
	$mail->Format("text");
	$mail->Priority(1);
	$mail->Send();
	$mail->Get();
}
	
	
	
	
	
	
echo "spcheckok";
	
?>	
<?php include_once("../include/_connexion_fin.php"); ?>
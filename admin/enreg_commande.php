<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); 


include("../include/libmail.php");

if(!isset($_POST["id"]))
{
	header("Location: commandes_liste.php");
}
else
{
	$ChaineSQL = "SELECT statut_paiement, statut_commande FROM commande WHERE num_commande='".$_POST["id"]."'";
	$result = mysql_query($ChaineSQL);
	
	if (mysql_num_rows($result)!=0)
	{
		$row=mysql_fetch_array($result);
		$old_statut_paiement = $row["statut_paiement"];
		$old_statut_commande = $row["statut_commande"];
	}
	else
	{
		// commande non trouv�e.. etrange..
		$old_statut_paiement = 0;
		$old_statut_commande = 0;
	}
	
	
	
	$ChaineSQL = "UPDATE commande SET statut_paiement='".$_POST["statut_paiement"]."', statut_commande='".$_POST["statut_commande"]."', num_colissimo='".$_POST["num_colissimo"]."' WHERE num_commande='".$_POST["id"]."'";

	//echo $ChaineSQL;
	$result = mysql_query($ChaineSQL);
	
	// si le statut commande passe a pay�e, il faut d�cr�menter le stock....
	
	if (($_POST["statut_paiement"]==1) && ($_POST["statut_paiement"]!=$old_statut_paiement))
	{
		$ChaineSQL = "SELECT sous_reference_produit, quantite FROM ligne_commande WHERE num_commande= '".$_POST["id"]."'";
		
		$result=mysql_query($ChaineSQL);
		
		
		while($row=mysql_fetch_array($result))
		{
			$ChaineSQL = "UPDATE produit_sousref SET stock = stock-".$row["quantite"]." WHERE sous_reference='".$row["sous_reference_produit"]."'";
			$mon_update = mysql_query($ChaineSQL);	
		}
		// il faut �galement envoyer les mails...
		
		// envoi des emails...
		// client
		$ChaineSQL = "SELECT email  FROM client ";
		$ChaineSQL .= " INNER JOIN commande ON commande.num_client = client.num_client";
		$ChaineSQL .= " WHERE num_commande = '".$_POST["id"]."'";
		
		$result=mysql_query($ChaineSQL);
		if (mysql_num_rows($result) !=0)
		{
			$row=mysql_fetch_array($result);
		
		
			
			$mail=new Mail;
			$mail->AutoCheck(false);
			$mail->From("contact@collants.fr");
			$mail->To ($row["email"]);
			$mail->Subject("Site collants.fr - votre commande");
			$message.="Cher client.\n\n";
			$message.="Votre paiement a �t� accept�.\n\n";
			$message.="Vous recevrez votre commande tres prochainement.\n\n";
			$message.="Vous pouvez a tout moment controller l'�tat de votre commande (pr�paration, exp�dition) sur le site Collants.fr dans la rubrique mes infos\n\n";
			$message.="http://www.collant.fr/fr/mesinfos.php \n\n";
			$message.="Votre commande est enregistr�e sous la r�f�rence n� ".$_POST["id"]."\n\n";
			$message.="Nous esp�rons vous revoir tr�s bientot sur le site collants.fr.\n\n";
			$message.="Cordialement, \n\n";
			$message.="L'equipe commerciale de collants.fr.\n\n";
			$mail->Body($message,"iso-8859-15");
			$mail->Format("text");
			$mail->Priority(1);
			$mail->Send();
			$mail->Get();
		}
	}
	
	// si le paiement est refus� il faut �galement envoyer un mail
	if ($_POST["statut_paiement"]==3)
	{
		// client
		$ChaineSQL = "SELECT email  FROM client ";
		$ChaineSQL .= " INNER JOIN commande ON commande.num_client = client.num_client";
		$ChaineSQL .= " WHERE num_commande = '".$_POST["id"]."'";
		
		$result=mysql_query($ChaineSQL);
		if (mysql_num_rows($result) !=0)
		{
			$row=mysql_fetch_array($result);	
			$mail=new Mail;
			$mail->AutoCheck(false);
			$mail->From("contact@collants.fr");
			$mail->To ($row["email"]);
			$mail->Subject("Site collants.fr - votre commande");
			$message.="Cher client.\n\n";
			$message.="Votre paiement n'a pas �t� accept�.\n\n";
			$message.="Votre commande est enregistr�e sous la r�f�rence n� ".$_POST["id"]."\n\n";
			$message.="Si vous souhaitez recevoir votre commande, contactez nous a l'adresse suivante : \n\n";
			$message.="collants.fr, zac du sablar, 25 all�e pampara, 40100 dax France.\n\n";
			$message.="Ou par email a l'adresse : \n\n";
			$message.="collants@collants.fr \n\n";
			$message.="Nous esp�rons vous revoir tr�s bientot sur le site collants.fr.\n\n";
			$message.="Cordialement, \n\n";
			$message.="L'equipe commerciale de collants.fr.\n\n";
			$mail->Body($message,"iso-8859-15");
			$mail->Format("text");
			$mail->Priority(1);
			$mail->Send();
			$mail->Get();
		}
	}
	
	
	// si le colis est parti il faut �galement envoyer un mail avec le num�ro de collisimo
	if (($_POST["statut_commande"]==2) && ($old_statut_commande != $_POST["statut_commande"]) && ($_POST["num_colissimo"]!=""))
	{
		// client
		$ChaineSQL = "SELECT email  FROM client ";
		$ChaineSQL .= " INNER JOIN commande ON commande.num_client = client.num_client";
		$ChaineSQL .= " WHERE num_commande = '".$_POST["id"]."'";
		
		$result=mysql_query($ChaineSQL);
		
		if (mysql_num_rows($result) !=0)
		{
			$row=mysql_fetch_array($result);	
			$mail=new Mail;
			$mail->AutoCheck(false);
			$mail->From("contact@collants.fr");
			$mail->To ($row["email"]);
			$mail->Subject("Site collants.fr - votre commande");
			$message.="Cher client.\n\n";
			$message.="Votre colis vient d'�tre exp�di�.\n\n";
			$message.="Il est enregistr� sous la r�f�rence colissimo n� ".$_POST["num_colissimo"]."\n\n";
			$message.="Si vous souhaitez � tout moment suivre l'acheminement de votre colis, connectez vous � l'adresse suivante : \n\n";
			$message.="http://www.coliposte.net/particulier/suivi_particulier.jsp?colispart=".$_POST["num_colissimo"]."\n\n";
			$message.="Nous esp�rons vous revoir tr�s bientot sur le site collants.fr.\n\n";
			$message.="Cordialement, \n\n";
			$message.="L'equipe commerciale de collants.fr.\n\n";
			$mail->Body($message,"iso-8859-15");
			$mail->Format("text");
			$mail->Priority(1);
			$mail->Send();
			$mail->Get();
		}
	}
	
	
	
	
	
	

		
	header("Location: commandes_liste.php");
}



?>
<? include_once("../include/_connexion_fin.php"); ?>
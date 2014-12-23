<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");

if (!isset($_POST["email"]))

{

	header("Location: lost_pass.php");

}



$err=0;



// selection du client..

$ChaineSQL = "SELECT email, mdp FROM client WHERE email='".$_POST["email"]."'";



$result=mysql_query($ChaineSQL);



if(mysql_num_rows($result) !=1)

{

	$err=1;

}



// sinon envoi du mot de passe...





$row=mysql_fetch_array($result);









//envoi du mot de passe par email



//on envoi un mail

		include("../include/libmail.php");

		$mail=new Mail;

		$mail->AutoCheck(false);

		$mail->From("contact@collants.fr");
		
		$mail->To ($row["email"]);

		$mail->Subject("Site collants.fr - vos identifiants");

		$message="Vos identifiants pour le site collants.fr\n\n";

		$message.="Cher client.\n\n";

		$message.="Nous avons enregistré votre demande de mot de passe sur le site collants.fr\n\n";

		$message.="Voici vos identifiants et mot de passe qui vous permettront de vous connecter sur notre site.\n\n";

		$message.="identifiant : ".$row["email"]."\n\n";

		$message.="Mot de passe : ".$row["mdp"]."\n\n";

		$message.="Nous espérons vous revoir très bientot sur le site.\n\n";

		$message.="Cordialement, \n\n";

		$message.="L'equipe commerciale de collants.fr.\n\n";

		$mail->Body($message,"iso-8859-15");

		$mail->Format("text");

		$mail->Priority(1);

		$mail->Send();

		$mail->Get();







if ($err==0)

{

	// pas de problem

?>

<html>

<head>

<link href="include/collants_styles.css" rel="stylesheet" type="text/css">

</head>

<body background="file:///E|/Collants.fr/collants/www/images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" border="0">



<TABLE cellSpacing=3 cellPadding=15 border=0>

  <TR>

    
  <TD colspan=4 align=left id="texte3_blanc">Loss of your password:</TD>

  </TR>

  <TR>

    
  <TD colspan=4 align=left id="texte2_blanc">Your identifiers and password were 
      sent to you by e-mail.</TD>

  </TR>





</TABLE>

</BODY>

</HTML>

<?

	

}

else

{

	// desolé

?>

<html>

<head>

<link href="include/collants_styles.css" rel="stylesheet" type="text/css">

</head>

<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" border="0">



<TABLE cellSpacing=3 cellPadding=3 border=0>

  <TR>

    <TD colspan=4 align=left id="texte3_blanc">Perte de votre mot de passe : </TD>

  </TR>

  <TR>

    <TD colspan=4 align=left id="texte2_blanc"><br>suite à une erreur, vos identifiants et mot de passe vous n'ont pu être envoyés.<br><br>Contactez l'administrateur du site a l'adresse suiante : <br><br>

    

    collants.fr, zac du sablar, 25 allée pampara, 40100 dax France.<br><br>

    Téléphone : 05.58.74.14.27.<br>

    Fax : 05.58.74.14.27<br><br>

    e-mail : <a href="mailto:contact@collants.fr">contact@collants.fr</a><br>



    </TD>

  </TR>





</TABLE>

</BODY>

</HTML>

<?

}





?>









<?php include_once("../include/_connexion_fin.php"); ?>


<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/libmail.php"); ?>
<?
	if ($_POST["civilite"]==1){
		$mrMmeMlle = "M.";
	}elseif ($_POST["civilite"]==2){
		$mrMmeMlle = "Mme.";
	}else{
		$mrMmeMlle = "Mlle";
	}

		$mail=new Mail;
		$mail->AutoCheck(false);
		$mail->From($_POST["mail"]);
		$to = array("contact@collants.fr", "admin@planetereseau.com");
		//$to = array("admin@planetereseau.com");
		$mail->To ($to);
		$mail->Subject("Site collants.fr - Contact");
		
		$message ="Message depuis le site :\n\n";
		$message.="Civilit�: ". $mrMmeMlle  ."\n";
		$message.="Nom: ". $_POST["nom"] ."\n";
		$message.="Pr�nom: ". $_POST["prenom"] ."\n";
		$message.="Adresse: ". $_POST["adresse"] ."\n";
		$message.="CP: ". $_POST["code_postal"] ."\n";
		$message.="ville: ". $_POST["ville"] ."\n";
		$message.="Pays: ". $_POST["pays"] ."\n";
		$message.="Mail: ". $_POST["mail"] ."\n";
		$message.="Tel: ". $_POST["tel"] ."\n";
		$message.="Fax: ". $_POST["fax"] ."\n";
		$message.="Message: \n". $_POST["remarque"] ."\n";
		$message=stripslashes($message);
		$mail->Body($message,"iso-8859-15");
		$mail->Format("text");
		$mail->Priority(1);
		$mail->Send();
		//$msg = $mail->Get();
		$mail = NULL;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - sp�cialiste du collant</title>
<META NAME="description" content="Le sp�cialiste du collant, lingerie, bas, accessoire f�minin, pour la sensualit� des femmes.">
<META NAME="keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, libert�, seduire, seduction, vivre, emotion, dax">
<META content="ALL" name="robots">
<META content="document" name="resource-type">
<META content="15 days" name="revisit-after">
<META name="dc.description" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<META name="dc.keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, libert�, seduire, seduction, vivre, emotion, dax">
<META name="author" CONTENT ="collants.fr">
<META name="dc.subject" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
<body Id="fond_rose" onLoad="MM_preloadImages('images/envoyer_over.gif')" marginleft="0" scroll=no>
<table id="texte1_blanc" width="359"  border="0" cellpadding="0" cellspacing="0" marginleft="0">
  <tr> 
    <td width="358"  valign="top">
		<table width="352" height="120" border="0" align="center" cellpadding="3" cellspacing="0">
		  <tr> 
            <td align="center" valign="middle" id="texte2_rouge" height="21" colspan="3" valign="top" id="texte1"><br>
<br>
<br>
<br>
		
			Votre message a �t� envoy�.
		
            </td>
          </tr>
          
          <tr> 
            <td id="texte1" colspan="3" height="20"></font></td>
          </tr>
          
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

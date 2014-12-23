<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - spécialiste du collant</title>
<META NAME="description" content="Le spécialiste du collant, lingerie, bas, accessoire féminin, pour la sensualité des femmes.">
<META NAME="keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">
<META content="ALL" name="robots">
<META content="document" name="resource-type">
<META content="15 days" name="revisit-after">
<META name="dc.description" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<META name="dc.keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">
<META name="author" CONTENT ="collants.fr">
<META name="dc.subject" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script Language="JavaScript">
function Form1_Validator(theForm){
	
	 if (theForm.taille.value == ""){
    	alert("Veuillez saisir une taille.");
	    theForm.taille.focus();
	    return (false);
	 }  
	
	  
	  return true;
	
}


var globWin;            
function wLoader(_URL)  
{	
	var _windowTitle="_blank";
	var _windowSettings="top=80,left=150,screenX=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=400";

	globWin = window.open(_URL,_windowTitle,_windowSettings);
}


</script>
</head>
<body id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" valign="middle">
		<table width="64%" border="0" cellpadding="10" cellspacing="0" align="center">
	        	<tr>
	            		<td align="center" id="texte3">Recherche clients</td>
	        	</tr>
	        	<tr> 
	        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
	         	</tr>
	         	<?
	         	$ChaineSQL = "SELECT * FROM client ";
	         	$ChaineSQL .= " INNER JOIN civilite ON civilite.num_civilite = client.num_civilite";
	         	$ChaineSQL .= " WHERE nom like '%".$_GET["nom"]."%' OR email like '%".$_GET["nom"]."%'";
	         	
	         	$result = mysql_query($ChaineSQL);
	         	
	         	if (mysql_num_rows($result)<1)
	         	{
	         	?>
			<tr> 
	            		<td> 
					<table width="100%" border="0" cellpadding="2" cellspacing="0">
	                			<tr> 
	                  				<td align=center height="30" id="texte2b">Il n'y a aucun client correspondant a votre recherche.</td>
	                			</tr>
	              			</table>
				</td>
	          	</tr> 
	          	<?
	          	}
	          	else
	          	{
	          	?>
	          	<tr> 
	            		<td> 
					<table align=center width="90%" border="1" cellpadding="2" cellspacing="0">
	                			 	<tr>
	                			 		<td  height="30" id="texte2b">Numéro client</td>
	                			 		<td  height="30" id="texte2b">Civilite</td>
	                			 		<td  height="30" id="texte2b">Prénom</td>
	                			 		<td  height="30" id="texte2b">Nom</td>
	                			 		<td  height="30" id="texte2b">Email</td>
	                			 	</tr>
	                  				<?
	                  				while($row=mysql_fetch_array($result))
	                  				{
	                  				?>
	                  					<tr>
	                  						<td  height="30" id="texte2b"><a href="detail_client.php?num_client=<?=$row["num_client"]?>"><?=$row["num_client"]?></a></td>
	                  						<td  height="30" id="texte2b"><?=$row["civilite"]?></td>
	                  						<td  height="30" id="texte2b"><?=$row["prenom"]?></td>
	                  						<td  height="30" id="texte2b"><?=$row["nom"]?></td>
	                  						<td  height="30" id="texte2b"><?=$row["email"]?></td>
	                  					</tr>
	                  				<?
	                  				}
	                  				?>
	              			</table>
				</td>
	          	</tr>
	          	<?
	          	}
	          	?>
      		</table>
	</td>
  </tr>
</table>
</body>
</html>
<? include_once("../include/_connexion_fin.php"); ?>
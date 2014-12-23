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
<link href="/include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script Language="JavaScript">
function Form1_Validator(theForm){
	
	 if (theForm.titre.value == ""){
    	alert("Veuillez saisir un titre.");
	    theForm.titre.focus();
	    return (false);
	 } 
	 /*
	 if (theForm.prenom.value == ""){
    	alert("Veuillez saisir votre prenom.");
	    theForm.prenom.focus();
	    return (false);
	 } 
	 if (theForm.adresse1.value == ""){
    	alert("Veuillez saisir votre adresse.");
	    theForm.adresse1.focus();
	    return (false);
	 } 
	  if (theForm.cp.value == ""){
    	alert("Veuillez saisir votre cp.");
	    theForm.cp.focus();
	    return (false);
	 } 
	  if (theForm.ville.value == ""){
    	alert("Veuillez saisir votre ville.");
	    theForm.ville.focus();
	    return (false);
	 } */
	
	/* if (!checkMail(theForm.email.value)){
	    alert("Veuillez saisir votre email ou vérifier qu'il est valide.");
	    theForm.email.focus();
	    return (false);
	}	 */
		  
	 	//res = valide_inscription()
		//return false	 
	  
	  
	  return true;
	
}


function valide_conf()
	{
	  if (confirm("ATTENTION !!! Etes-vous sur de vouloir renouveler \n l'adhésion   ? ")) {
	      return true
	  }
	  else {
	  	  return false
	  }
}

function valide_inscription(){
	//if ((document.formulaire.nom.value!='') && (document.formulaire.prenom.value!='')) {
		wLoader('valide_adhesion.php?email=' + escape(document.formulaire.email.value))		
	//}
	return false
}

var globWin;            
function wLoader(_URL)  
{	
	var _windowTitle="_blank";
	var _windowSettings="top=80,left=150,screenX=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=400";

	globWin = window.open(_URL,_windowTitle,_windowSettings);
}


function checkMail(str){
	returnValue = false;
	pointIndex = 0;
	atIndex = 0;
	for(i = 1 ; i < str.length ; i++){
		if (str.charAt(i) == "@"){
		returnValue = true;
		atIndex = i;
		}
		else if(str.charAt(i) == "."){
		pointIndex = i;
		}
	}
	if (! returnValue || pointIndex == 0 || pointIndex == atIndex+1 || pointIndex - atIndex > 67 || pointIndex > str.length -3 ){
		return false;
	}
	return true;
}
</script>
</head>
<body background="images/fond_collants2.gif" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table width="100%" border="0" cellpadding="10" cellspacing="0">
<form action="produit_ajout_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)" enctype="multipart/form-data">
<tr> 	
	<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">ref:</td>
					<td width="10">&nbsp;</td>
					<td><input size="14"  name="titre" type="text" value="<? echo $reference?>"></td>
				</tr>
				</table>
			</td>	
			<td>
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">Désignation:</td>
					<td width="10">&nbsp;</td>
					<td><input size="50"  name="designation" type="text" value="<? echo $designation?>"></td>
				</tr>
				</table>
			</td>	
		</tr>
		</table>	
	</td>	   	   	
</tr>
 <?
	$query="SELECT * FROM marque ";
	$query.=" ORDER BY marque ";	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
?>
<tr>
	<td>
		<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td id="texte2b">Marque:</td>
			<td width="10">&nbsp;</td>
			<td>
				<select name="num_marque" size="1">
          		<? while ($lstmarque = mysql_fetch_array($rstemp)) { ?>
           			<? if ($num_marque == $lstmarque["num_marque"]) { ?>
           				<option selected value="<? echo $lstmarque["num_marque"] ?>"><? echo $lstmarque["marque"] ?></option>
           			<? }Else{  ?>
           				<option value="<? echo $lstmarque["num_marque"] ?>"><? echo $lstmarque["marque"] ?></option>
           			<? } ?>
          		<? } ?>
        		</select> 	
			</td>
			<td width="10">&nbsp;</td>
			<td><a href="javascript:wLoader('marque_ajout.php')"><img src="images/modifier_over.gif" alt="" border="0"></a></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">Description:<br>
					<?//$description = str_replace("\'","'",$description);
						$description = htmlspecialchars($description);
					?>
						<textarea cols="50" rows="5" name="description" wrap="soft"><? echo $description ?></textarea>
					</td>
				</tr>
				</table>
			</td>
			<td width="15">&nbsp;</td>
			<td valign="top">
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">Note:<br>
					<?//$note = str_replace("\'","'",$note);
						$note = htmlspecialchars($note);
					?>
						<textarea cols="35" rows="5" name="note" wrap="soft"><? echo $note ?></textarea>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>	
	</td>		
</tr>
<tr>
	<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
			<? if ($vignette != "") { ?>
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">vignette actuelle :</td>
					<td width="10">&nbsp;</td>
					<td>
						<a href="javascript:wLoader('/photo/petite/<? echo $vignette ?>')"><img src="/photo/petite/<? echo $vignette ?>" alt="" width="70" border="0"></a>
					</td>
				</tr>
				</table>								
			<? } ?>
			</td>
			<td width="44">&nbsp;</td>
			<td>
				<? if ($photo != "") { ?>
					<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td id="texte2b">photo actuelle :</td>
						<td width="10">&nbsp;</td>
						<td>
							<a href="javascript:wLoader('/photo/grande/<? echo $photo ?>')"><img src="/photo/grande/<? echo $photo ?>" alt="" width="70" border="0"></a>
						</td>
					</tr>
					</table>								
				<? } ?>
			</td>	
		</tr>
		<tr>
			<td>
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">vignette:</td>
					<td width="10">&nbsp;</td>
					<td><input type="file" name="LE_FICHIER[]"</td>
				</tr>
				</table>
			</td>	
			<td width="44">&nbsp;</td>
			<td>
				<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td id="texte2b">photo:</td>
					<td width="10">&nbsp;</td>
					<td><input type="file" name="LE_FICHIER[]"</td>
				</tr>
				</table>
			</td>	
		</tr>
		</table>		
	</td>
</tr>
</form>	
</table>
</body>
</html>
<? include_once("../include/_connexion_fin.php"); ?>
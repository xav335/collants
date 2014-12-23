<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - spécialiste du collant</title>
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script Language="JavaScript">
function Form1_Validator(theForm){
	
	if (!est_entier(theForm.ordre.value) || theForm.ordre.value== ""){
    	alert("Veuillez indiquez un nombre valide");
	    theForm.ordre.focus();
	    return (false);
	 } 
	
	if (theForm.libelle.value == ""){
    	alert("Veuillez saisir une libellé.");
	    theForm.libelle.focus();
	    return (false);
	 }  
	  if (theForm.url.value == ""){
    	alert("Veuillez saisir une url.");
	    theForm.url.focus();
	    return (false);
	 }  
	  
	  return true;
	
}


function est_reel(le_nombre){	
	var nbex = le_nombre
	
	if (!isFinite(nbex)){
		x = nbex.indexOf(',')
	
		entier = nbex.slice(0,x)
		decimale = nbex.slice(x+1,100)
		nombre = entier + '.' + decimale
	}else{
		nombre = nbex;
	}
	
	if (isFinite(nombre)){
		 estreel = true
	}else{
		estreel = false
	}
	return (estreel);
}

function est_entier(le_nombre){
	var checkOK = "0123456789-";
	var checkStr = le_nombre;
	var allValid = true;
	var decPoints = 0;
	var allNum = "";
	for (i = 0;  i < checkStr.length;  i++)
	{
	    ch = checkStr.charAt(i);
	    for (j = 0;  j < checkOK.length;  j++)
	      if (ch == checkOK.charAt(j))
	        break;
	    if (j == checkOK.length)
	    {
	      allValid = false;
	      break;
	    }
	    allNum += ch;
	}
	if (!allValid){
		return (false);
	}else{
		return (true);
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


function est_mail(chaine){
	if (chaine.search(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9]+)*$/) == -1){
		return false;
	}else{	
		return true;
	}
}
</script>
</head>
<body id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" valign="middle">
		<table width="64%" border="0" cellpadding="10" cellspacing="0" align="center">
        <form action="liens_ajout_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)" enctype="multipart/form-data">
        	<tr> 
	        	<td align="center" id="texte3">Ajout lien</td>
	        </tr>
			<tr> 
        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
			<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  	<td width="26%" height="30" id="texte2b">Ordre :&nbsp;&nbsp;
	                  			<input size="3"  name="ordre" type="text" value="<? echo $ordre?>"></td>
	                </tr>
	              	</table>
				</td>
          	</tr>
			<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  	<td width="26%" height="30" id="texte2b">libellé :&nbsp;&nbsp;
	                  			<input size="60"  name="libelle" type="text" value="<? echo htmlspecialchars($libelle)?>"></td>
	                </tr>
	              	</table>
				</td>
          	</tr>
			<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  	<td width="26%" height="30" id="texte2b">URL :&nbsp;&nbsp;
	                  			<input size="60"  name="url" type="text" value="<? echo htmlspecialchars($url)?>"></td>
	                </tr>
	              	</table>
				</td>
          	</tr>
          <tr> 
            <td> 
				<table width="100%" border="0" cellpadding="2" cellspacing="10" bgcolor="#999999">
                
                <tr> 
                  <td height="30"> <table cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td id="texte2b">Logo:<br></td>
                        <td width="10">&nbsp;</td>
                        <td><input type="file" name="LE_FICHIER[]"></td>
                      </tr>
                    </table></td>
                 
                </tr>
              </table>
			</td>
          </tr>
         	<tr> 
        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
	       	
          	<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr> 
                  		<td align="center"> <input type="button" value="retour" onclick="javascript:document.location.href='liens_liste.php'"> </td>
                  		<td align="center"> <input type="submit" name="vvv" value="Ajouter"> 
                  		</td>
                	</tr>
              		</table>
				</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
          </tr>
		  
        </form>
      </table>
	</td>
  </tr>
</table>
</body>
</html>
<? include_once("../include/_connexion_fin.php"); ?>
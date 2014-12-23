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
	
	 if (theForm.reference.value == ""){
    	alert("Veuillez saisir une référence.");
	    theForm.reference.focus();
	    return (false);
	 }  
	 if (theForm.designation.value == ""){
    	alert("Veuillez saisir une désignation.");
	    theForm.designation.focus();
	    return (false);
	 } 
	  if (!est_reel(theForm.prix.value)){
    	alert("Veuillez indiquez un format de prix valide");
	    theForm.prix.focus();
	    return (false);
	 } 
	 
	  if (!est_entier(theForm.lot.value)){
    	alert("Veuillez indiquez un nombre valide");
	    theForm.lot.focus();
	    return (false);
	 } 
	
	 
	 if (!est_reel(theForm.promo_lot.value)){
    	alert("Veuillez indiquez un format de prix valide");
	    theForm.promo_lot.focus();
	    return (false);
	 } 
	
	/* if (!checkMail(theForm.email.value)){
	    alert("Veuillez saisir votre email ou vérifier qu'il est valide.");
	    theForm.email.focus();
	    return (false);
	}	 */
		  
	 	//res = valide_inscription()
		//return false	 
	  
	  
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
	var _windowSettings="top=80,left=150,screenX=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=302,height=430";

	globWin = window.open(_URL,_windowTitle,_windowSettings);
}
var globWin;            
function wLoader2(_URL)  
{	
	var _windowTitle="_blank";
	var _windowSettings="top=80,left=150,screenX=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=200,height=300";

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
		<table width="90%" border="0" cellpadding="10" cellspacing="0" align="center">
        <form action="accueil_photo_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)" >
  		<tr> 
			<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
		</tr>
		 <?
				$query="SELECT * FROM accueil ";
				$query .= " WHERE num_texte=1";
				$rstemp11 = mysql_query($query);
				$nb_enr = mysql_num_rows($rstemp11);
				
				while ($row = mysql_fetch_array($rstemp11)) {
					$choix = $row["lien_photo"];
				}
				switch ($choix){
					case "boutique.php?num_rubrique=1":
						$lien_photo = 1;
						break;
					case "boutique.php?num_rubrique=2":
						$lien_photo = 2;
						break;	
					case "boutique.php?num_rubrique=3":
						$lien_photo = 3;
						break;	
					case "promotions.php":
						$lien_photo = 4;
						break;			
					case "boutique.php?num_rubrique=4":
						$lien_photo = 5;
						break;	
					case "top5.php":
						$lien_photo = 6;
						break;	
					
				}
			?>
		<tr> 
            <td align="center" id="texte3">Choisir le lien</td>
        </tr>
			<tr> 
            <td align="center"> 
				<table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  	<td> 
						<table cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td id="texte2b">Collants</td>
							<td><input  name="choix"  type="radio" value="1" <? if ($lien_photo==1) echo "checked"  ?>></td>
                      	</tr>
                    	</table>
					</td>
          			<td> 
						<table cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td id="texte2b">Bas</td>
							<td><input name="choix"  type="radio" value="2" <? if ($lien_photo==2) echo "checked"  ?>></td>
                      	</tr>
                    	</table>
					</td>
					<td> 
						<table cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td id="texte2b">Nouveautés</td>
							<td><input name="choix"  type="radio" value="3" <? if ($lien_photo==3) echo "checked"  ?>></td>
                      	</tr>
                    	</table>
					</td>
				</tr>
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
				<tr>	
					<td> 
						<table cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td id="texte2b">Promotions</td>
							<td><input name="choix"  type="radio" value="4" <? if ($lien_photo==4) echo "checked"  ?>></td>
                      	</tr>
                    	</table>
					</td>
					<td> 
						<table cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td id="texte2b">Coup de coeur</td>
							<td><input name="choix"  type="radio" value="5" <? if ($lien_photo==5) echo "checked"  ?>></td>
                      	</tr>
                    	</table>
					</td>
					<td> 
						<table cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td id="texte2b">Top 5</td>
							<td><input name="choix"  type="radio" value="6" <? if ($lien_photo==6) echo "checked"  ?>></td>
                      	</tr>
                    	</table>
					</td>
					
                </tr>
              </table>
			</td>
          </tr>
        	<tr> 
        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
	       	
			
			 <?
				$query="SELECT produit.num_produit,produit.designation, accueil_photo.num_produit_photo  FROM produit ";
				$query.=" LEFT JOIN accueil_photo ON accueil_photo.num_produit_photo=produit.num_produit  ";	
				$query.=" WHERE produit.actif=1 ";	
				$query.=" ORDER BY designation ";	
				$rstemp = mysql_query($query);
				$nb_enr = mysql_num_rows($rstemp);
			?>
          <tr> 
            <td align="center" id="texte3">Cocher au moins 5 produits</td>
          </tr>
          <tr> 
            <td align="center"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <? $cpt_col=1 ?>
                  <? while ($cat = mysql_fetch_array($rstemp)) { ?>
                  	<?		
						$num_produit = $cat["num_produit"];
						$designation =  $cat["designation"];
						$num_produit_photo =  $cat["num_produit_photo"];
					?>
                  	<td id="texte2b"><? echo $designation ?>:</td>
						<? if ($num_produit_photo!="") {?>
						<td><input checked type="checkbox" name="num_produit_<? echo $cpt_col ?>" value="<? echo $num_produit ?>"></td>
						<? }else{ ?>
						<td><input type="checkbox" name="num_produit_<? echo $cpt_col ?>" value="<? echo $num_produit ?>"></td>
						<? } ?>
                  	<td width="23">&nbsp;</td>
                  <? if ($cpt_col%4 ==0) {?>
                </tr>
                <tr> 
                  <? }?>
                  <? $cpt_col++ ?>
                  <? } ?>
                </tr>
              </table></td>
          </tr>
          	<tr> 
            	<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
          	</tr>
          	<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr> 
                  		<td align="center"></td>
                  		<td align="center"> <input type="submit" name="vvv" value="Valider"> 
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
<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
$sql = "SELECT * ";
$sql .= " FROM  newsletter ";
$sql .= " WHERE num_newsletter=1";
$result = mysql_query($sql);
$nb_enr = mysql_num_rows($result);
if ($nb_enr>0){
	while ($row = mysql_fetch_array($result)) { 
		$titre = $row["titre"];
		$titre_en = $row["titre_en"];
		$texte =  $row["texte"];
		$texte_en =  $row["texte_en"];
		$titre_bas =  $row["titre_bas"];
		$titre_bas_en =  $row["titre_bas_en"];
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - spécialiste du collant</title>
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script Language="JavaScript">
function Form1_Validator(theForm){
	
	   
	 
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td align="center">
		<table width="90%" border="0" cellpadding="10" cellspacing="0" align="center">
        <form action="newsletter_modif_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)">
			<tr> 
        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
			
			<tr>
				<td>
					<table  border="0" cellspacing="0" >
					<tr> 
						<td> 
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr> 
								<td  height="30" id="texte2b">Newsletter  HTML:</td>
							</tr>
							</table>
						</td>
          			</tr>
					</table>
				</td>	
			</tr>
			<tr>
				<td>
					<table  border="0" cellspacing="0" >
					<tr> 
						<td> 
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr> 
								<td  height="30" id="texte2b"><img src="images/frenchflag.gif" width="18" alt="" border="0">Titre :&nbsp;&nbsp;
										<input size="50" name="titre" type="text" value="<? echo $titre?>"></td>
							</tr>
							</table>
						</td>
						
          			</tr>
					</table>
				</td>	
			</tr>	
			<tr>
				<td>
					<table  border="0" cellspacing="0" >
					<tr> 
						
						<td> 
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr> 
								<td  height="30" id="texte2b"><img src="images/ukflag.gif" width="18" alt="" border="0">Titre :&nbsp;&nbsp;
									<input size="50" name="titre_en" type="text" value="<? echo $titre_en?>"></td>
							</tr>
							</table>
						</td>
          			</tr>
					</table>
				</td>	
			</tr>
			
			<tr> 
            <td> 
				<table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr> 
                  <td> <table cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td id="texte2b"><img src="images/frenchflag.gif" width="18" alt="" border="0">texte:<br> <br> 
                          	<?
								//$description = str_replace("\'","'",$description);
								$texte = htmlspecialchars($texte);
							?>
                          <textarea cols="40" rows="5" name="texte" wrap="soft"><? echo $texte ?></textarea> 
                        </td>
                      </tr>
                    </table></td>
                  <td width="15">&nbsp;</td>
                  <td valign="top"> <table cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td id="texte2b"><img src="images/ukflag.gif" width="18" alt="" border="0">texte:<br> <br> 
                          	<?
								//$note = str_replace("\'","'",$note);
								$texte_en = htmlspecialchars($texte_en);
							?>
                          <textarea cols="40" rows="5" name="texte_en" wrap="soft"><? echo $texte_en ?></textarea> 
                        </td>
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
					<table  border="0" cellspacing="0" >
					<tr> 
						<td> 
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr> 
								<td  height="30" id="texte2b">Titre Bas photo:</td>
							</tr>
							</table>
						</td>
          			</tr>
					</table>
				</td>	
			</tr>
			<tr>
				<td>
					<table  border="0" cellspacing="0" >
					<tr> 
						<td> 
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr> 
								<td  height="30" id="texte2b"><img src="images/frenchflag.gif" width="18" alt="" border="0">Titre Bas  :&nbsp;&nbsp;
										<input size="50" name="titre_bas" type="text" value="<? echo htmlspecialchars($titre_bas)?>"></td>
							</tr>
							</table>
						</td>
						
          			</tr>
					</table>
				</td>	
			</tr>	
			<tr>
				<td>
					<table  border="0" cellspacing="0" >
					<tr> 
						<td> 
							<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr> 
								<td  height="30" id="texte2b"><img src="images/ukflag.gif" width="18" alt="" border="0">Titre Bas  :&nbsp;&nbsp;
										<input size="50" name="titre_bas_en" type="text" value="<? echo htmlspecialchars($titre_bas_en)?>"></td>
							</tr>
							</table>
						</td>
						
          			</tr>
					</table>
				</td>	
			</tr>	
			<tr> 
        		<td align="center" id="texte3_blanc"><img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
          	<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr> 
                  		<td align="center"> <input type="submit" name="vvv" value="Modifier"> 
                  		</td>
                	</tr>
              		</table>
				</td>
          </tr>
		  
        </form>
      </table>
	</td>
  </tr>
</table>
</body>
</html>
<? include_once("../include/_connexion_fin.php"); ?>
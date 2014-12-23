<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
$sql = "SELECT * ";
$sql .= " FROM  ticker ";
$sql .= " WHERE num_ticker=1";
$result = mysql_query($sql);
$nb_enr = mysql_num_rows($result);
if ($nb_enr>0){
	while ($row = mysql_fetch_array($result)) { 
		$texte =  $row["texte"];
		$texte_en =  $row["texte_en"];
		$actif =  $row["actif"];
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
        <form action="accueil_ticker_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)">
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
								<td  height="30" id="texte2b">Ticker actif :&nbsp;&nbsp;
									
								</td>
								<? if ($actif) { ?>
									<td  height="30" align="center" ><input name="actif" type="checkbox" value="" checked></td>
								<? }else{  ?>
									<td  height="30"  align="center"><input name="actif" type="checkbox" value="" ></td>
								<? }?>
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
								<td  height="30" id="texte2b">Texte Ticker :</td>
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
								<td  height="30" id="texte2b"><img src="images/frenchflag.gif" width="18" alt="" border="0">Ticker :&nbsp;&nbsp;<br>
										<input size="110" name="texte" type="text" value="<? echo htmlspecialchars(stripslashes($texte)) ?>"></td>
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
								<td  height="30" id="texte2b"><img src="images/ukflag.gif" width="18" alt="" border="0">Ticker :&nbsp;&nbsp;<br>
									<input size="110" name="texte_en" type="text" value="<? echo htmlspecialchars($texte_en) ?>"></td>
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
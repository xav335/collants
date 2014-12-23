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
	/*
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
	*/
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
<style type="text/css">
<!--
.Style1 {color: #FF0000}
-->
</style>
</head>
<body id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" valign="middle">
		<table width="90%" border="0" cellpadding="10" cellspacing="0" align="center">
        <form action="produit_associe_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)" >
        	<input type="hidden" name="num_produit" value="<? echo $_GET["num_produit"] ?>">
			<input type="hidden" name="design" value="<? echo $_GET["design"] ?>">
        	<tr> 
        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
	       	
			
			 <?
				$query="SELECT produit.num_produit,produit.designation,marque.marque  FROM produit ";
				$query.=" INNER JOIN marque ON  marque.num_marque = produit.num_marque ";	
				$query.=" WHERE produit.actif=1 ";	
				$query.=" AND produit.num_produit <>". $_GET["num_produit"] ;	
				$query.=" ORDER BY designation ";	
				//echo $query;
				$query="SELECT marque.marque, produit.num_produit,produit.designation FROM produit ";
				$query.=" INNER JOIN marque ON  marque.num_marque = produit.num_marque ";	
				$query.=" WHERE produit.actif=1 ";	
				//$query.=" AND produit_remise.num_remise=". $_GET["num_remise"] ;	
				$query.=" AND produit.num_produit <>". $_GET["num_produit"] ;	
				$query.=" ORDER BY marque, designation ";	
				
				$rstemp = mysql_query($query);
				$nb_enr = mysql_num_rows($rstemp);
			?>
          <tr> 
            <td align="center" id="texte3"><br>
						Associer -- <span class="Style1"><?php echo $_GET["design"] ?></span> -- avec :</td>
          </tr>
		  <tr> 
        		<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
          <tr> 
            <td align="center"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
            <td align="center"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
							 <tr> 
								<? $cpt_col=1 ?>
								<? while ($cat = mysql_fetch_array($rstemp)) { ?>
									<?		
								$num_produit = $cat["num_produit"];
								$designation =  $cat["designation"];
								$marque =  $cat["marque"];
								//$num_remise_b =  $cat["num_remise"];
								$query="SELECT num_produit_associe FROM produit_associe ";
								$query.=" WHERE num_produit_associe=". $num_produit;	
								$query.=" AND num_produit=". $_GET["num_produit"];		
								//echo $query;
								$rstemp34 = mysql_query($query);
								$nb_enr34 = mysql_num_rows($rstemp34);
							?>
							<? if ($marque!=$marque_old){ ?>
								<tr><td colspan="12"><br><b><?= $marque ?></b><hr width="100%"></td></tr>
							<?  
								$marque_old =$marque;
								} ?>
									<td id="texte2b"><? echo $designation ?>:</td>
								<? if ($nb_enr34 > 0) {?>
								<td><input checked type="checkbox" name="num_produit_associe_<? echo $cpt_col ?>" value="<? echo $num_produit ?>"></td>
								<? }else{ ?>
								<td><input type="checkbox" name="num_produit_associe_<? echo $cpt_col ?>" value="<? echo $num_produit ?>"></td>
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
					
              </table></td>
          </tr>
          	<tr> 
            	<td align="center" id="texte3_blanc"><br> <img src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
          	</tr>
          	<tr> 
            	<td> 
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr> 
                  		<td align="center"> <input type="button" value="retour" onClick="javascript:document.location.href='produit_liste_filtre.php?action=association'"> </td>
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
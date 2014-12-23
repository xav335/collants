<? include_once("../include/_session.php");?><? include_once("../include/_securite.php");?><? include_once("../include/_connexion.php"); ?><?
$sql = "SELECT * ";
$sql .= " FROM produit ";
$sql .= " WHERE produit.num_produit=". $_GET["num_produit"];
$result = mysql_query($sql);
$nb_enr = mysql_num_rows($result);
if ($nb_enr>0){
	while ($prod = mysql_fetch_array($result)) { 
		$num_produit = $prod["num_produit"];
		$reference =  $prod["reference"];
		$prix =  $prod["prix"];
		$designation =  $prod["designation"];
		$designation_en =  $prod["designation_en"];
		$vignette =  $prod["vignette"];
		$photo =  $prod["photo"];
		$num_marque =  $prod["num_marque"];
		$description =  $prod["description"];
		$description_en =  $prod["description_en"];
		$note =  $prod["note"];
		$note_en =  $prod["note_en"];
		$lot =  $prod["lot"];
		$promo_lot =  $prod["promo_lot"];
		$lib_lot =  $prod["lib_lot"];
		$lib_lot_en =  $prod["lib_lot_en"];
	}
}
?><!--MMDW 7 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - spécialiste du collant</title>
<META mmdw=0 NAME="description" content="Le spécialiste du collant, lingerie, bas, accessoire féminin, pour la sensualité des femmes.">
<META mmdw=1 NAME="keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">
<META mmdw=2 content="ALL" name="robots">
<META mmdw=3 content="document" name="resource-type">
<META mmdw=4 content="15 days" name="revisit-after">
<META mmdw=5 name="dc.description" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<META mmdw=6 name="dc.keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">
<META mmdw=7 name="author" CONTENT ="collants.fr">
<META mmdw=8 name="dc.subject" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<meta mmdw=9 http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link mmdw=10 href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<!--MMDW 8 --><script Language="JavaScript">
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
</script><!--MMDW 9 -->
</head>
<body mmdw=11 id="fond_gris" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" border="0">
<table mmdw=12 width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td mmdw=13 align="center" valign="middle">
		<table mmdw=14 width="64%" border="0" cellpadding="10" cellspacing="0" align="center">
        <form mmdw=15 action="produit_modif_2.php" method="post" name="formulaire"  onsubmit="return Form1_Validator(this)" enctype="multipart/form-data">
        	<input mmdw=16 type="hidden" name="num_produit" value="<? echo $num_produit?>">
			<tr> 
            	<td> 
				<table mmdw=17 width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr> 
					<td mmdw=18 width="64%" height="30" id="texte2b">Marque :</td>
                  	<td mmdw=19 id="texte2b" width="10%" height="30"> R&eacute;f&eacute;rence:</td>
                </tr>
                <tr> 
					<td mmdw=20 height="30"> 
                    <!--MMDW 10 --><?
						$query="SELECT * FROM marque ";
						$query.=" ORDER BY marque ";	
						$rstemp = mysql_query($query);
						$nb_enr = mysql_num_rows($rstemp);
					?><!--MMDW 11 -->
                    <select mmdw=21 name="num_marque" size="1">
                      <!--MMDW 12 --><? while ($lstmarque = mysql_fetch_array($rstemp)) { ?><!--MMDW 13 -->
                      <!--MMDW 14 --><? if ($num_marque == $lstmarque["num_marque"]) { ?><!--MMDW 15 -->
                      <option mmdw=22 selected value="<? echo $lstmarque["num_marque"] ?>"><!--MMDW 16 --><? echo $lstmarque["marque"] ?><!--MMDW 17 --></option>
                      <!--MMDW 18 --><? }Else{  ?><!--MMDW 19 -->
                      <option mmdw=23 value="<? echo $lstmarque["num_marque"] ?>"><!--MMDW 20 --><? echo $lstmarque["marque"] ?><!--MMDW 21 --></option>
                      <!--MMDW 22 --><? } ?><!--MMDW 23 -->
                      <!--MMDW 24 --><? } ?><!--MMDW 25 -->
                    </select> <a mmdw=24 href="javascript:wLoader('marque_ajout.php')"><img mmdw=25 src="images/modifier_off.gif" alt="" width="13" height="13" border="0"></a> 
                  	</td>	
                  	<td mmdw=26 height="30"><input mmdw=27 size="14"  name="reference" type="text" value="<? echo htmlspecialchars($reference)?>"></td>
                </tr>
              </table>
				</td>
          </tr>
        	<tr> 
            	<td> 
					<table mmdw=28 width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  	<td mmdw=29 width="26%" height="30" id="texte2b"><img mmdw=30 src="images/frenchflag.gif" width="18" alt="" border="0"> Désignation :&nbsp;&nbsp;<input mmdw=31 size="60"  name="designation" type="text" value="<? echo htmlspecialchars($designation)?>"></td>
	                </tr>
	              	</table>
				</td>
          	</tr>
			<tr> 
            	<td> 
					<table mmdw=32 width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  	<td mmdw=33 width="26%" height="30" id="texte2b"><img mmdw=34 src="images/ukflag.gif" width="18" alt="" border="0"> Désignation :&nbsp;&nbsp;<input mmdw=35 size="60"  name="designation_en" type="text" value="<? echo htmlspecialchars($designation_en)?>"></td>
	                </tr>
	              	</table>
				</td>
          	</tr>
          <tr> 
            <td> 
				<table mmdw=36 width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr> 
                  <td> <table mmdw=37 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=38 id="texte2b"><img mmdw=39 src="images/frenchflag.gif" width="18" alt="" border="0">Description:<br> <br> 
                          	<!--MMDW 26 --><?
								//$description = str_replace("\'","'",$description);
								$description = htmlspecialchars($description);
							?><!--MMDW 27 -->
                          <textarea mmdw=40 cols="50" rows="5" name="description" wrap="soft"><!--MMDW 28 --><? echo htmlspecialchars($description) ?><!--MMDW 29 --></textarea> 
                        </td>
                      </tr>
                    </table></td>
                  <td mmdw=41 width="15">&nbsp;</td>
                  <td mmdw=42 valign="top"> <table mmdw=43 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=44 id="texte2b"><img mmdw=45 src="images/frenchflag.gif" width="18" alt="" border="0">Note:<br> <br> 
                          	<!--MMDW 30 --><?
								//$note = str_replace("\'","'",$note);
								$note = htmlspecialchars($note);
							?><!--MMDW 31 -->
                          <textarea mmdw=46 cols="35" rows="5" name="note" wrap="soft"><!--MMDW 32 --><? echo htmlspecialchars($note) ?><!--MMDW 33 --></textarea> 
                        </td>
                      </tr>
                    </table></td>
                </tr>
              </table>
			</td>
          </tr>
		  <tr> 
            <td> 
				<table mmdw=47 width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr> 
                  <td> 
				  	  <table mmdw=48 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=49 id="texte2b"><img mmdw=50 src="images/ukflag.gif" width="18" alt="" border="0">Description:<br> <br> 
                          <textarea mmdw=51 cols="50" rows="5" name="description_en" wrap="soft"><!--MMDW 34 --><? echo htmlspecialchars($description_en) ?><!--MMDW 35 --></textarea> 
                        </td>
                      </tr>
                      </table></td>
                  <td mmdw=52 width="15">&nbsp;</td>
                  <td mmdw=53 valign="top"> <table mmdw=54 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=55 id="texte2b"><img mmdw=56 src="images/ukflag.gif" width="18" alt="" border="0">Note:<br> <br> 
                          	 <textarea mmdw=57 cols="35" rows="5" name="note_en" wrap="soft"><!--MMDW 36 --><? echo htmlspecialchars($note_en) ?><!--MMDW 37 --></textarea> 
                        </td>
                      </tr>
                    </table></td>
                </tr>
              </table>
			</td>
          </tr>
          <tr> 
            <td> 
				<table mmdw=58 width="100%" border="0" cellpadding="2" cellspacing="10" bgcolor="#999999">
                <tr> 
                  <td mmdw=59 width="348"> 
                    <!--MMDW 38 --><? if ($vignette != "") { ?><!--MMDW 39 -->
                    <table mmdw=60 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=61 id="texte2b">Vignette actuelle :</td>
                        <td mmdw=62 width="10">&nbsp;</td>
                        <td> <a mmdw=63 href="javascript:wLoader('/photo/petite/<? echo $vignette ?>')"><img mmdw=64 src="/photo/petite/<? echo $vignette ?>" alt="" width="70" border="0"></a> 
                        </td>
                      </tr>
                    </table>
                    <!--MMDW 40 --><? } ?><!--MMDW 41 -->
                  </td>
                  <td mmdw=65 width="10">&nbsp;</td>
                  <td mmdw=66 width="615"> 
                    <!--MMDW 42 --><? if ($photo != "") { ?><!--MMDW 43 -->
                    <table mmdw=67 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=68 id="texte2b">Photo actuelle :</td>
                        <td mmdw=69 width="10">&nbsp;</td>
                        <td> <a mmdw=70 href="javascript:wLoader('/photo/grande/<? echo $photo ?>')"><img mmdw=71 src="/photo/grande/<? echo $photo ?>" alt="" width="70" border="0"></a> 
                        </td>
                      </tr>
                    </table>
                    <!--MMDW 44 --><? } ?><!--MMDW 45 -->
                  </td>
                </tr>
                <tr> 
                  <td mmdw=72 height="30"> <table mmdw=73 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=74 id="texte2b">Vignette:<br>(105x142)</td>
                        <td mmdw=75 width="10">&nbsp;</td>
                        <td><input mmdw=76 type="file" name="LE_FICHIER[]"></td>
                      </tr>
                    </table></td>
                  <td mmdw=77 width="10" height="30">&nbsp;</td>
                  <td mmdw=78 height="30"> <table mmdw=79 cellspacing="0" cellpadding="0" border="0">
                      <tr> 
                        <td mmdw=80 id="texte2b">Photo:<br>(306x419)</td>
                        <td mmdw=81 width="10">&nbsp;</td>
                        <td><input mmdw=82 type="file" name="LE_FICHIER[]"></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
			</td>
          </tr>
         	<tr> 
        		<td mmdw=83 align="center" id="texte3_blanc"><br> <img mmdw=84 src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
	       	<tr> 
	        	<td mmdw=85 align="center" id="texte3">Rubriques</td>
	        </tr>
			<!--MMDW 46 --><?
				$query= "SELECT * FROM rubrique ";
				$query.=" LEFT JOIN produit_rubrique ON produit_rubrique.num_rubrique = rubrique.num_rubrique ";
				$query.=" WHERE produit_rubrique.num_produit=". $num_produit ;	
				$query.=" OR produit_rubrique.num_produit IS NULL";	
				$query.=" ORDER BY rubrique.num_rubrique ";

				$query= "SELECT * FROM rubrique ";
				$query.=" ORDER BY rubrique.num_rubrique ";
				//echo 	$query;		
				$rstemp = mysql_query($query);
				$nb_enr = mysql_num_rows($rstemp);
			?><!--MMDW 47 -->
          <tr> 
            <td mmdw=86 align="center"> 
				<table mmdw=87 width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
					<!--MMDW 48 --><? while ($rub = mysql_fetch_array($rstemp)) { ?><!--MMDW 49 -->
                  	<!--MMDW 50 --><?		
						$num_rubrique = $rub["num_rubrique"];
						$rubrique =  $rub["rubrique"];
						$query= "SELECT * FROM produit_rubrique ";
						$query.=" WHERE produit_rubrique.num_produit=". $num_produit ;	
						$query.=" AND produit_rubrique.num_rubrique=". $num_rubrique ;
						//echo 	$query;		
						$rstemp2 = mysql_query($query);
						$nb_enr2 = mysql_num_rows($rstemp2);
					?><!--MMDW 51 -->
                  	<td mmdw=88 width="25%"> 
						<table mmdw=89 cellspacing="0" cellpadding="0" border="0">
                      	<tr> 
                        	<td mmdw=90 id="texte2b"><!--MMDW 52 --><? echo $rubrique ?><!--MMDW 53 --></td>
							<!--MMDW 54 --><? if ($nb_enr2 >0){ ?><!--MMDW 55 -->	
                        		<td><input mmdw=91  type="checkbox" name="num_rubrique_<? echo $num_rubrique ?>" value="<? echo $num_rubrique ?>" checked></td>
							<!--MMDW 56 --><? }else{  ?><!--MMDW 57 -->
								<td><input mmdw=92  type="checkbox" name="num_rubrique_<? echo $num_rubrique ?>" value="<? echo $num_rubrique ?>" ></td>
							<!--MMDW 58 --><?  } ?><!--MMDW 59 -->
                      	</tr>
                    	</table>
					</td>
          			<!--MMDW 60 --><? }?><!--MMDW 61 -->	
                </tr>
              </table>
			</td>
          </tr>
          <tr> 
            <td mmdw=93 align="center" id="texte3_blanc"><br> <img mmdw=94 src="../images/pixel_rouge.jpg" width="110%" height="1"> 
            </td>
          </tr>
		  <!--MMDW 62 --><?
			$query="SELECT * FROM categorie ";
			$query.=" ORDER BY categorie ";	
			$rstemp = mysql_query($query);
			$nb_enr = mysql_num_rows($rstemp);
		?><!--MMDW 63 -->
          <tr> 
            <td mmdw=95 align="center" id="texte3">Catégories </td>
          </tr>
          <tr> 
            <td mmdw=96 align="center"> <table mmdw=97 width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <!--MMDW 64 --><? $cpt_col=1 ?><!--MMDW 65 -->
                  <!--MMDW 66 --><? while ($cat = mysql_fetch_array($rstemp)) { ?><!--MMDW 67 -->
                  <!--MMDW 68 --><?		
					$num_categorie = $cat["num_categorie"];
					$categorie =  $cat["categorie"];
					
					$query= "SELECT * FROM produit_rubrique ";
					$query.=" WHERE produit_rubrique.num_produit=". $num_produit ;	
					$query.=" AND produit_rubrique.num_rubrique=". $num_rubrique ;
					//echo 	$query;		
					$rstemp2 = mysql_query($query);
					$nb_enr2 = mysql_num_rows($rstemp2);
				?><!--MMDW 69 -->
                  <td mmdw=98 id="texte2b"><!--MMDW 70 --><? echo $categorie ?><!--MMDW 71 -->:</td>
                  <td><input mmdw=99 type="checkbox" name="num_categorie_<? echo $num_categorie ?>" value="<? echo $num_categorie ?>"></td>
                  <td mmdw=100 width="23">&nbsp;</td>
                  <!--MMDW 72 --><? if ($cpt_col%4 ==0) {?><!--MMDW 73 -->
                </tr>
                <tr> 
                  <!--MMDW 74 --><? }?><!--MMDW 75 -->
                  <!--MMDW 76 --><? $cpt_col++ ?><!--MMDW 77 -->
                  <!--MMDW 78 --><? } ?><!--MMDW 79 -->
                </tr>
              </table></td>
          </tr>
		  	<tr> 
        		<td mmdw=101 align="center" id="texte3_blanc"><br> <img mmdw=102 src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
         	</tr>
	       	<tr> 
	        	<td mmdw=103 align="center" id="texte3">Prix et promotions</td>
	        </tr>
			<tr> 
	            <td> 
					<table mmdw=104 width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  <td mmdw=105 id="texte2b" width="10%" height="30">Prix :&nbsp;&nbsp;<input mmdw=106 size="5"  name="prix" type="text" value="<? echo $prix?>">€</td>
	                </tr>
	              </table>
				</td>
          </tr>
			<tr> 
	            <td> 
					<table mmdw=107 width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr> 
	                  <td mmdw=108 width="10%" height="30" id="texte2b">Pieces du lot :</td>
					  <td mmdw=109 width="57">&nbsp;</td>
	                  <td mmdw=110  height="30" id="texte2b">Prix promo :</td>
	                </tr>
	                <tr> 
	                  <td mmdw=111 height="30" id="texte2b"><input mmdw=112 size="14"  name="lot" type="text" value="<? echo $lot?>">Piéces</td>
	                  <td>&nbsp;</td>
					  <td mmdw=113 height="30" id="texte2b"><input mmdw=114 size="5"  name="promo_lot" type="text" value="<? echo $promo_lot?>">€</td>
	                </tr>
	              </table>
				</td>
          	</tr>
			<tr> 
	            <td> 
					<table mmdw=115 width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr>
	                  <td mmdw=116 width="64%" height="30" id="texte2b"><img mmdw=117 src="images/frenchflag.gif" width="18" alt="" border="0">Libéllé Promotion :&nbsp;&nbsp;<input mmdw=118 size="40"  name="lib_lot" type="text" value="<? echo htmlspecialchars($lib_lot)?>"></td>
	                </tr>
	              </table>
				</td>
          	</tr>
			<tr> 
	            <td> 
					<table mmdw=119 width="100%" border="0" cellpadding="2" cellspacing="0">
	                <tr>
	                  <td mmdw=120 width="64%" height="30" id="texte2b"><img mmdw=121 src="images/ukflag.gif" width="18" alt="" border="0">Libéllé Promotion :&nbsp;&nbsp;<input mmdw=122 size="40"  name="lib_lot_en" type="text" value="<? echo htmlspecialchars($lib_lot_en)?>"></td>
	                </tr>
	              </table>
				</td>
          	</tr>
          	<tr> 
            	<td mmdw=123 align="center" id="texte3_blanc"><br> <img mmdw=124 src="../images/pixel_rouge.jpg" width="110%" height="1"></td>
          	</tr>
          	<tr> 
            	<td> 
					<table mmdw=125 width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr> 
                  		<td mmdw=126 align="center"> <input mmdw=127 type="button" value="retour" onclick="javascript:document.location.href='produit_liste.php'"> </td>
                  		<td mmdw=128 align="center"> <input mmdw=129 type="submit" name="vvv" value="Valider"> 
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
<!--MMDW 80 --><? include_once("../include/_connexion_fin.php"); ?><!--MMDW 81 --><!-- MMDW:success -->
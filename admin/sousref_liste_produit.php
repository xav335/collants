<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$maintenant = date("Y-m-d H\:i\:s\ ");
	
	$ChaineSQL = "SELECT num_produit_sousref FROM produit_sousref ORDER by num_produit_sousref DESC limit 1";
	//echo $ChaineSQL;
	$result33=mysql_query($ChaineSQL);
	while ($row2 = mysql_fetch_array($result33)) { 
		$prod_ss_ref =  $row2["num_produit_sousref"];
		$prod_ss_ref++;
	}
	//echo $prod_ss_ref;
	
	if ($_GET["action"]=="ajout"){
		$query  = "INSERT INTO produit_sousref (sous_reference, num_produit, ";
		$query .= "num_couleur, num_taille,date_creation, stock) VALUES (";
		//$query .= "'  ". $_GET["sous_reference"] ."' " ;
		$query .= "'". $prod_ss_ref ."' " ;
		$query .= ", ". $_GET["num_produit"] ." " ;
		$query .= ", ". $_GET["num_couleur"] ." " ;
		$query .= ", ". $_GET["num_taille"] ." " ;
		$query .= ", '". $maintenant ."' " ;
		$query .= ", ". $_GET["stock"] ." " ;
		$query .= ")";
		//echo $query ."<br>";
		$rstemp = mysql_query($query);
	}
	
	if ($_GET["action"]=="modif"){
		$sql  = "SELECT produit_sousref.num_produit_sousref,produit_sousref.sous_reference, marque.marque,  ";
		$sql .= " produit.designation , taille.num_taille, couleur.num_couleur,  produit.reference,produit_sousref.stock  ";
        $sql .= " FROM produit_sousref ";
		$sql .= " INNER JOIN produit ON produit.num_produit = produit_sousref.num_produit";
		$sql .= " INNER JOIN marque ON marque.num_marque = produit.num_marque";
		$sql .= " INNER JOIN taille ON taille.num_taille = produit_sousref.num_taille";
		$sql .= " INNER JOIN couleur ON couleur.num_couleur = produit_sousref.num_couleur";
		$sql .= " WHERE produit_sousref.num_produit_sousref=". $_GET["num_produit_sousref"];
		$result2 = mysql_query($sql);
		$nb_enr2 = mysql_num_rows($result2);
		if ($nb_enr2>0){
			while ($row = mysql_fetch_array($result2)) { 
				$num_produit_sousref = $row["num_produit_sousref"];
				$sous_reference =  $row["sous_reference"];
				$num_taille =  $row["num_taille"];
				$num_couleur =  $row["num_couleur"];
				$stock =  $row["stock"];
			}
		}
	}
	
	if ($_GET["action"]=="modif_2"){
		$query  = "UPDATE produit_sousref  SET ";
		$query .= "sous_reference='". $_GET["sous_reference"] ."' " ;
		$query .= ",num_produit=". $_GET["num_produit"] ." " ;
		$query .= ",num_couleur=". $_GET["num_couleur"] ." " ;
		$query .= ",num_taille=". $_GET["num_taille"] ." " ;
		$query .= ",date_creation='". $maintenant ."' " ;
		$query .= ",stock=". $_GET["stock"] ." " ;
		$query .= " WHERE num_produit_sousref=". $_GET["num_produit_sousref"];
		//echo $query ."<br>";
		$rstemp = mysql_query($query);
	}
?>
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
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script Language="JavaScript">
function Form1_Validator(theForm){
	
	 if (theForm.sous_reference.value == ""){
    	alert("Veuillez saisir une sous-référence.");
	    theForm.sous_reference.focus();
	    return (false);
	 }  
	  if (!est_entier(theForm.stock.value) || theForm.stock.value ==""){
    	alert("Veuillez indiquez un stock valide");
	    theForm.stock.focus();
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
</script>
</head>
<body id="fond_blanc" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/modifier_over.gif','images/supprimer_over.gif','images/chercher_over.gif')" border="0">
	<form action="sousref_liste_produit.php" method="get" name="formulaire">
	<table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tr> 
		<td height="30"> 
		<?
			$sql = "SELECT produit.num_produit, produit.reference,produit.prix, produit.designation, produit.vignette, marque.marque";
			$sql .= " FROM produit INNER JOIN marque ON marque.num_marque = produit.num_marque";
			$sql .= " WHERE produit.actif=1";
			$sql .= " ORDER BY  marque.marque, produit.designation"; 
			//echo $sql;
			$rstemp = mysql_query($sql);
			$nb_enr = mysql_num_rows($rstemp);
		?>
		<select name="num_produit" size="1" onChange="document.formulaire.submit();">
			<option value="">Choisissez un produit</option>
		<? while ($row = mysql_fetch_array($rstemp)) { ?>
			<? if ($_GET["num_produit"] == $row["num_produit"]) { ?>
		  	  	<option selected value="<? echo $row["num_produit"] ?>"><? echo $row["marque"] ?> - <? echo $row["designation"] ?> - <? echo $row["reference"] ?></option>
		  	<? } else {?>
				<option value="<? echo $row["num_produit"] ?>"><? echo $row["marque"] ?> - <? echo $row["designation"] ?> - <? echo $row["reference"] ?></option>
			<? } ?>
		  <? } ?>
		</select>
		</td>
	</tr>
  	</table>
</form>
<?  if ($_GET["num_produit"]<>"") { ?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr> 
  	<?
		$sql = "SELECT produit_sousref.num_produit_sousref,produit_sousref.sous_reference, marque.marque,  ";
		$sql .= " produit.designation , taille.taille, couleur.couleur,  produit.reference,produit_sousref.stock  ";
        $sql .= " FROM produit_sousref ";
		$sql .= " INNER JOIN produit ON produit.num_produit = produit_sousref.num_produit";
		$sql .= " INNER JOIN marque ON marque.num_marque = produit.num_marque";
		$sql .= " INNER JOIN taille ON taille.num_taille = produit_sousref.num_taille";
		$sql .= " INNER JOIN couleur ON couleur.num_couleur = produit_sousref.num_couleur";
		$sql .= " WHERE produit_sousref.actif=1";
		$sql .= " AND produit.num_produit=". $_GET["num_produit"];
		$sql .= " ORDER BY produit.designation, couleur.couleur,taille.taille  "; 
		//echo $sql;
		$result = mysql_query($sql);
		$nb_enr = mysql_num_rows($result);
	?>
	<? if (mysql_num_rows($result)>0) {?>
    	<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="5">
	        <tr align="center" > 
				<td class="affichageT" align="left">&nbsp;</td>
	          	<td class="affichageT" align="left"><a class="affichageT" href="#">sous ref</a></td>
				<td class="affichageT" align="left"><a class="affichageT" href="#">ref.</a></td>
			  	<td class="affichageT" align="left"><a class="affichageT" href="#">designation</a></td>
			  	<td class="affichageT" align="left"><a class="affichageT" href="#">couleur</a></td>
			  	<td class="affichageT" align="left"><a class="affichageT" href="#">taille</a></td>
				<td class="affichageT" align="left"><a class="affichageT" href="#">marque</a></td>
				<td class="affichageT" align="left"><a class="affichageT" href="#" >stock</a></td>
			  	<td class="affichageT" align="left">&nbsp;</td>
	        </tr>
			<? while($row=mysql_fetch_array($result)){ ?>
				<?								
					if ($cc % 2){
						$class_ch="affichage2";
					}else{
						$class_ch="affichage";
					}
				?>		
			<tr align="center""> 
				<td class="<? echo $class_ch?>" align="left"><a href="sousref_liste_produit.php?action=modif&num_produit=<? echo $_GET["num_produit"] ?>&num_produit_sousref=<? echo $row["num_produit_sousref"]?>#baba"><img src="images/modifier_off.gif" alt="" width="13" height="13" border="0"></a></td>
				<td class="<? echo $class_ch?>" align="left"><? echo $row["sous_reference"]?></td>
				<td class="<? echo $class_ch?>" align="left"><? echo $row["reference"]?></td>
				<td class="<? echo $class_ch?>" align="left"><b><? echo $row["designation"]?></b></td>
				<td class="<? echo $class_ch?>" align="left"><strong><? echo $row["couleur"]?></strong></td>
				<td class="<? echo $class_ch?>" align="left"><strong><? echo $row["taille"]?></strong></td>
				<td class="<? echo $class_ch?>" align="left"><? echo $row["marque"]?></td>
				<td class="<? echo $class_ch?>" align="left"><? echo $row["stock"]?></td>
				<td class="<? echo $class_ch?>" align="left"><a href="sousref_suppr.php?num_produit=<? echo $_GET["num_produit"] ?>&num_produit_sousref=<? echo $row["num_produit_sousref"]?>" onClick="return confirm('êtes-vous sûr de vouloir supprimer la référence <? echo $row["num_produit_sousref"] ?> ?')"><img src="images/supprimer_off.gif" alt="" width="13" height="13" border="0"></a></td>
	        </tr>
				<? $cc++ ?>	
			<? }?>
	      	</table>
	  </td>
	  <? } else {?>
	  	<td align="center">Pas de sous references dans la base</td>
	  <? }?>
  </tr>
</table>

	<? if ($_GET["action"]=="modif"){ // en mode modification?>
		<form action="sousref_liste_produit.php" method="get" name="formulaire2" onSubmit="return Form1_Validator(this)">
		<input name="action" type="hidden" value="modif_2">
		<input name="num_produit" type="hidden" value="<? echo $_GET["num_produit"] ?>">
		<input name="num_produit_sousref" type="hidden" value="<? echo $num_produit_sousref ?>">
		<table width="250" border="0" cellpadding="2" cellspacing="0">
		<tr> 
			<td id="texte2b" width="10%" height="30">Sous-référence</td>
			<td width="64%" height="30" id="texte2b">Couleur</td>
			<td width="64%" height="30" id="texte2b">Taille</td>
			<td width="64%" height="30" id="texte2b">Stock</td>
			<td width="64%" height="30" id="texte2b">&nbsp;</td>
		</tr>
		<tr> 
			<td height="30"><input size="14"  name="sous_reference" type="text" value="<? echo $sous_reference ?>"></td>
			<td height="30"> 
				<?
					$query ="SELECT * FROM couleur ";
					$query.=" WHERE couleur.actif =1 ";	
					$query.=" ORDER BY couleur ";	
					//echo $query;
					$rstemp3 = mysql_query($query);
					$nb_enr = mysql_num_rows($rstemp3);
				?>
				<select name="num_couleur" size="1">
				  <? while ($row = mysql_fetch_array($rstemp3)) { ?>
				  <? if ($num_couleur == $row["num_couleur"]) { ?>
				  <option selected value="<? echo $row["num_couleur"] ?>"><? echo $row["couleur"] ?></option>
				  <?  } else {  ?>
				  <option value="<? echo $row["num_couleur"] ?>"><? echo $row["couleur"] ?></option>
				  <? } ?>
				  <? } ?>
				</select>
			</td>	
			<td height="30"> 
				<?
					$query ="SELECT * FROM taille ";
					$query.=" WHERE taille.actif =1 ";	
					$query.=" ORDER BY taille ";	
					//echo $query;
					$rstemp3 = mysql_query($query);
					$nb_enr = mysql_num_rows($rstemp3);
				?>
				<select name="num_taille" size="1">
				  <? while ($row = mysql_fetch_array($rstemp3)) { ?>
				  <? if ($num_taille == $row["num_taille"]) { ?>
				  <option selected value="<? echo $row["num_taille"] ?>"><? echo $row["taille"] ?></option>
				  <?  } else {  ?>
				  <option value="<? echo $row["num_taille"] ?>"><? echo $row["taille"] ?></option>
				  <? } ?>
				  <? } ?>
				</select>
			</td>	
			<td height="30"><input size="3"  name="stock" type="text" value="<? echo $stock ?>"></td>
			<td height="30"><input name="ee" type="submit" value="Modifier"></td>
		</tr>
		</table>
		</form>

	<? } else { // en mode ajout ?>
		<form action="sousref_liste_produit.php" method="get" name="formulaire2" onSubmit="return Form1_Validator(this)">
		<input name="action" type="hidden" value="ajout">
		<input name="num_produit" type="hidden" value="<? echo $_GET["num_produit"] ?>">
		<table width="250" border="0" cellpadding="2" cellspacing="0">
		<tr> 
			<td id="texte2b" width="10%" height="30">Sous-référence</td>
			<td width="64%" height="30" id="texte2b">Couleur</td>
			<td width="64%" height="30" id="texte2b">Taille</td>
			<td width="64%" height="30" id="texte2b">Stock</td>
			<td width="64%" height="30" id="texte2b">&nbsp;</td>
		</tr>
		<tr> 
			<td height="30"><input size="14"  name="sous_reference" type="text" value="ne rien mettre"></td>
			<td height="30"> 
				<?
					$query ="SELECT * FROM couleur ";
					$query.=" WHERE couleur.actif =1 ";	
					$query.=" ORDER BY couleur ";	
					//echo $query;
					$rstemp3 = mysql_query($query);
					$nb_enr = mysql_num_rows($rstemp3);
				?>
				<select name="num_couleur" size="1">
				  <? while ($row = mysql_fetch_array($rstemp3)) { ?>
				  <? if ($num_couleur == $row["num_couleur"]) { ?>
				  <option selected value="<? echo $row["num_couleur"] ?>"><? echo $row["couleur"] ?></option>
				  <?  }Else{  ?>
				  <option value="<? echo $row["num_couleur"] ?>"><? echo $row["couleur"] ?></option>
				  <? } ?>
				  <? } ?>
				</select>
			</td>	
			<td height="30"> 
				<?
					$query ="SELECT * FROM taille ";
					$query.=" WHERE taille.actif =1 ";	
					$query.=" ORDER BY taille ";	
					//echo $query;
					$rstemp3 = mysql_query($query);
					$nb_enr = mysql_num_rows($rstemp3);
				?>
				<select name="num_taille" size="1">
				  <? while ($row = mysql_fetch_array($rstemp3)) { ?>
				  <? if ($num_taille == $row["num_taille"]) { ?>
				  <option selected value="<? echo $row["num_taille"] ?>"><? echo $row["taille"] ?></option>
				  <?  }Else{  ?>
				  <option value="<? echo $row["num_taille"] ?>"><? echo $row["taille"] ?></option>
				  <? } ?>
				  <? } ?>
				</select>
			</td>	
			<td height="30"><input size="3"  name="stock" type="text" value=""></td>
			<td height="30"><input name="ee" type="submit" value="Ajouter"></td>
		</tr>
		</table>
		</form>
	<?  } ?>
<?  } ?>
<a name="baba"></a>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
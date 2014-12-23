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

</script>
</head>
<body id="fond_blanc" leftmargin="0" topmargin="0" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/modifier_over.gif','images/supprimer_over.gif','images/chercher_over.gif')" border="0">
<table width="100%" height="100%" border="0" cellpadding="10" cellspacing="0">
  <tr> 
  	<?
		if (!isset($_GET["ordre"])) $_GET["ordre"] = "designation";
		if (!isset($_GET["action"])) $_GET["action"] = "association";
			if ($_GET["action"]=="promotion"){
				$query  ="SELECT DISTINCT produit.num_produit, produit.reference,produit.prix, produit.designation, produit.vignette, marque.marque";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot ";	
				$query .=" FROM  produit INNER JOIN marque ON marque.num_marque = produit.num_marque";
				$query .=" WHERE produit.lot>0";	
				$query .=" AND produit.actif=1";
				$query .=" ORDER BY ". $_GET["ordre"]; 
			}elseif ($_GET["action"]=="top5"){	
				$query  ="SELECT  produit.num_produit, produit.reference,produit.prix, produit.designation, produit.vignette, marque.marque";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot ";	
				$query .=" FROM  produit INNER JOIN marque ON marque.num_marque = produit.num_marque";
				$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit";
				$query .=" WHERE produit_rubrique.num_rubrique=5";	
				$query .=" AND produit.actif=1";
				$query .=" ORDER BY ". $_GET["ordre"]; 
			}elseif ($_GET["action"]=="association"){	
				$query  ="SELECT  produit.num_produit, produit.reference,produit.prix, produit.designation, produit.vignette, marque.marque";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot ";	
				$query .=" FROM  produit INNER JOIN marque ON marque.num_marque = produit.num_marque";
				$query .=" AND produit.actif=1";
				$query .=" ORDER BY ". $_GET["ordre"]; 
			}
			//echo $query;
			$result = mysql_query($query);
			$nb_enr = mysql_num_rows($result);
	?>
	<? if (mysql_num_rows($result)>0) {?>
    	<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="5">
	        <tr align="center" > 
				<td class="affichageT" align="left">&nbsp;</td>
	          	<td class="affichageT" align="left"><a class="affichageT" href="produit_liste_filtre.php?ordre=reference&action=<?=$_GET["action"] ?>">ref</a></td>
			  	<td class="affichageT" align="left"><a class="affichageT" href="produit_liste_filtre.php?ordre=designation&action=<?=$_GET["action"] ?>">designation</a></td>
			  	<td class="affichageT" align="left"><a class="affichageT" href="produit_liste_filtre.php?ordre=marque&action=<?=$_GET["action"] ?>">marque</a></td>
			  	<td class="affichageT" align="left"><a class="affichageT" href="produit_liste_filtre.php?ordre=prix&action=<?=$_GET["action"] ?>">Prix</a></td>
			  	
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
			 <? if ($_GET["action"]=="association"){	?>
			  <td class="<? echo $class_ch?>" align="left"><a href="produit_associe.php?num_produit=<? echo $row["num_produit"]?>&design=<? echo urlencode($row["designation"])?>"><img src="images/modifier_off.gif" alt="" width="13" height="13" border="0"></a></td>
	         <? } else {?>
			  <td class="<? echo $class_ch?>" align="left"><a href="produit_modif.php?num_produit=<? echo $row["num_produit"]?>"><img src="images/modifier_off.gif" alt="" width="13" height="13" border="0"></a></td>
			 <? }?> 
			  <td class="<? echo $class_ch?>" align="left"><? echo $row["reference"]?></td>
			  <td class="<? echo $class_ch?>" align="left"><b><? echo $row["designation"]?></b></td>
			  <td class="<? echo $class_ch?>" align="left"><? echo $row["marque"]?></td>
			  <td class="<? echo $class_ch?>" align="left"><? echo $row["prix"]?>€</td>
			  
	        </tr>
				<? $cc++ ?>	
			<? }?>
	      	</table>
	  </td>
	  <? } else {?>
	  	<td align="center">Pas de produit dans la base</td>
	  <? }?>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
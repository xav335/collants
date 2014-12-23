<?php include_once("../include/_connexion.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - specialist in stockings</title>
<META NAME="description" content="Stocking and tights of high quality: for women and for men!">
<META NAME="keywords" content=" tights, stocking, knee-highs, socks, pantyhose, hold-ups, stockings, sheer stockings, hosiery, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon,woman, women, wellness, emotion, dax, collants, collant">
<META content="ALL" name="robots">
<META content="document" name="resource-type">
<META content="15 days" name="revisit-after">
<META name="dc.description" content="Stocking and tights of high quality: for women and for men!">
<META name="dc.keywords" content="tights, stocking, knee-highs, socks, pantyhose, hold-ups, stockings, sheer stockings, hosiery, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon,woman, women, wellness, emotion, dax, collants, collant">
<META name="author" CONTENT ="collants.fr">
<META name="dc.subject" content="Stocking and tights of high quality: for women and for men!">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
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
</head>
<?
	//si collants - bas -  nouveautés -  coup de coeur
	if ($_GET["num_rubrique"]==1 || $_GET["num_rubrique"]==2 || $_GET["num_rubrique"]==3 || $_GET["num_rubrique"]==4){
			if ($_GET["num_marque"] != ""){
				$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix ";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot_en, produit.lib_flash1_en, produit.lib_flash2_en  ";	
				$query .=" FROM  produit ";	
				$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
				$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
				$query .=" AND  produit.num_marque=". $_GET["num_marque"];	
				$query .=" AND produit.actif=1";
				$query .=" AND produit.visible=1";
				$query .=" ORDER BY produit.reference DESC";	
			}elseif ($_GET["num_categorie"] != ""){
				$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix ";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot_en, produit.lib_flash1_en, produit.lib_flash2_en  ";	
				$query .=" FROM  produit ";	
				$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
				$query .=" INNER JOIN produit_categorie ON produit_categorie.num_produit = produit.num_produit ";	
				$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
				$query .=" AND  produit_categorie.num_categorie=". $_GET["num_categorie"];	
				$query .=" AND produit.actif=1";
				$query .=" AND produit.visible=1";
				$query .=" ORDER BY produit.reference DESC";	
			}elseif ($_GET["num_taille"] != ""){
				$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix ";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot_en, produit.lib_flash1_en, produit.lib_flash2_en  ";	
				$query .=" FROM  produit ";	
				$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
				$query .=" INNER JOIN produit_sousref ON produit_sousref.num_produit = produit.num_produit ";	
				$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
				$query .=" AND  produit_sousref.num_taille=". $_GET["num_taille"];	
				$query .=" AND produit.actif=1";
				$query .=" AND produit.visible=1";
				$query .=" ORDER BY produit.reference DESC";	
			}else{
				$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix ";
				$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot_en, produit.lib_flash1_en, produit.lib_flash2_en  ";	
				$query .=" FROM  produit ";	
				$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
				$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
				$query .=" AND produit.actif=1";
				$query .=" AND produit.visible=1";
				$query .=" ORDER BY produit.reference DESC";	
			}
	// PROMOTIONS		
	}elseif ($_GET["num_rubrique"] == 5){
		$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix";
		$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot_en, produit.lib_flash1_en, produit.lib_flash2_en  ";	
		$query .=" FROM  produit ";	
		$query .=" WHERE produit.lot>0";	
		$query .=" AND produit.actif=1";
		$query .=" AND produit.visible=1";
		$query .=" ORDER BY produit.reference DESC";	
	}
	//$query .=" LIMIT 0,10";	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
?>
<body background="images/fond_collants.gif" bgproperties="fixed" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" id="fond_rose" onLoad="MM_preloadImages('images/ajouter_over.jpg')" border="0">
<? if ($nb_enr>0){?>
<table width="1" border="0" cellpadding="20" align="left" >
	 <tr> 
	<? $cpt_col=1 ?>
	<? while ($produit = mysql_fetch_array($rstemp)) { ?>
	<?		
		$num_produit = $produit["num_produit"];
		$designation =  $produit["designation"];
		$vignette =  $produit["vignette"];
		$prix = $produit["prix"];
		$lot = $produit["lot"];
		$promo_lot = $produit["promo_lot"];
		$lib_lot = $produit["lib_lot_en"];
		$lib_flash1 = $produit["lib_flash1_en"];
		$lib_flash2 = $produit["lib_flash2_en"];
	?>
				<? if ($lot>0 || $lib_flash1<>"" || $lib_flash2<>"") { //affichage des promotions ou des pub flash?> 
					<td valign="top">
						<table width="20%" border="0" cellspacing="0" cellpadding="0">
						<tr> 
						  <td> 
								<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="105" height="142" id="promotion" align="middle">
								<param name="allowScriptAccess" value="sameDomain" />
								<param name="movie" value="images/promotion.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo str_replace("%","%25",$lib_flash1) ?>&promo2txt=<? echo str_replace("%","%25",$lib_flash2) ?>" />
								<PARAM NAME="wmode" VALUE="transparent">
								<param name="quality" value="high" />
								<param name="bgcolor" value="#ffffff" />
								<embed src="images/promotion.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo str_replace("%","%25",$lib_flash1) ?>&promo2txt=<? echo str_replace("%","%25",$lib_flash2) ?>" quality="high" bgcolor="#ffffff" width="105" height="142" name="promotion" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
								</object>
							</td>
						</tr>
						<tr> 
						  <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr> 
								<td id="texte1"><? echo $designation?></td>
							  </tr>
							  <? if ($lot>0) { //affichage des promotions?> 
							  <tr> 
								<td><span class="prixbarre"><? echo $prix?> €</span></td>
							  </tr>
							   <tr> 
								<td id="texte1_blanc"><? echo $lib_lot?></td>
							  </tr>
							  <? }else{ ?>
							   <tr> 
								<td id="texte2_blanc"><? echo $prix?> &#8364;</td>
							  </tr>
							  <?  } ?>
							</table></td>
						</tr>
						<tr> 
						  <td><div align="left"><A HREF="produit_seul.php?num_produit=<? echo $num_produit ?>"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image<? echo $cpt_col?>','','images/ajouter_over.jpg',1)"><img src="images/ajouter_on.jpg" name="Image<? echo $cpt_col?>" width="99" height="13" border="0" id="Image61"></a></div></td>
						</tr>
						</table>
					</td>
				<? }else{ ?>
			    <td  valign="top">
					<table width="20%" border="0" cellspacing="0" cellpadding="0">
			        <tr> 
			          <td> <a href="produit_seul.php?num_produit=<? echo $num_produit ?>"><img width="105" height="142" src="../photo/petite/<? echo $vignette ?>" border="0"></a></td>
			        </tr>
			        <tr> 
			          <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
			              <tr> 
			                <td id="texte1"><? echo $designation?></td>
			              </tr>
			              <tr> 
			                <td id="texte2_blanc"><? echo $prix?> &#8364;</td>
			              </tr>
			            </table></td>
			        </tr>
			        <tr> 
			          <td><div align="left"><A HREF="produit_seul.php?num_produit=<? echo $num_produit ?>"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image<? echo $cpt_col?>','','images/ajouter_over.jpg',1)"><img src="images/ajouter_on.jpg" name="Image<? echo $cpt_col?>" width="99" height="13" border="0" id="Image61"></a></div></td>
			        </tr>
			      	</table>
				</td>
				<?  } ?>
			<? if ($cpt_col%3 ==0) {?> 
				</tr>
				<tr>
			<? }?>
		<? $cpt_col++ ?>	  
	<? } ?>
	</tr>
</table>
<? } else {?>
<br>
<br>

<table width="425" border="0" cellpadding="21" align="left" >
<tr> 
    <td align="center"> <p><b>NO PRODUCT FOUND</b></p>
      <p><b>IN THIS CATEGORY<br>
        </b></p></td>
</tr>
</table>	
<? }?>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
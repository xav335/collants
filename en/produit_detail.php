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
//-->
</script>
</head>
<?
	$query="SELECT * FROM  produit ";
	$query .=" WHERE num_produit=".$_GET["num_produit"];	
	$rstemp = mysql_query($query);

?>
<? while ($produit = mysql_fetch_array($rstemp)) { ?>
	<?		
		$photo =  $produit["photo"];
		$num_produit = $produit["num_produit"];
		$designation =  $produit["designation"];
		$vignette =  $produit["vignette"];
		$prix = $produit["prix"];
		$description = nl2br($produit["description_en"]);
		$note = nl2br($produit["note_en"]);
		$lot = $produit["lot"];
		$promo_lot = $produit["promo_lot"];
		$lib_lot = $produit["lib_lot_en"];
	?>
<? }?>	


	<?
		if ($_GET["num_couleur"] !=""){		
			$query="SELECT * FROM  couleur ";
			$query .=" WHERE num_couleur=".$_GET["num_couleur"];	
			$rstemp = mysql_query($query);
		
			while ($row = mysql_fetch_array($rstemp)) { 
				$fic_couleur = $row["fic_couleur"];
				$couleur = $row["couleur_en"];
			}
		}	
	?>	

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" id="fond_rose" border="0">
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td>&nbsp;</td>
    <td width="252"><a href="javascript:history.back()"><img src="../photo/grande/<? echo $photo?>" width="306" height="419" border="0"></a></td>
	<td valign="top">
		<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0" >
		<tr>
			<td valign="top"  id="texte2">
				<span id="texte3_blanc"><? echo $designation?></span><br><br>

				<? echo $description ?>
				<br> 
				<? echo $note ?><br><br>
				<? if ($lot>0) { //affichage des promotions?> 
					<table width="70%" border="0" cellspacing="0" cellpadding="0">
					<tr> 
						<td align="center"><span class=prixbarre><? echo $prix ?> €</span><br>
						<br>
						</td>
					</tr>
					<tr> 
						<td align="center" id="texte2_blanc"><? echo $lib_lot?></td>
					</tr>
					</table>
				<? }else{  ?>
					<table width="70%" border="0" cellspacing="0" cellpadding="0">
					<tr> 
						<td align="center" id="texte2_blanc"><? echo $prix ?> €<br>
						<br>
						</td>
					</tr>
					</table>
					
				<? } ?>
			</td>
		</tr>  
		<tr>
			<td height="30"  id="texte2">&nbsp;</td>
		</tr>
		<? if ($_GET["num_couleur"] !=""){?>
		<tr>
			<td  id="texte2">
				
				<br>
				<img src="../couleur/<? echo $fic_couleur ?> " width="52" height="52" border="0" align="absmiddle">

				<span id=texte_prix><b><? echo $couleur ?> </b></span>
			</td>
		</tr>  
		<? } ?>
        </table>
	</td>
	<td valign="bottom"><a id="texte2" href="javascript:history.back()<?// echo $HTTP_SERVER_VARS["HTTP_REFERER"];?>">back</a></td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
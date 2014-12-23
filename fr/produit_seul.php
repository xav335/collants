<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?  

	if ($_GET["num_produit"]<>"" && $_GET["choix_taille"]<>"" && $_GET["choix_couleur"]<>"" && $_GET["Image101_x"]<>""){
		$query="SELECT num_produit_sousref FROM  produit_sousref ";
		$query .=" WHERE num_produit=".$_GET["num_produit"];	
		$query .=" AND num_taille=".$_GET["choix_taille"];	
		$query .=" AND num_couleur=".$_GET["choix_couleur"];
		$query .=" AND produit_sousref.actif=1 ";		
		//echo $query;
		$rstemp12 = mysql_query($query);
		while ($sousref = mysql_fetch_array($rstemp12)) { 
			$num_produit_sousref = $sousref["num_produit_sousref"];
		}
		
		if ($num_produit_sousref<>""){
			header("Location: panier_ajout.php?num_produit_sousref=". $num_produit_sousref ."&quantite=". $_GET["quantite"] ."&num_produit=". $_GET["num_produit"]);
		}	
?>
		<script language="JavaScript" type="text/JavaScript">
			//top.location.href ="panier.php?num_produit_sousref=<? echo $num_produit_sousref ?>&quantite=<? echo $_GET["quantite"] ?>"
		</script>  
	<?}?>
<? if ($_GET["panier_refresh"]==1){ ?>	
<script language="JavaScript" type="text/JavaScript">
	parent.panier.location.href ="panier_texte.php"
</script> 	
<? }?>	
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
var globWin;            
function wLoader(_URL)  
{	
	var _windowTitle="_blank";
	var _windowSettings="top=11,left=11,screenX=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=500";

	globWin = window.open(_URL,_windowTitle,_windowSettings);
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
		$num_produit = $produit["num_produit"];
		$num_marque = $produit["num_marque"];
		$designation =  $produit["designation"];
		$vignette =  $produit["vignette"];
		$prix = $produit["prix"];
		$description = nl2br($produit["description"]);
		$note = nl2br($produit["note"]);
		$lot = $produit["lot"];
		$promo_lot = $produit["promo_lot"];
		$lib_lot = $produit["lib_lot"];
		$lib_flash1 = $produit["lib_flash1"];
		$lib_flash2 = $produit["lib_flash2"];
	?>
<? }?>	
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" id="fond_rose" onLoad="MM_preloadImages('images/ajouter_over.jpg','images/ajouter2_over.jpg')" border="0">
<table width="412" border="0" align="left" >
	<td width="15">&nbsp;</td>
    <td width="343"  colspan="3" align="left" valign="top"><br>
		<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
    <form name="formulaire" method="get" action="produit_seul.php#enbas" onSubmit="return validtaille()">  
		<input name="num_produit" type="hidden" value="<?  echo $_GET["num_produit"]?>">  
		
		<? if ($lot>0) { //affichage des promotions?> 
		<tr> 
          <td valign="top">
		  	<table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr> 
                <td valign="top" align="center">
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="105" height="142" id="promotion" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="movie" value="images/promotion_photo.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo str_replace("%","%25",$lib_flash1) ?>&promo2txt=<? echo str_replace("%","%25",$lib_flash2) ?>" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<embed src="images/promotion_photo.swf?urlphoto=../photo/petite/<? echo $vignette ?>&numproduit=<? echo $num_produit ?>&promotxt=<? echo str_replace("%","%25",$lib_flash1) ?>&promo2txt=<? echo str_replace("%","%25",$lib_flash2) ?>" quality="high" bgcolor="#ffffff" width="105" height="142" name="promotion" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
					<br>
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
					
				</td>
                <td valign="top"  id="texte2"><span id="texte3_blanc"><? echo $designation?></span><br>
                  <? echo $description ?>
				  <br> 
				  <? echo $note ?>
				  </td>
              </tr>
              <tr> 
                <td height="30" colspan="2"  id="texte1_blanc"><a href="produit_photo.php?num_produit=<? echo $num_produit ?>&avant=produit_seul">cliquez pour agrandir la photo</a></td>
              </tr>
            </table>
			</td>
        </tr>
		<? }else{ ?>
		<tr> 
          <td valign="top" id="texte2">
		  	<table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr> 
                <td valign="top" align="center">
					<a href="produit_photo.php?num_produit=<? echo $num_produit ?>&avant=produit_seul"><img src="../photo/petite/<? echo $vignette ?>" width="105" height="144" border="0"></a><br>
					<span id=texte_prix><b><? echo $prix ?> €</b></span>
				</td>
                <td valign="top"  id="texte2"><span id="texte3_blanc"><? echo $designation?></span><br>
                  <? echo $description ?>
				  <br> 
				  <? echo $note ?>
				  </td>
              </tr>
              <tr> 
                <td height="30" colspan="2"  id="texte1_blanc"><a href="produit_photo.php?num_produit=<? echo $num_produit ?>&avant=produit_seul">cliquez pour agrandir la photo</a></td>
              </tr>
            </table>
			</td>
        </tr>
		<?  } ?>
		
		<tr> 
          <td valign="top"><img src="images/pixel_rouge.jpg" width="100%" height="1"></td>
        </tr>
        <tr> 
          <td height="30" valign="top"  id="texte2"><br>
            veuillez s&eacute;lectionner une couleur :<br>
            <br>
          </td>
        </tr>
		<?
				$query  =" SELECT DISTINCT produit_sousref.num_produit,produit_sousref.num_couleur,couleur.couleur,couleur.fic_couleur ";
				$query .=" FROM  produit_sousref ";
				$query .=" INNER JOIN couleur ON couleur.num_couleur = produit_sousref.num_couleur ";
				$query .=" WHERE produit_sousref.num_produit=".$_GET["num_produit"];	
				$query .=" AND produit_sousref.actif = 1";	
				$query .=" AND produit_sousref.stock > 0";	
				$query .=" ORDER BY produit_sousref.num_couleur";	
				$rstemp = mysql_query($query);
				$nb_enr14= mysql_num_rows($rstemp);
				$cpt_couleur = mysql_num_rows($rstemp);
				$rstemp2 = mysql_query($query);
				//echo $query
			?> 
        <? if ($nb_enr14 > 0){?>
		
		<tr>
          <td height="30" valign="top">
				  	<table  border="0" cellspacing="0" cellpadding="0">
		              <tr> 
					  	<? $cpt_col=1 ?>
					  	<? while ($produit = mysql_fetch_array($rstemp)) { ?>
							<?		
								$num_couleur = $produit["num_couleur"];
								$couleur = $produit["couleur"];
								$fic_couleur = htmlspecialchars ($produit["fic_couleur"]);
							?>
						
		                	<td>
									<table  border="0" cellpadding="4" cellspacing="0">
									<tr>
										<td align="center"><img src="../couleur/<? echo $fic_couleur?>" width="50" height="50" alt="<? echo $couleur?>"></td>
									</tr>
									<tr>
										<td id="texte_prix" align="center"><? echo $couleur ?></td>
									</tr>
									 <? if ($cpt_couleur<=1){?>
										<tr>
											<td align="center"><input type="radio" name="choix_couleur" checked value="<? echo $num_couleur ?>"></td>
										</tr>
										  <input name="num_couleur" type="hidden" value="<? echo $num_couleur ?>">
									  <? }else{?> 
										<tr>
											<? if ($_GET["num_couleur"]==$num_couleur){?>
											 <td align="center"><input checked type="radio" name="choix_couleur" value="<? echo $num_couleur?>" onClick="choixcouleur()"></td>
											<? }else{?>
											<td align="center"><input type="radio" name="choix_couleur" value="<? echo $num_couleur?>" onClick="choixcouleur()"></td>
											<? }?>	
										</tr>
										
										<? }?>		  
									</table>
							</td>
							<? if ($cpt_col%6 ==0) {?> 
								</tr>
								<tr>
							<? }?>
						<? $cpt_col++ ?>	
						<? }?>	
					  </tr>
					  <? if ($cpt_couleur > 1){?>
						 <script language="JavaScript" type="text/JavaScript">
							function choixcouleur(){
								for(i=0;i<=<? echo $cpt_couleur-1 ?>;i++){
									if (document.formulaire.choix_couleur[i].checked){
										document.formulaire.num_couleur.value = document.formulaire.choix_couleur[i].value;
										document.formulaire.submit();
									}
								}
							}
						  </script>  
						  <input name="num_couleur" type="hidden" value="">
					<? } ?>		 
		            </table>
					
			</td>
        </tr>
		
		
		
		
		
		
		
		
		
		

		
		
				<? if ($_GET["num_couleur"]<>"" || $cpt_couleur<=1){
						if ($cpt_couleur<=1) $_GET["num_couleur"] = $num_couleur;		?>
					
					<tr> 
					  <td valign="top"><img src="images/pixel_rouge.jpg" width="100%" height="1"></td>
					</tr>
					
					<tr> 
					  <td height="30" valign="top"  id="texte2"><br>
						veuillez s&eacute;lectionner une taille:<br>
						(si vous avez des doutes sur votre taille, <a href="#" onClick="javascript:wLoader('taille.php?num_marque=<?php echo $num_marque ?>');return false;">cliquez 
						ici.</a>)<br>
						<br>
					  </td>
					</tr>
					
					<tr> 
						<?
							$query  =" SELECT DISTINCT produit_sousref.num_produit,produit_sousref.stock,produit_sousref.num_taille,taille.taille ";
							$query .=" FROM  produit_sousref ";
							$query .=" INNER JOIN taille ON taille.num_taille = produit_sousref.num_taille ";
							$query .=" WHERE produit_sousref.num_produit=".$_GET["num_produit"];	
							$query .=" AND produit_sousref.num_couleur=". $_GET["num_couleur"];
							$query .=" AND produit_sousref.actif=1 ";	
							$query .=" AND produit_sousref.stock > 0";	
							$query .=" ORDER BY produit_sousref.num_taille";	
							$rstemp = mysql_query($query);
							$rstemp2 = mysql_query($query);
							//echo $query
						?> 
					  <td valign="top">
								<table  border="0" cellspacing="0" cellpadding="0">
								  <tr align="center"> 
								  <? $cpt_taille = 0 ?>
									<? while ($produit = mysql_fetch_array($rstemp)) { ?>
										<?		
											$num_taille = $produit["num_taille"];
											$taille = $produit["taille"];
											$stock = $produit["stock"];
										?>
									
										<td width="50" id="texte_prix"><? echo $taille ?></td>
										<? $cpt_taille++ ?>	
									<? }?>	
								  </tr>
									<? if ($cpt_taille<=1){?>
										<tr> 
											<td align="center"><input type="radio" checked name="choix_taille" value="<? echo $num_taille?>"></td>			
										</tr>
										
											<input name="num_taille" type="hidden" value="<? echo $num_taille?>"> 	
									<? }else{?>
										 <tr> 
											<? while ($produit = mysql_fetch_array($rstemp2)) { ?>
												<?		
													$num_taille = $produit["num_taille"];
													$taille = $produit["taille"];
													$stock = $produit["stock"];
												?>
												<? if ($_GET["num_taille"]==$num_taille){?>
												 <td align="center"><input type="radio" checked name="choix_taille" value="<? echo $num_taille?>" onClick="choixtaille(<? echo $stock?>)"></td>
												<? }else{?>
												<td align="center"><input type="radio" name="choix_taille" value="<? echo $num_taille?>" onClick="choixtaille(<? echo $stock?>)"></td>
												<? }?>	
												
											<? }?>	
										  </tr>
										  <script language="JavaScript" type="text/JavaScript">
											function choixtaille(stock){
												lot = <? echo $lot ?>;
												//alert(lot);
												for(i=0;i<=<? echo $cpt_taille-1 ?>;i++){
													if (document.formulaire.choix_taille[i].checked){
														document.formulaire.num_taille.value = document.formulaire.choix_taille[i].value;
														for(k=0;k<100;k++){
															document.formulaire.quantite.options[0]=null;
														}
														for(k=1;k<=stock;k++){
															var o=new Option(k,k);
															document.formulaire.quantite.options[document.formulaire.quantite.options.length]=o;
														}
														if (lot>0 && lot <= stock){
															document.formulaire.quantite.options[lot-1].selected=true;
														}
													}
												}
											}
										  </script>
											<input name="num_taille" type="hidden" value="<? echo $_GET["num_taille"]?>">
									<? }?>
								</table>
					   </td>
					</tr>
					
					
					
					<tr> 
					  <td height="30" valign="top" id="texte1_blanc">
						<table width="405"  border="0" cellspacing="0" cellpadding="0">
						<tr> 
							
							<td align="right"  id="texte2">veuillez choisir une quantité :
								<? if ($cpt_taille<=1){?>
								<select name="quantite" size="1">
									
									<? for ($t=1;$t<=$stock;$t++){?>
									<option value="<? echo $t ?>"><? echo $t ?></option>
									<? } ?>
								</select>
								<? }else{?> 
									<select name="quantite" size="1">
									
									<? for ($t=1;$t<=1;$t++){?>
									<option value="<? echo $t ?>"><? echo $t ?></option>
									<? } ?>
								</select>
								<? }?>	
							</td>
						</tr>
						</table>
					  </td>
					</tr>
					<tr> 
					  <td height="30" valign="top" id="texte1_blanc"><a name="enbas">
						<table width="405"  border="0" cellspacing="0" cellpadding="0">
						<tr> 
							
		<td align="right">
<input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image101','','images/ajouter2_over.jpg',1)" type="image" src="images/ajouter2_on.jpg" name="Image101" width="108" height="13" border="0" id="Image101"></td>
							<? if ($cpt_taille<=1){?>
								<script language="JavaScript" type="text/JavaScript">
								function validtaille(){
									return true;
								}
								</script> 
							<? }else{?> 
							   <script language="JavaScript" type="text/JavaScript">
								function validtaille(){
									taille_cochee = false;
									for(i=0;i<=<? echo $cpt_taille-1 ?>;i++){
										if (document.formulaire.choix_taille[i].checked){
											taille_cochee = true;
										}
									}
									if (!taille_cochee){
										alert("Veuillez choisir une taille");
										return false;
									}else{
										return true;
									}
								}
							  </script> 
							<? }?>	 
						</tr>
						</table>
					  </td>
					</tr>
				   <? }?>	
		
		
		
		 <? }else{ //ya plus de stock !?>	
			<tr> <td id="texte2"> Ce produit est en rupture de stock veuillez eventuellement <br>
							nous contactez par <a href="contact.php" target="_parent">contact@collants.fr</a></td>
							
						</tr>
				  
		 <? }//fin test du  stock !?>			   
	   
      </table>
	  </td>
  </tr>
</table>
 </form> 
<script language="javascript">
<? if ($_GET["depassement"]==1) { ?>
	alert("depassement du stock");
<? } ?>
</script>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>


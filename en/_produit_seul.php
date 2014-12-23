<?php include_once("../include/_connexion.php"); ?>
<? 
if ($_GET["num_produit"] <>"" && $_GET["num_taille"]<>"" && $_GET["num_couleur"])   

?>
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
	$query="SELECT * FROM  produit ";
	$query .=" WHERE num_produit=".$_GET["num_produit"];	
	$rstemp = mysql_query($query);

?>
<? while ($produit = mysql_fetch_array($rstemp)) { ?>
	<?		
		$num_produit = $produit["num_produit"];
		$designation =  $produit["designation"];
		$vignette =  $produit["vignette"];
		$prix = $produit["prix"];
		$description = nl2br($produit["description"]);
		$note = nl2br($produit["note"])
	?>
<? }?>	
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" id="fond_rose" onLoad="MM_preloadImages('images/ajouter_over.jpg')" border="0">
<table width="412" border="0" align="left" >
	<td width="15">&nbsp;</td>
    <td width="343"  colspan="3" align="left" valign="top"><br>
		<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
    <form name="formulaire" method="get" action="produit_seul.php" onSubmit="return validcouleur()">  
		<input name="num_produit" type="hidden" value="<?  echo $_GET["num_produit"]?>">  
		<tr> 
          <td valign="top" id="texte2">
		  	<table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr> 
                <td valign="top" align="center">
					<a href="produit_photo.php?num_produit=<? echo $num_produit ?>"><img src="../photo/petite/<? echo $vignette ?>" width="105" height="144" border="0"></a><br>
					<span id=texte_prix><b><? echo $prix ?> €</b></span>
				</td>
                <td valign="top"  id="texte2"><span id="texte3_blanc"><? echo $designation?></span><br>
                  <? echo $description ?>
				  <br> 
				  <? echo $note ?>
				  </td>
              </tr>
              <tr> 
                <td height="30" colspan="2"  id="texte1_blanc"><a href="produit_photo.php?num_produit=<? echo $num_produit ?>">Click 
                  here to enlarge the photograph</a></td>
              </tr>
            </table></td>
        </tr>
		
		<tr> 
          <td valign="top"><img src="images/pixel_rouge.jpg" width="100%" height="1"></td>
        </tr>
        
		<tr> 
          <td height="30" valign="top"  id="texte2"><br>
            Please select a size:<br>
            (if you have douts about your size, <a href="taille.htm" target="_top">click 
            here</a>)<br>
            <br>
          </td>
        </tr>
        
		<tr> 
			<?
				$query  =" SELECT DISTINCT produit_sousref.num_produit,produit_sousref.num_taille,taille.taille ";
				$query .=" FROM  produit_sousref ";
				$query .=" INNER JOIN taille ON taille.num_taille = produit_sousref.num_taille ";
				$query .=" WHERE produit_sousref.num_produit=".$_GET["num_produit"];	
				$query .=" AND produit_sousref.actif=1 ";	
				$query .=" ORDER BY produit_sousref.num_taille";	
				$rstemp = mysql_query($query);
				$rstemp2 = mysql_query($query);
				echo $query
			?> 
          <td valign="top">
				  	<table  border="0" cellspacing="0" cellpadding="0">
		              <tr align="center"> 
					  <? $cpt_taille = 0 ?>
					  	<? while ($produit = mysql_fetch_array($rstemp)) { ?>
							<?		
								$num_taille = $produit["num_taille"];
								$taille = $produit["taille"];
							?>
						
		                	<td width="50" id="texte_prix"><? echo $taille ?></td>
							<? $cpt_taille++ ?>	
						<? }?>	
		              </tr>
					 	<? if ($cpt_taille<=1){?>
							<tr> 
								<td align="center"><input type="radio" checked name="choix_taille" value=""></td>			
							</tr>
							
								<input name="num_taille" type="hidden" value="<? echo $num_taille?>"> 	
						<? }else{?>
							 <tr> 
								<? while ($produit = mysql_fetch_array($rstemp2)) { ?>
									<?		
										$num_taille = $produit["num_taille"];
										$taille = $produit["taille"];
									?>
									<? if ($_GET["num_taille"]==$num_taille){?>
									 <td align="center"><input type="radio" checked name="choix_taille" value="<? echo $num_taille?>" onClick="choixtaille()"></td>
									<? }else{?>
									<td align="center"><input type="radio" name="choix_taille" value="<? echo $num_taille?>" onClick="choixtaille()"></td>
									<? }?>	
									
								<? }?>	
							  </tr>
							  <script language="JavaScript" type="text/JavaScript">
								function choixtaille(){
									for(i=0;i<=<? echo $cpt_taille-1 ?>;i++){
										if (document.formulaire.choix_taille[i].checked){
											document.formulaire.num_taille.value = document.formulaire.choix_taille[i].value;
											document.formulaire.submit();
										}
									}
								}
							  </script>
								<input name="num_taille" type="hidden" value="<? echo $_GET["num_taille"]?>">
						<? }?>
		            </table>
           </td>
        </tr>

		
		
	<? if ($_GET["num_taille"]<>"" || $cpt_taille<=1){
			if ($cpt_taille<=1) $_GET["num_taille"] = $num_taille;		?>
        <tr> 
          <td valign="top"><img src="images/pixel_rouge.jpg" width="100%" height="1"></td>
        </tr>
        <tr> 
          <td height="30" valign="top"  id="texte2"><br>
            Please select a color:<br>
            <br>
          </td>
        </tr>
        <tr>
			<?
				$query  =" SELECT DISTINCT produit_sousref.num_produit,produit_sousref.num_couleur,couleur.couleur,couleur.fic_couleur ";
				$query .=" FROM  produit_sousref ";
				$query .=" INNER JOIN couleur ON couleur.num_couleur = produit_sousref.num_couleur ";
				$query .=" WHERE produit_sousref.num_produit=".$_GET["num_produit"];	
				$query .=" AND produit_sousref.num_taille=". $_GET["num_taille"];
				$query .=" AND produit_sousref.actif=1 ";	
				$query .=" ORDER BY produit_sousref.num_couleur";	
				$rstemp = mysql_query($query);
				$rstemp2 = mysql_query($query);
				echo $query
			?> 
          <td height="30" valign="top">
				  	<table  border="0" cellspacing="0" cellpadding="0">
		              <tr> 
					  	<? $cpt_couleur = 0 ?>
					  	<? while ($produit = mysql_fetch_array($rstemp)) { ?>
							<?		
								$num_couleur = $produit["num_couleur"];
								$couleur = $produit["couleur"];
								$fic_couleur = htmlspecialchars ($produit["fic_couleur"]);
							?>
						
		                	<td width="10" id="texte_prix">
								<img src="../couleur/<? echo $fic_couleur?>" width="50" height="50" alt="<? echo $couleur?>">
							</td>
							<? $cpt_couleur ++ ?>
						<? }?>	
					  </tr>
					  <? if ($cpt_couleur<=1){?>
						 
						  <td align="center"><input type="radio" name="choix_couleur" checked value=""></td>
						  <input name="num_couleur" type="hidden" value="<? echo $num_couleur ?>">
					  <? }else{?> 
						  <tr> 
							<? while ($produit = mysql_fetch_array($rstemp2)) { ?>
								<?		
									$num_couleur = $produit["num_couleur"];
									$couleur = $produit["couleur"];
									$fic_couleur = htmlspecialchars ($produit["fic_couleur"]);
								?>
							
								 <td align="center"><input type="radio" name="choix_couleur" value="<? echo $num_couleur?>" onClick="choixcouleur()"></td>
							<? }?>	
						  </tr>
						
						
							<script language="JavaScript" type="text/JavaScript">
								function choixcouleur(){
									for(i=0;i<=<? echo $cpt_couleur-1 ?>;i++){
										if (document.formulaire.choix_couleur[i].checked){
											document.formulaire.num_couleur.value = document.formulaire.choix_couleur[i].value;
										}
									}
								}
							  </script>  
							  <input name="num_couleur" type="hidden" value="">
						<? }?>		  
		            </table>
					
			</td>
        </tr>
		<tr> 
          <td height="30" valign="top" id="texte1_blanc">
		  	<table width="405"  border="0" cellspacing="0" cellpadding="0">
            <tr> 
				
				<td align="right"  id="texte2">Please select a quantity: 
                  <select name="quantite" size="1">
						<? for ($t=1;$t<=10;$t++){?>
						<option value="<? echo $t ?>"><? echo $t ?></option>
						<? } ?>
					</select>
				</td>
            </tr>
            </table>
		  </td>
        </tr>
        <tr> 
          <td height="30" valign="top" id="texte1_blanc">
		  	<table width="405"  border="0" cellspacing="0" cellpadding="0">
            <tr> 
				<td align="right"><input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image101','','images/ajouter_over.jpg',1)" type="image" src="images/ajouter_on.jpg" name="Image101" width="99" height="13" border="0" id="Image101"></td>
   				<? if ($cpt_couleur<=1){?>
					<script language="JavaScript" type="text/JavaScript">
					function validcouleur(){
						return true;
					}
				  	</script> 
				<? }else{?> 
				   <script language="JavaScript" type="text/JavaScript">
					function validcouleur(){
						couleur_cochee = false;
						for(i=0;i<=<? echo $cpt_couleur-1 ?>;i++){
							if (document.formulaire.choix_couleur[i].checked){
								couleur_cochee = true;
							}
						}
						if (!couleur_cochee){
							alert("Veuillez choisir une couleur");
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
      </table>
	  </td>
  </tr>
</table>
 </form> 

</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
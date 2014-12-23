<?include_once("../include/config.php");?>
<?include_once("../include/_connexion.php");?>
<?include_once("../include/recuperation_theme_fr.php");?>
<?php include_once("../include/_session.php");?>
<?
	if ($_GET["num_produit_sousref"]<>""){
		$query="SELECT * FROM  panier ";
		$query .=" WHERE num_session='". session_id() ."'";	
		$query .=" AND num_produit_sousref=". $_GET["num_produit_sousref"] ;	
		//echo $query ."<br>";
		$rstemp2 = mysql_query($query);
		$nb_enr = mysql_num_rows($rstemp2);
		
		if ($nb_enr >=1){
			$query  = "UPDATE panier ";
			$query .= "Set quantite=quantite+". $_GET["quantite"] ." " ;
			$query .=" WHERE num_session='". session_id() ."'";	
			$query .=" AND num_produit_sousref=". $_GET["num_produit_sousref"] ;	
			//echo $query ."<br>";
			$rstemp3 = mysql_query($query);
		}else{
			$query  = "INSERT INTO panier (num_session,num_produit_sousref,quantite) VALUES (";
			$query .= " '". session_id() ."' " ;
			$query .= " ,". $_GET["num_produit_sousref"] ." " ;
			$query .= " ,". $_GET["quantite"] ." " ;
			$query .= ")";
			//echo $query ."<br>";
			$rstemp = mysql_query($query);
			//$num_marque = mysql_insert_id();
		}	
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
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" src="include/coolmenus4.js" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
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
<body scroll=no onLoad="MM_preloadImages('images/consulter_over.gif','images/commander_over.gif')">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" topmargin="0" marginleft="0">
  <tr>
    <td align="center" valign="middle" > 
	<table  id="border1" width="980" height="560" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="243" height="560" align="left" valign="top" background="<?=$rep_theme?>menu_gris_background.jpg"> 
            <table width="230" height="560" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="102" colspan="2" align="left" valign="top"> <table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td height="82" colspan="2" align="left" valign="top"><a href="index.php"><img src="../images/pixel_transparent.gif" width="230" height="82" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td width="82" height="18"><img src="../images/pixel_transparent.gif" width="82" height="14"></td>
                      <td width="160"><a id="accueil" href="index.php">Accueil</a></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td width="59" height="138" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="51" height="1"></td>
                <td width="187" align="left" valign="top"> 
                  <? include_once("inc_menu_haut.php"); ?>
                </td>
              </tr>
               <? include_once("inc_menu_milieu.php"); ?>
              <tr> 
                <td height="20" colspan="2"><img src="../images/pixel_transparent.gif" width="1" height="22"></td>
              </tr>
              <tr> 
                <td height="108" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="1" height="128"></td>
                <td width="187" align="left" valign="top"> 
                  <? include_once("inc_menu_bas.php"); ?>
                </td>
              </tr>
              <tr align="left"> 
                <td colspan="2" valign="top"><div align="left"> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td width="39" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="39" height="1"></td>
                        <td width="132"><img src="../images/banque.gif" width="132" height="40"></td>
                        <td width="66"> </td>
                      </tr>
                    </table>
                  </div></td>
              </tr>
            </table></td>
          <td width="733" height="560" align="left" valign="top" id="fond_rouge"> 
            <table width="750" height="531" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="94" colspan="3" align="left" valign="top"><img src="images/panier_titre.gif" width="749" height="91"> 
                </td>
              </tr>
              <tr> 
                <td width="26" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="26" height="94"></td>
                <td align="left" valign="top" > <table width="100%" height="434" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="740" id="border2"><iframe src="commande_1.php" name="produit" id="produit" width="100%" height="440" marginwidth="0" marginheight="0" hspace="0" vspace="0" align="top" scrolling="yes" frameborder="0" valign="left"></iframe> 
                      </td>
                    </tr>
                  </table></td>
                <td width="27" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="26" height="94"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

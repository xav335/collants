<?include_once("../include/config.php");?>
<?include_once("../include/_connexion.php");?>
<?include_once("../include/recuperation_theme_en.php");?><?
// ------- on regarde si on affiche ounpas le ticker  ----------//
$ChaineSQL = "SELECT num_ticker FROM ticker WHERE actif=1";
 //echo $ChaineSQL;
 $result = mysql_query($ChaineSQL);
 $ticker = true;
 if (mysql_num_rows($result)==0) {
 	$ticker = false;
 }
	/*echo session_name()."<br>" ;
	echo session_id()."<br>" ;
	echo session_id($_POST[session_name()])."<br>";*/
$ChaineSQL = "SELECT titre_bas FROM accueil WHERE num_texte=1";
//echo $ChaineSQL;
$result2 = mysql_query($ChaineSQL);
if (mysql_num_rows($result2)==0) {
 	$titre_bas = "";
}else{
 	while($row=mysql_fetch_array($result2)){
 		$titre_bas = $row["titre_bas"];
	}
}
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
//----------------------------------------   TICKER   -----------------------------------------------------------------------------

//Specify the collants's width (in pixels)
var collantswidth=475
//Specify the collants's height
var collantsheight=20
//Specify the collants's collants speed (larger is faster 1-10)
var collantsspeed=2
//configure background color:
var collantsbgcolor="#B60734"
//Pause collants onMousever (0=no. 1=yes)?
var pauseit=1

//Specify the collants's content (don't delete <nobr> tag)
//Keep all content on ONE line, and backslash any single quotations (ie: that\'s great):

var collantscontent='<nobr><font face="Arial, Helvetica"; font size="2";font color="#FFFFFF"> &#8226; &#8226; &#8226; B&eacute;n&eacute;ficiez jusqu&#8217; à 70% de r&eacute;duction pour l&acute;achat de nos produits de promotion &#8226; &#8226; &#8226; collants.fr - le sp&eacute;cialiste du collant - r&eacute;pond &agrave; vos mails 7 jours sur 7 &#8226; &#8226; &#8226; <a href="mailto:info@collants.fr">collants.fr</a>  &#8226; &#8226; &#8226; </font></nobr>'

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=collantsspeed
var pausespeed=(pauseit==0)? copyspeed: 0
var iedom=document.all||document.getElementById
if (iedom)
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100;left:-1000">'+collantscontent+'</span>')
var actualwidth=''
var cross_collants, ns_collants

function populate(){
if (iedom){
cross_collants=document.getElementById? document.getElementById("iecollants") : document.all.iecollants
cross_collants.style.left=collantswidth+8
cross_collants.innerHTML=collantscontent
actualwidth=document.all? cross_collants.offsetWidth : document.getElementById("temp").offsetWidth
}
else if (document.layers){
ns_collants=document.ns_collants.document.ns_collants2
ns_collants.left=collantswidth+8
ns_collants.document.write(collantscontent)
ns_collants.document.close()
actualwidth=ns_collants.document.width
}
lefttime=setInterval("scrollcollants()",20)
}

function scrollcollants(){
if (iedom){
if (parseInt(cross_collants.style.left)>(actualwidth*(-1)+8))
cross_collants.style.left=parseInt(cross_collants.style.left)-copyspeed
else
cross_collants.style.left=collantswidth+8

}
else if (document.layers){
if (ns_collants.left>(actualwidth*(-1)+8))
ns_collants.left-=copyspeed
else
ns_collants.left=collantswidth+8
}
}
//----------------------------------------   TICKER  END -----------------------------------------------------------------------------
</script>
</head>
<body scroll=no onLoad="MM_preloadImages('images/consulter_over.gif','images/commander_over.gif')">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" topmargin="0" marginleft="0">
  <tr>
    <td align="center" valign="middle" > 
	<table  id="border1" width="980" height="560" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="242" height="560" align="left" valign="top" background="<?=$rep_theme?>menu_gris_background.jpg">
		  	<table width="230" height="560" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="102" colspan="2" align="left" valign="top">
					<table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td height="82" colspan="2" align="left" valign="top"><a href="index.php"><img src="../images/pixel_transparent.gif" width="230" height="82" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td width="82" height="18"><img src="../images/pixel_transparent.gif" width="82" height="14"></td>
                      <td width="160"><a id="accueil" href="index.php">Accueil</a></td>
                    </tr>
                  </table>
				  </td>
              </tr>
              <tr> 
                <td width="59" height="138" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="51" height="1"></td>
                <td width="187" align="left" valign="top">
					<table width="96%" height="96" border="0" cellpadding="0" cellspacing="0">
                   <tr> 
                      <td height="15"><a id="menu" href="boutique.php?num_rubrique=1"><span id="crochet_menu">[</span>Les collants</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="boutique.php?num_rubrique=2"><span id="crochet_menu">[</span>Les bas</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="boutique.php?num_rubrique=3"><span id="crochet_menu">[</span>Nouveaut&eacute;s</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="promotions.php"><span id="crochet_menu">[</span>Promotions</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="top5.php"><span id="crochet_menu">[</span>Top 5</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="boutique.php?num_rubrique=4"><span id="crochet_menu">[</span>Coup de c&#339;ur</a></td>
                    </tr>
                  	</table>
                  
				  </td>
              </tr>
              <tr> 
                <td height="115" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="1" height="115"></td>
                <td width="187" height="95" align="left" valign="top"><table width="187" height="104" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td height="25"><table width="187" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="20"><img src="../images/pixel_transparent.gif" width="20" height="27"></td>
                            <td width="104"><a href="panier_inscritption_accueil.php" target="produit" onMouseOver="MM_swapImage('Image9','','images/consulter_over.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/consulter.gif" name="Image9" width="67" height="22" border="0"></a></td>
                            <td width="63" height="20">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td height="52"><iframe src="panier_texte.php" name="panier" scrolling="no" width="112" marginwidth="0" height="50" marginheight="0" align="top" valign="left" frameborder="0" ></iframe></td>
                    </tr>
                    <tr> 
                      <td height="28" align="left" valign="top"><table width="187" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td width="1" height="33"><img src="../images/pixel_transparent.gif" width="1" height="27"></td>
                            <td width="114" align="left" valign="top"><a href="panier_commande_actif.php" target="produit" onMouseOver="MM_swapImage('Image11','','images/commander_over.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/commander_on.gif" name="Image11" width="108" height="13" border="0"></a></td>
                            <td width="63">&nbsp;</td>
                          </tr>
                        </table>
                        <img src="../images/pixel_transparent.gif" width="26" height="1"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="20" colspan="2"><img src="../images/pixel_transparent.gif" width="1" height="22"></td>
              </tr>
              <tr> 
                <td height="108" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="1" height="128"></td>
                <td width="187" align="left" valign="top"><table width="187" height="96" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="189" height="15"><a id="menu" href="mesinfos.php"><span id="crochet_menu">[</span>Mes infos</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="paiement.php"><span id="crochet_menu">[</span>Paiement, frais</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="lelivredor.php"><span id="crochet_menu">[</span>Le livre d'or</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="newsletter.php"><span id="crochet_menu">[</span>Newsletter</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="contact.php"><span id="crochet_menu">[</span>Contact</a></td>
                    </tr>
                    <tr> 
                      <td height="15"><a id="menu" href="partenaires.php"><span id="crochet_menu">[</span>Liens</a></td>
                    </tr>
                  </table></td>
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
          <td width="522" height="560" align="left" valign="top" id="fond_rouge"> 
            <table width="470" height="531" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="26" height="94" align="left" valign="top"><img src="../images/pixel_transparent.gif" width="26" height="94"></td>
                <td width="470" align="left" valign="top"> <table width="476" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="460" height="32"><img src="../images/pixel_transparent.gif" width="1" height="32"></td>
                    </tr>
                    <tr> 
                      <td id="texte3_blanc"><div align="center">Promotions</div></td>
                    </tr>
                    <tr> 
                      <td align="left" valign="top" id="texte3_blanc"><img src="../images/pixel_blanc.gif" width="100%" height="1"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" id="texte3_blanc">
					  <table width="100%" height="20" cellspacing="0" cellpadding="0" border="0">
                          <tr> 
                            <td>						<? if ($ticker) {?>
                        <tr>
				  			<td height="35" colspan="2">
								<iframe src="scroller.php" name="actus" id="actus" width="485" height="20" marginwidth="0" marginheight="0" align="top" scrolling="no" frameborder="0" valign="left"></iframe> 
				  			</td>
						</tr>
						<? } else {?>
						 <tr align="left" valign="top"> 
                            <td height="30" colspan="2"><div align="center"><font color="#FFFFFF" size="2">&nbsp;</font></div></td>
                          </tr>
						<? }?>
						</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top" id="border2"> <table width="470" height="434" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="470" id="fond_rose"> <iframe src="" name="produit" id="produit" width="470" height="440" marginwidth="0" marginheight="0" hspace="0" vspace="0" align="top" scrolling="yes" frameborder="0" valign="left"></iframe> 
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
           <td width="242" height="560" align="left" valign="top"><img src="<?=$rep_theme?>paiement_rouge.gif" width="242" height="560"></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php include_once("inc_menu_bratta_2.php"); ?>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

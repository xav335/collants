<?include_once("../include/config.php");?>
<?include_once("../include/_connexion.php"); ?>
<?include_once("../include/recuperation_theme_en.php");?>
<?
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
$ChaineSQL = "SELECT titre_bas_en, lien_photo FROM accueil WHERE num_texte=1";
//echo $ChaineSQL;
$result2 = mysql_query($ChaineSQL);
if (mysql_num_rows($result2)==0) {
 	$titre_bas = "";
}else{
 	while($row=mysql_fetch_array($result2)){
 		$titre_bas = $row["titre_bas_en"];
		$lien_photo = $row["lien_photo"];
	}
}

// vignettes du javascript
	$query="SELECT produit.vignette FROM produit ";
	$query.=" INNER JOIN accueil_photo ON accueil_photo.num_produit_photo=produit.num_produit  ";	
	$query.=" WHERE produit.actif=1 ";	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
			
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
//----------------------------------------  english / français  -----------------------------------------------------------------------------

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

//----------------------------------------  english / français END -----------------------------------------------------------------------------

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

//----------------------------------------   SLIDESHOW   -----------------------------------------------------------------------------
// Set slideShowSpeed (milliseconds)
var slideShow1Speed = 2800
var slideShow2Speed = 2400
var slideShow3Speed = 2800
var slideShow4Speed = 2400
var slideShow5Speed = 2800
// Duration of crossfade (seconds)
var crossFadeDuration = 2

// Specify the image files
var Pic = new Array() // don't touch this
// to add more images, just continue
// the pattern, adding to the array below
<? if ($nb_enr>0) {
	$cpp=0
?>
	<? while ($row = mysql_fetch_array($rstemp)) { ?>
		Pic[<? echo $cpp ?>] = '../photo/petite/<? echo $row["vignette"]  ?>'
	<? 
		$photo[$cpp]=$row["vignette"];
		$cpp++;
		} ?>
<? } ?>

// =======================================
// do not edit anything below this line
// =======================================

var t
var j = 0
var p = Pic.length

var preLoad = new Array()
for (i = 0; i < p; i++){
   preLoad[i] = new Image()
   preLoad[i].src = Pic[i]
}
//-------------------------------
function runSlideShow1(){
   if (document.all){
      document.images.SlideShow1.style.filter="blendTrans(duration=2)"
      document.images.SlideShow1.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow1.filters.blendTrans.Apply()      
   }
   document.images.SlideShow1.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow1.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow1()', slideShow1Speed)
}
//-------------------------------
function runSlideShow2(){
   if (document.all){
      document.images.SlideShow2.style.filter="blendTrans(duration=2)"
      document.images.SlideShow2.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow2.filters.blendTrans.Apply()      
   }
   document.images.SlideShow2.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow2.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow2()', slideShow2Speed)
}
//-------------------------------
function runSlideShow3(){
   if (document.all){
      document.images.SlideShow3.style.filter="blendTrans(duration=2)"
      document.images.SlideShow3.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow3.filters.blendTrans.Apply()      
   }
   document.images.SlideShow3.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow3.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow3()', slideShow3Speed)
}
//-------------------------------
function runSlideShow4(){
   if (document.all){
      document.images.SlideShow4.style.filter="blendTrans(duration=2)"
      document.images.SlideShow4.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow4.filters.blendTrans.Apply()      
   }
   document.images.SlideShow4.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow4.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow4()', slideShow4Speed)
}
//-------------------------------
function runSlideShow5(){
   if (document.all){
      document.images.SlideShow5.style.filter="blendTrans(duration=2)"
      document.images.SlideShow5.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow5.filters.blendTrans.Apply()      
   }
   document.images.SlideShow5.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow5.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow5()', slideShow5Speed)
}
//----------------------------------------   SLIDESHOW END  -----------------------------------------------------------------------------

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

var globWin;            
function wLoader(_URL)  
{	
	var _windowTitle="_blank";
	var _windowSettings="top=80,left=150,screenX=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=302,height=300";

	globWin = window.open(_URL,_windowTitle,_windowSettings);
}
//-->
</script>
</head>

<body scroll=no onLoad="runSlideShow1(); runSlideShow2(); runSlideShow3(); runSlideShow4(); runSlideShow5();MM_preloadImages('/images/frenchflag.gif','/images/ukflag.gif')">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <td align="center" valign="middle"> 
  	<table width="980" height="560" border="0" cellpadding="0" cellspacing="0" background="../images/accueil_fond_gris.gif">
      <tr> 
        <td width="980" height="560" align="left" valign="top"><table width="980" height="560" border="0" cellpadding="0" cellspacing="0">
            <tr> 
                <td width="427" height="500" align="right" valign="top" background="../images/accueil_visuel1.jpg"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="427" height="499">
                    <param name="movie" value="<?=$rep_theme?>movie.swf">
                    <param name="quality" value="high">
                    <embed src="<?=$rep_theme?>movie.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="427" height="499"></embed></object></td>
              <td width="553" height="500" align="left" valign="top" background="../images/accueil_logo_fond.gif"><table width="100%" height="100%" border="0" cellpadding="28" cellspacing="0">
                    <tr>
                      <td>
					  	<table width="100%" height="439" border="0" cellpadding="0" cellspacing="0">
                          <tr align="left" valign="top"> 
                            <td width="37%" height="120" valign="top">
								<table width="100%" height="75" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="19%"><img src="../images/pixel_transparent.gif" width="38" height="72"></td>
                                  <td width="81%">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><a href="<?=$chemin?>fr/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','../images/frenchflag.gif',1)"><img src="../images/frenchflag-on.gif" name="Image6" width="32" height="26" border="0"></a></td>
                                  <td><a href="<?=$chemin?>en/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','../images/ukflag.gif',1)"><img src="../images/ukflag-on.gif" name="Image7" width="32" height="26" border="0"></a></td>
                                </tr>
                              	</table>
								</td>
                            <td width="63%">&nbsp;</td>
                          </tr>
                          <tr align="left" valign="top"> 
                            <td height="140"><table>
                                <tr> 
                                  <td width="153" height="18"><span class="crochet">[</span>&nbsp;<a id="accueil_menu" href="boutique.php?num_rubrique=1">Tights</a></td>
                                </tr>
                                <tr> 
                                  <td height="18"><span class="crochet">[</span>&nbsp;<a id="accueil_menu" href="boutique.php?num_rubrique=2">Stocking</a></td>
                                </tr>
                                <tr> 
                                  <td height="18"><span class="crochet">[</span>&nbsp;<a id="accueil_menu" href="boutique.php?num_rubrique=3">Innovations</a></td>
                                </tr>
                                <tr> 
                                  <td height="18"><span class="crochet">[</span>&nbsp;<a id="accueil_menu" href="promotions.php">Special offer</a></td>
                                </tr>
                                <tr> 
                                  <td height="18"><span class="crochet">[</span>&nbsp;<a id="accueil_menu" href="boutique.php?num_rubrique=4">Blow of heart</a></td>
                                </tr>
                                <tr> 
                                  <td height="18"><span class="crochet">[</span>&nbsp;<a id="accueil_menu" href="top5.php">Top 10</a></td>
                                </tr>
                              </table></td>
                            <td><iframe src="accueil_texte.php" name="actus" id="actus" width="297" height="130" marginwidth="0" marginheight="0" align="top" frameborder="0" valign="left"></iframe></td>
                          </tr>
						   <tr> 
                            <td height="30" align="center" colspan="2">
								<table width="100%" height="20" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td width="49%" background="../images/pixel_bl.gif">&nbsp;</td>
									<td><img width="5" src="../images/pixel_transparent.gif" alt=""></td>
									<td width="2%" valign="bottom" id="texte3_blanc"><? echo $titre_bas?></td>
									<td><img width="5" src="../images/pixel_transparent.gif" alt=""></td>
									<td width="49%" background="../images/pixel_bl.gif">&nbsp;</td>
									<td><img width="22" src="../images/pixel_transparent.gif" alt=""></td>
								</tr>
								</table>
							</td>
                          </tr>
						<? if ($ticker) {?>
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
                          <tr align="left" valign="top"> 
                            <td height="90" colspan="2"> <table width="478" height="123" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tr> 
									<? for($j=0;$j<5;$j++) {?>
										<? if ($photo[$j]!="") {?>
										 <td width=96 height=123 align="left" valign="top" id="VU1"><a href="<? echo $lien_photo ?>"><img src="../photo/petite/<? echo $photo[$j] ?>" alt="" name="SlideShow<? echo $j+1 ?>" id="SlideShow<? echo $j+1 ?>" width="90" height="123" border="0"></a></td>
										<? }else{ ?>
										<td width=96 height=123 align="left" valign="top" id="VU1"><a href="<? echo $lien_photo ?>"><img src="promotions/<? echo $j+1 ?>.jpg" alt="" name="SlideShow<? echo $j+1 ?>" id="SlideShow<? echo $j+1 ?>" width="90" height="123" border="0"></a></td>
										<? } ?>
									<? } ?>
                                  </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
            </tr>
            <tr> 
              <td id="texte2" height="60" colspan="2"><div align="center">collants.fr 
                    &#8226; zac du sablar &#8226; 25 all&eacute;e pampara &#8226; 
                    40100 dax &#8226; Tel. +33 (5) 58 74 14 27 &#8226; <a href="contact.php">Contact</a></div></td>
            </tr>
          </table>
          </td>
      </tr>
    </table>
	</td>
</table>
</body>
</html>

<?php include_once("../include/_connexion_fin.php"); ?>
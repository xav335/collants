<? include_once("../include/config.php");?>
<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<?// echo $_SESSION["authentification"]?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" src="coolmenus4.js" type="text/JavaScript">
</script>
</head>

<body scroll=no leftmargin="5" topmargin="5" id="fond_gris" >
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="center"> <table width="980" height="560" border="0"  cellpadding="0" cellspacing="0" background="images/admin4.gif" id="border1">
        <tr> 
          <td height="560" align="left" valign="top"> <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="143" height="560" align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr> 
                      <td align="left" valign="top"><img src="images/pixel_transparent.gif" width="10" height="10"></td>
                      <td width="100%" height="560" align="left" valign="top"> 
                        <table width="167" border="0" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td width="167" height="43" align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" id="texte2_rouge">Gestion Produits</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top"> <ilayer id="layerMenu0"> 
                              <div id="divMenu0"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top"> <ilayer id="layerMenu1"> 
                              <div id="divMenu1"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top"> <ilayer id="layerMenu2"> 
                              <div id="divMenu2"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top"> <ilayer id="layerMenu3"> 
                              <div id="divMenu3"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu4"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" id="texte2_rouge">Gestion Clients</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu5"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                           <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu6"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu7"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" id="texte2_rouge">Marketing</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu8"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                         <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu9"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                           <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu10"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top" > <ilayer id="layerMenu4"> 
                              <div id="divMenu11"> <img src="cm_fill.gif" width="150" height="12" alt="" border="0"> 
                              </div>
                              </ilayer></td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="25" align="left" valign="top"><a id="menu" href="index.php?action=deconnexion"><span id="crochet_menu">[</span> 
                              Deconnexion </a></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="91%" align="left" valign="top"> <table width="760" height="523" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="636" height="40"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="37"> <table cellspacing="0" cellpadding="0" border="0">
                                <tr> 
                                  <td width="45" id="texte2_rouge">Date :</td>
                                  <td id="texte2_rouge"><? echo date("d/m/Y ")?></font></td>
                                  <td width=15>&nbsp;</td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td width="636" height="474" align="left" valign="top"> 
                        <iframe src="vide.php" id="border2" name="produit" scrolling="auto" height="100%"  width="100%" marginleft="0"  topmargin="0" align="top" valign="left" frameborder="0" ></iframe> 
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
</tr>
</table>
<!-- PARTIE N�2 "script" DU MENU BRATTA -->
<SCRIPT>
/*** 
This is the menu creation code - place it right after you body tag
Feel free to add this to a stand-alone js file and link it to your page.
**/
//Menu object creation
oCMenu=new makeCM("oCMenu") //Making the menu object. Argument: menuname

oCMenu.frames = 0
//Menu properties   
oCMenu.pxBetween=0
//Using the cm_page object to place the menu ----
oCMenu.fromLeft=0
oCMenu.fromTop=0
oCMenu.rows=1
oCMenu.menuPlacement=0
                                                             
oCMenu.offlineRoot="file:///C|/Inetpub/wwwroot/dhtmlcentral/projects/coolmenus/examples/" 
oCMenu.onlineRoot="/admin/" 
oCMenu.resizeCheck=1 
oCMenu.wait=100 
oCMenu.fillImg="cm_fill.gif"
oCMenu.zIndex=0

//Background bar properties
oCMenu.useBar=0
oCMenu.barWidth="100%"
oCMenu.barHeight="menu" 
oCMenu.barClass="clBar"
oCMenu.barX=0 
oCMenu.barY=0
oCMenu.barBorderX=0
oCMenu.barBorderY=0
oCMenu.barBorderClass=""


//Level properties - ALL properties have to be spesified in level 0
oCMenu.level[0]=new cm_makeLevel() //Add this for each new level
oCMenu.level[0].width=130
oCMenu.level[0].height=19 
oCMenu.level[0].regClass="clLevel0"
oCMenu.level[0].overClass="clLevel0over"
oCMenu.level[0].borderX=0
oCMenu.level[0].borderY=0
oCMenu.level[0].borderClass="clLevel0border"
// decalage du niveau 1
oCMenu.level[0].offsetX=20
oCMenu.level[0].offsetY=0
// fin decalage du niveau 1
oCMenu.level[0].rows=0
oCMenu.level[0].arrow=0
oCMenu.level[0].arrowWidth=0
oCMenu.level[0].arrowHeight=0
oCMenu.level[0].align="bottom"
oCMenu.level[0].roundBorder=1

//EXAMPLE SUB LEVEL[1] PROPERTIES - You have to specify the properties you want different from LEVEL[0] - If you want all items to look the same just remove this
/*oCMenu.level[1]=new cm_makeLevel() //Add this for each new level (adding one to the number)
oCMenu.level[1].width=oCMenu.level[0].width-2
oCMenu.level[1].height=22
oCMenu.level[1].regClass="clLevel1"
oCMenu.level[1].overClass="clLevel1over"
oCMenu.level[1].borderX=0
oCMenu.level[1].borderY=0
oCMenu.level[1].align="right" 
oCMenu.level[1].offsetX=1//-(oCMenu.level[0].width-2)/2+20
oCMenu.level[1].offsetY=0
oCMenu.level[1].borderClass="clLevel1border"*/

oCMenu.level[1]=new cm_makeLevel() //Add this for each new level (adding one to the number)
oCMenu.level[1].width=oCMenu.level[0].width
oCMenu.level[1].height=19
oCMenu.level[1].regClass="clLevel1"
oCMenu.level[1].overClass="clLevel1over"
oCMenu.level[1].borderX=1
oCMenu.level[1].borderY=1
oCMenu.level[1].align="right" 
oCMenu.level[1].offsetX=-(oCMenu.level[0].width-2)/2
oCMenu.level[1].offsetY=0
oCMenu.level[1].borderClass="clLevel1border"

/******************************************
Menu item creation:
myCoolMenu.makeMenu(name, parent_name, text, link, target, width, height, regImage, overImage, regClass, overClass , align, rows, nolink, onclick, onmouseover, onmouseout) 
*************************************/

oCMenu.makeMenu('top0','','<span ID="crochet_menu">[</span>&nbsp;Produit','','produit','150','19','','','','','bottom')	
	oCMenu.makeMenu('sub00','top0','&nbsp;ajouter un produit','<?=$chemin?>admin/produit_ajout.php','produit','146')
	oCMenu.makeMenu('sub01','top0','&nbsp;liste compl�te','<?=$chemin?>admin/produit_liste.php','produit','146')
	oCMenu.makeMenu('sub02','top0','&nbsp;promotions','<?=$chemin?>admin/produit_liste_filtre.php?action=promotion','produit','146')
	oCMenu.makeMenu('sub03','top0','&nbsp;newsletter','<?=$chemin?>admin/produit_liste_filtre.php?action=top5','produit','146')
	oCMenu.makeMenu('sub04','top0','&nbsp;sous-r�f�rence par produit','<?=$chemin?>admin/sousref_liste_produit.php','produit','146')
	oCMenu.makeMenu('sub05','top0','&nbsp;liste des &nbsp;sous-r�f�rence','<?=$chemin?>admin/sousref_liste.php','produit','146')
	oCMenu.makeMenu('sub06','top0','&nbsp;Produits associ�s','<?=$chemin?>admin/produit_liste_filtre.php?action=association','produit','146')
	oCMenu.makeMenu('sub07','top0','&nbsp;Th�mes produits','<?=$chemin?>admin/gestion_theme.php','produit','146')
	oCMenu.makeMenu('sub08','top0','&nbsp;Extraction','<?=$chemin?>admin/extraction_produit.php','produit','146')
	
oCMenu.makeMenu('top1','','<span ID="crochet_menu">[</span>&nbsp;Marque','','_top','150','19','','')	
	oCMenu.makeMenu('sub10','top1','&nbsp;ajouter','<?=$chemin?>admin/marque_ajout.php','produit','146')
  oCMenu.makeMenu('sub11','top1','&nbsp;modifier/supprimer','<?=$chemin?>admin/marque_liste.php','produit','146')

oCMenu.makeMenu('top2','','<span ID="crochet_menu">[</span>&nbsp;Couleur','','_top','150','19','','')	
	oCMenu.makeMenu('sub20','top2','&nbsp;ajouter','<?=$chemin?>admin/couleur_ajout.php','produit','146')
  oCMenu.makeMenu('sub21','top2','&nbsp;modifier/supprimer','<?=$chemin?>admin/couleur_liste.php','produit','146')
	
oCMenu.makeMenu('top3','','<span ID="crochet_menu">[</span>&nbsp;Taille','','_top','150','19','','')	
	oCMenu.makeMenu('sub30','top3','&nbsp;ajouter','<?=$chemin?>admin/taille_ajout.php','produit','146')
  oCMenu.makeMenu('sub31','top3','&nbsp;modifier/supprimer','<?=$chemin?>admin/taille_liste.php','produit','146')
	
oCMenu.makeMenu('top4','','<span ID="crochet_menu">[</span>&nbsp;Cat�gorie','','_top','150','19','','')	
	oCMenu.makeMenu('sub40','top4','&nbsp;ajouter','<?=$chemin?>admin/categorie_ajout.php','produit','146')
  oCMenu.makeMenu('sub41','top4','&nbsp;modifier/supprimer','<?=$chemin?>admin/categorie_liste.php','produit','146')

oCMenu.makeMenu('top5','','<span ID="crochet_menu">[</span>&nbsp;Clients','','produit','150','19','','')	
	oCMenu.makeMenu('sub50','top5','&nbsp;Liste','<?=$chemin?>admin/clients_liste.php','produit','146')
  oCMenu.makeMenu('sub51','top5','&nbsp;Anniversaire','<?=$chemin?>admin/anniversaire_liste.php','produit','146')

oCMenu.makeMenu('top6','','<span ID="crochet_menu">[</span>&nbsp;Commandes','','_top','150','19','','')	
	oCMenu.makeMenu('sub60','top6','&nbsp;Commandes � livrer','<?=$chemin?>admin/commandes_liste.php','produit','146')
  oCMenu.makeMenu('sub61','top6','&nbsp;Commandes livr�es','<?=$chemin?>admin/commandes_livrees.php','produit','146')	
  oCMenu.makeMenu('sub62','top6','&nbsp;Commandes refus�es','<?=$chemin?>admin/commandes_refusee.php','produit','146')	
	
oCMenu.makeMenu('top7','','<span ID="crochet_menu">[</span>&nbsp;Remises - Port','','_top','150','19','','')	
	oCMenu.makeMenu('sub70','top7','&nbsp;Ajout Codes Remises','<?=$chemin?>admin/remise_ajout.php','produit','146')
	oCMenu.makeMenu('sub71','top7','&nbsp;Codes Remises','<?=$chemin?>admin/remise_liste.php','produit','146')
	oCMenu.makeMenu('sub72','top7','&nbsp;Remises / produit','<?=$chemin?>admin/remise_liste_pourcentage.php','produit','146')
	oCMenu.makeMenu('sub73','top7','&nbsp;Remises / marque','<?=$chemin?>admin/remise_liste_pourcentage.php?action=marque','produit','146')
	oCMenu.makeMenu('sub74','top7','&nbsp;Frais de port','<?=$chemin?>admin/frais_de_port.php','produit','146')
	
oCMenu.makeMenu('top8','','<span ID="crochet_menu">[</span>&nbsp;Liens partenaires','','_top','150','19','','')	
	oCMenu.makeMenu('sub80','top8','&nbsp;ajouter','<?=$chemin?>admin/liens_ajout.php','produit','146')
  oCMenu.makeMenu('sub81','top8','&nbsp;modifier/supprimer','<?=$chemin?>admin/liens_liste.php','produit','146')	

oCMenu.makeMenu('top9','','<span ID="crochet_menu">[</span>&nbsp;Newsletter','','_top','150','19','','')	
	oCMenu.makeMenu('sub90','top9','&nbsp;produits newsletter','<?=$chemin?>admin/produit_liste_filtre.php?action=top5','produit','146')
  oCMenu.makeMenu('sub91','top9','&nbsp;modifier newsletter Html','<?=$chemin?>admin/newsletter_modif.php','produit','146')	
	oCMenu.makeMenu('sub92','top9','&nbsp;envoi newsletter Html','<?=$chemin?>admin/mailing_html.php','produit','146')
	oCMenu.makeMenu('sub93','top9','&nbsp;envoi classique','<?=$chemin?>admin/mailing.php','produit','146')	
	
oCMenu.makeMenu('top10','','<span ID="crochet_menu">[</span>&nbsp;Action /accueil','','_top','150','19','','')	
	oCMenu.makeMenu('sub100','top10','&nbsp;Texte accueil','accueil_texte.php','produit','146')
  oCMenu.makeMenu('sub101','top10','&nbsp;ticker','accueil_ticker.php','produit','146')	
	oCMenu.makeMenu('sub102','top10','&nbsp;Photos/lien accueil','accueil_photo.php','produit','146')	
	oCMenu.makeMenu('sub103','top10','&nbsp;Aide HTML','aide.php','produit','146')	
	
oCMenu.makeMenu('top11','','<span ID="crochet_menu">[</span>&nbsp;Livre Or','','_top','150','19','','')	
	oCMenu.makeMenu('sub110','top11','&nbsp;liste','<?=$chemin?>admin/livre_or_liste.php','produit','146')
	oCMenu.makeMenu('sub111','top11','&nbsp;liste anglais','<?=$chemin?>admin/livre_or_liste_en.php','produit','146')
  	
//*****************  Leave this line - it constructs the menu
oCMenu.construct()		
//******************  Leave this line - it constructs the menu

//Extra code to find position:
function findPos(num){
  //alert(num)
  if(bw.ns4){   //Netscape 4
    x = document.layers["layerMenu"+num].pageX
    y = document.layers["layerMenu"+num].pageY
  }else{ //other browsers
    x=0; y=0; var el,temp
    el = bw.ie4?document.all["divMenu"+num]:document.getElementById("divMenu"+num);
    if(el.offsetParent){
      temp = el
      while(temp.offsetParent){ //Looping parent elements to get the offset of them as well
        temp=temp.offsetParent; 
        x+=temp.offsetLeft
        y+=temp.offsetTop;
      }
    }
    x+=el.offsetLeft
    y+=el.offsetTop
  }
  //Returning the x and y as an array
  return [x,y]
}
function placeElements(){
  //Changing the position of ALL top items:
  pos = findPos(0)
  oCMenu.m["top0"].b.moveIt(pos[0],pos[1])
  pos = findPos(1)
  oCMenu.m["top1"].b.moveIt(pos[0],pos[1])
  pos = findPos(2)
  oCMenu.m["top2"].b.moveIt(pos[0],pos[1])
  pos = findPos(3)
  oCMenu.m["top3"].b.moveIt(pos[0],pos[1])
  pos = findPos(4)
  oCMenu.m["top4"].b.moveIt(pos[0],pos[1])
  pos = findPos(5)
  oCMenu.m["top5"].b.moveIt(pos[0],pos[1])
  pos = findPos(6)
  oCMenu.m["top6"].b.moveIt(pos[0],pos[1])
  pos = findPos(7)
  oCMenu.m["top7"].b.moveIt(pos[0],pos[1])
  pos = findPos(8)
  oCMenu.m["top8"].b.moveIt(pos[0],pos[1])
  pos = findPos(9)
  oCMenu.m["top9"].b.moveIt(pos[0],pos[1])
  pos = findPos(10)
  oCMenu.m["top10"].b.moveIt(pos[0],pos[1])
  pos = findPos(11)
  oCMenu.m["top11"].b.moveIt(pos[0],pos[1])
  //Setting the fromtop value
  oCMenu.fromTop = pos[1]
}
placeElements()
//Setting it to re place the elements after resize - the resize is not perfect though..
oCMenu.onafterresize="placeElements()"
</SCRIPT><!-- PARTIE N�2 "script" DU MENU BRATTA -->
</body>
</html>

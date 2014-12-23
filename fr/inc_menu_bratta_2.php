<? include_once("../include/config.php"); ?>
<?
	// ---- MARQUES ----//
	$query  ="SELECT DISTINCT marque.num_marque ,marque.marque  FROM  produit ";
	$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
	$query .=" INNER JOIN marque ON produit.num_marque = marque.num_marque ";	
	$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
	$query .=" AND produit.actif=1";
	$query .=" ORDER BY marque.marque  DESC";	
	//echo $query ;	
	$rstemp3 = mysql_query($query);
	$nb_enr3 = mysql_num_rows($rstemp3);
	
	// ---- CATEGORIES ----//
	$query  ="SELECT DISTINCT categorie.num_categorie ,categorie.categorie  FROM  produit ";
	$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
	$query .=" INNER JOIN produit_categorie ON produit_categorie.num_produit = produit.num_produit ";	
	$query .=" INNER JOIN categorie ON categorie.num_categorie = produit_categorie.num_categorie ";	
	$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
	$query .=" AND produit.actif=1";
	$query .=" ORDER BY categorie.categorie   DESC";	
	//echo $query ;	
	$rstemp4 = mysql_query($query);
	$nb_enr4 = mysql_num_rows($rstemp4);
	
	// ---- TAILLES ----//
	$query  ="SELECT DISTINCT taille.num_taille ,taille.taille  FROM  produit ";
	$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
	$query .=" INNER JOIN produit_sousref ON produit_sousref.num_produit = produit.num_produit ";	
	$query .=" INNER JOIN taille ON taille.num_taille = produit_sousref.num_taille ";	
	$query .=" WHERE produit_rubrique.num_rubrique=". $_GET["num_rubrique"];	
	$query .=" AND produit.actif=1";
	$query .=" ORDER BY taille.taille ";	
	//echo $query ;	
	$rstemp5 = mysql_query($query);
	$nb_enr5 = mysql_num_rows($rstemp5);
?>	
<!-- PARTIE N°2 "script" DU MENU BRATTA -->
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
oCMenu.onlineRoot="/fr/" 
oCMenu.resizeCheck=1 
oCMenu.wait=200 
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
oCMenu.level[0].offsetX=0
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
oCMenu.level[1].height=17
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

oCMenu.makeMenu('top0','','<span ID="crochet_menu2">[</span>&nbsp;&nbsp;par marque','','_top','150','19','','','','','bottom')	
	oCMenu.makeMenu('sub00','top0','<span ID="crochet_menu">[</span>&nbsp;Toutes les marques','<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>','produit','146')
	<? $cpt_ln=1 ?>
	<? while ($row = mysql_fetch_array($rstemp3)) { ?>
	<?		
		$marque = $row["marque"];
		$num_marque =  $row["num_marque"];
	?>
		oCMenu.makeMenu('sub0<? echo $cpt_ln ?>','top0','<span ID="crochet_menu">[</span>&nbsp;<? echo $marque ?>','<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>&num_marque=<? echo $num_marque  ?>','produit','146','','','','','','','','','javascript:redirection("<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>&num_marque=<? echo $num_marque  ?>")') 
	<? $cpt_ln++ ?>	  
	<? } ?>
  	
				
oCMenu.makeMenu('top1','','<span ID="crochet_menu2">[</span>&nbsp;&nbsp;par catégorie','','_top','150','19','','')	
	oCMenu.makeMenu('sub10','top1','<span ID="crochet_menu">[</span>&nbsp;Toutes les catégories','<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>','produit','146') 
	<? $cpt_ln=1 ?>
	<? while ($row = mysql_fetch_array($rstemp4)) { ?>
	<?		
		$categorie = $row["categorie"];
		$num_categorie =  $row["num_categorie"];
	?>
		oCMenu.makeMenu('sub1<? echo $cpt_ln ?>','top1','<span ID="crochet_menu">[</span>&nbsp;<? echo $categorie ?>','<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>&num_categorie=<? echo $num_categorie  ?>','produit','146','','','','','','','','','javascript:redirection("<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>&num_categorie=<? echo $num_categorie  ?>")') 
	<? $cpt_ln++ ?>	  
	<? } ?>

oCMenu.makeMenu('top2','','<span ID="crochet_menu2">[</span>&nbsp;&nbsp;par taille','','_top','150','19','','')	
	oCMenu.makeMenu('sub20','top2','<span ID="crochet_menu">[</span>&nbsp;Toutes les tailles','<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>','produit','146')
	<? $cpt_ln=1 ?>
	<? while ($row = mysql_fetch_array($rstemp5)) { ?>
	<?		
		$taille = $row["taille"];
		$num_taille =  $row["num_taille"];
	?>
		oCMenu.makeMenu('sub2<? echo $cpt_ln ?>','top2','<span ID="crochet_menu">[</span>&nbsp;<? echo $taille ?>','<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>&num_taille=<? echo $num_taille  ?>','produit','146','','','','','','','','','javascript:redirection("<?=$chemin?>fr/produit.php?num_rubrique=<? echo $_GET["num_rubrique"] ?>&num_taille=<? echo $num_taille  ?>")') 
	<? $cpt_ln++ ?>	  
	<? } ?>
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
 
  
  //Setting the fromtop value
  oCMenu.fromTop = pos[1]
}
placeElements()
//Setting it to re place the elements after resize - the resize is not perfect though..
oCMenu.onafterresize="placeElements()"
function redirection(url){
	//alert(url);
	produit.location.href = url;
}
</SCRIPT><!-- PARTIE N°2 "script" DU MENU BRATTA -->
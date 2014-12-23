<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?



// on teste les valeurs 

//test : si pas de post ou pas de ssesion ...



if ( ( !(isset($_POST["email"])) || !(isset($_POST["pass"])) ) && ( !(isset($_SESSION["num_client"])) ))

{

?>

	<script language=javascript>

	<!--

		window.history.go(-1);

	//-->

	</script>

<?

}

else

{

	

	$ChaineSQL = "SELECT * FROM client ";

	$ChaineSQL.= " INNER JOIN civilite ON civilite.num_civilite = client.num_civilite ";

	if (isset($_POST["email"]))

	{

		$ChaineSQL.= " WHERE client.email = '".$_POST["email"]."' AND client.mdp='".$_POST["pass"]."'";

	}

	else

	{

		$ChaineSQL.= " WHERE client.num_client = '".$_SESSION["num_client"]."'";

	}

	

	//echo $ChaineSQL;

	

	$result = mysql_query($ChaineSQL);

	

	if(mysql_num_rows($result) != 1 )

	{

	?>

	?>

		<script language=javascript>

		<!--

			window.history.go(-1);

		//-->

		</script>	

	<?

	}

	else

	{

		$row=mysql_fetch_array($result);

		

		$_SESSION["num_client"] = $row["num_client"];	

	}

}



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<link href="include/collants_styles.css" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/JavaScript">

<!--



function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

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

<body background="../images/fond_collants_large.gif"  leftmargin="15" topmargin="15" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif','images/ajouter_livraison_over.gif','images/suivi_commande_over.gif','images/modifier_adresse_over.gif')" border="0">
<table width="100%" border="0" cellspacing="0" cellpadding="15">
  
 <tr>
    
  <td width="68%" id="texte2_blanc"><b>Bonjour 
      
   <?=$row["civilite"]?>
      &nbsp;
      
   <?=$row["prenom"]?>
      &nbsp;
      
   <?=$row["nom"]?>
      </b><br>
  </td>
  <td width="32%">&nbsp;</td>
 </tr>
  
 <tr>
    
  <td ID="texte2"><b>Voici vos infos personnelles : </b><br>
      <br>
       <b>Adresse de livraison principale : </b><br>
      <br>
       
      
   <?

$ChaineSQL = "SELECT * FROM adresse INNER JOIN pays ON pays.num_pays = adresse.num_pays INNER JOIN civilite ON civilite.num_civilite = adresse.num_civilite WHERE num_adresse = '".$row["num_addresse_defaut"]."'";



$result=mysql_query($ChaineSQL);



if (mysql_num_rows($result) ==0)

{

	echo "Vous n'avez pas défini d'aresse de livraison principale";

}

else

{

	$row2 =  mysql_fetch_array($result);

?>
      
   <?=$row2["civilite"]?>
      
   <?=$row2["prenom_liv"]?>
      
   <?=$row2["nom_liv"]?>
      
   <?if ($row2["batiment"]!="") { echo("<br>batiment ".$row2["batiment"]." ");}?>
      
   <?if ($row2["porte"]!="") { echo("porte ".$row2["porte"]." ");}?>
      
   <?if ($row2["etage"]!="") { echo("étage ".$row2["etage"]);}?>
      <br>
      <br>
    
      
   <?=$row2["adresse1"]?>
      <br>
    
      
   <?if ($row2["adresse2"]!="") { echo($row2["adresse2"]."<br>");}?>
      <br>
    
      
   <?=$row2["cp"]?>
      
   <?=$row2["ville"]?>
      <br>
    
      
   <?if ($row2["num_pays"]!= 73) { echo("(".$row2["pays"].")");}?>
      <br>
   <br>
    <a href="modif_adresse.php?num_adresse=<?=$row2["num_adresse"]?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/modifier_adresse_over.gif',1)"><img src="images/modifier_adresse_on.gif" name="Image4" width="156" height="13" border="0"></a><br>
    
      
   <?



	$ChaineSQL = "SELECT * FROM adresse  INNER JOIN pays ON pays.num_pays = adresse.num_pays INNER JOIN civilite ON civilite.num_civilite = adresse.num_civilite  WHERE num_client='".$row["num_client"]."' AND num_adresse !='".$row2["num_adresse"]."'";

	$result = mysql_query($ChaineSQL);

	

	if (mysql_num_rows($result)!=0)

	{

?>
      <br>
      <br>
      <b>Autres adresses de livraison : </b><br>
       
      
   <?

		while($row3 = mysql_fetch_array($result))

		{

?>
      <br>
      <br>
    
      
   <?=$row3["civilite"]?>
      
   <?=$row3["prenom_liv"]?>
      
   <?=$row3["nom_liv"]?>
      
   <?if ($row3["batiment"]!="") { echo("<br>batiment ".$row3["batiment"]." ");}?>
      
   <?if ($row3["porte"]!="") { echo("porte ".$row3["porte"]." ");}?>
      
   <?if ($row3["etage"]!="") { echo("étage ".$row3["etage"]);}?>
      <br>
      <br>
    
      
   <?=$row3["adresse1"]?>
      <br>
    
      
   <?if ($row3["adresse2"]!="") { echo($row3["adresse2"]."<br>");}?>
      <br>
    
      
   <?=$row3["cp"]?>
      
   <?=$row3["ville"]?>
      <br>
    
      
   <?if ($row3["num_pays"]!= 73) { echo("(".$row3["pays"].")");}?>
      <br>
   <br>
      <br>
    <a href="modif_adresse.php?num_adresse=<?=$row3["num_adresse"]?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/modifier_adresse_over.gif',1)"><img src="images/modifier_adresse_on.gif" name="Image3" width="156" height="13" border="0"></a> <br>
    
      
   <?

		}

	}



}







?>
      
  </td>
  <td>&nbsp;</td>
 </tr>
  
 <tr>
    
  <td><img src="../images/pixel_rouge.jpg" width="100%" height="1"></td>
  <td>&nbsp;</td>
 </tr>
  
 <tr>  
  <td><a href="new_adresse.php" onMouseOver="MM_swapImage('Image1','','images/ajouter_livraison_over.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/ajouter_livraison_on.gif" name="Image1" width="198" height="13" border="0"></a>
   <!-- Si vous souhaitez ajouter une adresse de livraison, <a href="new_adresse.php">cliquez ici</a> -->
   <a href="etat_commande.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/suivi_commande_over.gif',1)"><img src="images/suivi_commande_on.gif" name="Image2" width="156" height="13" border="0"></a> </td>
  <td>&nbsp;</td>
 </tr>
  
 <tr>
    
  <td>&nbsp; </td>
  <td>&nbsp;</td>
 </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</body>

</html>



<?php include_once("../include/_connexion_fin.php"); ?>
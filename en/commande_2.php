<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>

<?

// on teste les valeurs 
//test : si pas de post ET pas de session ...

if ( ( !(isset($_POST["email"])) || !(isset($_POST["pass"])) ) && ( !(isset($_SESSION["num_client"])) ) )
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
		$email_banque = $row["email"];	
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
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function VerifForm(){
	if (document.formul1.choix_adresse.value==0)
	{
		alert("Please enter your delivery address.");
		document.formul1.choix_adresse.focus();
		return(false);
	}
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
<body background="file:///E|/Collants.fr/collants/www/images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif','images/valider_commande_over.gif','images/ajouter_livraison_over.gif')" border="0">
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td id="texte2_blanc">
      <?=$row["civilite"]?>
      &nbsp; 
      <?=$row["prenom"]?>
      &nbsp; 
      <?=$row["nom"]?>
    </td>
  </tr>
</table>
<form name="formul1" method=POST action="commande_3.php" onsubmit="return VerifForm()">
  <input name="email_banque" type="hidden" value="<? echo  $email_banque ?>">
<table width="100%" border="0" align="left" cellpadding="15" >
  <tr>
  <?
  $ChaineSQL = "SELECT * FROM adresse INNER JOIN civilite ON civilite.num_civilite = adresse.num_civilite INNER JOIN pays ON pays.num_pays = adresse.num_pays WHERE num_client='".$_SESSION["num_client"]."'";
  $result=mysql_query($ChaineSQL);
  
  switch (mysql_num_rows($result))
  {
  	case 1:
  	$row=mysql_fetch_array($result);
  	?>
  	<tr>
  		<td id="texte2">
	<p>Your delivery address:<br>
          <br>
          <?=$row["civilite"]?>
          <?=$row["prenom_liv"]?>
          <?=$row["nom_liv"]?>
          <br>
          
	 <?
		if ($row["batiment"]!="")
		{
		?>
			building
	 <?=$row["batiment"]?>
	 &nbsp;
		
	 <?
		}
		?>
		
	 <?
		if ($row["porte"]!="")
		{
		?>
	 	
			door
	 <?=$row["porte"]?>
	 &nbsp;
		
	 <?
		}
		?>
		
	 <?
		if ($row["etage"]!="")
		{
		?>
	 	
			floor
	 <?=$row["etage"]?>
	 &nbsp;
		
	 <?
		}
		?>
		
	 <?
		if (($row["etage"]!="") || ($row["batiment"]!="") || ($row["porte"]!=""))
		{
		?>
		<br>
		<?
		}
		?>
          <?=$row["adresse1"]?>
          <br>
          <?if ($row["adresse2"]!=""){ echo($row["adresse2"]."<br>");}?>
          <br>
          <?=$row["cp"]?>
          <?=$row["ville"]?>
          <?if ($row["num_pays"] != 73) { echo("(".$row["pays"]).")";}?>
          <input type=hidden name="choix_adresse" value="<?=$row["num_adresse"]?>">
        </p>
        </td>
  	</tr>
  	  	<tr>
  		
   <td id="texte2"><a href="new_adresse.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/ajouter_livraison_over.gif',1)"><img src="images/ajouter_livraison_on.gif" name="Image1" width="198" height="13" border="0"></a></td>
  	</tr>
  	<tr>
  		
   <td id="texte2">Please, choose a mode of payement.</td>
  	</tr>
  	<tr>
  		<td align=left>	
                             <input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image33','','images/valider_commande_over.gif',1)" name="Image33" type="image" src="images/valider_commande_on.gif"  width="156" height="13" border="0" > 
	</td>
  	</tr>
  	<?
  	break;
  	case 0:
  	// pas possible...
  	break;
  	default :
  	?>
  	
  	  	
  	<tr>
  		
   <td id="texte2">Please, choose an other delivery address.</td>
  	</tr>
  	<tr>
  		<td id="texte2">
  	<?
  	$ChaineSQL = "SELECT * FROM adresse INNER JOIN civilite ON civilite.num_civilite = adresse.num_civilite INNER JOIN pays ON pays.num_pays = adresse.num_pays WHERE num_client='".$_SESSION["num_client"]."'";
  	$result=mysql_query($ChaineSQL);
  	$tab_js=mysql_query($ChaineSQL);
  	?>
  	<script language=javascript>
  	<!--
  	

	function afficheDescURL(toThis) 
  	{
  		if (document.getElementById)
    		{
    			document.getElementById("textDiv").innerHTML = toThis;
    		}
  		else if (document.all) 
    		{
    			document.all["textDiv"].innerHTML = toThis;
    		}
  	}
  	
  	var MonTableau = new Array();
  	function detail_adresse()
  	{
  	<?
  		while($row3 = mysql_fetch_array($tab_js))
  		{
  			$adresse_complete = $row3["civilite"]." ".$row3["prenom_liv"]." ".$row3["nom_liv"]."<br>";
  		 	
  		 	
  		 	if ($row3["batiment"]!="")
  		 	{ 
  		 		$adresse_complete .= " batiment ".$row3["batiment"];
  		 	}
  		 	if ($row3["porte"]!="")
  		 	{ 
  		 		$adresse_complete .= " porte ".$row3["porte"];
  		 	}
  		 	if ($row3["etage"]!="")
  		 	{ 
  		 		$adresse_complete .= " étage ".$row3["etage"];
  		 	}
  		 	if (($row3["batiment"]!="") || ($row3["porte"]!="") || ($row3["etage"]!=""))
  		 	{
  		 		$adresse_complete .= "<br>";
  		 	}
  		 	$adresse_complete .= " ".$row3["adresse1"];
  		 	
  		 	if ($row3["adresse2"]!="")
  		 	{ 
  		 		$adresse_complete .= " " .$row3["adresse2"];
  		 	}
  		 	$adresse_complete .= "<br>";
  		 	$adresse_complete .= $row3["cp"]." ".$row3["ville"]."<br> ".$row3["pays"];
  			
  	?>
  		MonTableau[<?=$row3["num_adresse"]?>] = "<?=$adresse_complete?>";
  	<?
  		}
  	?>
  		if (document.formul1.choix_adresse.value!=0)
  		{
  			//document.formul1.recap_adresse.value = MonTableau[document.formul1.choix_adresse.value];
  			afficheDescURL(MonTableau[document.formul1.choix_adresse.value]);
  		}
  		else
  		{
  			//document.formul1.recap_adresse.value =  "";
  			afficheDescURL("");
  		}
  	}
  	//-->
  	</script>
  		<select onchange="detail_adresse();" name=choix_adresse>
  		<option selected value=0>-- please select an address --</option>
  		<?
  		while($row2 = mysql_fetch_array($result))
  		{
  		?>
  		<option value="<?=$row2["num_adresse"]?>"><?=$row2["adresse1"]?></option>
  		<?
  		}
  		?>
  		</select>
  		</td>
  	</tr>
  	<tr>
  		<td>
  			<div id="textDiv"></div>
  		</td>
  	</tr>
  	<tr>
  		
   <td id="texte2"><a href="new_adresse.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/ajouter_livraison_over.gif',1)"><img src="images/ajouter_livraison_on.gif" name="Image2" height="13" border="0"></a></td>
  	</tr>
  	


  	<tr>
  		
   <td align=left>
   <br><input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/valider_over.gif',1)" name="Image4" type="image" src="images/valider_on.gif"  width="108" height="13" border="0" >
  		</td>
  	</tr>
  	
  <?
  	break;
  }
  ?>
</table>
</form>

</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
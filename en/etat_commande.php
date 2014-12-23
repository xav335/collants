<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>

<?

function selector ($ValueToCheck, $RefValue)
{
		
	$result = "";
	if ($ValueToCheck == $RefValue)
	{
		return ("selected");
	}
	else
	{
		return ("");
	}
			
}

function formatdate($strdate)
{
	$tab_date= split("-",$strdate);
	return($tab_date[2]."/".$tab_date[1]."/".$tab_date[0]);
}


$tab_mois = Array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre");


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
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif')" border="0">
<br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td id="texte2_blanc"><p><span class="texte_gras">
        <?=$row["civilite"]?>
        &nbsp;
        <?=$row["prenom"]?>
        &nbsp;
        <?=$row["nom"]?>
        </span> </p>
      
   <p>Your order: <br>
      </p></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    
  <td id="texte2"> 
      
   <?

	// on fait la recherche
	
	$ChaineSQL = "SELECT * FROM commande ";
	$ChaineSQL .= " WHERE num_client ='".$_SESSION["num_client"]."'";
	$ChaineSQL .= " ORDER BY commande.num_commande DESC";
	
	//echo($ChaineSQL);
	
	$result = mysql_query($ChaineSQL);

	if (mysql_num_rows($result)<1)
	{
?>
      Your research has no results.
   <?
	}
	else
	{
?>
      <br>
      <br>
      <table align=left border=1 bordercolor="B9133C" cellpadding=0 cellspacing=0 width=90%>
        <tr bordercolor="B9133C"> 
          
	 <td align=center class="entete_panier" id="texte2_blanc">Order number&nbsp;</td>
          
	 <td align=center class="entete_panier" id="texte2_blanc">&nbsp;Date of order&nbsp;</td>
          
	 <td align=center class="entete_panier" id="texte2_blanc">Mode of payment</td>
          
	 <td align=center class="entete_panier" id="texte2_blanc">Statute payment</td>
          
	 <td align=center class="entete_panier" id="texte2_blanc">&nbsp;Statute order</td>
          
	 <td align=center class="entete_panier" id="texte2_blanc">&nbsp;Order&nbsp;</td>
	  <td align=center class="entete_panier" id="texte2_blanc">&nbsp;Invoice&nbsp;</td>
        </tr>
        <?
		while($row=mysql_fetch_array($result))
		{
?>
        <tr valign="middle" bgcolor="#FFFFFF"> 
          
	 <td height=30 align="center" id=texte2> 
            
	  <?=$row["num_commande"]?>
            </td>
          <td align="center" id=texte2> 
            <?=formatdate($row["date_commande"])?>
            <div align="center">&nbsp; 
              <?=$row["heure_commande"]?>
            </div></td>
          <?
					if ($row["mode_paiement"]==1)
					{
					?>
          <td align="center" id=texte2>
	  <div align="center">Check</div>
	 </td>
          <?
					}
					else
					{
					?>
          <td align="center" id=texte2>
	  <div align="center">Credit card</div>
	 </td>
          <?
					}
					?>
          <?
					switch($row["statut_paiement"])
					{
						case 1 :
					?>
          <td align="center" id=texte2>
	  <div align="center">paid</div>
	 </td>
          <?
						break;
						case 2 :
					?>
          <td align="center" id=texte2>
	  <div align="center">on standby</div>
	 </td>
          <?
						break;
						case 3 :
					?>
          <td align="center" id=texte2>
	  <div align="center">refused</div>
	 </td>
          <?
						break;
						default : 
					?>
          <td align="center" id=texte2>
	  <div align="center">refused</div>
	 </td>
          <?
						break;
					}
					?>
          <?
					switch($row["statut_commande"])
					{
						case 1 :
					?>
          <td align="center" id=texte2>
	  <div align="center">to be prepared</div>
	 </td>
          <?
						break;
						case 2 :
					?>
          <td align="center" id=texte2>
	  <div align="center">send: number: collisimo: <a href="http://www.coliposte.net/particulier/suivi_particulier.jsp?colispart=<?=$row["num_colissimo"]?>" target="_blank"><b> 
              
	   <?=$row["num_colissimo"]?>
              </b></a></div>
	 </td>
          <?
						break;
						case 3 :
					?>
          <td align="center" id=texte2>
	  <div align="center">refused</div>
	 </td>
          <?
						break;
						default : 
					?>
          <td align="center" id=texte2>
	  <div align="center">refused</div>
	 </td>
          <?
						break;
					}
					?>
          <td align=center id=texte2>
	  <div align="center"><a href="javascript:MM_openBrWindow('print_commande.php?id=<?=$row["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Print</a></div>
	 </td>
	 <td align=center id=texte2>
	 <div align="center"><a href="javascript:MM_openBrWindow('print_commande_client.php?id=<?=$row["num_commande"]?>','','scrollbars=yes,resizable=yes, width=900,height=600')" >Print</a></div>
	 </td>
        </tr>
        <?
		}
?>
      </table>
      <?
	}


?>
      <br>
      <br></td>
  </tr>
</table>
<br>
</body>
</html>

<?php include_once("../include/_connexion_fin.php"); ?>

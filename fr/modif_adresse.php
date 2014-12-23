<?php include_once("../include/_session.php");?>
<?php include_once("../include/_connexion.php");

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

if (!isset($_SESSION["num_client"]))
{
	header("Location: mesinfos_identification.php");
}

// bien selectionnons l'adresse en question..
$ChaineSQL = "SELECT * FROM adresse WHERE num_adresse = '".$_GET["num_adresse"]."' AND num_client='".$_SESSION["num_client"]."'";
$result=mysql_query($ChaineSQL);

if (mysql_num_rows($result)==0)
{
	header("Location: mesinfos_identification.php");	
}
else
{
	$row=mysql_fetch_array($result);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function VerifForm()
{
	if (document.formul1.nom.value.length==0)
	{
		alert("Vous devez saisir votre nom");
		document.formul1.nom.focus();
		return(false);
	}
	if (document.formul1.prenom.value.length==0)
	{
		alert("Vous devez saisir votre prenom");
		document.formul1.prenom.focus();
		return(false);
	}
	if (document.formul1.adresse1.value.length==0)
	{
		alert("Vous devez saisir votre adresse");
		document.formul1.adresse1.focus();
		return(false);
	}
	if (document.formul1.cp.value.length==0)
	{
		alert("Vous devez saisir votre code postal");
		document.formul1.cp.focus();
		return(false);
	}
	if (document.formul1.ville.value.length==0)
	{
		alert("Vous devez saisir votre ville");
		document.formul1.ville.focus();
		return(false);
	}
	if (document.formul1.pays.value==0)
	{
		alert("Vous devez saisir votre pays");
		document.formul1.pays.focus();
		return(false);
	}
	if (document.formul1.email.value.length==0)
	{
		alert("Vous devez saisir votre e-mail");
		document.formul1.email.focus();
		return(false);
	}
}

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
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/valider_over.gif')" border="0">
<FORM action="enreg_adresse.php" method=post name=formul1 onsubmit="return VerifForm();">
<input type=hidden name="num_client" value="<?=$_SESSION["num_client"]?>">
<input type=hidden name="num_adresse" value="<?=$_GET["num_adresse"]?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
    <tr>
      <td><TABLE cellSpacing=2 cellPadding=2 border=0>
          <TR> 
            <TD colspan=4 align=left id="texte3_blanc">Modifier une adresse de 
              livraison</TD>
          </TR>
          <TR> 
            <TD colspan=4>&nbsp;</TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Civilité :</TD>
            <TD> <SELECT name=civilite>
                <OPTION <?=Selector(1,$row["num_civilite"])?> value="1">M.</OPTION>
                <OPTION <?=Selector(2,$row["num_civilite"])?> value="2">Mme</OPTION>
                <OPTION <?=Selector(3,$row["num_civilite"])?> value="3">Mlle</OPTION>
              </SELECT> </TD>
            <TD id="texte2_blanc">&nbsp;</TD>
            <TD>&nbsp; </TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Nom (*) :</TD>
            <TD><INPUT maxLength=50 name=nom value="<?=$row["nom_liv"]?>"></TD>
            <TD id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Prénom 
              (*) :</TD>
            <TD><INPUT maxLength=50 name=prenom value="<?=$row["prenom_liv"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Bâtiment :</TD>
            <TD><INPUT maxLength=4 size=4 name=batiment value="<?=$row["batiment"]?>"></TD>
            <TD id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Etage 
              :</TD>
            <TD><INPUT maxLength=4 size=4 name=etage value="<?=$row["etage"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">N° de porte :</TD>
            <TD colSpan=3><INPUT maxLength=4 size=4 name=numporte value="<?=$row["porte"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Adresse (*) :</TD>
            <TD colSpan=3><input maxlength=255 size=65 name=adresse1 value="<?=$row["adresse1"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc" noWrap>Adresse (suite) :</TD>
            <TD colSpan=3><INPUT maxLength=255 size=65 name=adresse2 value="<?=$row["adresse2"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Code postal (*) :</TD>
            <TD><INPUT maxLength=50 name=cp value="<?=$row["cp"]?>"></TD>
            <TD id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Ville 
              (*) :</TD>
            <TD><INPUT maxLength=50 name=ville value="<?=$row["ville"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Pays (*) :</TD>
            <TD colSpan=3> 
              <?
              $MaChaineSQL = "SELECT * FROM pays ORDER BY num_pays";
              $result2 = mysql_query($MaChaineSQL);
              ?>
              <select name= pays>
                <option value=0>--Sélectionnez un pays--</option>
                <?
                while($row2=mysql_fetch_array($result2))
                {
                ?>
                <option <?=selector($row2["num_pays"], $row["num_pays"])?> value="<?=$row2["num_pays"]?>">
                <?=$row2["pays"]?>
                </option>
                <?
                }
                ?>
              </select> </TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">E-mail (*) :</TD>
            <TD><INPUT maxLength=255 name=email value="<?=$row["email"]?>"></TD>
            <TD id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Téléphone 
              :</TD>
            <TD><INPUT maxLength=20 name=tel value="<?=$row["tel"]?>"></TD>
          </TR>
          <TR> 
            <TD id="texte2_blanc">Fax :</TD>
            <TD><INPUT maxLength=20 name=fax value="<?=$row["fax"]?>"></TD>
            <TD id="texte2_blanc" noWrap><p><img src="../images/pixel_transparent.gif" width="10" height="10">Téléphone<br>
                <img src="../images/pixel_transparent.gif" width="10" height="10">portable 
                :</p></TD>
            <TD><INPUT maxLength=20 name=gsm value="<?=$row["gsm"]?>"></TD>
          </TR>
          <TR align="left"> 
            
	  <TD colSpan=4>
			  <br>
	   <input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/valider_over.gif',1)" name="Image3" type="image" src="images/valider_on.gif"  width="108" height="13" border="0" >
			</TD>
          </TR>
          <TR> 
            <TD id="texte1" colSpan=4>(*) Champs obligatoires.</TD>
          </TR>
        </TABLE></td>
    </tr>
  </table>
</FORM>

</BODY>

</HTML>

<?php include_once("../include/_connexion_fin.php"); ?>
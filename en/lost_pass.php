<?php include_once("../include/_session.php");?>
<?php include_once("../include/_connexion.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link href="include/collants_styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function VerifForm()
{

	if (document.formul1.email.value.length==0)
	{
		alert("Vous devez saisir votre e-mail");
		document.formul1.email.focus();
		return(false);
	}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

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
<body background="../images/fond_collants_large.gif"  leftmargin="15"  topmargin="15" bgproperties="fixed" id="fond_rose" border="0">
<FORM action="envoi_pass.php" method=post name="formul1" onsubmit="return VerifForm();">
<TABLE cellSpacing=3 cellPadding=4 border=0>
  <TR>
      <TD colspan=4 align=left id="texte3_blanc"><p><br>
          Loss of your password: : </p>
        </TD>
  </TR>
  <TR>
      <TD colspan=4 align=left id="texte2_blanc">Please, send us your email : 
      </TD>
  </TR>
  <TR>
    <TD id="texte2_blanc">E-mail :</TD>
    <TD><INPUT maxLength=255 name=email></TD>
    <TD>&nbsp;</TD>
    <TD>
	<input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/envoyer_over.gif',1)" name="Image3" type="image" src="images/envoyer_on.gif"  width="108" height="13" border="0" >
       </TD>
  </TR>

</TABLE>
</FORM>
</BODY>
</HTML>
<?php include_once("../include/_connexion_fin.php"); ?>
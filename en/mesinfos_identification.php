<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");

if (isset($_SESSION["num_client"]))
{
	header("Location: recap_info.php");
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

function VerifForm(){
	if (document.formul1.email.value.length==0)
	{
		alert("Please, enter your e-mail");
		document.formul1.email.focus();
		return(false);
	}
	if (document.formul1.pass.value.length==0)
	{
		alert("Please, enter your password");
		document.formul1.pass.focus();
		return(false);
	}
}

//-->
</script>
</head>
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" onLoad="MM_preloadImages('images/supprimer_over.gif','images/passer_commande_over.gif','images/mdpperdu_on.gif','images/creer_compte_over.gif')" border="0">
<form name=formul1 method=post target="_self" action="recap_info.php" onsubmit="return VerifForm();">
	<table width="100%" border="0" align="left" cellpadding="10">
		<tr>
		    
      <td colspan=2 align="left" valign="top" id="texte3_blanc">You have already 
        an account.<br></td>
		</tr>
		<tr>
		    
      <td width=200 align="left" valign="top" id="texte2_blanc">Identifier (your 
        E-mail): </td>
		    <td align="left" valign="top" id="texte2_blanc"><input size=35 type=text name=email maxlength=150></td>
		</tr>
		<tr>
		    
      <td align="left" valign="top" id="texte2_blanc">Password: </td>
		    <td align="left" valign="top" id="texte2_blanc"><input size=35 type=password name=pass maxlength=150></td>
		</tr>
		<tr>
			
   <td colspan=2 align=right>
	<div align="left">
	 <input name="Image1" type="image" id="Image1" onMouseOver="MM_swapImage('Image1','','images/identification_over.gif',1)" onMouseOut="MM_swapImgRestore()" src="images/identification_on.gif"  width="108" height="13" border="0" >
    
</div>
   </td>
		</tr>
		<tr>
			
      
   <td colspan=2><a href="lost_pass.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/mdpperdu_on.gif',1)"><img src="images/mdpperdu_over.gif" name="Image2" width="170" height="13" border="0"></a></td>
		</tr>
		<tr>
			
   <td colspan=2><img src="../images/pixel_rouge.jpg" width="100%" height="1"></td>
		</tr>
		<tr>
		    
      <td colspan=2 align="left" valign="top" id="texte3_blanc"> You don't have 
        an account.<br>
		    </td>
		</tr>
		<tr>
		    
      
   <td colspan=2 align="left" valign="top" id="texte3_blanc"> <a href="creer_compte.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/creer_compte_over.gif',1)"><img src="images/creer_compte_on.gif" name="Image3" width="170" height="13" border="0"></a></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>
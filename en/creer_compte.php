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
if (document.formul1.nom.value.length==0)

	{

		alert("You must seize your name");

		document.formul1.nom.focus();

		return(false);

	}

	if (document.formul1.prenom.value.length==0)

	{

		alert("You must seize your first name");

		document.formul1.prenom.focus();

		return(false);

	}

	if (document.formul1.adresse1.value.length==0)

	{

		alert("You must seize your adress");

		document.formul1.adresse1.focus();

		return(false);

	}

	if (document.formul1.cp.value.length==0)

	{

		alert("You must seize your postal code");

		document.formul1.cp.focus();

		return(false);

	}

	if (document.formul1.ville.value.length==0)

	{

		alert("You must seize your city");

		document.formul1.ville.focus();

		return(false);

	}

	if (document.formul1.pays.value==0)

	{

		alert("You must seize your country");

		document.formul1.pays.focus();

		return(false);

	}

	if (document.formul1.email.value.length==0)

	{

		alert("You must seize your e-mail");

		document.formul1.email.focus();

		return(false);

	}

	if (document.formul1.pwd.value.length==0)

	{

		alert("You must seize your password");

		document.formul1.pwd.focus();

		return(false);

	}

	if (document.formul1.pwd.value!=document.formul1.pwdbis.value)

	{

		alert("You must seize your password two times");

		document.formul1.pwd.focus();

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
<body background="../images/fond_collants_large.gif" bgproperties="fixed" id="fond_rose" border="0">
<FORM action="newcompte.php" method="post" name="formul1" onsubmit="return VerifForm();">
 <table width="100%" border="0" cellspacing="0" cellpadding="15">
 <tr>
  <td>
	<table cellspacing=1 cellpadding=1 border=0>
	<tr> 
	  <td colspan=4 align=left id="texte3_blanc">Create your account</td>
	 </tr>
	 <tr>
	 <td colspan=4>&nbsp;</td>
	 </tr>
	 <tr>
	 <td id="texte2_blanc">Civility:</td>
	  <td>
	  <select name=civilite>
		<option value="1">Mr</option>
		<option value="2">Mrs</option>
		<option value="3">Miss</option>
	   </select>
	    </td>
	  <td id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Birthday:</td>
	  <td> 
	   <select name="jour">
                
		<option selected value=0>--</option>      
		<?
				for($i=1;$i<32;$i++)
				{
				?>
		<option value="<?=$i?>"><?=$i?></option>
		<?

				}
			
				?>
              
	   </select>
	    
	   <select name="mois">
                
		<option selected value=0>--</option>
                
		<?

				for($i=1;$i<13;$i++)
			
				{
			
				?>
                
		<option value="<?=$i?>">
                
		<?=$i?>
                </option>
                
		<?

    }

    ?>
              
	   </select>
	    
	   <select name="an">
                
		<option selected value=0>----</option>
                
		<?

				for($i=1900;$i<date("Y")+1;$i++)
			
				{
			
				?>
                
		<option value="<?=$i?>">
                
		<?=$i?>
                </option>
                
		<?
			
				}
			
				?>
              
	   </select>
	    </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Name (*):</td>
	  <td>
	   <input maxlength=50 name=nom>
	  </td>
	  <td id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">First name
              (*):</td>
	  <td>
	   <input maxlength=50 name=prenom>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Building :</td>
	  <td>
	   <input maxlength=4 size=4 name=batiment>
	  </td>
	  <td id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Floor:</td>
	  <td>
	   <input maxlength=4 size=4 name=etage>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Door:</td>
	  <td colspan=3>
	   <input maxlength=4 size=4 name=numporte>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Address(*):</td>
	  <td colspan=3>
	   <input maxlength=255 size=71 name=adresse1>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc" nowrap>Address (suite):</td>
	  <td colspan=3>
	   <input maxlength=255 size=71 name=adresse2>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Postal code(*):</td>
	  <td>
	   <input maxlength=50 name=cp>
	  </td>
	  <td id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">City 
              (*):</td>
	  <td>
	   <input maxlength=50 name=ville>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Country (*):</td>
	  <td colspan=3> 
              
	   <?
	   $MaChaineSQL = "SELECT * FROM pays ORDER BY num_pays";
	   $result2 = mysql_query($MaChaineSQL);
	   ?>
	   <select name= pays>
                <option selected value=0>--Select your country--</option>
                <?

				while($row=mysql_fetch_array($result2))
			
				{
			
				?>
                <option value="<?=$row["num_pays"]?>">
                <?=$row["pays"]?>
                </option>
                <?

				}
			
				?>
              </select>
	    </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">E-mail (*):</td>
	  <td>
	   <input maxlength=255 name=email>
	  </td>
	  <td id="texte2_blanc"><img src="../images/pixel_transparent.gif" width="10" height="10">Telephone:</td>
	  <td>
	   <input maxlength=20 name=tel>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc">Fax:</td>
	  <td>
	   <input maxlength=20 name=fax>
	  </td>
	  <td id="texte2_blanc" nowrap><img src="../images/pixel_transparent.gif" width="10" height="10">Mobile:</td>
	  <td>
	   <input maxlength=20 name=gsm>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte2_blanc" nowrap>Password (*):</td>
	  <td>
	   <input type=password name=pwd>
	  </td>
	  <td id="texte2_blanc" nowrap><img src="../images/pixel_transparent.gif" width="10" height="10">Confirmation 
              (*):</td>
	  <td>
	   <input type=password name=pwdbis>
	  </td>
	 </tr>
		  
	 <tr>
		  	 
	  <td colspan="4" id="texte2_blanc" nowrap>notch this box to receive our newsletter:
<input name="newsletter" type="checkbox" value="" >
	  </td>
	 </tr>
          
	 <tr align="left"> 
            
	  <td colspan=4 id="texte1">
	   <div align="left">(*) Obligatoiry fields.
	   <br>
		<br>
				<br>
	    
	   </div>
	  </td>
	 </tr>
          
	 <tr> 
            
	  <td id="texte1" colspan=4>
<input onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/valider_over.gif',1)" name="Image3" type="image" src="images/valider_on.gif"  width="108" height="13" border="0" >
	   
	  </td>
	 </tr>
        
	</table>
   </td>
  </tr>
  
 </table>
   </FORM>

</BODY>

</HTML>

<?php include_once("../include/_connexion_fin.php"); ?>
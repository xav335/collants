<? include_once("../include/_session.php");?>
<?
	if ($_GET["action"]=="deconnexion") $_SESSION["authentification"] = 0;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
</head>

<body scroll=no leftmargin="5" topmargin="5">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="center">
		<table width="980" height="560" border="0"  cellpadding="0" cellspacing="0" background="images/login.gif" id="border1">
		  <tr>
		    <td align="left" valign="middle">
				<table width="177" height="42" border="0" align="center" cellpadding="2" cellspacing="0">
				   <? if ($_GET["ident"]==1) {?>
					<tr>
						<td colspan="2">Erreur d'identification</td>
					</tr>
					<? }?>
					<tr> 
					  <td width="76" height="20" align="left" valign="top" id="texte1">login</td>
					  <td  id="texte1" width="105" align="left" valign="top">mot de passe</td>
					</tr>
					<form name="formulaire" method="post" action="identification.php">
					<tr> 
					  <td width="76" align="left" valign="top">
						
						  <input name="login" type="text" size="15">
					  </td>
					  <td width="105" align="left" valign="top">
						  <input type="password" name="mdp" size="15">
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Valider"></td>
					</tr>
					</form>
				  </table>
				</td>
		  </tr>
		</table>
	</td>
</tr>
</table>	
</body>
</html>

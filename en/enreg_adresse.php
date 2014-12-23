<?php include_once("../include/_session.php");?>
<?php include_once("../include/_connexion.php");
if (!isset($_SESSION["num_client"]))
{
	header("Location: mesinfos_identification.php");
}

// enregistrons cette adresse

if($_POST["num_adresse"] ==0)
{
	// nouvelle adresse

	$ChaineSQL = "INSERT INTO adresse (num_client, num_civilite, nom_liv, prenom_liv, batiment, porte, etage, adresse1, adresse2, cp, ville, region, num_pays, tel, fax, gsm, email)";
	$ChaineSQL .= " VALUES ('".$_SESSION["num_client"]."','".$_POST["civilite"]."','".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["batiment"]."','".$_POST["numporte"]."','".$_POST["etage"]."','".$_POST["adresse1"]."','".$_POST["adresse2"]."','".$_POST["cp"]."','".$_POST["ville"]."','','".$_POST["pays"]."','".$_POST["tel"]."','".$_POST["fax"]."','".$_POST["gsm"]."','".$_POST["email"]."')";

	$result=mysql_query($ChaineSQL);
	
}

else
{
	//update adresse
	$ChaineSQL = "UPDATE adresse ";
	$ChaineSQL .= " SET num_client='".$_SESSION["num_client"]."', num_civilite='".$_POST["civilite"]."', nom_liv='".$_POST["nom"]."', prenom_liv='".$_POST["prenom"]."', batiment='".$_POST["batiment"]."', porte='".$_POST["numporte"]."', etage='".$_POST["etage"]."', adresse1='".$_POST["adresse1"]."', adresse2='".$_POST["adresse2"]."', cp='".$_POST["cp"]."', ville='".$_POST["ville"]."', region='', num_pays='".$_POST["pays"]."', tel='".$_POST["tel"]."', fax='".$_POST["fax"]."', gsm='".$_POST["gsm"]."', email='".$_POST["email"]."'";
	$ChaineSQL .= " WHERE num_adresse='".$_POST["num_adresse"]."' and num_client='".$_SESSION["num_client"]."'" ;
	
	$result=mysql_query($ChaineSQL);
	
}


// redirection
header("Location: recap_info.php");

?>


<?php include_once("../include/_connexion_fin.php"); ?>

<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<? include_once("_imagemanipulator.php")?>
<?	
	switch ($_POST["choix"]){
		case 1:
			$lien_photo = "boutique.php?num_rubrique=1";
			break;
		case 2:
			$lien_photo = "boutique.php?num_rubrique=2";
			break;	
		case 3:
			$lien_photo = "boutique.php?num_rubrique=3";
			break;	
		case 4:
			$lien_photo = "promotions.php";
			break;			
		case 5:
			$lien_photo = "boutique.php?num_rubrique=4";
			break;	
		case 6:
			$lien_photo = "top5.php";
			break;	
		
	}
	$query  = "UPDATE accueil ";
	$query .= "Set lien_photo='". $lien_photo  ."' " ;
	$query .= " WHERE num_texte=1";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	
	//------------- ----------------//
	$query="SELECT * FROM produit ";
	$query.=" WHERE produit.actif=1 ";	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
	
	//------------- ----------------//
	$query_rubrique = "";
	for ($t=1;$t<=$nb_enr;$t++){
		if (isset($_POST["num_produit_". $t])){
			$query_rubrique .= "(".  $_POST["num_produit_". $t] ."),";
		}
	}
	$query_rubrique =  substr($query_rubrique, 0, strlen($query_rubrique)-1); 
	//echo $query_rubrique;
	
	$query  = "DELETE FROM accueil_photo  ";
	$rstemp = mysql_query($query);
		
	if ($query_rubrique!=""){	
		$query  = "INSERT INTO accueil_photo (num_produit_photo) VALUES ";
		$query .= $query_rubrique;
		$rstemp = mysql_query($query);
	}
	//----------------------------------------- -----------------//
	
	

	header("Location: accueil_photo.php");

?>
<? include_once("../include/_connexion_fin.php"); ?>
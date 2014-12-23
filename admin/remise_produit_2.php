<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<? include_once("_imagemanipulator.php")?>
<?	

	$query="SELECT * FROM produit ";
	$query.=" WHERE produit.actif=1 ";	
	$query.=" ORDER BY designation ";	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
	
	//------------- Mise à jour des remise par produit -----------------//
	$query_rubrique = "";
	for ($t=1;$t<=$nb_enr;$t++){
		if (isset($_POST["num_produit_". $t])){
			$query_rubrique .= "(". $_POST["num_remise"] .",". $_POST["num_produit_". $t] ."),";
		}
	}
	$query_rubrique =  substr($query_rubrique, 0, strlen($query_rubrique)-1); 
	//echo $query_rubrique;
	
	$query  = "DELETE FROM produit_remise  ";
	$query .= " WHERE num_remise=". $_POST["num_remise"];
	$rstemp = mysql_query($query);
		
	if ($query_rubrique!=""){	
		$query  = "INSERT INTO produit_remise (num_remise, num_produit) VALUES ";
		$query .= $query_rubrique;
		$rstemp = mysql_query($query);
	}
	//----------------------------------------- -----------------//
	
	

	header("Location: remise_produit.php?num_remise=". $_POST["num_remise"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>
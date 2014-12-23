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
		if (isset($_POST["num_produit_associe_". $t])){
			$query_rubrique .= "(". $_POST["num_produit"] .",". $_POST["num_produit_associe_". $t] ."),";
		}
	}
	$query_rubrique =  substr($query_rubrique, 0, strlen($query_rubrique)-1); 
	//echo $query_rubrique;
	
	$query  = "DELETE FROM produit_associe  ";
	$query .= " WHERE num_produit=". $_POST["num_produit"];
	$rstemp = mysql_query($query);
		
	if ($query_rubrique!=""){	
		$query  = "INSERT INTO produit_associe (num_produit, num_produit_associe) VALUES ";
		$query .= $query_rubrique;
		$rstemp = mysql_query($query);
	}
	//----------------------------------------- -----------------//
	
	

	header("Location: produit_associe.php?num_produit=". $_POST["num_produit"] ."&design=". urlencode($_POST["design"] ));

?>
<? include_once("../include/_connexion_fin.php"); ?>
<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<? include_once("_imagemanipulator.php")?>
<?	

	$query="SELECT marque.marque, marque.num_marque FROM  ";
	$query.=" marque ";	
	$query.=" WHERE marque.actif=1 ";		
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
	
	//------------- Mise à jour des remise par produit -----------------//
	$query_rubrique = "";
	for ($t=1;$t<=$nb_enr;$t++){
		if (isset($_POST["num_marque_". $t])){
			$query="SELECT produit.num_produit FROM  ";
			$query.=" produit ";	
			$query.=" WHERE produit.actif=1 AND produit.num_marque=". $_POST["num_marque_". $t];		
			$rstemp3 = mysql_query($query);
			$nb_enr3 = mysql_num_rows($rstemp3);
			if ($nb_enr3>0){
				while ($row = mysql_fetch_array($rstemp3)) {
					$query_rubrique .= "(". $_POST["num_remise"] .",". $row["num_produit"] ."),";
				}
			}
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
		//echo $query;
	}
	//----------------------------------------- -----------------//
	
	

	header("Location: remise_produit.php?num_remise=". $_POST["num_remise"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>
<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	
	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "INSERT INTO marque (marque) VALUES (";
	$query .= "'  ". $_POST["marque"] ."' " ;
	$query .= ")";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	$num_marque = mysql_insert_id();
	
	header("Location: marque_modif.php?num_marque=". $num_marque);

?>
<? include_once("../include/_connexion_fin.php"); ?>
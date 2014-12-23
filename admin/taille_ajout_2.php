<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	
	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "INSERT INTO taille (taille, taille_en) VALUES (";
	$query .= "'  ". $_POST["taille"] ."' " ;
	$query .= ", '". $_POST["taille_en"] ."' " ;
	$query .= ")";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	$num_taille = mysql_insert_id();
	
	header("Location: taille_modif.php?num_taille=". $num_taille);

?>
<? include_once("../include/_connexion_fin.php"); ?>
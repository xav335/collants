<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	
	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "INSERT INTO categorie (categorie, categorie_en) VALUES (";
	$query .= "'  ". $_POST["categorie"] ."' " ;
	$query .= ", '". $_POST["categorie_en"] ."' " ;
	$query .= ")";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	$num_categorie = mysql_insert_id();
	
	header("Location: categorie_modif.php?num_categorie=". $num_categorie);

?>
<? include_once("../include/_connexion_fin.php"); ?>
<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "UPDATE taille ";
	$query .= "Set taille='". $_POST["taille"] ."' " ;
	$query .= ", taille_en='". $_POST["taille_en"] ."' " ;
	$query .= " WHERE num_taille=". $_POST["num_taille"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: taille_modif.php?num_taille=". $_POST["num_taille"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>
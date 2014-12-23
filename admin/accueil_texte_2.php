<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$query  = "UPDATE accueil ";
	$query .= "Set titre='". $_POST["titre"] ."' " ;
	$query .= ", titre_en='". $_POST["titre_en"] ."' " ;
	$query .= ", texte='". $_POST["texte"] ."' " ;
	$query .= ", texte_en='". $_POST["texte_en"] ."' " ;
	$query .= ", titre_bas='". $_POST["titre_bas"] ."' " ;
	$query .= ", titre_bas_en='". $_POST["titre_bas_en"] ."' " ;
	$query .= " WHERE num_texte=1";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: accueil_texte.php");

?>
<? include_once("../include/_connexion_fin.php"); ?>
<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$query  = "UPDATE ticker ";
	$query .= "SET texte='". addslashes($_POST["texte"]) ."' " ;
	$query .= ", texte_en='". addslashes($_POST["texte_en"]) ."' " ;
	if (isset($_POST["actif"])){
	$query .= ", actif=1";
	}else{
	$query .= ", actif=0";
	}
	$query .= " WHERE num_ticker=1";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: accueil_ticker.php");

?>
<? include_once("../include/_connexion_fin.php"); ?>
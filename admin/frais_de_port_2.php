<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$date_debut=mktime ("00","00","00",$_POST["mois_debut"],$_POST["jour_debut"],$_POST["an_debut"]);
	$date_debut=date("Y/m/d H:i:s", $date_debut);
	$date_fin=mktime ("23","59","59",$_POST["mois_fin"],$_POST["jour_fin"],$_POST["an_fin"]);
	$date_fin=date("Y/m/d H:i:s", $date_fin);


	$query  = "UPDATE frais_port ";
	$query .= "Set date_debut='". $date_debut ."' " ;
	$query .= ", date_fin='". $date_fin ."' " ;
	if (isset($_POST["actif"])){
	$query .= ", actif=1";
	}else{
	$query .= ", actif=0";
	}
	$query .= ", frais_port_fr=". str_replace(",",".",$_POST["frais_port_fr"]) ." " ;
	$query .= ", frais_port_ext=". str_replace(",",".",$_POST["frais_port_ext"]) ." " ;
	$query .= ", frais_port_fr_promo=". str_replace(",",".",$_POST["frais_port_fr_promo"]) ." " ;
	$query .= ", frais_port_ext_promo=". str_replace(",",".",$_POST["frais_port_ext_promo"]) ." " ;
	$query .= ", minimum_commande=". str_replace(",",".",$_POST["minimum_commande"]) ." " ;
	$query .= " WHERE num_frais_port=1";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: frais_de_port.php");

?>
<? include_once("../include/_connexion_fin.php"); ?>
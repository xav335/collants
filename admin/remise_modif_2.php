<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$date_debut=mktime ("00","00","00",$_POST["mois_debut"],$_POST["jour_debut"],$_POST["an_debut"]);
	$date_debut=date("Y/m/d H:i:s", $date_debut);
	$date_fin=mktime ("23","59","59",$_POST["mois_fin"],$_POST["jour_fin"],$_POST["an_fin"]);
	$date_fin=date("Y/m/d H:i:s", $date_fin);


	$query  = "UPDATE remise ";
	$query .= "Set date_debut='". $date_debut ."' " ;
	$query .= ", date_fin='". $date_fin ."' " ;
	$query .= ", pourcentage=". str_replace(",",".",$_POST["pourcentage"]) ." " ;
	$query .= ", bon_achat=". str_replace(",",".",$_POST["bon_achat"]) ." " ;
	$query .= ", minimum_commande=". str_replace(",",".",$_POST["minimum_commande"]) ." " ;
	$query .= ", frais_port_fr=". str_replace(",",".",$_POST["frais_port_fr"]) ." " ;
	$query .= ", frais_port_ext=". str_replace(",",".",$_POST["frais_port_ext"]) ." " ;
	$query .= ", cadeau='". $_POST["cadeau"] ."' " ;
	$query .= ", cadeau_en='". $_POST["cadeau_en"] ."' " ;
	$query .= ", code='". $_POST["code"] ."' " ;
	$query .= " WHERE num_remise=". $_POST["num_remise"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: remise_modif.php?num_remise=". $_POST["num_remise"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>
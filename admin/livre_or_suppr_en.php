<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         
	
	$query  = "UPDATE livre_or_en ";
	if ($_GET["valide"]=="1"){
		$query .= "Set valide=0 " ;
	}else{
		$query .= "Set valide=1 " ;
	}	
	$query .= " WHERE num_livre_or=". $_GET["num_livre_or"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: livre_or_liste_en.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>
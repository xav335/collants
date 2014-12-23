<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?php
	echo "chaine querystring : " . $HTTP_SERVER_VARS["QUERY_STRING"] ;
	$query .="INSERT INTO bidon (bidon)  VALUES ('". $HTTP_SERVER_VARS["QUERY_STRING"] ."')";	
	$rstemp = mysql_query($query);

?>
<?php include_once("../include/_connexion_fin.php"); ?>
<?
	// Fichier � t�l�charger
	$fichier = "./extraction.csv";
	
	// Dialogue de t�l�chargement
	header("content-type: application/octet-stream");
	
	// seulement pour application/octet-stream !
	header("Content-Disposition: attachment; filename=extraction.csv");
	
	// Envoie le buffer
	flush();
	
	// Envoie le fichier
	readfile($fichier);
	
	// Redirection
	header("Location: ../xxextraction_module.php");
?>
<?
	// Fichier à télécharger
	$fichier = "./extraction.csv";
	
	// Dialogue de téléchargement
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
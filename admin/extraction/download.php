<?
	// Fichier Ó tÚlÚcharger
	$fichier = "./extraction.csv";
	
	// Dialogue de tÚlÚchargement
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
<?
	// Répertoire à utiliser pour les images thématiques
	$requete = "SELECT * FROM theme WHERE actif=1";
	//echo $requete . "<br>";
	$info_theme = mysql_query($requete);
	$data = mysql_fetch_assoc($info_theme);
	$rep_theme = $chemin . "images/" . $data["nom_repertoire"] . "/en/";
	//echo "-->" .	$rep_theme . "<br>";
?>
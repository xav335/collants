<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<? include_once("_imagemanipulator.php")?>
<?	
	
	
	$nb_fichier=1; //Nombre de fichiers transmis max

	for($k=1;$k<=$nb_fichier;$k++){
		if ($LE_FICHIER_name[$k-1] != "" ){ 
			$LE_FICHIER_name[$k-1] = traitement_image($LE_FICHIER_name[$k-1]);
			if ($k==1) $chemin_serveur[$k]="../couleur/".$LE_FICHIER_name[$k-1];	
			//echo $LE_FICHIER_name[$k-1] ;
			//echo "<br>";
		}
	}
	
	for($k=1;$k<=$nb_fichier;$k++){
		if ($LE_FICHIER_name[$k-1] != "" ){ 
			copy($LE_FICHIER[$k-1],$chemin_serveur[$k]);
			unlink($LE_FICHIER[$k-1]);
			//---------------  Resize des images dans le bon format ----------------//
			if ($k==1) {
				$i = new ImageManipulator("../couleur/".$LE_FICHIER_name[$k-1]);
				$i->resample(50,50);
				$path_img_thumb = "../couleur/".$LE_FICHIER_name[$k-1];
				$i->save_jpeg($path_img_thumb);
				$i->end();	
			}	
			//---------------  FIN Resize des images dans le bon format -------------//
		}
	}	
	
	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "UPDATE couleur ";
	$query .= "Set couleur='". $_POST["couleur"] ."' " ;
	$query .= ", couleur_en='". $_POST["couleur_en"] ."' " ;
	if ($LE_FICHIER_name[0] != "" ){ 
		$query.= ",fic_couleur='". $LE_FICHIER_name[0] ."' " ;
	}
	$query .= " WHERE num_couleur=". $_POST["num_couleur"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	


	header("Location: couleur_modif.php?num_couleur=". $_POST["num_couleur"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>
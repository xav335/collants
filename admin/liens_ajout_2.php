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
			if ($k==1) $chemin_serveur[$k]="../liens/".$LE_FICHIER_name[$k-1];	
			//echo $LE_FICHIER_name[$k-1] ;
			//echo "<br>";
		}
	}
	
	for($k=1;$k<=$nb_fichier;$k++){
		if ($LE_FICHIER_name[$k-1] != "" ){ 
			copy($LE_FICHIER[$k-1],$chemin_serveur[$k]);
			unlink($LE_FICHIER[$k-1]);
			//---------------  Resize des images dans le bon format ----------------//
			/*if ($k==1) {
				$i = new ImageManipulator("../couleur/".$LE_FICHIER_name[$k-1]);
				$i->resample(50,50);
				$path_img_thumb = "../couleur/".$LE_FICHIER_name[$k-1];
				$i->save_jpeg($path_img_thumb);
				$i->end();	
			}*/	
			//---------------  FIN Resize des images dans le bon format -------------//
		}
	}	
	
	

	$query  = "INSERT INTO liens (libelle, url, logo, ordre) VALUES (";
	$query .= "'  ". $_POST["libelle"] ."' " ;
	$query .= ", '". $_POST["url"] ."' " ;
	if ($LE_FICHIER_name[0] != "" ){ 
		$query.= ", '". $LE_FICHIER_name[0] ."' " ;
	}else{
		$query.= ", '' " ;
	}
	$query .= ", ". $_POST["ordre"] ." " ;
	$query .= ")";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	$num_liens = mysql_insert_id();
	
	
	
	header("Location: liens_modif.php?num_liens=". $num_liens);

?>
<? include_once("../include/_connexion_fin.php"); ?>
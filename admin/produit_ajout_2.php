<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<? include_once("_imagemanipulator.php")?>
<?	
	$nb_fichier=2; //Nombre de fichiers transmis max

	for($k=1;$k<=$nb_fichier;$k++){
		if ($LE_FICHIER_name[$k-1] != "" ){ 
			$LE_FICHIER_name[$k-1] = traitement_image($LE_FICHIER_name[$k-1]);
			if ($k==2) $chemin_serveur[$k]="../photo/grande/".$LE_FICHIER_name[$k-1];	
			if ($k==1) $chemin_serveur[$k]="../photo/petite/".$LE_FICHIER_name[$k-1];	
			//echo $LE_FICHIER_name[$k-1] ;
			//echo "<br>";
		}
	}
	
	for($k=1;$k<=$nb_fichier;$k++){
		if ($LE_FICHIER_name[$k-1] != "" ){ 
			copy($LE_FICHIER[$k-1],$chemin_serveur[$k]);
			unlink($LE_FICHIER[$k-1]);
			//---------------  Resize des images dans le bon format ----------------//
			if ($k==2) {
				$i = new ImageManipulator("../photo/grande/".$LE_FICHIER_name[$k-1]);
				$i->resample(306,419);
				$path_img_thumb = "../photo/grande/".$LE_FICHIER_name[$k-1];
				$i->save_jpeg($path_img_thumb);
				$i->end();	
			}
			if ($k==1) {
				$i = new ImageManipulator("../photo/petite/".$LE_FICHIER_name[$k-1]);
				$i->resample(105,142);
				$path_img_thumb = "../photo/petite/".$LE_FICHIER_name[$k-1];
				$i->save_jpeg($path_img_thumb);
				$i->end();	
			}	
			//---------------  FIN Resize des images dans le bon format -------------//
		}
	}	
	
	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "INSERT INTO produit (designation, designation_en, description, ";
	$query .= "description_en, note, note_en, reference, num_marque, date_maj ";
	$query .= ",actif, prix, lot, promo_lot, lib_lot, lib_lot_en, photo, vignette) VALUES (";
	$query .= "'  ". $_POST["designation"] ."' " ;
	$query .= ", '". $_POST["designation_en"] ."' " ;
	$query .= ", '". $_POST["description"] ."' " ;
	$query .= ", '". $_POST["description_en"] ."' " ;
	$query .= ", '". $_POST["note"] ."' " ;
	$query .= ", '". $_POST["note_en"] ."' " ;
	$query .= ", '". $_POST["reference"] ."' " ;
	$query .= ",  ". $_POST["num_marque"] ." " ;
	$query .= ", '". $maintenant ."' " ;
	$query .= ", 1";
	
	((trim($_POST["prix"]))!="") ? $prix = $_POST["prix"] : $prix=0;
	$query .= ", ". str_replace(",",".",$prix) ." " ;
	((trim($_POST["lot"]))!="") ? $lot = $_POST["lot"] : $lot=0;
	$query .= ", ". $lot ." " ;
	((trim($_POST["promo_lot"]))!="") ? $promo_lot = $_POST["promo_lot"] : $promo_lot=0;
	$query .= ", ".  str_replace(",",".",$promo_lot) ." " ;
	
	$query .= ", '". $_POST["lib_lot"] ."' " ;
	$query .= ", '". $_POST["lib_lot_en"] ."' " ;
	if ($LE_FICHIER_name[1] != "" ){ 
		$query.= ", '". $LE_FICHIER_name[1] ."' " ;
	}else{
		$query.= ", '' " ;
	}
	if ($LE_FICHIER_name[0] != "" ){ 
		$query.= ", '". $LE_FICHIER_name[0] ."' " ;
	}else{
		$query.= ", '' " ;
	}
	$query .= ")";
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	$num_produit = mysql_insert_id();
	
	
	//------------- Mise � jour des rubriques -----------------//
	$query_rubrique = "";
	for ($t=1;$t<=5;$t++){
		if (isset($_POST["num_rubrique_". $t])){
			$query_rubrique .= "(". $num_produit .",". $_POST["num_rubrique_". $t] ."),";
		}
	}
	$query_rubrique =  substr($query_rubrique, 0, strlen($query_rubrique)-1); 
	//echo $query_rubrique;
	
	$query  = "DELETE FROM produit_rubrique  ";
	$query .= " WHERE num_produit=". $num_produit;
	$rstemp = mysql_query($query);
		
	if ($query_rubrique!=""){	
		$query  = "INSERT INTO produit_rubrique (num_produit, num_rubrique) VALUES ";
		$query .= $query_rubrique;
		$rstemp = mysql_query($query);
	}
	//------------- Fin Mise � jour des rubriques -----------------//
	
	//------------- Mise � jour des cat�gories -----------------//
	
	$query="SELECT * FROM categorie ";
	$query.=" ORDER BY categorie ";	
	$rstemp = mysql_query($query);
	$nb_enr = mysql_num_rows($rstemp);
	
	$query_categorie = "";
	while ($cat = mysql_fetch_array($rstemp)) {
		$num_categorie = $cat["num_categorie"];
		if (isset($_POST["num_categorie_". $num_categorie])){
			$query_categorie .= "(". $num_produit .",". $_POST["num_categorie_". $num_categorie] ."),";
		}
	}
	$query_categorie =  substr($query_categorie, 0, strlen($query_categorie)-1); 
	//echo $query_categorie;
	$query  = "DELETE FROM produit_categorie  ";
	$query .= " WHERE num_produit=". $num_produit;
	$rstemp = mysql_query($query);

	if ($query_categorie!=""){	
		$query  = "INSERT INTO produit_categorie (num_produit, num_categorie) VALUES ";
		$query .= $query_categorie;
		$rstemp = mysql_query($query);
	}
	//------------- Fin Mise � jour des cat�gories -----------------//
	
	


	header("Location: produit_modif.php?num_produit=". $num_produit);

?>
<? include_once("../include/_connexion_fin.php"); ?>
<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");?>
<?  
		$num_produit = $_GET["num_produit"];
		$num_produit_sousref = $_GET["num_produit_sousref"];
		
		if ($num_produit_sousref<>""){
			$query="SELECT * FROM  panier ";
			$query .=" WHERE num_session='". session_id() ."'";	
			$query .=" AND num_produit_sousref=". $num_produit_sousref ;	
			//echo $query ."<br>";
			$rstemp2 = mysql_query($query);
			$nb_enr = mysql_num_rows($rstemp2);
			if ($nb_enr>0){
				while ($row = mysql_fetch_array($rstemp2)) { 
					$quantite = $row["quantite"];
				}
			}else{
				$quantite = 0;
			}
			
			//TODO : Rajouter le test de stock ici pour eviter de commander plus que le stock
						//eviter de commander plus que le stock
			$query="SELECT stock FROM produit_sousref ";
			$query.=" WHERE num_produit_sousref=". $num_produit_sousref;	
			//echo $query;
			$rstemp344 = mysql_query($query);
			while ($row344 = mysql_fetch_array($rstemp344)) { 
				$stock = $row344["stock"];
			}
			$depassementDuStock = 0;
			if ($quantite + $_GET["quantite"]   <= $stock){	
				if ($nb_enr >=1){
					$query  = "UPDATE panier ";
					$query .= "Set quantite=quantite+". $_GET["quantite"] ." " ;
					$query .= ", date_ajout=NOW() ";
					$query .=" WHERE num_session='". session_id() ."'";	
					$query .=" AND num_produit_sousref=". $num_produit_sousref ;	
					//echo $query ."<br>";
					$rstemp3 = mysql_query($query);
				}else{
					$query  = "INSERT INTO panier (num_session,num_produit_sousref,quantite,date_ajout) VALUES (";
					$query .= " '". session_id() ."' " ;
					$query .= " ,". $num_produit_sousref ." " ;
					$query .= " ,". $_GET["quantite"] ." " ;
					$query .= " ,NOW() " ;
					$query .= ")";
					//echo $query ."<br>";
					$rstemp = mysql_query($query);
					//$num_marque = mysql_insert_id();
				}	
			}else{
				$depassementDuStock = 1;
			}
		}
		header("Location: produit_seul.php?num_produit=". $num_produit ."&panier_refresh=1&depassement=". $depassementDuStock);
?>
<?php include_once("../include/_connexion_fin.php"); ?>


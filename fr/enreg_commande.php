<?php include_once("../include/_connexion.php"); ?>
<?php include_once("../include/_session.php");



//---------------------------- cas pas de bon de remise --------------------

//calcul du prix total de la commande, frais de port inclus..

$prix_total = 0;

$query  ="SELECT panier.quantite, produit.designation, produit.prix, panier.quantite, couleur.couleur, taille.taille, taille.num_taille, ";
$query .=" couleur.num_couleur, produit.num_produit, produit.reference, produit_sousref.num_produit_sousref, produit_sousref.sous_reference, ";
$query .=" produit.lot, produit.promo_lot, produit.lib_lot, panier.num_panier";//,produit_remise.num_remise ";	
$query .=" FROM  panier ";
$query .=" INNER JOIN produit_sousref ON panier.num_produit_sousref=produit_sousref.num_produit_sousref";	
$query .=" INNER JOIN produit ON produit.num_produit=produit_sousref.num_produit";	
$query .=" INNER JOIN couleur ON couleur.num_couleur=produit_sousref.num_couleur";	
$query .=" INNER JOIN taille ON taille.num_taille=produit_sousref.num_taille";	
//$query .=" LEFT JOIN produit_remise ON produit_remise.num_produit=produit.num_produit";
$query .=" WHERE panier.num_session='". session_id() ."'";	
$query .=" ORDER BY produit.designation";	
//echo $query ."<br>";
$rstemp2 = mysql_query($query);

$nb_enr = mysql_num_rows($rstemp2);
	

// re-execution du caddie...

$rstemp4 = mysql_query($query);

while ($row = mysql_fetch_array($rstemp2)) 
{
	$estUnCodeRemiseParProduit = false;
	if ($row["lot"]>0 && $row["quantite"]>=$row["lot"]) 
	{ 
		//c'est une promotion
		//calcul du prix des lots
		$nb_de_lot = (int)($row["quantite"] / $row["lot"]);
		$nb_article_avec_promo = $nb_de_lot * $row["lot"];
		$nb_article_sans_promo = $row["quantite"] - $nb_article_avec_promo;
		//echo "nb_de_lot: ". $nb_de_lot ."  nb_article_avec_promo: ". $nb_article_avec_promo."  nb_article_sans_promo: ". $nb_article_sans_promo;
		$prix_total += $row["promo_lot"] * $nb_article_avec_promo;
		$prix_total += $row["prix"] * $nb_article_sans_promo;
	}
	else
	{
		if ($_SESSION["pourcentage"] <>"") 
		{  
			//code remise par produit
			$query="SELECT num_remise FROM produit_remise ";
			$query.=" WHERE num_produit=". $row["num_produit"];	
			$query.=" AND num_remise=". $_SESSION["num_remise"];	
			//echo $query;
			$rstemp34 = mysql_query($query);
			$nb_enr34 = mysql_num_rows($rstemp34);
			if ($nb_enr34 > 0) 
			{
				$prix_total += $row["prix"]*(1-($_SESSION["pourcentage"]/100)) * $row["quantite"];
				$estUnCodeRemiseParProduit = true;
			}
			else
			{
				$prix_total += $row["prix"] * $row["quantite"];
			}		
		}
		else
		{
			$prix_total += $row["prix"] * $row["quantite"];
		}	
	}
}
//------- bon d'achat ------//
if ($_SESSION["bon_achat"] <>"") 
{
	if ($prix_total >= $_SESSION["minimum_commande"] <>"") 
	{
		$prix_total -= $_SESSION["bon_achat"];
		$bon_achat_affichage = $_SESSION["bon_achat"];
		$cadeau = $_SESSION["cadeau"];
	}
	else
	{
		$bon_achat_affichage = 0;
		$cadeau = "";
		
	}
}




//******************** frais de port **************




// calcul des frais de port..

// il y a 3 cas : code remise / pas de code remise mais promo / pas de promo
// tout ceci bien sur en france et a l'etranger ;)

//------------------------- cas de la remise par bon... ------------------------------

if ($_SESSION["num_remise"] !="")
{
	
	
	// on rappatrie le pays de livraison..
	$ChaineSQL = "SELECT num_pays FROM adresse WHERE num_adresse = '".$_POST["choix_adresse"]."'";
	$result = mysql_query($ChaineSQL);
	
	//encore des verifs
	
	
	if (mysql_num_rows($result) != 1)
	{
		header("Location: commande_2.php");
	}
	else
	{
		$row=mysql_fetch_array($result);
		
		
		if ($_SESSION["bon_achat"] != "") //remise en bon d'achat
		{
			if ($row["num_pays"] == 73)
			{
				// france
				
				if ( $prix_total >= $_SESSION["minimum_commande"])
				{
					$frais_port = $_SESSION["frais_port_fr"];					
				}
				
				
			}
			else
			{
				//a l'étranger
				if ($prix_total >= $_SESSION["minimum_commande"])
				{
					$frais_port = $_SESSION["frais_port_ext"];
				}
			}
		}
		else //remise en %
		{
			if ($row["num_pays"] == 73)
			{
				// france
				$frais_port = $_SESSION["frais_port_fr"];
			}
			else
			{
				//etranger
				$frais_port = $_SESSION["frais_port_ext"];
			}
		}
		
	}

}






if (!isset($frais_port))
{
	// pas de remise entrée, on utilise les frais de port standard, avec ou sans remise
	
	// on selectionne les remises sur frais de port actuelles seulement si le montant de la commande le permet...

	$ChaineSQL = "SELECT * FROM frais_port WHERE actif='1' AND '". Date("Y-m-d h:m:s") ."' BETWEEN date_debut AND date_fin AND minimum_commande <= '".$prix_total."'";
	$result= mysql_query($ChaineSQL);
	
	
	
	// on rappatrie le pays de livraison..
	$ChaineSQL2 = "SELECT num_pays FROM adresse WHERE num_adresse = '".$_POST["choix_adresse"]."'";
	$result2 = mysql_query($ChaineSQL2);
	
	//echo($ChaineSQL2);
	
	if (mysql_num_rows($result)!=0)
	{
		// il y a une remise...
		$row=mysql_fetch_array($result);
		
		//encore des verifs
		if (mysql_num_rows($result2) != 1)//pas d'adresse
		{
			header("Location: commande_2.php");
		}
		else
		{
			$row2=mysql_fetch_array($result2);
			if ($row2["num_pays"] == 73)
			{
				// france
				$frais_port = $row["frais_port_fr_promo"];
			}
			else
			{
				//etranger
				$frais_port = $row["frais_port_ext_promo"];
			}
		}
	}
	else
	{
		// pas de remise, on rappatrie les frais de port standard
		$ChaineSQL = "SELECT * FROM frais_port";
		$result= mysql_query($ChaineSQL);
		$row=mysql_fetch_array($result);
		
		//encore des verifs
		
		
		if (mysql_num_rows($result2) != 1)//pas d'adresse
		{
			header("Location: commande_2.php");
		}
		else
		{
			$row2=mysql_fetch_array($result2);
			if ($row2["num_pays"] == 73)
			{
				// france
				$frais_port = $row["frais_port_fr"];
			}
			else
			{
				//etranger
				$frais_port = $row["frais_port_ext"];
			}
		}
	}
}
//echo $frais_port;

if (!isset($_SESSION["num_client"])) {
	header("Location: commande_erreur.php");
	exit();
}
// enregistrement de la commande
 
$ChaineSQL = "INSERT INTO commande (num_session, num_client, num_adresse, remise, cadeau, frais_port, date_commande, heure_commande, mode_paiement, statut_paiement, statut_commande, num_colissimo, num_transaction) ";
$ChaineSQL.= " VALUES ('".session_id()."','".$_SESSION["num_client"]."','".$_POST["choix_adresse"]."','".$bon_achat_affichage."','".addslashes($cadeau)."','".$frais_port."','".Date("Y-m-d")."','".Date("H:i:s")."','".$_POST["mode_paiement"]."','2','1','','') ";


//echo ($ChaineSQL);

$result= mysql_query($ChaineSQL);

$num_commande=mysql_insert_id($mysql_link);


// la ré-execution du caddie se fait plus haut....

while($row=mysql_fetch_array($rstemp4))
{

	/*
	
	la on va stocker les données suivantes : 
	
	num_ligne
	num_commande
	reference_produit : textuellement la référence car le prod peut etre éffacé de la base
	sousreference_produit : textuellement la sousréférence car le prod peut etre éffacé de la base
	designation_produit : textuellement la designation car le prod peut etre éffacé de la base
	taille_produit : textuellement la taille
	couleur_produit : textuellement la couleur
	quantite_produit : textuellement la quantite
	prix_unitaire_produit : textuellement le PU produit
	remise_lot_quantite : si remise par lot , lots de combien ?
	remise_lot_prix_unitaire : Nouveau PU par lot
	pourcentage_remise : si une remise en % est accordée, valeur du pourcentage
	*/
	

	
	
	// on determine si on a une remise en %
	$remise = 0;
	if ($_SESSION["pourcentage"] <>"") 
		{  
			//code remise par produit
			$query="SELECT remise.* FROM produit_remise ";
			$query.=" INNER JOIN remise ON remise.num_remise = produit_remise.num_remise";
			$query.=" WHERE num_produit=". $row["num_produit"];	
			$query.=" AND produit_remise.num_remise=". $_SESSION["num_remise"];	
			//echo $query."<br><br><br>";
			$rstemp34 = mysql_query($query);
			if (mysql_num_rows($rstemp34) > 0) 
			{
				$row_remise = mysql_fetch_array($rstemp34);
				$remise = $row_remise["pourcentage"];
			}
		}
	
	
	$ChaineSQL = "INSERT INTO `ligne_commande` (`num_commande`, `reference_produit`, `sous_reference_produit`, `designation_produit`, `taille_produit`, `couleur`, `quantite`, `prix_unitaire_produit`, `remise_lot_quantite`, `remise_lot_prix_unitaire`, `remise_pourcentage`) ";
	$ChaineSQL .= " VALUES ('".$num_commande."', '".addslashes($row["reference"])."', '".addslashes($row["sous_reference"])."', '".addslashes($row["designation"])."', '".addslashes($row["taille"])."', '".addslashes($row["couleur"])."', '".addslashes($row["quantite"])."', '".addslashes($row["prix"])."', '".addslashes($row["lot"])."', '".addslashes($row["promo_lot"])."', '".addslashes($remise)."')";
	
	//echo $ChaineSQL."<br><br>";
	
	$insert=mysql_query($ChaineSQL);
	
}

// deux cas se présentent a nous.. 

//soit le gars a décidé de payé par cheque (cas n°1) 
//on lui propose alors d'imprimer sa commande

//Soit le client veut payer par cheque (cas n°2)
//et a ce moment la, on l'envoie plutot vers le paiement banque...


$_SESSION["num_commande"] = $num_commande;


switch($_POST["mode_paiement"])
{
	case 1: // cheque
	
		header("Location: commande_fin.php");
		
	break;
	
	case 2: // cb en ligne
			/**Données fournies par le service integration SP+*/
			//par défaut données du module de demonstration
			//$clent="58 6d fc 9c 34 91 9b 86 3f fd 64 63 c9 13 4a 26 ba 29 74 1e c7 e9 80 79";
			//$codesiret="00000000000001-01";
			
			$clent="0f 93 30 3c f0 1e dc af ca 26 94 f8 34 d2 c1 b5 48 30 1f 99 52 d5 18 39";
			$codesiret="34803517100043-01";
			
			/**Données relatives à la commande*/
			//montant total TTC de la commande
			if(!$montant)
			  //$montant=$prix_total+$frais_port;
			  $montant=number_format($prix_total+$frais_port, 2, '.', '');
			//reference de la commande pour le commercant
			if(!$reference)
			  $reference = "spp_" . $num_commande;
			
			//date de validité de la commande est facultative
			if(!$validite)
			  $validite="";
			
			//taxe appliquée
			if(!$taxe)
			  $taxe="0.0";
			
			//devise dans laquelle est exprimé la commande
			if(!$devise)
			  $devise="978"; // Code pour l'EURO
			 
			//Langue choisie pour l'interface de paiement
			if(!$langue)
				$langue="FR";
	
			$hmac=calcul_hmac($clent,$codesiret,$reference,$langue,$devise,$montant,$taxe,$validite);
	?>	
			<script language=javascript>
			<!--
				//top.location.href = "https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=<?php echo $codesiret ?>&reference=<?php echo $reference ?>&langue=<?php echo $langue ?>&devise=<?php echo $devise ?>&montant=<?php echo $montant ?>&taxe=<?php echo $taxe ?>&hmac=<?php echo $hmac ?>&urlretour=<? echo "http://collants.gonzalezalvarez.org/fr/commande_fin.php"?>&email=<? echo $_POST["email_banque"] ?>";
				top.location.href = "https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=<?php echo $codesiret ?>&reference=<?php echo $reference ?>&langue=<?php echo $langue ?>&devise=<?php echo $devise ?>&montant=<?php echo $montant ?>&taxe=<?php echo $taxe ?>&hmac=<?php echo $hmac ?>&email=<? echo $_POST["email_banque"] ?>";
			//-->
			</script>
	<?		
			//header("Location: https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&hmac=$hmac");
	break;
	
	default: // hein ? -> cheque
		header("Location: commande_fin.php");
	break;
	
	
}
?>

<?php include_once("../include/_connexion_fin.php"); ?>

<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); 


// suppression des lignes commande
$ChaineSQL = "DELETE FROM ligne_commande WHERE num_commande='".$_GET["id"]."'";

$result=mysql_query($ChaineSQL);

// suppression commande
$ChaineSQL = "DELETE FROM commande WHERE num_commande='".$_GET["id"]."'";
$result=mysql_query($ChaineSQL);


//redirection

switch($_GET["retour"])
{
	case 1 : // retour liste commande a exped
		
		header("Location: commandes_liste.php");
	break;
	
	case 2 : // retour commande expédiées
	
		header("Location: commandes_livrees.php");
	break;
	
	case 3 : // retour liste commande refusées
	
		header("Location: commandes_refusee.php");
	break;
	
	default : // hein ?
	// retour liste commande a exped
		
		header("Location: commandes_liste.php");
	break;
	
}





?>
<? include_once("../include/_connexion_fin.php"); ?>
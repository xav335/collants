<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? // Mailing list PHP & MySQL - 1.1
include_once("_mail.php");
include_once("../include/_connexion.php"); 
include_once("../include/recuperation_theme_fr.php");

// SITE EN TEST
//$chemin_url = getenv("SERVER_NAME") ."/prod";
$chemin_url = getenv("SERVER_NAME");

$query  ="SELECT DISTINCT produit.num_produit,produit.designation,produit.vignette,produit.prix ";
$query .=" ,produit.lot, produit.promo_lot, produit.lib_lot, produit.lib_flash1, produit.lib_flash2  ";	
$query .=" FROM  produit ";	
$query .=" INNER JOIN produit_rubrique ON produit_rubrique.num_produit = produit.num_produit ";	
$query .=" WHERE produit_rubrique.num_rubrique=5";	
$query .=" AND produit.actif=1";
$query .=" AND produit.visible=1";
$query .=" ORDER BY produit.reference DESC";	
$query .=" LIMIT 0,4";
//echo $query . "<br>";	
$rstemp = mysql_query($query);
$nb_enr = mysql_num_rows($rstemp);

$i=0;
while ($produit = mysql_fetch_array($rstemp)) {
	$vignette[$i]=$produit["vignette"];
	$prix[$i] = $produit["prix"];
	$lot[$i] = $produit["lot"];
	$lib_lot[$i] = $produit["lib_lot"];
	$designation[$i] =  $produit["designation"];
	
	// On recherche à quelle autre rubrique est rattaché le produit
	$requete = "SELECT num_rubrique FROM produit_rubrique";
	$requete .= " WHERE num_produit = " . $produit["num_produit"];
	$requete .= " AND produit_rubrique.num_rubrique != 5";
	//echo $requete . "<br>";	
	$result = mysql_query($requete);
	$data = mysql_fetch_array($result);
	$autre_rubrique[$i] = $data["num_rubrique"];
	$num_produit[$i]=$produit["num_produit"];
	
	$i++;
}

$sql = "SELECT * FROM  newsletter ";
$sql .= " WHERE num_newsletter=1";
$result = mysql_query($sql);
$nb_enr = mysql_num_rows($result);

if ($nb_enr>0){
	while ($row = mysql_fetch_array($result)) { 
		$titre = $row["titre"];
		$titre_en = $row["titre_en"];
		$texte =  $row["texte"];
		$texte_en =  $row["texte_en"];
		$titre_bas =  $row["titre_bas"];
		$titre_bas_en =  $row["titre_bas_en"];
	}
}

?>
<HTML>
	<HEAD>
		<TITLE>Mailing List</TITLE>
		<link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">
		
		<script language="JavaScript">
		<!--
			function verif(email) {
				var arobase = email.indexOf("@"); var point = email.lastIndexOf(".")
				if((arobase < 3)||(point + 2 > email.length)||(point < arobase+3)) return false
				return true
			}
		//-->
		</script>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
		<!--
			body {
				margin-left: 0px;
				margin-top: 0px;
				margin-right: 0px;
				margin-bottom: 0px;
			}
		-->
		</style>
	</HEAD>
<BODY>
<? 
	function mrMmeMlle ($num){
		if ($num==1){
			$mrMme = "M.";
		}elseif ($num==2){
			$mrMme = "Mme.";
		}else{
			$mrMme = "Mlle";
		}
	return $mrMme;
	}

if ($_POST["sorte"]=="test") {
	$prenom_test = "Laurent";
	$nom_test = "Verlet";
	//$mail_test = "xavier.gonzalez@laposte.net,contact@collants.fr";
	$mail_test = "fred.lesca@free.fr,fjavi.gonzalez@gmail.com";
   				
			$body  = "<html>";
			$body .= "<head>";
			$body .= "<title>NEWSLETTER</title>";
			$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
			$body .= "</head>";
			$body .= "<body bgcolor=\"#FFFFFF\" text=\"#000000\" topmargin=\"0\" leftmargin=\"0\">";
			$body .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">";
			$body .= "<tr>";
			$body .= "    <td align=\"center\" valign=\"middle\"> ";
			$body .= "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">";
			$body .= "        <tr> ";
			$body .= "          <td width=\"19%\" align=\"left\" valign=\"top\"> ";
			$body .= "            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\" align=\"left\">";
			$body .= "              <tr> ";
			$body .= "                <td height=\"300\" valign=\"top\" align=\"left\"><a target=\"_blank\" href=\"http://". $chemin_url . "\"><img src=\"http://". $chemin_url . "/" . $rep_theme_newsletter . "h_g.gif\" width=\"217\" height=\"403\" border=\"0\"></a></td>";
			$body .= "              </tr>";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\" height=\"100%\"> ";
			$body .= "                  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">";
			$body .= "                    <tr align=\"left\" valign=\"top\"> ";
			$body .= "                      <td width=\"10%\"><img src=\"http://www.collant.fr/images/g_b.gif\" width=\"70\" height=\"100%\"></td>";
			$body .= "                      <td> ";
			$body .= "                        <p>&nbsp;</p>";
			$body .= "                        </td>";
			$body .= "                    </tr>";
			$body .= "                  </table>";
			$body .= "                </td>";
			$body .= "              </tr>";
			$body .= "            </table>";
			$body .= "            <p><img src=\"http://www.collant.fr/images/g_b.gif\" width=\"70\" height=\"100%\"></p>";
			$body .= "          </td>";
			$body .= "          <td width=\"100%\" align=\"left\" valign=\"top\"> ";
			$body .= "            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"193\" align=\"left\">";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\" height=\"2\"><img src=\"http://www.collant.fr/images/h_m.gif\" height=\"79\" width=\"100%\"></td>";
			$body .= "              </tr>";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\"> ";
			$body .= "                  <p><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#990033\"><b><font color=\"#CC0033\" size=\"5\">". $titre ."</font></b></font></p>";
			$body .= "                  <p><font face=\"Verdana, Arial, Helvetica, sans-serif\"> ";
			$body .= "                    Bonjour <b>". $prenom_test ." ". $nom_test ."</b><br>" ;
			$body .= "                    ". $texte ;
			$body .= "                    </font></p>";
			$body .= "                    </font></p>";
			$body .= "                </td>";
			$body .= "              </tr>";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\" height=\"100%\"> ";
			$body .= "                  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
			$body .= "                    <tr align=\"left\" valign=\"top\"> ";
			$body .= "                      <td colspan=\"4\"><img src=\"http://www.collant.fr/images/sep.gif\" width=\"100%\" height=\"79\"></td>";
			$body .= "                    </tr>";
			$body .= "							<tr align=\"left\" valign=\"top\"> ";
			$body .= "                      <td colspan=\"4\" height=\"40\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#990033\"><b><font color=\"#CC0033\" size=\"3\">";
			$body .= "                       ". $titre_bas ."</font></b></font></td>";
			$body .= "                    </tr>";
			$body .= "                    <tr align=\"left\" valign=\"top\"> ";
			
			// affichage de nouveautés
			for ($k=0; $k<$i; $k++) {
				$body .= "                      <td align=\"center\" width=\"25%\"><font size=2 face=\"Verdana, Arial, Helvetica, sans-serif\">";
				$body .= "                         <a target=\"_blank\" href=\"http://". $chemin_url . "/fr/boutique.php?num_rubrique=" . $autre_rubrique[$k] . "&num_produit=" . $num_produit[$k] . "\"><img src=\"http://". $chemin_url . "/photo/petite/". $vignette[$k] ."\" width=\"105\" height=\"138\" border=0></a><br>";
				$body .=			"<b>". $designation[$k]. "</b><br>";
					 
				//affichage des promotions 
				if ($lot[$k]>0) {
					$body .=		  $lib_lot[$k] . "<br>";
				}
				else{ 
					$body .=			$prix[$k] ."&#8364<br>";
				}
				
				$body .= "                      </font></td>";
			}
			
			$body .= "                    </tr>";
			$body .= "                  </table>";
			$body .= "                </td>";
			$body .= "              </tr>";
			$body .= "            </table>";
			$body .= "          </td>";
			$body .= "          <td width=\"16%\" align=\"left\" valign=\"top\"><a target=\"_blank\" href=\"http://www.collant.fr\"><img src=\"http://www.collant.fr/images/h_d.gif\" width=\"151\" height=\"79\" border=\"0\"></a></td>";
			$body .= "        </tr>";
			$body .= "      </table>";
			$body .= "    </td>";
			$body .= "  </tr>";
			$body .= "</table><br><br><br>";
			$body .= "</body>";
			$body .= "</html>";		
		
			$body .= "Vous pouvez vous désabonner de cette liste en visitant la page";
			$body .= "\n <a href=\"http://". getenv("SERVER_NAME") ."/fr/newsletter.php\">http://" .getenv("SERVER_NAME")."/fr/newsletter.php</a>";
			$k+=1;
			$mailto = $mail_test;
			$body2 = $body.$mailto."\n";
			//echo $mailto ."<br>";
			
			//decommenter pour envoyer
			sendLibMailHtml($EMail,$mailto,$sujet,$body);
			echo $body ."<br><br>";
      echo "<h1>Newsletters envoyées !!!! </h1><br><br>";
}

// c'est le vrai envoi
else {
	 $query2 = "SELECT * FROM  mailing WHERE actif=1"; 
   $result = mysql_query($query2); 
   if(mysql_numrows($result) > 0) {
   
      $k=0;
		while (($val = mysql_fetch_array($result))&&($message=="")) {
			//$body = "Bonjour ". mrMmeMlle($val["num_civilite"]) ." ". $val["nom"] ." ". $val["prenom"] ."\n\n";					
			$body  = "<html>";
			$body .= "<head>";
			$body .= "<title>NEWSLETTER</title>";
			$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
			$body .= "</head>";
			$body .= "<body bgcolor=\"#FFFFFF\" text=\"#000000\" topmargin=\"0\" leftmargin=\"0\">";
			$body .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">";
			$body .= "<tr>";
			$body .= "    <td align=\"center\" valign=\"middle\"> ";
			$body .= "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">";
			$body .= "        <tr> ";
			$body .= "          <td width=\"19%\" align=\"left\" valign=\"top\"> ";
			$body .= "            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\" align=\"left\">";
			$body .= "              <tr> ";
			$body .= "                <td height=\"300\" valign=\"top\" align=\"left\"><a target=\"_blank\" href=\"http://". getenv("SERVER_NAME") ."\"><img src=\"http://". getenv("SERVER_NAME") ."/" . $rep_theme_newsletter . "h_g.gif\" width=\"217\" height=\"403\" border=\"0\"></a></td>";
			$body .= "              </tr>";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\" height=\"100%\"> ";
			$body .= "                  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">";
			$body .= "                    <tr align=\"left\" valign=\"top\"> ";
			$body .= "                      <td width=\"10%\"><img src=\"http://www.collant.fr/images/g_b.gif\" width=\"70\" height=\"100%\"></td>";
			$body .= "                      <td> ";
			$body .= "                        <p>&nbsp;</p>";
			$body .= "                        </td>";
			$body .= "                    </tr>";
			$body .= "                  </table>";
			$body .= "                </td>";
			$body .= "              </tr>";
			$body .= "            </table>";
			$body .= "            <p><img src=\"http://www.collant.fr/images/g_b.gif\" width=\"70\" height=\"100%\"></p>";
			$body .= "          </td>";
			$body .= "          <td width=\"100%\" align=\"left\" valign=\"top\"> ";
			$body .= "            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"193\" align=\"left\">";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\" height=\"2\"><img src=\"http://www.collant.fr/images/h_m.gif\" height=\"79\" width=\"100%\"></td>";
			$body .= "              </tr>";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\"> ";
			$body .= "                  <p><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#990033\"><b><font color=\"#CC0033\" size=\"5\">". $titre ."</font></b></font></p>";
			$body .= "                  <p><font face=\"Verdana, Arial, Helvetica, sans-serif\"> ";
			$body .= "                    Bonjour <b>". $val["prenom"] ." ". $val["nom"] ."</b><br>" ;
			$body .= "                    ". $texte ;
			$body .= "                    </font></p>";
			$body .= "                    </font></p>";
			$body .= "                </td>";
			$body .= "              </tr>";
			$body .= "              <tr> ";
			$body .= "                <td align=\"left\" valign=\"top\" height=\"100%\"> ";
			$body .= "                  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
			$body .= "                    <tr align=\"left\" valign=\"top\"> ";
			$body .= "                      <td colspan=\"4\"><img src=\"http://www.collant.fr/images/sep.gif\" width=\"100%\" height=\"79\"></td>";
			$body .= "                    </tr>";
			$body .= "							<tr align=\"left\" valign=\"top\"> ";
			$body .= "                      <td colspan=\"4\" height=\"40\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#990033\"><b><font color=\"#CC0033\" size=\"3\">";
			$body .= "                       ". $titre_bas ."</font></b></font></td>";
			$body .= "                    </tr>";
			$body .= "                    <tr align=\"left\" valign=\"top\"> ";
			
			
			
			for ($k=0;$k<$i;$k++) {
				$body .= "                      <td align=\"center\" width=\"25%\"><font size=2 face=\"Verdana, Arial, Helvetica, sans-serif\">";
				$body .= "                         <a target=\"_blank\" href=\"http://www.collant.fr/fr/boutique.php?num_rubrique=" . $autre_rubrique[$k] . "&num_produit=" . $num_produit[$k] . "\"><img src=\"http://www.collant.fr/photo/petite/". $vignette[$k] ."\" width=\"105\" height=\"138\" border=\"0\"></a><br>";
				$body .=			"<b>". $designation[$k]. "</b><br>";
					 
					 if ($lot[$k]>0) { //affichage des promotions 
						$body .=		  $lib_lot[$k] . "<br>";
					}else{ 
						$body .=			$prix[$k] ."&#8364<br>";
					} 
				$body .= "                      </font></td>";
			}
			$body .= "                    </tr>";
			$body .= "                  </table>";
			$body .= "                </td>";
			$body .= "              </tr>";
			$body .= "            </table>";
			$body .= "          </td>";
			$body .= "          <td width=\"16%\" align=\"left\" valign=\"top\"><a target=\"_blank\" href=\"http://www.collant.fr\"><img src=\"http://www.collant.fr/images/h_d.gif\" width=\"151\" height=\"79\" border=\"0\"></a></td>";
			$body .= "        </tr>";
			$body .= "      </table>";
			$body .= "    </td>";
			$body .= "  </tr>";
			$body .= "</table><br><br><br>";
			$body .= "</body>";
			$body .= "</html>";		
		
			$body .= "Vous pouvez vous désabonner de cette liste en visitant la page";
			$body .= "\n <a href=\"http://". getenv("SERVER_NAME") ."/fr/newsletter.php\">http://" .getenv("SERVER_NAME")."/fr/newsletter.php</a>";
			$k+=1;
			$mailto = $val["mail"];
			$body2 = $body.$mailto."\n";
			echo $mailto ."<br>";
			//decommenter pour envoyer
			sendLibMailHtml($EMail,$mailto,$sujet,$body);
			
      	}
   }
	//echo $body ."<br><br>";
	echo "<h1>Newsletters envoyées !!!! </h1><br><br>";}


 ?>
  
</BODY></HTML>
<? include_once("../include/_connexion_fin.php"); ?>

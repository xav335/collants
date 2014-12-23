<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? // Mailing list PHP & MySQL - 1.1
include_once("_mail.php");
include_once("../include/_connexion.php"); 
/*
$CookMail = "asphp_liste_pm";
if($EMail) setcookie($CookMail,$EMail,time()+86400*365);
if($desab) setcookie($CookMail);
*/

?>
<HTML><HEAD><TITLE>Mailing List</TITLE>
   <link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">

   <script language="JavaScript"><!--
      function verif(email) {
         var arobase = email.indexOf("@"); var point = email.lastIndexOf(".")
         if((arobase < 3)||(point + 2 > email.length)||(point < arobase+3)) return false
         return true
         }
   //--></script>
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

   $query = "SELECT * FROM  mailing WHERE actif=1"; 
   $result = mysql_query($query); 
   if(mysql_numrows($result) > 0) {
   
      $k=0;
		while (($val = mysql_fetch_array($result))&&($message=="")) {
			$body = "Bonjour ". $val["nom"] ." ". $val["prenom"] ."\n\n";	
			$body .= $corps."\n\n\n";
			$body .= "Vous pouvez vous désabonner de cette liste en visitant la page";
			$body .= "\n http://".getenv("SERVER_NAME")."/fr/newsletter.php";
			$k+=1;
			$mailto = $val["mail"];
			$body2 = $body.$mailto."\n";
			echo $mailto ."<br>";
			sendLibMail($EMail,$mailto,$sujet,$body);
        	// if(!sendMail($nom,$EMail,$mailto,$mailto,$sujet,$body,$sujet,$body2,""))
         	//   $message = ($k-1)." messages envoyés !";
      	}
   }

?>
  
</BODY></HTML>
<? include_once("../include/_connexion_fin.php"); ?>
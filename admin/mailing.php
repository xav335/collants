<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<HTML><HEAD><TITLE>Mailing List</TITLE>
   <link href="../include/collants_styles_admin.css" rel="stylesheet" type="text/css">

   <script language="JavaScript"><!--
      function verif(email) {
         var arobase = email.indexOf("@"); var point = email.lastIndexOf(".")
         if((arobase < 3)||(point + 2 > email.length)||(point < arobase+3)) return false
         return true
         }
   //--></script>
</HEAD><BODY>

<table width=100% height=100%><tr><td><center>
  
      <script language="JavaScript"><!--
         function test(nom,mail,sujet,corps) {
            if(nom.value=="") { alert('Nom requis !');nom.focus();return false }
            if(sujet.value=="") { alert('Sujet requis !');sujet.focus();return false }
            if(corps.value=="") { alert('Le message est vide !');corps.focus();return false }
            if(!verif(mail.value)) { alert('E-mail invalide !');mail.focus();return false }
			 if(!confirm("Derni�re chance !!! \n �tes-vous s�r d'envoyer ce mail a l'ensemble des inscrits? ")) { return false }
            return true
            }
         //--></script>
      <form method="post" action="mailing_2.php" onSubmit="return test(this.nom,this.EMail,this.sujet,this.corps)">
         <table border=0 cellspacing=0 id="fond_gris" ><tr>
            <td>Nom</td><td><input name="nom" type="text" value="collants.fr" size=30></td>
            <td>E-mail</td><td>
               <input name="EMail" type="text" value="contact@collants.fr" size=40>
         </td></tr><tr>
            <td>Sujet</td><td colspan=3><input size=80 name="sujet">
         </td></tr><tr>
            <th colspan=4><textarea rows=15 cols=80 name="corps"></textarea></th>
         </tr><tr>
            <th colspan=4><input type="Submit" value="Envoyer le message"></th>
      </tr></table></form>

    
</th></tr></table>
</BODY></HTML>

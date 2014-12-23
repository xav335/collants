<?php include_once("../include/_connexion.php"); ?>
<?
		$query  ="SELECT * FROM frais_port ";
		
		//echo $query ."<br>";
		$rstemp6 = mysql_query($query);
		$nb_enr6 = mysql_num_rows($rstemp6);
		if ($nb_enr6>=1){ // un code remise a été trouvé
			while ($row = mysql_fetch_array($rstemp6)) {
				$frais_port_fr =  $row["frais_port_fr"];
				$frais_port_ext =  $row["frais_port_ext"];
			}
		}
?>			
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>collants.fr - spécialiste du collant</title>
<META NAME="description" content="Le spécialiste du collant, lingerie, bas, accessoire féminin, pour la sensualité des femmes.">
<META NAME="keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">
<META content="ALL" name="robots">
<META content="document" name="resource-type">
<META content="15 days" name="revisit-after">
<META name="dc.description" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<META name="dc.keywords" content="collants, collant, bas, bas top, classique, fantaisie, collant homme, jambiere, maintien, nouveautes, opaque, resille, sante, cecilia de raphael, cervin, cette, collanto, doredore, gerbe, goldenlady, lebourget, levee, mura, oroblu, philippe matignon, lingerie, voile, lycra, nylon, sexy, bien-etre, femme, feminin, collection, coton, polyester, createur, creation, creativite, intimite,  pour elle, pour lui, exotique, exotisme, nature, zen, bio, naturelle, naturel, intime, sens, sensorielle, plaisir, liberté, seduire, seduction, vivre, emotion, dax">
<META name="author" CONTENT ="collants.fr">
<META name="dc.subject" content="Le sp&eacute;cialiste du collant, lingerie, bas, accessoire f&eacute;minin, pour la sensualit&eacute; des femmes.">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./include/collants_styles.css" rel="stylesheet" type="text/css">
</head>
<body id="fond_rose" border="0" background="images/fond_collants.gif" bgproperties="fixed">
<table width="425" border="0" cellpadding="21" align="left" >
    <td id="texte2" colspan="3"><span id="texte3_blanc">G&eacute;n&eacute;ralit&eacute;s</span><br>
      <br>
      Les dispositions qui suivent &eacute;tablissent les conditions g&eacute;n&eacute;rales 
      de vente des produits propos&eacute;s sur ce site par l&#8217;entreprise 
      <br>
      <strong>collants.fr</strong>, zac du sablar, 25 all&eacute;e pampara, 40100 
      dax France<br>
      immatricul&eacute;e en France au RCS de DAX rcs 348 035 171. T&eacute;l&eacute;phone 
      : 05.58.74.14.27. Fax 05.58.74.14.27<br>
      e-mail : <a href="mailto:contact@collants.fr">contact@collants.fr</a> <br>
      Sur <strong>collants.fr</strong> vous avez la possibilit&eacute; de payer 
      par ch&egrave;que, mandat cash et carte bancaire en ligne ou par fax (Paiement 
      s&eacute;curis&eacute; par SP PLUS Paiement de la Caisse D&#8217;&eacute;pargne 
      .<br>
      Les frais de ports pour le national sont de <?php echo $frais_port_fr ?> &euro; et pour l'internationnal 
      de <?php echo $frais_port_ext ?> &euro;.<br>
      Nos d&eacute;lais de livraison sont pour le national de 48 heures en colissimo 
      suivi et pour l'internationnal de 5 jours ouvr&eacute;s en service prioritaire 
      de La Poste.<br>
      Vous pouvez donc commander en toute s&eacute;curit&eacute; sur Collants.fr<br>        <br>
        <strong>Paiement par carte bancaire en ligne s&eacute;curis&eacute;</strong><br>
        Lorsque vous passez votre commande, vous entrez dans une zone s&eacute;curis&eacute;e 
        dans laquelle vous &ecirc;tes invit&eacute; &agrave; laisser vos coordonn&eacute;es 
        bancaires. Nous utilisons le syst&egrave;me de paiement en ligne SP PLUS 
        (Paiement s&eacute;curis&eacute; par la Caisse D&#8217;&eacute;pargne 
        ) pour assurer la s&eacute;curit&eacute; des transactions bancaires. Les 
        coordonn&eacute;es de votre carte de cr&eacute;dit sont crypt&eacute;es 
        gr&acirc;ce au protocole SSL (Secure Socket Layer) et ne transitent jamais 
        en clair sur le r&eacute;seau. <br>
        Paiement par carte bancaire par fax <br>
        <strong>Vous pouvez &eacute;galement nous transmettre vos coordonn&eacute;es 
        bancaires par fax,</strong> une fois votre commande valid&eacute;e.<br>
        Par fax : imprimez le r&eacute;capitulatif de votre commande. Une fois 
        dat&eacute; et sign&eacute;, faxez le au 05.58.74.14.27 en y indiquant 
        vos coordonn&eacute;es bancaires.
        <p><strong>Paiement par ch&egrave;que bancaire</strong><br>
        Il vous suffit d'imprimer le r&eacute;capitulatif de votre commande, et 
        de nous l'envoyer dat&eacute; et sign&eacute; avec votre ch&egrave;que 
        &eacute;tabli &agrave; l'ordre de <strong>collants.fr</strong></p>
      <p>Retournez nous l'ensemble par courrier &agrave; l'adresse suivante:<br>
        zac du sablar<br>
        25 all&eacute;e pampara<br>
        40100 dax</p>
      <p><br>
        <strong>Paiement par mandat cash</strong><br>
        Il vous suffit d'imprimer le r&eacute;capitulatif de votre commande et 
        de vous rendre dans un bureau de poste pour demander &agrave; effectuer 
        un paiement par mandat cash. Vous verserez alors en esp&egrave;ces un 
        montant correspondant &agrave; celui de votre commande. Vous adresserez 
        ensuite le premier volet du mandat cash accompagn&eacute; du r&eacute;capitulatif 
        &agrave; l'adresse suivante :<br>
        <strong>collants.fr</strong><br>
        zac du sablar<br>
        25 all&eacute;e pampara<br>
        40100 dax</p>
      <p><br>
        La commande implique l&#8217;adh&eacute;sion aux conditions g&eacute;n&eacute;rales 
        de vente. Toute commande avec paiement en ligne ne sera prise en consid&eacute;ration 
        qu&#8217;apr&egrave;s acceptation du paiement par le GIE cartes bancaires, 
        interrog&eacute; via le serveur de paiement s&eacute;curis&eacute; (SSL) 
        SP PLUS Paiement de la Caisse d&#8217;&eacute;pargne. <br>
        Les parties conviennent que le contrat est soumis au droit fran&ccedil;ais. 
        <br>
        L&#8217;entreprise <strong>collants.fr</strong> fait conna&icirc;tre au 
        consommateur l&#8217;ensemble des caract&eacute;ristiques essentielles 
        des biens offerts (tailles, couleurs, compositions).<br>
        Ces caract&eacute;ristiques apparaissent &agrave; l&#8217;appui de la 
        photographie illustrant l&#8217;offre. Les photos illustrant les produits 
        n&#8217;entrent pas dans le champ contractuel. Le consommateur reconna&icirc;t 
        que la photographie repr&eacute;sentant le produit qui figure sur le site 
        web n&#8217;a qu&#8217;une valeur indicative. Des alt&eacute;rations peuvent 
        en effet appara&icirc;tre du fait du traitement de la photo.<br>
        Les offres mises en ligne sont valables jusqu&#8217;&agrave; &eacute;puisement 
        des stocks. <br>
        Les prix sont indiqu&eacute;s en Euros.<br>
        <!-- Tva non applicable article 293b du code des imp&ocirc;ts.<br> -->
        <strong>Acceptation de l&#8217;offre</strong><br>
        L&#8217;acceptation et la confirmation de la commande sont r&eacute;alis&eacute;es 
        par une s&eacute;rie de saisies de donn&eacute;es sur pages-&eacute;crans 
        successives. L&#8217;acceptation d&eacute;finitive s&#8217;effectue par 
        la saisie de vos coordonn&eacute;es bancaires (n&deg; de carte bancaire 
        et date d&#8217;expiration) pour paiement en ligne.<br>
        <strong>Confirmation de commande</strong><br>
        Le num&eacute;ro de votre commande vous est communiqu&eacute; apr&egrave;s 
        acception par la banque de la transaction. La confirmation de votre commande 
        vous est envoy&eacute;e par mail aussit&ocirc;t.<br>
        Celui-ci reprendra le r&eacute;capitulatif de votre commande ainsi que 
        votre num&eacute;ro de commande. <br>
        Au cas o&ugrave; ind&eacute;pendamment de notre volont&eacute;, un article 
        indisponible viendrait &agrave; &ecirc;tre command&eacute;, une notification 
        d&#8217;indisponibilit&eacute; vous sera adress&eacute;e par mail et nous 
        vous rembourserons aussit&ocirc;t le montant de l&#8217;article manquant.<br>
        <strong>COMMANDE</strong><br>
        Le r&egrave;glement des achats s&#8217;effectue soit par carte bancaire 
        soit par ch&egrave;que bancaire. Le r&eacute;glement par ch&egrave;que 
        bancaire n&#8217;est possible que depuis la France. Les cartes bancaires 
        accept&eacute;es sont : CB, Visa, Eurocard et Master Card. Le compte bancaire 
        du client sera d&eacute;bit&eacute;e d&egrave;s la validation du paiement<br>
        Sur le site web : <strong>collants.fr</strong><br>
        Par ch&egrave;que bancaire,votre commande sera valid&eacute; apr&egrave;s 
        r&eacute;ception de celui ci (France uniquement).<br>
        Par courrier &agrave; :<strong>collants.fr</strong> - zac du sablar - 
        25 all&eacute;e pampara - 40100 dax</p>
      <p><br>
        <strong>PAIEMENT s&eacute;curis&eacute;<br>
        </strong><br>
        <strong>Vos moyens de paiement sont prot&eacute;g&eacute;s </strong><br>
        Les donn&eacute;es que vous nous transmettez lors de votre paiement sont 
        s&eacute;curis&eacute;es &agrave; l'aide du protocole SSL. Elles sont 
        ensuite trait&eacute;es par les services financiers de la Caisse d'Epargne 
        qui g&egrave;re aujourd'hui des millions de transactions mon&eacute;tiques.</p>
      <p> <strong>Protocole SSL</strong><br>
        Lorsque vous payez en ligne, votre logiciel de navigation transmet la 
        transaction dans un mode s&eacute;curis&eacute;. Lors de la saisie de 
        vos r&eacute;f&eacute;rences bancaires, un cryptage est en effet effectu&eacute; 
        par votre navigateur. Avec un navigateur relativement r&eacute;cent, comme 
        Microsoft Internet Explorer &agrave; partir de la version 3.02 ou Netscape 
        Communicator &agrave; partir de la version 2.0, c'est automatique. Mais 
        pour une s&eacute;curit&eacute; encore plus grande, c'est &agrave; dire 
        un cryptage encore plus difficile &agrave; d&eacute;chiffrer, il vaut 
        mieux utiliser Microsoft Internet Explorer &agrave; partir de la version 
        5.5 ou Netscape Communicator &agrave; partir de la version 6.0, qui effectuent 
        un <strong>cryptage SSL &agrave; 128 bits</strong>. Si votre version d'Internet 
        Explorer ou de Netscape est vraiment tr&egrave;s ancienne, nous vous conseillons 
        vivement de t&eacute;l&eacute;charger la mise &agrave; jour sur leur site, 
        Microsoft ou Netscape. </p>
      <p> <strong>Le num&eacute;ro de carte bancaire </strong>n'est imprim&eacute; 
        sur aucun papier, facture, facturette ou autre listing. Le commer&ccedil;ant 
        n'a pas connaissance des num&eacute;ros de cartes.</p>
      <p> <strong>Paiement certifi&eacute; : </strong>Lors d'un paiement effectu&eacute; 
        avec ID-TRONIC, la s&eacute;curit&eacute; atteint son maximum. En effet, 
        par ce moyen, votre identit&eacute; est absolument garantie vis &agrave; 
        vis du commer&ccedil;ant. C'est primordial quand il s'agit d'achats importants. 
        <br>
        <strong>En cas de probl&egrave;me</strong> lors de l'acte de paiement, 
        la Caisse d'Epargne est &agrave; votre disposition pour vous aider &agrave; 
        le r&eacute;soudre au plus vite. Si vous constatez une utilisation illicite 
        de votre carte bancaire, vous pouvez contester aupr&egrave;s de votre 
        banque. Conform&eacute;ment &agrave; la r&eacute;glementation, celle-ci 
        sera en mesure d'annuler la transaction &agrave; la condition que vous 
        n'ayez pas fourni votre code confidentiel, or vous n'avez jamais &agrave; 
        le faire lorsque vous utilisez le syst&egrave;me SP PLUS. ( Attention, 
        il ne faut pas que vous ayez &eacute;t&eacute; livr&eacute; par le commer&ccedil;ant 
        cr&eacute;dit&eacute; ! ). </p>
      <p>Notre site fait l&#8217;objet d&#8217;un des syst&egrave;mes de s&eacute;curisation 
        les plus performants &agrave; l&#8217;heure actuelle.<br>
        Nous avons non-seulement adopt&eacute; le proc&eacute;d&eacute; de cryptage 
        SSL mais &eacute;galement renforc&eacute; l&#8217;ensemble des proc&eacute;d&eacute;s 
        de brouillage et de cryptage afin de prot&eacute;ger le plus efficacement 
        possible toutes les donn&eacute;es sensibles li&eacute;es aux moyens de 
        paiement. <br>
        Le paiement en ligne est imm&eacute;diat et s&#8217;effectue exclusivement 
        par carte bancaire. Les cartes CARTE BLEUE, VISA, MASTER CARD sont accept&eacute;es.<br>
        Afin d&#8217;assurer la s&eacute;curit&eacute; des paiements, le site 
        <strong>collants.fr</strong> utilise le service de paiements s&eacute;curis&eacute;s 
        SP PLUS Paiement de notre banque la Caisse d&eacute;pargne. Ce service 
        int&egrave;gre la norme de s&eacute;curit&eacute; SSL. Les donn&eacute;es 
        confidentielles (n&deg; de carte bancaire &agrave; 16 chiffres, date d&#8217;expiration) 
        sont transmises crypt&eacute;es (cod&eacute;es) sur la plate-forme de 
        la Banque Populaire et ne sont pas transmises sur notre serveur. <br>
        Lorsque vous validez votre commande : <br>
        votre demande de paiement est rout&eacute;e en temps r&eacute;el sur le 
        gestionnaire de t&eacute;l&eacute;paiement s&eacute;curis&eacute; de la 
        Caisse d&#8217;&eacute;pargne celui-ci adresse une demande d&#8217;autorisation 
        au r&eacute;seau carte bancaire le gestionnaire de t&eacute;l&eacute;paiement 
        v&eacute;rifie la validit&eacute; de la carte et d&eacute;livre aussit&ocirc;t 
        un certificat &eacute;lectronique avec le num&eacute;ro de la transaction. 
        Dans le cas contraire (erreur de num&eacute;ro, carte en opposition) celui-ci 
        vous informe que la transaction est rejet&eacute;e. <br>
        Etant dans le cadre d&#8217;un paiement par carte bancaire &agrave; distance, 
        l&#8217;ordre de paiement peut &ecirc;tre r&eacute;voqu&eacute; en cas 
        d&#8217;utilisation frauduleuse de la carte conform&eacute;ment &agrave; 
        la convention conclue entre le consommateur et son &eacute;tablissement 
        bancaire. </p>
      <p><br>
        <strong>Livraisons</strong><br>
        Le d&eacute;lai de livraison moyen est de 2 &agrave; 3 jours ouvr&eacute;s*. 
        La livraison est r&eacute;alis&eacute;e par la poste en collissimo suivi, 
        pour la France et l&#8217;europe , Et en service prioritaire de La Poste 
        pour l&#8217;international. <br>
        Les tarif sont pour le national : <?php echo $frais_port_fr ?> &euro;<br>
        L&#8217;europe : <?php echo $frais_port_ext ?> &euro;<br>
        International : <?php echo $frais_port_ext ?> &euro;<br>
        Pour les envois hors Union Europ&eacute;enne, d&#8217;&eacute;ventuelles 
        taxes (TVA locale, douani&egrave;re ou d&#8217;importation) pourront &ecirc;tre 
        factur&eacute;es &agrave; l&#8217;arriv&eacute;e du colis &agrave; destination 
        et resteront &agrave; la charge du destinataire.<br>
        Elle sera effectu&eacute;e du lundi au samedi &agrave; l&#8217;adresse 
        que vous nous aurez indiqu&eacute;e sur le bon de commande en France.<br>
		  Retour colis en cas d'adresse erronée ou d'une adresse sans le nom exacte 
		  les frais de réexpédition sont à la charge du client<br>
      </p>
		 <p><br>
        <strong>Retour</strong><br>
        Les  produits tels que bas, collant, mi-bas, gu&ecirc;tre, jambi&egrave;res et autres articles  vendus sur le site www.collants.fr ne devront pas avoir &eacute;t&eacute; descell&eacute;s et sortis  de leur emballage afin que le consommateur puisse b&eacute;n&eacute;ficier du droit de  r&eacute;tractation.<br>
Seuls seront repris les produits renvoy&eacute;s dans leur ensemble, dans leur  emballage d'origine complet et intact, et en parfait &eacute;tat de revente. Tout  produit qui aura &eacute;t&eacute; ab&icirc;m&eacute;, ou dont l'emballage d'origine aura &eacute;t&eacute; d&eacute;t&eacute;rior&eacute;,  ne sera ni rembours&eacute; ni &eacute;chang&eacute;.<br>
Ce droit de r&eacute;tractation s'exerce sans p&eacute;nalit&eacute;, &agrave; l'exception des frais de  retour. Dans l'hypoth&egrave;se de l'exercice du droit de r&eacute;tractation, le  consommateur a le choix de demander soit le remboursement des sommes vers&eacute;es,  soit l'&eacute;change du produit. Dans le cas d'un &eacute;change, la re-exp&eacute;dition se fera  aux frais du consommateur.<br>
En cas d'exercice du droit de r&eacute;tractation, le site Collants.fr fera tous les  efforts pour rembourser le consommateur dans un d&eacute;lai de 10 jours. Le  consommateur sera alors rembours&eacute; par recr&eacute;dit de son compte bancaire  (transaction s&eacute;curis&eacute;e) en cas de paiement par carte bancaire, ou par ch&egrave;que  dans les autres cas.		  <br>
      </p>
      <p><strong>SATISFAIT(E) OU REMBOURSE(E)</strong><br>
        L&#8217;acheteur dispose d&#8217;un d&eacute;lai de 7 jours &agrave; compter 
        de la livraison de la commande (conform&eacute;ment aux lois issues du 
        code de la consommation Art L 121-16) pour retourner tout produit qui 
        ne conviendrait pas.<br>
        En revanche, nous ne pourrons reprendre :<br>
        - les articles retourn&eacute;s incomplets, ab&icirc;m&eacute;s, endommag&eacute;s 
        ou salis par le client,<br>
        - les articles avec leurs &eacute;tiquettes dans leur emballage d&#8217;origine 
        ( les collants ou bas essay&eacute;s et/ou d&eacute;pli&eacute;s )<br>
        - les colis pour lesquels aucun &eacute;l&eacute;ment joint ne permet 
        d&#8217;identifier l&#8217;exp&eacute;diteur (n&deg; commande, nom, pr&eacute;nom, 
        adresse), &eacute;l&eacute;ments qui sont inscrits sur le formulaire de 
        retour.<br>
      </p>
      <p><strong>Remboursement &agrave; distance : </strong><br>
        Vous disposez d&#8217;un d&eacute;lai de r&eacute;tractation de 7 jours 
        &agrave; compter du jour de la r&eacute;ception du colis pour retourner 
        les produits command&eacute;s pour remboursement, si vous avez chang&eacute; 
        d&#8217;avis, si les articles re&ccedil;us ne sont pas conformes &agrave; 
        la description qui en est faite ou s&#8217;ils sont d&eacute;fectueux. 
        <br>
        Renvoyez dans un d&eacute;lai de 7 jours apr&egrave;s r&eacute;ception, 
        votre colis comprenant l&#8217;article dans son emballage d&#8217;origine 
        et le bordereau de retour d&ucirc;ment rempli. Les frais de retour sont 
        &agrave; votre charge.<br>
        Le retour des produits donnera lieu &agrave; un avoir, &eacute;gal au 
        prix d&#8217;achat du ou des produit(s) achet&eacute;s. L&#8217;avoir 
        ne comprend donc pas les frais &eacute;ventuels de livraison.<br>
        Le remboursement qui s&#8217;effectue par cheque au plus tard 15 jours 
        apr&egrave;s la r&eacute;ception du colis par <strong>collants.fr</strong> 
        (les frais de port aller restent acquis) <br>
		  Le remboursement se fera sous forme d'avoir valable 2 mois.
      </p>
      <p><strong>Donn&eacute;es nominatives</strong><br>
        Les donn&eacute;es collect&eacute;es par <strong>collants.fr</strong> 
        sur le site <strong>collants.fr</strong> lui sont destin&eacute;es. Vous 
        pouvez donner votre consentement ou vous opposer &agrave; l&#8217;utilisation 
        des donn&eacute;es recueillies aux termes de la pr&eacute;sente commande, 
        au titre du fichier client&egrave;le de <strong>collants.fr</strong> de 
        m&ecirc;me qu&#8217;&agrave; leur utilisation par des tiers. <br>
        Conform&eacute;ment &agrave; la loi n&deg; 78-17 du 6 janvier 1978, dite 
        Loi Informatique et Libert&eacute;s, vous disposez d&#8217;un droit d&#8217;acc&egrave;s, 
        de rectification et de suppression &agrave; l&#8217;&eacute;gard de toute 
        information vous concernant. Ce droit peut &ecirc;tre exerc&eacute; par 
        courrier &agrave; l&#8217;adresse suivante : Service client <strong>collants.fr</strong> 
        zac du sablar - 25 all&eacute;e pampara - 40100 dax ou par mail:contact@<strong>collants.fr</strong> 
      </p>
      <p><br>
        <strong>R&egrave;glement des litiges</strong><br>
        RESPONSABILITE Les produits propos&eacute;s sont conformes &agrave; la 
        l&eacute;gislation fran&ccedil;aise en vigueur. La responsabilit&eacute; 
        de <strong>collants.fr</strong> ne saurait &ecirc;tre engag&eacute;e en 
        cas de non respect de la l&eacute;gislation du pays o&ugrave; les produits 
        est livr&eacute;. Il appartient &agrave; l&#8217;acheteur de v&eacute;rifier 
        aupr&egrave;s des autorit&eacute;s locales les possibilit&eacute;s d&#8217;importation 
        ou d&#8217;utilisation des produits ou services qu&#8217;il envisage de 
        commander.<br>
        Les photographies et les textes reproduits et illustrant les produits 
        pr&eacute;sent&eacute;s ne sont pas contractuels. En cons&eacute;quence, 
        la responsabilit&eacute; de <strong>collants.fr</strong> ne saurait &ecirc;tre 
        engag&eacute;e en cas d&#8217;erreur dans l&#8217;une de ces photographies 
        ou l&#8217;un de ces textes.<br>
        <strong>collants.fr</strong> ne saurait &ecirc;tre tenu pour responsable 
        de l&#8217;inex&eacute;cution du contrat conclu en cas de rupture de stock 
        ou indisponibilit&eacute; du produit, de force majeure, de perturbation 
        ou gr&egrave;ve totale ou partielle notamment des services postaux et 
        moyens de transport et/ou communications, inondation, incendie.<br>
        <strong>collants.fr</strong> n&#8217;encourra aucune responsabilit&eacute; 
        pour tous dommages indirects du fait des pr&eacute;sentes, perte d&#8217;exploitation, 
        perte de profit, perte de chance, dommages ou frais.<br>
        Des liens hypertextes peuvent renvoyer vers d&#8217;autres sites que le 
        site <strong>collants.fr</strong>. d&eacute;gage toute responsabilit&eacute; 
        dans le cas o&ugrave; le contenu de ces sites ne contreviendrait pas aux 
        dispositions l&eacute;gales et r&eacute;glementaires en vigueur. <br>
        Dans l&#8217;hypoth&egrave;se o&ugrave; un litige na&icirc;trait de la 
        pr&eacute;sente relation contractuelle, les parties s&#8217;engagent avant 
        toute action judiciaire &agrave; rechercher une solution amiable. Les 
        parties conviennent que tout litige n&eacute; du pr&eacute;sent contrat 
        rel&egrave;ve de la comp&eacute;tence exclusive des juridictions de DAX 
        (FRANCE). <br>
      </p></td>
  </tr>
</table>
</body>
</html>
<?php include_once("../include/_connexion_fin.php"); ?>

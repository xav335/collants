<?php
echo "<html><body>\n";

// la fonction ci dessous permet de charger la librairie SP PLUS si elle n'est pas déclarée dans le fichier php.ini (rubrique extensions)
//@dl('php_spplus.so');

if (extension_loaded('SPPLUS')) {
  echo "extension SP PLUS chargée<br><br>\n";
} else {
  echo "extension SP PLUS non chargée<br><br>\n";
}

/**Données fournies par le service integration SP+*/
//par défaut données du module de demonstration
//$clent="58 6d fc 9c 34 91 9b 86 3f fd 64 63 c9 13 4a 26 ba 29 74 1e c7 e9 80 79";
//$codesiret="00000000000001-01";

$clent="0f 93 30 3c f0 1e dc af ca 26 94 f8 34 d2 c1 b5 48 30 1f 99 52 d5 18 39";
$codesiret="34803517100043-01";

/**Données relatives à la commande*/
//montant total TTC de la commande
if(!$montant)
  $montant="105.00";

//reference de la commande pour le commercant
if(!$reference)
  $reference = "spp_" . date("YmdHis");

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

echo "Valeur du hmac de référence:B904A738323EF88372DE75C83722F6E179CC089A<BR>\n";
echo "Toutes les valeurs du hmac calculées doivent etre identiques au hmac de référence\n\n";

echo "<h3>Test de la fonction calcul_hmac</h3>\n";
$hmac=calcul_hmac($clent,$codesiret,$reference,$langue,$devise,$montant,$taxe,$validite);
echo "Valeur du hmac calculé:$hmac<BR>\n";
if ($validite == "") {
  echo "Tester l'URL : <a href='https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&hmac=$hmac' target='_blank'>Click</a><br>";
} else {
  echo "Tester l'URL : <a href='https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&validite=$validite&hmac=$hmac' target='_blank'>Click</a><br>";
}
/*
echo "<h3>Test de la fonction calculhmac</h3>\n";
if ($validite == "") {
  $data="siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe";
} else {
  $data="siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&validite=$validite";
}
$hmac=calculhmac($clent,$data);
echo "Valeur du hmac calculé:$hmac<BR>\n";
if ($validite == "") {
  echo "Tester l'URL : <a href='https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&hmac=$hmac' target='_blank'>Click</a><br>";
} else {
  echo "Tester l'URL : <a href='https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&validite=$validite&hmac=$hmac' target='_blank'>Click</a><br>";
}

echo "<h3>Test de la fonction nthmac</h3>\n";
if ($validite == "") {
  $data= "$codesiret$reference$langue$devise$montant$taxe";
} else {
  $data= "$codesiret$reference$langue$devise$montant$taxe$validite";
}
$hmac=nthmac($clent,$data);
echo "Valeur du hmac calculé:$hmac<BR>\n";
if ($validite == "") {
  echo "Tester l'URL : <a href='https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&hmac=$hmac' target='_blank'>Click</a><br>";
} else {
  echo "Tester l'URL : <a href='https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&validite=$validite&hmac=$hmac' target='_blank'>Click</a><br>";
}

echo "<h3>Test de la fonction signeurlpaiement</h3>\n";
if ($validite == "") {
  $data="https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe";
} else {
  $data="https://www.spplus.net/cgis-bin/spdecrypt.exe?siret=$codesiret&reference=$reference&langue=$langue&devise=$devise&montant=$montant&taxe=$taxe&validite=$validite";
}
$url=signeurlpaiement($clent,$data);
echo "Valeur de l'URL d'appel:$url<BR>\n";
echo "<a href=\"$url\" target='_blank'>Tester l'URL</a>\n";
*/
echo "</body></html>\n";
?>
<?php
//Requete d'ajout = INSERT INTO `AlerteAdh`(`NumAdh`, `Date`, `Montant`) VALUES ($NumAdh,$Date,$Montant)
//Récupération du numéro d'adhérent : automatique car inclus dans un document PHP
$NumAdh=5;//Pour l'exemple

//Montant :
include("include/frequenceMontant.php");
//$Montant correspond au montant par "mensualité"
//$MontantTotal correspond au montant total de la cotisation.
//$Frequence correspond à la string qui donne la frequence
//Faire les dates :
$Req = $bdd->query("SELECT `DateInscription` FROM adherent WHERE `NumAdh`=$NumAdh");
$DateREQ=$Req->fetch();
$Date=$DateREQ["DateInscription"];
switch ($Frequence)
{
  case 'Mensuel':
  for ($i=0; $i < 10; $i++) {
    $bdd->query("INSERT INTO `alerteadh`(`NumAdh`, `Date`, `Montant`) VALUES ($NumAdh, DATE_ADD('$Date', INTERVAL $i MONTH), $Montant)");
  }
  break;
  case 'Semestriel':
  for ($i=0; $i < 2; $i++) {
    $bdd->query("INSERT INTO `alerteadh`(`NumAdh`, `Date`, `Montant`) VALUES ($NumAdh, DATE_ADD('$Date', INTERVAL $i*5 MONTH), $Montant)");
  }
  break;
  case 'Trimestriel':
  for ($i=0; $i < 3; $i++) {
    $bdd->query("INSERT INTO `alerteadh`(`NumAdh`, `Date`, `Montant`) VALUES ($NumAdh, DATE_ADD('$Date', INTERVAL $i*3 MONTH), $Montant)");
  }
  break;
  case 'Bimestriel':
  for ($i=0; $i < 5; $i++) {
    $bdd->query("INSERT INTO `alerteadh`(`NumAdh`, `Date`, `Montant`) VALUES ($NumAdh, DATE_ADD('$Date', INTERVAL $i*2 MONTH), $Montant)");
  }
  break;
  default:
  $Montant=$Montant;
  break;
}
?>

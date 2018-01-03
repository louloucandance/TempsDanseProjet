<?php
//Requete d'ajout = INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne,$Date,$Montant)
//Récupération du numéro d'adhérent : automatique car inclus dans un document PHP
$IdLigne=5;//Pour l'exemple

//Montant :
include("include/frequenceMontant.php");
//$Montant correspond au montant par "mensualité"
//$MontantTotal correspond au montant total de la cotisation.
//$Frequence correspond à la string qui donne la frequence
//Faire les dates :
$Req = $bdd->query("SELECT `DateInscription` FROM adherent WHERE `IdLigne`=$IdLigne");
$DateREQ=$Req->fetch();
$Date=$DateREQ["DateInscription"];
switch ($Frequence)
{
  case 'Quotidien':
  for ($i=0; $i<365; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i DAY), $Montant)");
  }
  break;

  case 'Hebdomadaire':
  for ($i=0; $i<100; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i*7 DAY), $Montant)");
  }
  break;

  case 'Mensuel':
  for ($i=0; $i<36; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i MONTH), $Montant)");
  }
  break;

  case 'Semestriel':
  for ($i=0; $i<6; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i*6 MONTH), $Montant)");
  }
  break;

  case 'Trimestriel':
  for ($i=0; $i<12; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i*3 MONTH), $Montant)");
  }
  break;

  case 'Bimestriel':
  for ($i=0; $i<18; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i*2 MONTH), $Montant)");
  }
  break;

  case 'Annuel':
  for ($i=0; $i<3; $i++) {
    $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, DATE_ADD('$Date', INTERVAL $i YEAR), $Montant)");
  }
  break;
  
  default:
  $bdd->query("INSERT INTO `alertecompta`(`IdLigne`, `Date`, `Montant`) VALUES ($IdLigne, '$Date', $Montant)");
  break;
}
?>

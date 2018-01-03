<?php
$Req = $bdd->query("SELECT `Montant`, `FrequencePaiement` FROM adherent WHERE `NumAdh`=$NumAdh");
$MontantREQ=$Req->fetch();
$Montant=$MontantREQ["Montant"];
$MontantTotal=$MontantREQ["Montant"];
$Frequence=$MontantREQ["FrequencePaiement"];

switch ($Frequence)
{
  case 'Mensuel':
  $Montant/=10;
  break;
  case 'Semestriel':
  $Montant/=2;
  break;
  case 'Trimestriel':
  $Montant/=3;
  break;
  case 'Bimestriel':
  $Montant/=5;
  break;
  default:
  $Montant=$Montant;
  break;
}
$Req->closeCursor();
?>

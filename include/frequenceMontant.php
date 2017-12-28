<?php

include("/Head.php");
include("/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
  include("/ConnexionBDD.php");
  $NumAdh=2;
	$Req = $bdd->query("SELECT `Montant`, `FrequencePaiement` FROM adherent WHERE `NumAdh`=$NumAdh");
	$MontantREQ=$Req->fetch();
	$Montant=$MontantREQ["Montant"];
  $Frequence=$MontantREQ["FrequencePaiement"];
  echo "montant : $Montant, fréquence : $Frequence";

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
  echo " montant par fréquence $Montant";
  // $ReqReduc = $bdd->query("SELECT Reduction FROM `adherent` WHERE `NumAdh`=$NumAdh");
  // $Reducfetch=$ReqReduc->fetch();
  // $Reduc=$Reducfetch['Reduction'];
  // if($Reduc!=NULL)
  // {
  //   switch ($Reduc)
  //   {
  //     case 'F2':
  //     $t-=$t*0.2;
  //     break;
  //     case 'F3':
  //     $t-=$t*0.3;
  //     break;
  //
  //     default:
  //     $t-=$t*0.1;
  //     break;
  //   }
  // }
  // echo "<p>Montant : ".$t."</p>";
  // $bdd->query("UPDATE `adherent` SET`Montant`=$t WHERE NumAdh=$NumAdh");
  ?>

<?php
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');

calculMontant($Num){
  $Req = $bdd->query("SELECT COUNT(*) FROM `classe` WHERE `NumAdh`=$NumAdh");
		$NombreCoursREQ=$Req->fetch();
		$NBCours=$NombreCoursREQ["COUNT(*)"];
		echo"<p>Nombre cours : $NBCours </p>";

		switch ($NBCours)
		{
			case '1':
				if($EV)
					{$t=270.0;}
				elseif ($BS)
					{$t=200.0;}
				else
					{$t=320.0;}
			break;
			case '2':
				$t=430.0;
			break;
			case '3':
				$t=500.0;
			break;
			default:
				$t=600.0;
			break;
		}
		$ReqReduc = $bdd->query("SELECT Reduction FROM `adherent` WHERE `NumAdh`=$NumAdh");
		$Reducfetch=$ReqReduc->fetch();
		$Reduc=$Reducfetch['Reduction'];
		if($Reduc!=NULL)
		{
			switch ($Reduc)
			{
				case 'F2':
					$t-=$t*0.2;
				break;
				case 'F3':
					$t-=$t*0.3;
				break;

				default:
					$t-=$t*0.1;
				break;
			}
		}
		$bdd->query("UPDATE `adherent` SET`Montant`=$t WHERE NumAdh=$NumAdh");

}

frequencePaiement($NumAdh){
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

  return $Montant;
}


?>

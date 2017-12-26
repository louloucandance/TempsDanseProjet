<?php 
//Pour remettre AI à 0 : ALTER TABLE nomDeLaTable AUTO_INCREMENT=0
include("include/Head.php");
include("include/Menu.php");

//Connexion à la BDD
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');

//Fil d'Arianne et titres
?>
	<div>Vous êtes ici : <a href="index.php">Accueil</a> - Ajout d'un adhérent</div>
	<section>
		<h2>Gestion des adhérents</h2>
		<h3>Ajout d'un adhérent</h3>

		<?php
//Ajout de la Reduction
	 
		//Ajout des champs de Adhérents
		$Prenom=$_POST["Prenom"];
		$Nom=$_POST["Nom"];
		$DateNaissance=$_POST["DateNaissance"];
		$FrequencePaiement=$_POST["Frequence"];
		$ModePaiement=$_POST["Paiement"];

		//INSERTION DE L'ADHERENT DANS LA BDD
		$bdd->query("INSERT INTO `adherent`(`Nom`, `Prenom`, `DateNaissance`, `ModePaiement`, `FrequencePaiement`) VALUES ('$Nom', '$Prenom', '$DateNaissance', '$ModePaiement', '$FrequencePaiement')");
		//RECUPERATION DU NUMERO ADHERENT
		$Reponse = $bdd->query("SELECT NumAdh FROM adherent WHERE `Nom`='$Nom' AND `Prenom`='$Prenom' AND `DateNaissance`='$DateNaissance'");
		$NumAdhResult=$Reponse->fetch();
		$Requete = $bdd->query("SELECT COUNT(*) FROM adherent WHERE `Nom`='$Nom' AND `Prenom`='$Prenom' AND `DateNaissance`='$DateNaissance'");
		$NumAdhNBResult=$Requete->fetch();
		$NumAdhNB=$NumAdhNBResult["COUNT(*)"];
		if($NumAdhNB==1){
			$NumAdh=$NumAdhResult['NumAdh'];
			echo "<p>$Prenom $Nom ajouté !</p><p>Numéro d'adhérent attribué : $NumAdh</p>";
		}
		else{
			throw new Exception("Il y a $NumAdhNB adhérents s'appellant $Prenom $Nom né $DateNaissance", 1);
		}
		//AJOUT DE LA REDUCTION
		$Reduc=NULL;
		if(isset($_POST["Reduction"]))
		{
			$Reduc=$_POST["Reduction"];
			$bdd->query("UPDATE `adherent` SET `Reduction`='$Reduc' WHERE NumAdh=$NumAdh)");
			echo "<p>Réduction $Reduc ajoutée</p>";
		}
		include("include/AjoutCours.php");

		include("include/calculMontant.php");

		
		?>
		<!-- <p>Montant enregistré !</p>-->
	<p><a href="GestionAdhForm">Enregistrer un nouvel adhérent</a> - <a href="GestionAdh">Gestion des adhérents</a> - <a href="GestionAdhMAJ">Mettre à jour un adhérent</a> </p>
	</section>
	<?php include("include/Footer.php");?>
</body>
</html>	
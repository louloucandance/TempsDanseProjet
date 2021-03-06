<?php
//Pour remettre AI à 0 : ALTER TABLE nomDeLaTable AUTO_INCREMENT=0
include("include/Head.php");
include("include/Menu.php");



//Fil d'Arianne et titres
?>
	<div>Vous êtes ici : <a href="index.php">Accueil</a> - Ajout d'un adhérent</div>
	<section>
		<h2>Gestion des adhérents</h2>
		<h3>Ajout d'un adhérent</h3>

		<?php
//Ajout de la Reduction

//Ajout des champs de Adhérents
		$Prenom=htmlspecialchars($_POST["Prenom"]);
		$Nom=htmlspecialchars($_POST["Nom"]);
		$DateNaissance=htmlspecialchars($_POST["DateNaissance"]);
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
			throw new Exception("Il y a $NumAdhNB adhérent(s) s'appellant $Prenom $Nom né(s) $DateNaissance", 1);
		}

		//AJOUT DE LA REDUCTION
		$Reduc=NULL;
		if(isset($_POST["Reduction"]))
		{
			$Reduc=$_POST["Reduction"];
			$bdd->query("UPDATE `adherent` SET `Reduction`='$Reduc' WHERE NumAdh=$NumAdh");
			echo "<p>Réduction $Reduc ajoutée</p>";
		}
		include("include/AjoutCours.php");
		include("include/calculMontant.php");
		include("include/AjoutAlerteAdh.php");

		?>

		<!-- <p>Montant enregistré !</p>-->
		<a class="bouton" href="GestionAdhForm.php">Nouvel Adhérent</a>
		<a class="bouton" href="GestionAdhMAJ.php">Corriger un adhérent</a>
		<a class="bouton" href="GestionAdhListes.php">Listes d'appellant</a>
		<a class="bouton" href="index.php">Accueil</a>
	</section>
	<?php include("include/Footer.php");?>
</body>
</html>

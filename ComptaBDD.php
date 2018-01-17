<?php
session_start();
include("include/Head.php");
include("include/Menu.php");

//Connexion à la BDD

//Fil d'Arianne et titres
?>
<div>Vous êtes ici : <a href="index.php">Accueil</a> - Ajout d'une ligne</div>
<section>
	<h2>Comptabilité</h2>
	<h3>Ajout d'une ligne</h3>

	<?php

	//Ajout des champs de compta
	$Motif=htmlspecialchars($_POST["Motif"]);
	$Date=htmlspecialchars($_POST["Date"]);
	$Montant=htmlspecialchars($_POST["Montant"]);
	$Frequence=$_POST["Frequence"];
	$Type=$_POST["Type"];

	//INSERTION DE L'ADHERENT DANS LA BDD
	$Requete = $bdd->query("SELECT COUNT(*) FROM compta WHERE `Motif`='$Motif' AND `Date`='$Date' AND `Montant`='$Montant' AND Frequence='$Frequence' AND Type='$Type'");
	$IdResultNb=$Requete->fetch();
	$Requete->closeCursor();
	$IdNb=$IdResultNb["COUNT(*)"];
	if($IdNb!=0){
		throw new Exception("  Il y a $IdNb ligne(s) déjà répondant à ces critères, il se peut qu'elle soit déjà entrée, et nous vous conseillons de vérifier dans le tableau sa présence.", 1);
	}
	$bdd->query("INSERT INTO `compta`(`Motif`, `Montant`, `Type`, `Frequence`, `Date`) VALUES ('$Motif',$Montant,'$Type','$Frequence','$Date')");
	$Reponse = $bdd->query("SELECT `Id` FROM `compta` WHERE `Motif`='$Motif' AND `Date`='$Date' AND `Montant`='$Montant' AND Frequence='$Frequence' AND Type='$Type'");
	$IdResult=$Reponse->fetch();
	$Id=$IdResult['Id'];
	//AJOUT DE LA REDUCTION
	$Commentaire=NULL;
	$MoyenPaiement=NULL;
	$Categorie=NULL;
	if(isset($_POST["Commentaire"])){
		$Commentaire=htmlspecialchars($_POST["Commentaire"]);
		$bdd->query("UPDATE `compta` SET `Commentaire`='$Commentaire' WHERE Id=$Id");
	}
	if(isset($_POST["MoyenPaiement"]))	{
		$MoyenPaiement=$_POST["MoyenPaiement"];
		$bdd->query("UPDATE `compta` SET `ModePaiement`='$MoyenPaiement' WHERE `Id`=$Id");
	}
	if(isset($_POST["Categorie"])){
		$Categorie=$_POST["Categorie"];
		$bdd->query("UPDATE `compta` SET `Categorie`='$Categorie' WHERE Id=$Id");
	}
	?>
	<a class="bouton" href="ComptaForm.php">Nouvelle ligne</a>
	<a class="bouton" href="ComptaMAJ.php">Corriger ma comptabilité</a>
	<a class="bouton" href="ComptaListes.php">Ma comptabilité</a>
	<a class="bouton" href="index.php">Accueil</a>
</section>
<?php
$IdLigne=$Id;

if(!$_SESSION['Alerte']){
	include('include/AjoutAlerteCompta.php');
}
else {
	$Alerte=$_SESSION['NumAlerte'];
	$bdd->query("DELETE FROM `alertecompta` WHERE `IdAlerte`=$Alerte");
	$bdd->query("DELETE FROM `alerteadh` WHERE `IdAlerte`=$Alerte");
}
include("include/Footer.php");
?>
</body>
</html>

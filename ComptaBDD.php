<?php
include("include/Head.php");
include("include/Menu.php");

//Connexion à la BDD
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
//Fil d'Arianne et titres
?>
<div>Vous êtes ici : <a href="index.php">Accueil</a> - Ajout d'une ligne</div>
<section>
	<h2>Comptabilité</h2>
	<h3>Ajout d'une ligne</h3>

	<?php


	//Ajout des champs de compta
	$Motif=$_POST["Motif"];
	$Date=$_POST["Date"];
	$Montant=$_POST["Montant"];
	$Frequence=$_POST["Frequence"];
	$Type=$_POST["Type"];

	//INSERTION DE L'ADHERENT DANS LA BDD
	$bdd->query("INSERT INTO `compta`(`Motif`, `Montant`, `Type`, `Frequence`, `Date`) VALUES ('$Motif',$Montant,'$Type','$Frequence','$Date')");
	$Reponse = $bdd->query("SELECT `Id` FROM `compta` WHERE `Motif`='$Motif' AND `Date`='$Date' AND `Montant`='$Montant' AND Frequence='$Frequence' AND Type='$Type'");
	$IdResult=$Reponse->fetch();
	$Requete = $bdd->query("SELECT COUNT(*) FROM compta WHERE `Motif`='$Motif' AND `Date`='$Date' AND `Montant`='$Montant' AND Frequence='$Frequence' AND Type='$Type'");
	$IdResultNb=$Requete->fetch();
	$IdNb=$IdResultNb["COUNT(*)"];
	if($IdNb==1){
		$Id=$IdResult['Id'];
		echo "<p>$Motif : $Montant € le $Date ajouté !</p><p>Ligne numéro : $Id</p>";
	}
	else{
		throw new Exception("Il y a $IdNb ligne déjà répondant à ces critères", 1);
	}
	//AJOUT DE LA REDUCTION
	$Commentaire=NULL;
	$MoyenPaiement=NULL;
	$Categorie=NULL;
	if(isset($_POST["Commentaire"]))
	{
		$Commentaire=$_POST["Commentaire"];
		echo "$Commentaire";
		$bdd->query("UPDATE `compta` SET `Commentaire`='$Commentaire' WHERE Id=$Id)");
		echo "<p>Commentaire ajouté</p>";
	}
	if(isset($_POST["MoyenPaiement"]))
	{
		$MoyenPaiement=$_POST["MoyenPaiement"];
		$bdd->query("UPDATE `compta` SET `MoyenPaiement`='$MoyenPaiement' WHERE Id=$Id)");
		echo "<p>Moyen de paiement ajouté</p>";
	}
	if(isset($_POST["Categorie"]))
	{
		$Commentaire=$_POST["Categorie"];
		$bdd->query("UPDATE `compta` SET `Catégorie`='$Categorie' WHERE `Id`=$Id)");
		echo "<p>Catégorie ajouté</p>";
	}




	?>
	<!-- <p>Montant enregistré !</p>-->
	<p><a href="ComptaForm.php">Nouvelle ligne</a> - <a href="Compta.php">Ma comptabilité</a> - <a href="ComptaMAJ.php">Mettre à jour une ligne</a> </p>
</section>
<?php include("include/Footer.php");?>
</body>
</html>

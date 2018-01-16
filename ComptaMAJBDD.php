<?php
include('include/Head.php');
include('include/Menu.php');

$Id=$_GET['Num']; ?>
<div>Vous êtes ici : <a href='index.php'>Accueil</a> - <a href='GestionAdh.php'>Gestion Adhérent</a> - Mise à Jour 3</div>
<section>
	<h2>Comptabilité</h2>
	<h3>Mises à jour Etape 3</h3>
	<p> Numéro de ligne :	<?php echo $Id; ?> </p>
	<?php
	if(isset($_POST['Supprimer']))
	{
		if($_POST['Confirmer']=='OUI')
		{
			$bdd->query("DELETE FROM compta WHERE `Id`=$Id");
			$bdd->query("DELETE FROM alertecompta WHERE IdLigne=$Id");
			echo "Adhérent supprimé";
		}
		else {
			echo "Adhérent non supprimé";
		}
		else{
	if(isset($_POST['Ligne']))
	{
		$Motif=$_POST['Motif'];
		$Montant=$_POST['Montant'];
		$Date=$_POST['Date'];
		$ModePaiement=$_POST['ModePaiement'];
		$Frequence = $_POST['Frequence'];
		$Commentaire=$_POST['Commentaire'];
		$Type=$_POST['Type'];
		$Categorie=$_POST['Categorie'];

		$MAJ=$bdd->query("UPDATE compta SET `Categorie`='$Categorie', `Type`='$Type', Motif='$Motif', `Commentaire`='$Commentaire', Montant=$Montant, `Date`='$Date', `ModePaiement`='$ModePaiement',`Frequence`='$Frequence' WHERE `Id`=$Id");
		$MAJ->closeCursor();

		echo "Modification effectuée !";
	}



	}
	$bdd->query("DELETE FROM alertecompta WHERE IdLigne=$Id");
	include("include/AjoutAlerteCompta");?>
}
</section>
<?php include("include/Footer.php"); ?>
</body>
</html>

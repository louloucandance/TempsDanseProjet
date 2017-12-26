<?php
include('include/Head.php');
include('include/Menu.php');
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
$NumAdh=$_GET['Num']; ?>
<div>Vous êtes ici : <a href='index.html'>Accueil</a> - <a href='GestionAdh.php'>Gestion Adhérent</a> - Mise à Jour 3</div>
<section>
	<h2>Gestion des adhérents</h2>
	<h3>Mises à jour Etape 3</h3>
	<p> Numéro d'adhérent :	<?php echo $NumAdh; ?> </p>
	<?php
	if(isset($_POST['Admin']))
	{
		$Nom=$_POST['Nom'];
		$Prenom=$_POST['Prenom'];
		$DTN=$_POST['DateNaissance'];
		$Admin=$bdd->query("UPDATE adherent SET Nom='$Nom', Prenom='$Prenom', DateNaissance='$DTN' WHERE NumAdh=$NumAdh");
		$Admin->closeCursor(); 
	}
	if(isset($_POST['Paiement']))
	{	
		if(isset($_POST["Reduction"])){
			$Reduc=$_POST["Reduction"];
			$bdd->query("UPDATE `adherent` SET `Reduction`='$Reduc' WHERE NumAdh=$NumAdh");
		}
		else{
			$Reduc=NULL;
			$bdd->query("UPDATE `adherent` SET `Reduction`=NULL");
		}

		$Paiement=$_POST['Paiement'];
		$Frequence=$_POST['Frequence'];
		$Paiement=$bdd->query("UPDATE `adherent` SET `ModePaiement`='$Paiement',`FrequencePaiement`='$Frequence' WHERE `NumAdh`=$NumAdh");
		$Paiement->closeCursor(); 
	}
	if(isset($_POST['Cours']))
	{
		$EffClasse=$bdd->query("DELETE FROM Classe WHERE `NumAdh`=$NumAdh");
		$EffClasse->closeCursor();
		include("include/AjoutCours.php");		
		include("include/calculMontant.php");
	} ?>

</section>
<?php include("include/Footer.php"); ?>
</body>
</html>	
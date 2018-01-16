<?php
session_start();
include('include/Head.php');
include('include/Menu.php');
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
?>

<div>Vous êtes ici : <a href='index.php'>Accueil</a> - Supprimer Alerte</div>
<section>
	<h2>Supprimer Alerte</h2>

	<?php
	if (isset($_POST['OUI'])) {

		if($_SESSION['Action']=='compta')		{
			$id=$_SESSION['Id'];
			$bdd->query("DELETE FROM `alertecompta` WHERE `IdAlerte`=$id");
			echo "<p>Alerte supprimée</p>";
		}

		if($_SESSION['Action']=='adh')		{
			$id=$_SESSION['Id'];
			$bdd->query("DELETE FROM alerteadh WHERE `IdAlerte`=$id");
			echo "<p>Alerte supprimée</p>";
		}
		session_destroy();
		echo "<a href='index.php'>Retour à l'Accueil</a>";
	}

	if(isset($_GET['A'])) {
		$_SESSION['Id']=$_GET['Id'];
		$_SESSION['Action']=$_GET['A'];?>
		<p>Supprimer cette alerte ? </p>
		<form action="SupprimerAlerte.php" method="post">
			<input type="checkbox" name="OUI" value="OUI">OUI<br>
			<input type="checkbox" name="NON" value="NON">NON<br><br>
			<input type="submit">
		</form><?php
	}
	?>

</section>
<?php include("include/Footer.php"); ?>
</body>
</html>

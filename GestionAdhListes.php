<?php
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - <a href="GestionAdh.html">Gestion Adhérent</a> - Liste d'appel</div>

<section>

	<h2>Gestion des adhérents</h2>
	<h3>Mes listes d'appel</h3>
	<form action="GestionAdhListesBDD.php" method="POST">
	<?php
	$reponse=$bdd->query("SELECT `Discipline`, `Niveau` FROM `classe` GROUP BY `Discipline`, `Niveau`");
	while($listCours=$reponse->fetch())
	{
		$Dis=$listCours['Discipline'];
		$Niv=$listCours['Niveau'];
		echo "<input type=\"radio\" name=\"Cours\" value=\"$Dis"."_"."$Niv\" id=\"$Dis"."_"."$Niv\"><label for=\"$Dis"."_"."$Niv\"> $Dis $Niv</label><br>";
	}
	?>
	<input type="submit" name="Envoyer !"/>
	</form>
</section>
<?php include("include/Footer.php");?>
</body>
</html>

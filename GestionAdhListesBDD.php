	<?php
	include("include/Head.php");
	include("include/Menu.php");
	$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
	?>
	<div>Vous êtes ici :Accueil</a> - <a href="GestionAdh.html">Gestion Adhérent</a> - Liste d'appel</div>

	<section>

		<h2>Gestion des adhérents</h2>
		<h3>Mes listes d'appel</h3>

		<?php
			$i=0;
			$Cours=$_POST['Cours'];
			$chunks = explode ("_", $Cours);
			list($Discipline, $Niveau) = explode("_", $Cours);
			echo "<table><caption>$Discipline $Niveau<caption><tr><th>Nom</th><th>Prénom</th></tr>";
			$reponse=$bdd->query("SELECT Nom, Prenom FROM `adherent` INNER JOIN `classe` ON adherent.`NumAdh` = classe.`NumAdh` WHERE classe.`Discipline`='$Discipline' AND `classe`.`Niveau`='$Niveau' ORDER BY Nom
			");
			while($Eleves=$reponse->fetch()){ ?>
			<tr><td><?php echo $Eleves['Nom']."</td><td>".$Eleves['Prenom']."</td></tr>";
			}
		?></table>

	</section>
	<?php include("include/Footer.php");?>
	</body>
</html>

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
	$i=0;
	$reponse=$bdd->query("SELECT `Discipline`, `Niveau` FROM `classe` GROUP BY `Discipline`, `Niveau`");
	while($listCours=$reponse->fetch()){
		?>
		<input type="radio" name="Cours" value="<?php echo $listCours['Discipline']."_".$listCours['Niveau'];?>" id="<?php echo $i;?>"><label for="<?php echo $i;?>"><?php echo $listCours['Discipline']." ".$listCours['Niveau'];?></label><br>
		<?php $i+=$i;
	}
	?>
	<input type="submit" name="Envoyer !"/>
	</form>
</section>
<?php include("include/Footer.php");?>
</body>
</html>	
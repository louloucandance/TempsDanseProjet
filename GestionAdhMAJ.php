<?php 
//QUAND ON AJOUTE UNE REDUCTION CA L'APPLIQUE PAS !!!
//PROBLEME CLASSIQUE
//PROPAGATION DE LA REDUC SUR LA BDD
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - <a href="GestionAdh.html">Gestion Adhérent</a> -Mise à Jour 1</div>
	
<section>

	<h2>Gestion des adhérents</h2>
	<h3>Mises à jour Etape 1</h3>
	<?php
	$NomPrenomDT=$bdd->query("SELECT * FROM adherent");
	?>
	<form method="POST" action="GestionAdhMAJForm.php">
	<select name="Adh"><?php
	while ($NomPrenom=$NomPrenomDT->fetch()) { ?>
	<option value=<?php echo $NomPrenom['NumAdh'];?>><?php echo $NomPrenom['Nom']." ".$NomPrenom['Prenom'];?></option>
	<?php }
	$NomPrenomDT->closeCursor(); 
	?>
	</select>
	<p>Type de modifications :</p>
	<input type="checkbox" name="typeAdmin" id="Admin" /> <label for="Admin">Informations administratives</label><br>
	<input type="checkbox" name="typeCours" id="Cours" /> <label for="Cours">Cours</label><br>
	<input type="checkbox" name="typePaiement" id="Paiement" /> <label for="Paiement">Paiement</label><br><br>
	<input type="submit" name="Envoyer !"/>
</form>
</section>
<?php include("include/Footer.php");?>
</body>
</html>	
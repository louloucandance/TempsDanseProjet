<?php
include("include/Head.php");
include("include/Menu.php");
 ?>

<div>Vous êtes ici : <a href="index.php">Accueil</a> -Modification d'une ligne compta</div>

<section>

	<h2>Comptabilité</h2>
	<h3>Mises à jour Etape 1</h3>

	<form method="post" action="ComptaMAJForm.php">
		<p>Choisissez une ligne comptable : </p>
		<select name="Ligne">
			<?php
			$reponse=$bdd->query("SELECT * FROM compta");
			while ($Ligne=$reponse->fetch()) { ?>
				<option value="<?php echo $Ligne['Id'];?>"><?php echo $Ligne['Motif']." du ".$Ligne['Date']." à ".$Ligne['Montant']."€";?></option>
			<?php }
			$reponse->closeCursor();
			?>
		</select>
		<br>
		<p>Vous souhaitez : </p>

		<input required type="radio" name="Action" value="Modifier" id="Modifier" /> <label for="Modifier">Modifier la ligne</label><br>
		<input required type="radio" name="Action" value="Supprimer" id="Supprimer"/><label for="Supprimer">Supprimer la ligne</label><br><br>
		<input type="submit" name="Enregistrer !">
	</form>
</section>
<?php include("include/Footer.php");?>
</body>
</html>

<?php include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');?>

<div>Vous êtes ici : <a href="index.html">Accueil</a> -Nouvelle ligne compta</div>

<section>

	<h2>Nouvelle ligne compta</h2>

	<form method="post" action="ComptaBDD.php">
		<table class="invisible">
			<tr class="invisible">
				<td class="invisible">
					<fieldset class="Info"><legend>Nouvelle ligne</legend>
						<table class="Form">
							<tr class="Form"><td class="Form"><label for="Motif">Motif : </label></td><td class="Form"><input type="text" name="Motif" id="Motif" required />	</td></tr>
							<tr class="Form"><td class="Form"><label for="Date">Date : </label></td><td class="Form"><input type="text" name="Date" id="Date" required placeholder="aaaa-mm-jj"/></td></tr>
							<tr class="Form"><td class="Form"><label for="Montant"> Montant :  </label></td><td class="Form"><input required type="number" name="Montant" id="Montant" /></td></tr>
						</table>
						<p><strong>Fréquence : </strong></p>
						<ul>
							<?php
							$reponse = $bdd->query('SELECT * FROM frequence');
							while ($donnees = $reponse->fetch())
							{
								$freq=$donnees['NomFrequence'];
								echo "<li class=\"Paiement\"><input required type=\"radio\" name=\"Frequence\" value=\"$freq\" id=\"$freq\"/> <label for=\"$freq\">$freq</label></li>";
							}
							$reponse->closeCursor();
							?>
						</ul>
						<p><strong>Type : </strong></p>
						<ul>
							<?php
							$reponse = $bdd->query('SELECT * FROM typecompta');
							while ($donnees = $reponse->fetch())
							{
								$Id=$donnees['Type'];
								echo "<li class=\"Paiement\"><input type=\"radio\" name=\"Type\" value=\"$Id\" id=\"$Id\"/> <label for=\"$Id\">$Id</label></li>";
							}
							$reponse->closeCursor();
							?>
						</ul>


					</fieldset>
				</td>

				<td class="invisible">
					<fieldset class="Cours"><legend>Facultatif</legend>
						<p><strong>Moyen de Paiement : </strong></p>
						<ul>
							<?php
							$reponse = $bdd->query('SELECT * FROM modepaiement');
							while ($donnees = $reponse->fetch())
							{
								$Id=$donnees['IdPaiement'];
								$Nom=$donnees['NomPaiement'];
								echo "<li class=\"Paiement\"><input type=\"radio\" name=\"MoyenPaiement\" value=\"$Id\" id=\"$Id\"/> <label for=\"$Id\">$Nom</label></li>";
							}
							$reponse->closeCursor();
							?>
						</ul>

						<p><strong>Catégorie : </strong></p>
						<ul>
							<?php
							$reponse = $bdd->query('SELECT * FROM categorie');
							while ($donnees = $reponse->fetch())
							{
								$Id=$donnees['Nom'];
								echo "<li class=\"Paiement\"><input type=\"radio\" name=\"Categorie\" value=\"$Id\" id=\"$Id\"/> <label for=\"$Id\">$Id</label></li>";
							}
							$reponse->closeCursor();
							?>
						</ul>


						<textarea name="Commentaire" rows="4" cols="50">Commentaire...</textarea>



					</td>
				</table>

			</fieldset>
			<input type="submit" name="Enregistrer !">
		</form>





	</section>
	<?php include("include/Footer.php");?>
</body>
</html>
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
								echo "<li class=\"Paiement\"><input required type=\"radio\" name=\"$freq\" value=\"$freq\" id=\"$freq\"/> <label for=\"$freq\">$freq</label></li>";
							}
							$reponse->closeCursor();
							?>
						</ul>
						<p><strong>Moyen de Paiement : </strong></p>
						<ul>
							<?php
							$reponse = $bdd->query('SELECT * FROM modepaiement');
							while ($donnees = $reponse->fetch())
							{
								$Id=$donnees['IdPaiement'];
								$Nom=$donnees['NomPaiement'];
								echo "<li class=\"Paiement\"><input required type=\"radio\" name=\"$Id\" value=\"$Id\" id=\"$Id\"/> <label for=\"$Id\">$Nom</label></li>";
							}
							$reponse->closeCursor();
							?>
						</ul>
						<p><strong>Réduction : </strong></p>
						<ul>
							<li class="Paiement"><input type="radio" name="Reduction" value="CG" id="CG"/> <label for="CG">Conseil Général Évasion</label></li>
							<li class="Paiement"><input type="radio" name="Reduction" value="F1" id="F1"/> <label for="F1">Famille 10%</label></li>
							<li class="Paiement"><input type="radio" name="Reduction" value="F2" id="F2"/> <label for="F2">Famille 20%</label></li>
							<li class="Paiement"><input type="radio" name="Reduction" value="F3" id="F3"/> <label for="F3">Famille 30%</label></li>
						</ul>
					</fieldset>
				</td>
				<td class="invisible">

					<fieldset class="Cours"><legend>Choix des Activités</legend>

						<input type="checkbox" name="BarreSol" value="BarreSol" id="BarreSol" /> <label for="BarreSol">Barre au Sol</label><br/>
						<input type="checkbox" name="Eveil" value="Eveil" id="Eveil" /><label for="Eveil">Éveil</label><br/>
						<input type="checkbox" name="Initiation" value="Initiation" id="Initiation" /><label for="Initiation">Initiation</label><br/>

						<details>
							<summary>Contemporain </summary>
							<input type="checkbox" name="ContemporainAdo" value="ConAdo" id="Ado" /><label for="Ado">Ado</label><br/>
							<input type="checkbox" name="ContemporainSup" value="ConSuperieur" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
						</details>
						<details>
							<summary>Classique </summary>
							<input type="checkbox" name="ClaEnf" value="ClaEnf" id="Enfant" /><label for="Enfant">Enfant</label><br/>
							<input type="checkbox" name="ClaPrep" value="ClaPrep" id="Preparatoire" /><label for="Preparatoire">Préparatoire</label><br/>
							<input type="checkbox" name="ClaAdo" value="ClaAdo" id="Ado" /><label for="Ado">Ado</label><br/>
							<input type="checkbox" name="ClaSup" value="ClaSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
						</details>
						<details>
							<summary>Jazz</summary>
							<input type="checkbox" name="JaEnf" value="JaEnf" id="Enfant" /><label for="Enfant">Enfant</label><br/>
							<input type="checkbox" name="JaAdo" value="JaAdo" id="Ado" /><label for="Ado">Ado</label><br/>
							<input type="checkbox" name="JaSup" value="JaSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
							<input type="checkbox" name="JaAdu" value="JaAdu" id="Adulte" /><label for="Adulte">Adulte</label> <br/>
						</details>
						<details>
							<summary>Street Jazz </summary>
							<input type="checkbox" name="StAdo" value="StAdo" id="Ado" /><label for="Ado">Ado</label><br/>
							<input type="checkbox" name="StSup" value="StSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
						</details>
						<details>
							<summary>Pointes </summary>
							<input type="checkbox" name="P1" value="PNiveau1" id="Niveau1" /><label for="Niveau1">Niveau 1</label> <br/>
							<input type="checkbox" name="P2" value="PNiveau2" id="Niveau2" /><label for="Niveau2">Niveau 2</label> <br/>
						</details>
					</td>
				</table>

			</fieldset>
			<input type="submit" name="Enregistrer !">
		</form>





	</section>
	<?php include("include/Footer.php");?>
</body>
</html>

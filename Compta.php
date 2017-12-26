<?php include("include/Head.php");
include("include/Menu.php"); ?>
	<div>Vous êtes ici : <a href="index.html">Accueil</a> - Comptabilité </div>
	
	<section>

		<h2>Compta</h2>

		<form method="post" action="ComptaBDD.php">
			<fieldset class="Info"><legend>Nouvelle Ligne Compta</legend>
				<p>Formulaire de comptabilite</p>
				<!--<ul>
					<li class="Info"><label for="Nom">Nom : </label><input type="text" name="Nom" id="Nom" required /> </li>
					<li class="Info"><label for="Prenom">Prénom : </label><input type="text" name="Prenom" id="Prenom" required />	</li>
					<li class="Info"><label for="DateNaissance">Date de naissance : </label><input required type="date" name="DateNaissance" id="DateNaissance" placeholder="mm-jj-aaaa"/></li>
					<li class="Info"> <label for="Tel">Téléphone : </label><input required type="tel" name="Tel" id="Tel"/></li>
					<li class="Info"><label for="Email">Email : </label><input type="email" name="Email" id="Email" placeholder="toto@mail.com" required/></li>
				</ul>						
				<p><strong>Type de Paiement : </strong></p>
				<ul>					
					<li class="Paiement"><input required type="radio" name="Paiement" value="CQ" id="cheque" /> <label for="cheque">Cheque</label></li>               
					<li class="Paiement"><input required type="radio" name="Paiement" value="ES" id="espece" /> <label for="espece">Espece</label></li>
					<li class="Paiement"><input required type="radio" name="Paiement" value="VI" id="virement" /> <label for="virement">Virement</label> </li>
				</ul>
				<select>Frequence du paiement
				<option>Mensuel</option>
				<option>Trimestriel</option>
				<option>Annuel</option>
				</select>
			
			</fieldset> 

			<fieldset class="Cours"><legend>Choix des Activites</legend>

				<details>
				<summary>Contemporain </summary>
				<input type="checkbox" name="Niveau" value="Ado" id="Ado" /><label for="Ado">Ado</label><br/>	
				<input type="checkbox" name="Niveau" value="Superieur" id="Superieur" /><label for="Superieur">Superieur</label><br/>
				</details>
				<details>
				<summary>Classique </summary>
				<input type="checkbox" name="Niveau" value="Enfant" id="Enfant" /><label for="Enfant">Enfant</label><br/>
				<input type="checkbox" name="Niveau" value="Preparatoire" id="Preparatoire" /><label for="Preparatoire">Preparatoire</label><br/>
				<input type="checkbox" name="Niveau" value="Ado" id="Ado" /><label for="Ado">Ado</label><br/>
				<input type="checkbox" name="Niveau" value="Superieur" id="Superieur" /><label for="Superieur">Superieur</label><br/>
				</details>
				<details>
				<summary>Jazz </summary>
				<input type="checkbox" name="Niveau" value="Enfant" id="Enfant" /><label for="Enfant">Enfant</label><br/>
				<input type="checkbox" name="Niveau" value="Ado" id="Ado" /><label for="Ado">Ado</label><br/>
				<input type="checkbox" name="Niveau" value="Superieur" id="Superieur" /><label for="Superieur">Superieur</label><br/>
				<input type="checkbox" name="Niveau" value="Adulte" id="Adulte" /><label for="Adulte">Adulte</label> <br/>
				</details>
				<details>
				<summary>Street Jazz </summary>
				<input type="checkbox" name="Niveau" value="Ado" id="Ado" /><label for="Ado">Ado</label><br/>
				<input type="checkbox" name="Niveau" value="Superieur" id="Superieur" /><label for="Superieur">Superieur</label><br/>
				</details>
				<details>
				<summary>Pointes </summary>
				<input type="checkbox" name="Niveau" value="Niveau1" id="Niveau1" /><label for="Niveau1">Niveau 1</label> 
				<input type="checkbox" name="Niveau" value="Niveau2" id="Niveau2" /><label for="Niveau2">Niveau 2</label> 
				</details>
				<input type="checkbox" name="Discipline" value="BarreSol" id="BarreSol" /> <label for="BarreSol">Barre au Sol</label><br/>
				<input type="checkbox" name="Discipline" value="Eveil" id="Eveil" /><label for="Eveil">Eveil</label><br/>
				<input type="checkbox" name="Niveau" value="Initiation" id="Initiation" /><label for="Initiation">Initiation</label><br/>-->

			</fieldset>
			<button type="submit">Enregistrer</button>
		</form>	
		
	</section>
	<?php include("include/Footer.php");?>
</body>
</html>	
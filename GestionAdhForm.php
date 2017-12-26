<?php
//Ceci est la page d'inscription des adhérents. Elle se compose d'un questionnaire et les informations sont transmises au serveur en POST.
// Il reste à regler un problème d'affichage en CSS (le formulaire est un peu étriqué et la couleur de fond s'arrête avant la fin)
include("include/Head.php");
include("include/Menu.php"); ?>
<div>Vous êtes ici : <a href="index.php">Accueil</a> - <a href="GestionAdh.php">Gestion Adhérent</a>- Inscription Adhérent</div>

<section>

	<h2>Inscription des Adhérents</h2>
	<form method="post" action="GestionAdhBDD.php">
	<table class="invisible">
		<tr class="invisible">
			<td class="invisible">
	<fieldset class="Info"><legend>Information de l'adhérent</legend>
		<table class="Form">
			<tr class="Form"><td class="Form"><label for="Prenom">Prénom : </label></td><td class="Form"><input type="text" name="Prenom" id="Prenom" required />	</td></tr>
			<tr class="Form"><td class="Form"><label for="Nom">Nom : </label></td><td class="Form"><input type="text" name="Nom" id="Nom" required /></td></tr>
			<tr class="Form"><td class="Form"><label for="DN">Date de naissance : </label></td><td class="Form"><input required type="text" name="DateNaissance" id="DN" placeholder="aaaa-mm-jj"/></td></tr>
		</table>
		<p><strong>Fréquence du paiement : </strong></p>
		<ul>
			<li class="Paiement"><input required type="radio" name="Frequence" value="Mensuel" id="Mens" /> <label for="Mens">Mensuel</label></li>
			<li class="Paiement"><input required type="radio" name="Frequence" value="Bimestriel" id="Bi" /> <label for="Bi">Bimestriel</label></li>
			<li class="Paiement"><input required type="radio" name="Frequence" value="Trimestriel" id="Tri" /> <label for="Tri">Trimestriel</label> </li>
			<li class="Paiement"><input required type="radio" name="Frequence" value="Semestriel" id="Se" /> <label for="Se">Semestriel</label> </li>
			<li class="Paiement"><input required type="radio" name="Frequence" value="Annuel" id="An" /> <label for="An">Annuel</label> </li>
		</ul>
		<p><strong>Moyen de Paiement : </strong></p>
		<ul>
			<li class="Paiement"><input required type="radio" name="Paiement" value="CQ" id="CQ" /> <label for="CQ">Chèque</label></li>
			<li class="Paiement"><input required type="radio" name="Paiement" value="ES" id="ES" /> <label for="ES">Espèce</label></li>
			<li class="Paiement"><input required type="radio" name="Paiement" value="VI" id="VI" /> <label for="VI">Virement</label> </li>
			<li class="Paiement"><input required type="radio" name="Paiement" value="CS" id="CS" /> <label for="CS">Coupon Sport</label> </li>
			<li class="Paiement"><input required type="radio" name="Paiement" value="CV" id="CV" /> <label for="CV">Chèque Vacances ANCV </label> </li>
		</ul>
		<p><strong>Réduction : </strong></p>
		<ul>
			<li class="Paiement"><input type="radio" name="Reduction" value="CG" id="CG" /> <label for="CG">Conseil Général Évasion</label></li>
			<li class="Paiement"><input type="radio" name="Reduction" value="F1" id="F1" /> <label for="F1">Famille 10%</label></li>
			<li class="Paiement"><input type="radio" name="Reduction" value="F2" id="F2" /> <label for="F2">Famille 20%</label></li>
			<li class="Paiement"><input type="radio" name="Reduction" value="F3" id="F3" /> <label for="F3">Famille 30%</label></li>
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

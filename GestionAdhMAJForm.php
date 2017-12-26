<?php
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
$NumAdh=$_POST['Adh'];
?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - <a href="GestionAdh.html">Gestion Adhérent</a> - Mise à Jour 2</div>

<section>

	<h2>Gestion des adhérents</h2>
	<h3>Mises à jour Etape 2</h3>
	<p>adhérent numéro : <?php echo $NumAdh?></p>
	<form method="post" action="GestionAdhMAJBDD.php?Num=<?php echo $NumAdh;?>">
	<?php
	if(isset($_POST['typeAdmin']))
	{?>
		<fieldset><legend><input type="checkbox" name="Admin" checked>Changement administratif :</legend>
		<table class="Form">
			<tr class="Form"><td class="Form"><label for="Prenom">Prénom : </label></td><td class="Form"><input type="text" name="Prenom" id="Prenom" required />	</td></tr>
			<tr class="Form"><td class="Form"><label for="Nom">Nom : </label></td><td class="Form"><input type="text" name="Nom" id="Nom" required /></td></tr>
			<tr class="Form"><td class="Form"><label for="DN">Date de naissance : </label></td><td class="Form"><input required type="text" name="DateNaissance" id="DN" placeholder="aaaa-mm-jj"/></td></tr>
		</table>
		</fieldset>

	<?php }
	if(isset($_POST['Supprimer']))
	{?>
		<fieldset><legend><input type="checkbox" name="Supprimer" checked>Supprimer adhérent :</legend>
			<p><strong>Supprimer l'adhérent ? </strong></p>
			<ul>
				<li class="Paiement"><input required type="radio" name="Confirmer" value="OUI" id="OUI" /> <label for="OUI">OUI</label></li>
				<li class="Paiement"><input required type="radio" name="Confirmer" value="NON" id="NON" /> <label for="NON">NON</label></li>
			</ul>
		</fieldset>

	<?php }
	if(isset($_POST['typePaiement']))
	{ ?>
		<fieldset><legend><input type="checkbox" name="Paiement" checked>Changement de paiement :</legend>
			<p><strong>Fréquence du paiement : </strong></p>
			<ul>
				<li class="Paiement"><input required type="radio" name="Frequence" value="Mensuel" id="Mens" /> <label for="Mens">Mensuel</label></li>
				<li class="Paiement"><input required type="radio" name="Frequence" value="Bimestriel" id="Bi" /> <label for="Bi">Bimestriel</label></li>
				<li class="Paiement"><input required type="radio" name="Frequence" value="Trimestriel" id="Tri" /> <label for="Tri">Trimestriel</label> </li>
				<li class="Paiement"><inputrequired type="radio" name="Frequence" value="Semestriel" id="Se" /> <label for="Se">Semestriel</label> </li>
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

	<?php }
	if(isset($_POST['typeCours']))
	{		?>
			<fieldset><legend><input type="checkbox" name="Cours" checked>Changement de cours</legend>

		<input type="checkbox" name="BarreSol" id="BarreSol" /> <label for="BarreSol">Barre au Sol</label><br/>
		<input type="checkbox" name="Eveil" id="Eveil" /><label for="Eveil">Éveil</label><br/>
		<input type="checkbox" name="Initiation" id="Initiation" /><label for="Initiation">Initiation</label><br/>

		<details>
			<summary>Contemporain </summary>
			<input type="checkbox" name="ContemporainAdo" id="Ado" /><label for="Ado">Ado</label><br/>
			<input type="checkbox" name="ContemporainSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
		</details>
		<details>
			<summary>Classique </summary>
			<input type="checkbox" name="ClaEnf" id="Enfant" /><label for="Enfant">Enfant</label><br/>
			<input type="checkbox" name="ClaPrep" id="Preparatoire" /><label for="Preparatoire">Préparatoire</label><br/>
			<input type="checkbox" name="ClaAdo" id="Ado" /><label for="Ado">Ado</label><br/>
			<input type="checkbox" name="ClaSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
		</details>
		<details>
			<summary>Jazz</summary>
			<input type="checkbox" name="JaEnf" id="Enfant" /><label for="Enfant">Enfant</label><br/>
			<input type="checkbox" name="JaAdo" id="Ado" /><label for="Ado">Ado</label><br/>
			<input type="checkbox" name="JaSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
			<input type="checkbox" name="JaAdu" id="Adulte" /><label for="Adulte">Adulte</label> <br/>
		</details>
		<details>
			<summary>Street Jazz </summary>
			<input type="checkbox" name="StAdo" id="Ado" /><label for="Ado">Ado</label><br/>
			<input type="checkbox" name="StSup" id="Superieur" /><label for="Superieur">Supérieur</label><br/>
		</details>
		<details>
			<summary>Pointes </summary>
			<input type="checkbox" name="P1" id="Niveau1" /><label for="Niveau1">Niveau 1</label> <br/>
			<input type="checkbox" name="P2" id="Niveau2" /><label for="Niveau2">Niveau 2</label> <br/>
		</details>

	</fieldset>
<?php	}	?>
	<input type="submit" name="Envoyer !"/>
</form>
</section>
<?php include("include/Footer.php");?>
</body>
</html>

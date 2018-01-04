<?php session_start();
include("include/Head.php");
include("include/Menu.php");

$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');

//les alertes font le lien vers l'ajout de lignes comptables préremplies.
?>
	<div>Vous êtes ici : Accueil </div>

	<section>

		<h2>Accueil</h2>
		<p>Bienvenue dans le site de comptabilite et gestion de l'association Temps Danse</p>
		<p>Ce site est <strong>SUR MESURE</strong> et simple d'utilisation.</p>
		<p>Bonne compta :) </p>

		<h3>Mes alertes :</h3>
		<p>Les alertes ne sont pas des lignes comptables, elles ne sont que des
			projets de lignes à venir. Elles sont modifiables et là à titre indicatif.</p>
		<table class="invisible">
			<tr class="invisible">
				<td class="invisible">
					<table>
						<caption>Adhérents</caption>
						<tbody>
							<tr><th>Num alerte</th><th>Adhérent</th><th>Date</th><th>Montant</th><th>Action</th></tr>
							<?php
							$reponse=$bdd->query('SELECT * FROM `alerteadh` WHERE CURRENT_DATE>`Date` ORDER BY `Date` ');
							while ($donnees = $reponse->fetch())
							{
								$numero=$donnees['NumAdh'];
								$AdhReq=$bdd->query("SELECT Nom, Prenom FROM adherent WHERE NumAdh=$numero");
								$Adh=$AdhReq->fetch();
								?>
								<tr>
									<td><?php echo $donnees['IdAlerte']; ?></td>
									<td><?php echo $Adh['Nom']." ".$Adh['Prenom']; ?></td>
									<td><?php echo $donnees['Date']; ?></td>
									<td><?php echo $donnees['Montant']; ?></td>
									<td><a href="??????????????????">Supprimer</a><a href="??????????">Ajouter ligne</a></td>
								</tr>
								<?php
								$AdhReq->closeCursor();
							}
							$reponse->closeCursor(); // Termine le traitement de la requête
							?>
						</tbody></table>
					</td>
					<td class="invisible">

						<table>
							<caption>Comptabilité</caption>
							<tbody>
								<tr><th>Num alerte</th><th>Ligne comptable</th><th>Date</th><th>Montant</th></tr>
								<?php
								$reponse=$bdd->query('SELECT * FROM `alertecompta` WHERE CURRENT_DATE<`Date`AND DATE_ADD(CURRENT_DATE, INTERVAL 6 MONTH)>`Date` ORDER BY `Date` ');
								//$reponse=$bdd->query('SELECT * FROM `alertecompta` ORDER BY `Date` ');
								while ($donnees = $reponse->fetch())
								{
									$IdLigne=$donnees['IdLigne'];
									$AdhReq=$bdd->query("SELECT Motif, Type FROM compta WHERE Id=$IdLigne");
									$Adh=$AdhReq->fetch();
									$Type=$Adh['Type'];
									if($Type=='Recette'){
										echo "<tr class=\"Vert\">";
									}
									else {
										echo "<tr class=\"Rouge\">";
									}
									?>
									<td><?php echo $donnees['IdAlerte']; ?></td>
									<td><?php echo $Adh['Motif']; ?></td>
									<td><?php echo $donnees['Date']; ?></td>
									<td><?php echo $donnees['Montant']; ?></td>
								</tr>
								<?php
								$AdhReq->closeCursor();
							}
							$reponse->closeCursor(); // Termine le traitement de la requête
							?>
						</tbody></table>
					</td>
				</tr>
			</table>
	</section>
	<?php include("include/Footer.php");?>
</body>
</html>

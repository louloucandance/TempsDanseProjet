<?php include("include/Head.php");
include("include/Menu.php");
?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - Comptabilité </div>

<section>

	<h2>Compta</h2>


	<a class="bouton" href="ComptaForm.php">Nouvelle ligne</a>
	<a class="bouton" href="ComptaMAJ.php">Corriger ma comptabilité</a>
	<a class="bouton" href="ComptaListes.php">Ma comptabilité</a>

	<!--BILAN :-->
	<a class="bouton" href="Bilan.php" target="_blank">Produire le bilan</a>

	<?php
	$reponse = $bdd->query('SELECT * FROM `compta` ORDER BY `Date` DESC'); //Ordre décroissant des dates, ca doit etre DESC mas o menos
	?>
	<table class="invisible">
		<tr class="invisible">
			<td class="invisible">
				<table>
					<caption>Comptabilité</caption>
					<tbody>
						<tr><th>Motif</th><th>Montant</th><th>Fréquence</th><th>Date</th><th>Mode Paiement</th><th>Commentaire</th></tr>

						<?php
						while ($donnees = $reponse->fetch())
						{
							$Motif=$donnees['Motif'];
							?>
							<tr><?php
							if($donnees['Type']=='Recette'){
								?><td class="Vert"><?php echo $donnees['Motif']; ?></td><?php
							}
							else {
								?><td class="Rouge"><?php echo $donnees['Motif']; ?></td><?php
							}
							?>
							<td><?php echo $donnees['Montant']; ?></td>
							<td><?php echo $donnees['Frequence']; ?></td>
							<td><?php echo $donnees['Date']; ?></td>
							<td><?php
							$Paiement=$donnees['ModePaiement'];
							$req=$bdd->query("SELECT NomPaiement FROM modepaiement WHERE IdPaiement = '$Paiement'");
							$tab=$req->fetch();
							echo $tab['NomPaiement']; ?></td>
							<td><?php echo $donnees['Commentaire']; ?></td>
						</tr>
						<?php
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
</form>

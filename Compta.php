<?php include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - Comptabilité </div>

<section>

	<h2>Compta</h2>


	<a class="bouton" href="ComptaForm.php">Nouvelle ligne</a>
	<a class="bouton" href="ComptaMAJ.php">Corriger ma comptabilité</a>
	<a class="bouton" href="ComptaListes.php">Ma comptabilité</a>

	<?php
	$reponse = $bdd->query('SELECT * FROM Compta ORDER BY Date');
	?>
	<table>
		<caption>Comptabilité</caption>
		<tbody>
			<tr><th>Motif</th><th>Montant</th><th>Fréquence</th><th>Date</th><th>Mode Paiement</th><th>Type</th><th>Commentaire</th></tr>

			<?php
			while ($donnees = $reponse->fetch())
			{
				$Motif=$donnees['Motif'];
				?>
				<tr>
					<td><?php echo $donnees['Motif']; ?></td>
					<td><?php echo $donnees['Montant']; ?></td>
					<td><?php echo $donnees['Frequence']; ?></td>
					<td><?php echo $donnees['Date']; ?></td>
					<td><?php echo $donnees['ModePaiement']; ?></td>
					<td><?php echo $donnees['Type']; ?></td>
					<td><?php echo $donnees['Commentaire']; ?></td>
				</tr>
				<?php
			}
			$reponse->closeCursor(); // Termine le traitement de la requête
			?>
		</tbody></table>

	</section>
	<?php include("include/Footer.php");?>
</body>
</html>
</form>

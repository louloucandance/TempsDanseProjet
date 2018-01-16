<?php
/*PROBLEMES A RELGER
-Requête d'affichage des cours
-Faire des boutons pour le formulaire/maj
*/
include("include/Head.php");
include("include/Menu.php");

?>
<!-- FIL D'ARIANNE -->
<div>Vous êtes ici : <a href="index.html">Accueil</a> - Gestion Adhérent</div>

<section>

	<h2>Gestion des adhérents</h2>

	<a class="bouton" href="GestionAdhForm.php">Inscrire un nouvel adhérent</a>
	<a class="bouton" href="GestionAdhMAJ.php">Mettre à jour un adhérent</a>
	<a class="bouton" href="GestionAdhListes.php">Listes d'appels</a>

	<?php
		$reponse = $bdd->query('SELECT * FROM Adherent ORDER BY Nom');
	?>
	<table>
	<caption>Les adhérents de Temps Danse 65</caption>
	<tbody>
	<tr><th>Nom</th><th>Prenom</th><th>Anniversaire</th><th>Cours</th><th>Paiement</th><th>Montant</th></tr>


	<?php
		while ($donnees = $reponse->fetch())
{
	$NumAdh=$donnees['NumAdh'];
	$cours=$bdd->query("SELECT `Discipline`, `Niveau` FROM Classe WHERE NumAdh=$NumAdh");
?>
<tr>
<td><?php echo $donnees['Nom']; ?></td>
<td><?php echo $donnees['Prenom']; ?></td>
<td><?php echo $donnees['DateNaissance']; ?></td>
<td> <?php while($data=$cours->fetch())
	{
	echo $data['Discipline']." - ". $data['Niveau']."<br/>";
	}?></td>
<td><?php echo "Moyen de Paiement :". $donnees['ModePaiement']."</br>Frequence : " .$donnees['FrequencePaiement']."</br>".$donnees['Reduction']; ?></td>
<td><?php echo $donnees['Montant']; ?></td></tr>
<?php
}
$cours->closeCursor();
$reponse->closeCursor(); // Termine le traitement de la requête
?>
</tbody></table>

</section>
<?php include("include/Footer.php");?>
</body>
</html>

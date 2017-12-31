<?php
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');?>

<div>Vous êtes ici : <a href="index.html">Accueil</a> -Modification d'une ligne compta</div>

<section>

	<h2>Modification d'une ligne</h2>







$reponse = $bdd->query('SELECT * FROM compta');


	<form method="post" action="ComptaMAJBDD.php">
    <select name="Ligne"><?php
    while ($Ligne=$reponse->fetch()) { ?>
    <option value=<?php echo $Ligne['Id'];?>><?php echo $Ligne['Motif']." ".$Ligne['Date']." ".$Ligne['Montant'];?></option>
    <?php }
    $reponse->closeCursor();
    ?>
    </select>
							<?php
							$reponse = $bdd->query('SELECT * FROM compta');
							while ($donnees = $reponse->fetch())
							{
								$Id=$donnees['Id'];
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

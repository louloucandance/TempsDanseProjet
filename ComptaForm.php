<?php
session_start();
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
//Seulement si on traite une alerte :
$Value=isset($_GET['Id']);
if($Value){
	$idLigne=$_GET['Id'];
	$Action = $_GET['A'];
	$Date=$_GET['Date'];
	$Compta=($Action=='compta');
	$Adh=($Action=='adh');
	if ($Compta) {
		$AdhReq=$bdd->query("SELECT * FROM compta WHERE Id=$idLigne");
		$Ligne=$AdhReq->fetch();
		$Motif=$Ligne['Motif'];
		$Frequence=$Ligne['Frequence'];
		}
	if($Adh){
		$AdhReq=$bdd->query("SELECT * FROM adherent WHERE NumAdh=$idLigne");
		$Ligne=$AdhReq->fetch();
		$Motif=$Ligne['Nom']." ".$Ligne['Prenom'];
		$Frequence=$Ligne['FrequencePaiement'];
	}
	$Montant=$Ligne['Montant'];
	$ModePaiement=$Ligne['ModePaiement'];
}

?>

<div>Vous êtes ici : <a href="index.html">Accueil</a> -Nouvelle ligne compta</div>

<section>

	<h2>Nouvelle ligne compta</h2>

	<form method="post" action="ComptaBDD.php">

					<fieldset class="Info"><legend>Nouvelle ligne</legend>
						<table class="Form">
							<tr class="Form"><td class="Form"><label for="Motif">Motif : </label></td><td class="Form"><input type="text"
								<?php
								if ($Value) {
										echo "value='$Motif'";
								}
								?> name="Motif" id="Motif" required />	</td></tr>
							<tr class="Form"><td class="Form"><label for="Date">Date : </label></td><td class="Form"><input type="text"
								<?php
								if ($Value) {
										echo "value=$Date";
								}
								?> name="Date" id="Date" required placeholder="aaaa-mm-jj"/></td></tr>
							<tr class="Form"><td class="Form"><label for="Montant"> Montant :  </label></td><td class="Form"><input required type="text"
								<?php
								if ($Value) {
										echo "value=$Montant";
								}
								?> name="Montant" id="Montant" /></td></tr>
						</table>
						<p><strong>Fréquence : </strong></p>
							<select name="Frequence" <?php

							echo ">";
								$reponse = $bdd->query('SELECT * FROM frequence');
								while ($donnees = $reponse->fetch())
								{
									$freq=$donnees['NomFrequence'];
									if ($Value) {
											if($freq)
									}
									echo "<option required value=\"$freq\">$freq</option>";
								}
								$reponse->closeCursor();
								?>
								</select>

							<p><strong>Type : </strong></p>
							<select name="Type">
								<?php
								echo ">";
								$reponse = $bdd->query('SELECT * FROM typecompta');
								while ($donnees = $reponse->fetch())
								{
									$Id=$donnees['Type'];
									echo "<option value=\"$Id\"> $Id</option>";
								}
								$reponse->closeCursor();
								?>
							</select>

						</fieldset>
					</td>

					<td class="invisible">
						<fieldset class="Cours"><legend>Facultatif</legend>
							<p><strong>Moyen de Paiement : </strong></p>
							<select name="MoyenPaiement">
								<?php
								$reponse = $bdd->query('SELECT * FROM modepaiement');
								while ($donnees = $reponse->fetch())
								{
									$Id=$donnees['IdPaiement'];
									$Nom=$donnees['NomPaiement'];
									if ($Id==$ModePaiement) {
										echo "<option autofocus value=\"$Id\">$Nom</option>";
									}
									echo "<option value=\"$Id\">$Nom</option>";
								}
								$reponse->closeCursor();
								?>
							</select>

							<p><strong>Catégorie : </strong></p>
							<select name="Categorie">
								<?php
								if ($Value) {
									if ($Adh) {
										echo "value=\"Adherent\"";
									}
								}
								echo ">";
								$reponse = $bdd->query('SELECT * FROM categorie ORDER BY Nom');
								while ($donnees = $reponse->fetch())
								{
									$Id=$donnees['Nom'];
									echo "<option value=\"$Id\">$Id</option>";
								}
								$reponse->closeCursor();
								?>
							</select>
							<p><strong>Commentaire :</strong></p>
							<textarea name="Commentaire" size="140" rows="4" cols="50" placeholder="Votre commentaire doit être sans accent ni apostrophes !"><?php
								 if ($Value) {
										echo "Ligne générée à partir d'une alerte. Vérifiez tout attentivement les informations, elles peuvent ne pas être exactes.";
								}
								?>
							</textarea>

						</td>
					</table>
				</fieldset>
				<input type="submit" name="Enregistrer !">
			</form>





		</section>
		<?php include("include/Footer.php");?>
	</body>
	</html>

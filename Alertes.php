<?php session_start();
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');

?>
	<div>Vous êtes ici : Accueil </div>

	<section>

		<h2>Accueil</h2>

		<h3>Mes alertes :</h3>
    <?php //include("include/AjoutAlerte.php");?>
    <table class="invisible">
      <tr class="invisible">
        <td class="invisible">
    <table>
  		<caption>Adhérents</caption>
  		<tbody>
  			<tr><th>Num alerte</th><th>Adhérent</th><th>Date</th><th>Montant</th></tr>
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
          $reponse=$bdd->query('SELECT * FROM `alertecompta` WHERE CURRENT_DATE>`Date` ORDER BY `Date` ');
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
            </tr>
            <?php
            $AdhReq->closeCursor();
          }
          $reponse->closeCursor(); // Termine le traitement de la requête
          ?>
        </tbody></table>
    </td>
	</section>
	<?php include("include/Footer.php");?>
</body>
</html>

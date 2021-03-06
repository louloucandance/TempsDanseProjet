<?php
include("include/Head.php");
include("include/Menu.php");

$IdLigne=$_POST['Ligne'];
$Action=$_POST['Action'];
?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - <a href="Compta.php">Comptabilité</a> - Mise à Jour 2</div>

<section>

  <h2>Comptabilité</h2>
  <h3>Mises à jour Etape 2</h3>
  <p>Ligne numéro : <?php echo $IdLigne?></p>
  <?php
  $Ligne=$bdd->query("SELECT * FROM `compta` WHERE `Id`=$IdLigne");
  while($ligne=$Ligne->fetch())
  {
    $Motif=$ligne['Motif'];
    $Date=$ligne['Date'];
    $Montant=$ligne['Montant'];
    $Type=$ligne['Type'];
    $Frequence=$ligne['Frequence'];
    $Categorie=$ligne['Categorie'];
    $ModePaiement=$ligne['ModePaiement'];
    $Commentaire=$ligne['Commentaire'];
  }
  ?>
  <form method="post" action="ComptaMAJBDD.php">
    <input type="hidden" name="Num" value="<?php echo $IdLigne;?>"/>
    <?php
    if ($Action=='Modifier') {
      ?>
      <fieldset><legend><input type="checkbox" name="Ligne" checked>Changement informations :</legend>
        <table class="Form">
          <tr class="Form"><td class="Form"><label for="Motif">Motif : </label></td><td class="Form"><input value="<?php echo $Motif; ?>" type="text" name="Motif" id="Motif" required />	</td></tr>
          <tr class="Form"><td class="Form"><label for="Date">Date : </label></td><td class="Form"><input type="text" name="Date" id="Date" value="<?php echo $Date; ?>" required /></td></tr>
          <tr class="Form"><td class="Form"><label for="Montant">Montant : </label></td><td class="Form"><input required type="text" name="Montant" id="Montant" value="<?php echo $Montant;?>"/></td></tr>
        </table>

        <p><strong>Fréquence : </strong></p>
          <select name="Frequence">

            <?php
            $reponse = $bdd->query('SELECT * FROM frequence');
            while ($donnees = $reponse->fetch())
            {
              $freq=$donnees['NomFrequence'];
              echo "<option required value=\"$freq\">$freq</option>";
            }
            $reponse->closeCursor();
            ?>
            </select>

        <p><strong>Moyen de Paiement : </strong></p>
        <select name="ModePaiement">
          <?php
          $reponse = $bdd->query('SELECT * FROM modepaiement');
          while ($donnees = $reponse->fetch())
          {
            $IdPaie=$donnees['IdPaiement'];
            $NomPaie=$donnees['NomPaiement'];
            echo "<option value=\"$IdPaie\">$NomPaie</option>";
          }
          $reponse->closeCursor();
          ?>
        </select>

        <p><strong>Type : </strong></p>
        <select name="Type">
          <?php
          $reponse = $bdd->query('SELECT * FROM typecompta');
          while ($donnees = $reponse->fetch())
          {
            $Id=$donnees['Type'];
            echo "<option value=\"$Id\"> $Id</option>";
          }
          $reponse->closeCursor();
          ?>
        </select>

        <p><strong>Catégorie : </strong></p>
        <select name="Categorie">
          <?php
          $reponse = $bdd->query('SELECT * FROM categorie ORDER BY Nom');
          while ($donnees = $reponse->fetch())
          {
            $IdCat=$donnees['Nom'];
            echo "<option value=\"$IdCat\">$IdCat</option>";
          }
          $reponse->closeCursor();
          ?>
        </select>
        <p><strong>Commentaire :</strong></p>
        <textarea name="Commentaire" size="140" rows="4" cols="50" placeholder="Votre commentaire doit être sans accent ni apostrophes !"> <?php echo $Commentaire;?></textarea>

      </fieldset>
    <?php }
    else { ?>
      <fieldset><legend><input type="checkbox" name="Supprimer" checked>Supprimer ligne:</legend>
        <p><strong>Supprimer la ligne ? </strong></p>
        <ul>
          <li class="Paiement"><input required type="radio" name="Confirmer" value="OUI" id="OUI" /> <label for="OUI">OUI</label></li>
          <li class="Paiement"><input required type="radio" name="Confirmer" value="NON" id="NON" /> <label for="NON">NON</label></li>
        </ul>
      </fieldset>
      <?php } ?>

      <input type="submit" name="Envoyer !"/>
    </form>
  </section>
  <?php include("include/Footer.php");?>
</body>
</html>

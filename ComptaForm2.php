<?php
session_start();
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');

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
$_SESSION['Alerte']=true;


?>

<div>Vous êtes ici : <a href="index.html">Accueil</a> -Nouvelle ligne compta</div>

<section>

  <h2>Nouvelle ligne compta</h2>

  <form method="post" action="ComptaBDD.php">

    <fieldset class="Info"><legend>Nouvelle ligne</legend>
      <table class="Form">

        <!--Montif-->
        <tr class="Form"><td class="Form"><label for="Motif">Motif : </label></td><td class="Form"><input type="text"
          <?php echo "value='$Motif'"; ?> name="Motif" id="Motif" required />	</td></tr>
          <tr class="Form"><td class="Form"><label for="Date">Date : </label></td>
            <td class="Form"><input type="text"
              <?php	echo "value=$Date"; ?> name="Date" id="Date" required placeholder="aaaa-mm-jj"/></td></tr>
              <!--Montant-->
              <tr class="Form"><td class="Form"><label for="Montant"> Montant :  </label></td><td class="Form"><input required type="text"
                <?php	echo "value=$Montant";?> name="Montant" id="Montant" /></td></tr>
              </table>

              <!--Fréquence-->
              <p><strong>Fréquence : </strong></p>
              <select name="Frequence" > <?php $reponse = $bdd->query('SELECT * FROM frequence');
              echo "<option required value=\"$Frequence\">$Frequence</option>";
              while ($donnees = $reponse->fetch())
              {
                $freq=$donnees['NomFrequence'];
                if ($freq!=$Frequence) {
                  echo "<option required value=\"$freq\">$freq</option>";
                }
              }
              $reponse->closeCursor();
              ?>
            </select>

            <!--Type-->

            <p><strong>Type : </strong></p>
            <select name="Type">
              <?php
              $reponse = $bdd->query('SELECT * FROM typecompta');
              if ($Adh) {
                echo "<option value=\"Recette\"> Recette</option>";
                echo "<option value=\"Depense\"> Depense</option>";
              }
              if ($compta) {
                while ($donnees = $reponse->fetch()) {
                  $Id=$donnees['Type'];
                  echo "<option value=\"$Id\"> $Id</option>";
                }
              }
              $reponse->closeCursor();
              ?>
            </select>

          </fieldset>
        </td>

<!--Facultatif-->

        <td class="invisible">
          <fieldset class="Cours"><legend>Facultatif</legend>

<!--Mode de paiement-->

            <p><strong>Moyen de Paiement : </strong></p>
            <select name="MoyenPaiement">
              <?php
              $NomReq = $bdd->query("SELECT * FROM modepaiement WHERE IdPaiement='$ModePaiement'");
              $Nom=$NomReq->fetch();
              echo "<option required value=$ModePaiement>";
              echo $Nom['NomPaiement'];
              echo "</option>";
              $NomReq->closeCursor;

              $reponse = $bdd->query('SELECT * FROM modepaiement');
              while ($donnees = $reponse->fetch()){

                if ($ModePaiement!=$donnees['IdPaiement']) {
                  echo "<option required value=";
                  echo $donnees['IdPaiement'];
                  echo ">";
                  echo$donnees['NomPaiement'];
                  echo"</option>";
                }
              }
                $reponse->closeCursor(); ?>
              </select>

<!--Catégorie-->
              <p><strong>Catégorie : </strong></p>
              <select name="Categorie">

                <?php
                $reponse = $bdd->query('SELECT * FROM categorie ORDER BY Nom');
                  if ($Adh) {
                    echo "<option value=Adherent>Adherent</option>";
                  }

                while ($donnees = $reponse->fetch())
                {
                  if (!($donnees['Nom']=='Adherent' AND $Adh)) {
                    $Categorie=$donnees['Nom'];
                    echo "<option value=\"$Categorie\">$Categorie</option>";
                  }
                }
                $reponse->closeCursor();
                ?>
              </select>

<!--Commentaire-->
              <p><strong>Commentaire :</strong></p>
              <textarea name="Commentaire" size="140" rows="4" cols="50" placeholder="Votre commentaire doit être sans accent ni apostrophes !">
Ligne comptable générée à partir d'une alerte. Vérifiez tout attentivement les informations, elles peuvent ne pas être exactes.
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

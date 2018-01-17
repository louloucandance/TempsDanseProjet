<?php
session_start();
include("include/Head.php");
include("include/Menu.php");


$_SESSION['NumAlerte']=$_GET['NumAlerte'];
$NumAlerte=$_SESSION['NumAlerte'];
$Compta=($_GET['A']=='compta');
$Adh=($_GET['A']=='adh');
if ($Compta) {
  $AlerteReq=$bdd->query("SELECT * FROM alertecompta WHERE IdAlerte=$NumAlerte");
}
elseif ($Adh){
  $AlerteReq=$bdd->query("SELECT * FROM alerteadh WHERE IdAlerte=$NumAlerte");
}

$AlerteTab=$AlerteReq->fetch();
$Date=$AlerteTab['Date'];
$Montant=$AlerteTab['Montant'];
$_SESSION['Alerte']=true;

if ($Compta) {
  $idLigne=$AlerteTab['IdLigne'];
  $AdhReq=$bdd->query("SELECT * FROM compta WHERE Id=$idLigne"); //ERREUR : il faut reload pour que ca marche, pk ??????
  $Ligne=$AdhReq->fetch();
  $Motif=$Ligne['Motif'];
  $Frequence=$Ligne['Frequence'];
  $Categorie=$Ligne['Categorie'];
}
if($Adh){
  $idLigne=$AlerteTab['NumAdh'];
  $AdhReq=$bdd->query("SELECT * FROM adherent WHERE NumAdh=$idLigne"); //ERREUR : idem
  $Ligne=$AdhReq->fetch();
  $Motif=$Ligne['Nom']." ".$Ligne['Prenom'];
  $Frequence=$Ligne['FrequencePaiement'];
  $Categorie='Adherent';
}

$ModePaiement=$Ligne['ModePaiement'];



?>

<div>Vous êtes ici : <a href="index.html">Accueil</a> -Nouvelle ligne compta</div>

<section>

  <h2>Nouvelle ligne compta</h2>
  <p><strong>ATTENTION : </strong> Cette ligne comptable a été générée à partir d'une alerte. Veuillez vérifier attentivement les informations préremplies.</p>

  <form method="post" action="ComptaBDD.php">

    <table class="invisible"> <tr class="invisible"> <td class="invisible">

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
                if ($Adh) {
                  echo "<option value=\"Recette\"> Recette</option>";
                  echo "<option value=\"Depense\"> Depense</option>";
                }
                else {
                  $reponse = $bdd->query('SELECT * FROM typecompta');
                  while ($donnees = $reponse->fetch()) {
                    $Id=$donnees['Type'];
                    echo "<option value=$Id> $Id</option>";
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

                echo "<option required value=$Categorie>$Categorie</option>";


                $reponse = $bdd->query('SELECT * FROM categorie ORDER BY Nom');
                while ($donnees = $reponse->fetch())
                {
                  $Cat=$donnees['Nom'];
                  if ($Categorie!=$Cat) {
                    echo "<option value=\"$Cat\">$Cat</option>";
                  }
                }
                $reponse->closeCursor();
                ?>
              </select>

              <!--Commentaire-->
              <p><strong>Commentaire :</strong></p>
              <textarea name="Commentaire" size="140" rows="4" cols="50" placeholder="Votre commentaire doit être sans accent ni apostrophes !"></textarea>
            </fieldset>
          </td>
        </tr>
      </table>
      <input type="submit" name="Enregistrer">
    </form>
  </section>
  <?php include("include/Footer.php");?>
</body>
</html>

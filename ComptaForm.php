<?php
session_start();
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
$_SESSION['Alerte']=false;?>

<div>Vous êtes ici : <a href="index.html">Accueil</a> -Nouvelle ligne compta</div>

<section>

  <h2>Nouvelle ligne compta</h2>

  <form method="post" action="ComptaBDD.php">

          <fieldset class="Info"><legend>Nouvelle ligne</legend>
            <table class="Form">
              <tr class="Form"><td class="Form"><label for="Motif">Motif : </label></td><td class="Form"><input type="text" name="Motif" id="Motif" required />  </td></tr>
              <tr class="Form"><td class="Form"><label for="Date">Date : </label></td><td class="Form"><input type="text" name="Date" id="Date" required placeholder="aaaa-mm-jj"/></td></tr>
              <tr class="Form"><td class="Form"><label for="Montant"> Montant :  </label></td><td class="Form"><input required type="text" name="Montant" id="Montant" /></td></tr>
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
                                  echo "<option value=\"$Id\">$Nom</option>";
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
                                  $Id=$donnees['Nom'];
                                  echo "<option value=\"$Id\">$Id</option>";
                                }
                                $reponse->closeCursor();
                                ?>
                              </select>
                              <p><strong>Commentaire :</strong></p>
                              <textarea name="Commentaire" size="140" rows="4" cols="50" placeholder="Votre commentaire doit être sans accent ni apostrophes !"></textarea>

                            </td>
                          </table>
                        </fieldset>
                        <input type="submit" name="Enregistrer !">
                      </form>

                    </section>
                    <?php include("include/Footer.php");?>
                  </body>
                  </html>
        <input type="submit" name="Enregistrer !">
      </form>
    </section>
    <?php include("include/Footer.php");?>
  </body>
  </html>

Frequence<?php
include("include/Head.php");
include("include/Menu.php");
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
?>
<div>Vous êtes ici :Accueil</a> - <a href="GestionAdh.html">Gestion Adhérent</a> - Liste d'appel</div>

<section>

  <h2>Comptabilité</h2>
  <h3>Mes tableaux comptables</h3>


  <?php
  $Requete="";
  if (isset($_POST['CategorieTri'])) {
    $CategorieTri=$_POST['CategorieTri'];
    $Categorie=$_POST['Categorie'];
    if ($Requete=="") {
      $Requete=$Requete."Categorie = $Categorie";
    }
    else {
      $Requete=$Requete." AND Categorie = $Categorie";
    }

  }
  if (isset($_POST['TypeTri'])) {
    $TypeTri=$_POST['TypeTri'];
    $Type=$_POST['Type'];
    if ($Requete=="") {
      $Requete=$Requete."Type = $Type";
    }
    else {
      $Requete=$Requete." AND Type = $Type";
    }
  }
  if (isset($_POST['DateTri'])) {
    $DateTri=$_POST['DateTri'];
    $Date=$_POST['Date'];
    if ($Requete=="") {
      $Requete=$Requete."Date = $Date";
    }
    else {
      $Requete=$Requete." AND Date = $Date";
    }
  }
  if (isset($_POST['FrequenceTri'])) {
    $FrequenceTri=$_POST['FrequenceTri'];
    $Frequence=$_POST['Frequence'];
    if ($Requete=="") {
      $Requete=$Requete."Frequence = $Frequence";
    }
    else {
      $Requete=$Requete." AND Frequence = $Frequence";
    }
  }
echo "$Requete";

    echo "<table><caption>Tableau trié<caption><tr><th>Motif</th><th>Montant</th><th>Fréquence</th><th>Date</th><th>Mode Paiement</th><th>Type</th><th>Commentaire</th></tr>";
    $reponse=$bdd->query("SELECT * FROM `Compta` WHERE $Requete");
    while($donnees=$reponse->fetch()){ ?>
    <tr><td><?php echo $donnees['Motif']; ?></td>
    <td><?php echo $donnees['Montant']; ?></td>
    <td><?php echo $donnees['Frequence']; ?></td>
    <td><?php echo $donnees['Date']; ?></td>
    <td><?php echo $donnees['ModePaiement']; ?></td>
    <td><?php echo $donnees['Type']; ?></td>
    <td><?php echo $donnees['Commentaire']; ?></td></tr>";
  <?php }
  ?>
</table>?>

</section>
<?php include("include/Footer.php");?>
</body>
</html>

Frequence<?php
include("include/Head.php");
include("include/Menu.php");

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
      $Requete="Categorie = '$Categorie'";
    }
    else {
      $Requete=$Requete." AND Categorie = '$Categorie'";
    }

  }
  if (isset($_POST['TypeTri'])) {
    $TypeTri=$_POST['TypeTri'];
    $Type=$_POST['Type'];
    if ($Requete=="") {
      $Requete="Type = '$Type'";
    }
    else {
      $Requete=$Requete." AND Type = '$Type'";
    }
  }
  if (isset($_POST['DateTri'])) {
    $DateTri=$_POST['DateTri'];
    $DateR=$_POST['Date'];
    switch ($DateR) {
      case '1M':
        $Date="`Date`>DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)";
        break;
      case '1T':
        $Date="`Date`>DATE_SUB(CURRENT_DATE, INTERVAL 3 MONTH)";
        break;
      case '1S':
        $Date="`Date`>DATE_SUB(CURRENT_DATE, INTERVAL 6 MONTH)";
        break;
      case '1A':
        $Date="`Date`>DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR)";
        break;
      case '2M':
        $Date="`Date`>DATE_SUB(CURRENT_DATE, INTERVAL 2 MONTH)";
        break;

      default:
      $Date="CURRENT_DATE";
        break;
    }
    if ($Requete=="") {
      $Requete="$Date";
    }
    else {
      $Requete=$Requete." AND $Date";
    }

  }
  if (isset($_POST['FrequenceTri'])) {
    $FrequenceTri=$_POST['FrequenceTri'];
    $Frequence=$_POST['Frequence'];
    if ($Requete=="") {
      $Requete="Frequence = '$Frequence'";
    }
    else {
      $Requete=$Requete." AND Frequence ='$Frequence'";
    }
  }
  ?>
    <table>
      <caption>Tableau trié<caption>
        <tr><th>Motif</th><th>Montant</th><th>Fréquence</th><th>Date</th><th>Mode Paiement</th><th>Type</th><th>Commentaire</th></tr>
      <?php
    $reponse=$bdd->query("SELECT * FROM `compta` WHERE $Requete");
    while($donnees=$reponse->fetch()){ ?>
    <tr><td><?php echo $donnees['Motif']; ?></td>
    <td><?php echo $donnees['Montant']; ?></td>
    <td><?php echo $donnees['Frequence']; ?></td>
    <td><?php echo $donnees['Date']; ?></td>
    <td><?php echo $donnees['ModePaiement']; ?></td>
    <td><?php echo $donnees['Type']; ?></td>
    <td><?php echo $donnees['Commentaire']; ?></td></tr>
  <?php }
  ?>
</table>

</section>
<?php include("include/Footer.php");?>
</body>
</html>

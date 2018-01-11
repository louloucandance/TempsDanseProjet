<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./CSS/Bilan.css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <meta charset="utf-8"/>
  <title>Compt'Temps Danse</title>
  <?php $bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
  $Annee=2017;?>
</head>

<body>
  <table>
    <caption>Bilan</caption>
    <thead>
      <tr><th><?php echo $Annee;?></th><th>Catégorie</th><th>Janvier</th>
        <th>Février</th><th>Mars</th><th>Avril</th><th>Mai</th><th>Juin</th>
        <th>Juillet</th><th>Aout</th><th>Septembre</th><th>Octobre</th>
        <th>Novembre</th></th><th>Décembre</th></tr>
      </thead>
      <tfoot>

      </tfoot>

      <tbody>
        <!--<tr><td></td><td>Année</td><td>Janvier</td><td>Février</td><td>Mars</td><td>Avril</td><td>Mai</td><td>Juin</td><td>Juillet</td><td>Aout</td><td>Septembre</td><td>Octobre</td><td>Novembre</td><td>Décembre</td></tr>-->
        <?php
        $TypeCourrantReq=$bdd->query("SELECT Type FROM compta GROUP BY Type");
        while ($TypeCourrantTab=$TypeCourrantReq->fetch()) {
          $TypeCourrant=$TypeCourrantTab['Type'];
          $NombreCategorieReq=$bdd->query("SELECT COUNT(*) FROM ( SELECT * FROM compta WHERE Type='$TypeCourrant' GROUP BY Categorie ) AS categories_groupees");
          $NombreCategorieTab=$NombreCategorieReq->fetch();
          $NombreCategorie=$NombreCategorieTab['COUNT(*)'];
          echo "<tr><td rowspan=$NombreCategorie>$TypeCourrant</td>";
          $CategorieReq=$bdd->query("SELECT * FROM compta WHERE Type='$TypeCourrant' GROUP BY Categorie");
          while ($CategorieTab=$CategorieReq->fetch()) {
            $Categorie=$CategorieTab['Categorie'];
            echo "<td>$Categorie</td>";
            $i=1;
            while ($i<=12) {
              $MontantReq=$bdd->query("SELECT SUM(`Montant`) AS SommeMontant FROM compta WHERE Type='$TypeCourrant' AND `Categorie`='$Categorie' AND MONTH(`Date`)=$i AND YEAR(`Date`)=$Annee");
              $MontantTab=$MontantReq->fetch();
              $Montant = ($MontantTab['SommeMontant']==NULL) ? 0 : $MontantTab['SommeMontant'] ;

              echo "<td>$Montant</td>";
              $MontantReq->closeCursor();
              $i++;
            }
            $MargeCategorie=$bdd->query("SELECT SUM(`Montant`) AS MargeCategorie FROM compta WHERE Type='$TypeCourrant' AND `Categorie`='$Categorie' AND YEAR(`Date`)=$Annee ");
            $MargeCatTab=$MargeCategorie->fetch();
            $MargeCat=$MargeCatTab['MargeCategorie'];
            echo"<td class='Total'>$MargeCat</td></tr>";
          }
          $j=1;?>
          <td colspan=2>Total
          <?php
          while ($j <= 12) {
            # code...
          }
          $MargeMoisReq=$bdd->query("SELECT SUM(`Montant`) AS SommeMontant FROM compta WHERE Type='$TypeCourrant' AND MONTH(`Date`)=$j AND YEAR(`Date`)=$Annee");
          $j++;
          echo "<tr>";
          while($MargeMoisTab=$MargeMoisReq->fetch()){
            $MargeMois= ($MargeMoisTab['SommeMontant']==NULL) ? 0 : $MargeMoisTab['SommeMontant'];
            echo "<td class='Total'>$MargeMois</td>";
          }
          echo "</tr>";
          $MargeMoisReq->closeCursor();
          $CategorieReq->closeCursor();
        }
        $TypeCourrantReq->closeCursor();
        ?>
      </tbody>
    </table>
  </body>
  </html>

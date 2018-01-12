<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./CSS/Bilan.css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <meta charset="utf-8"/>
  <title>Compt'Temps Danse</title>
  <?php $bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
  $Annee=2018;?>
</head>

<body>
  <table>
    <caption>Bilan</caption>
    <thead>
      <tr><th><?php echo $Annee;?></th><th>Catégorie</th><th>Janvier</th>
        <th>Février</th><th>Mars</th><th>Avril</th><th>Mai</th><th>Juin</th>
        <th>Juillet</th><th>Aout</th><th>Septembre</th><th>Octobre</th>
        <th>Novembre</th></th><th>Décembre</th><th>Bilan Annuel</th></tr>
      </thead>
      <tfoot>
        <tr><td colspan="2">Bilan Mensuel </td>
          <?php
          $k=1;
          while($k<=12){
            $TotalMensuelRecetteReq=$bdd->query("SELECT SUM(`Montant`) AS MensuelRecette FROM compta WHERE Type='Recette' AND MONTH(`Date`)=$k AND YEAR(`Date`)=$Annee");
            $TotalMensuelDepenseReq=$bdd->query("SELECT SUM(`Montant`) AS MensuelDepense FROM compta WHERE Type='Depense' AND MONTH(`Date`)=$k AND YEAR(`Date`)=$Annee");
            $TotalMensuelRecetteTab=$TotalMensuelRecetteReq->fetch();
            $TotalMensuelDepenseTab=$TotalMensuelDepenseReq->fetch();
            $TotalMensuelRecette=$TotalMensuelRecetteTab['MensuelRecette'];
            $TotalMensuelDepense=$TotalMensuelDepenseTab['MensuelDepense'];
            $TotalMensuel = $TotalMensuelRecette - $TotalMensuelDepense;
            echo "<td class='Total'>$TotalMensuel</td>";
            $k++;
        }
        $TotalAnnuelRecetteReq=$bdd->query("SELECT SUM(`Montant`) AS AnnuelRecette FROM compta WHERE Type='Recette' AND YEAR(`Date`)=$Annee");
        $TotalAnnuelDepenseReq=$bdd->query("SELECT SUM(`Montant`) AS AnnuelDepense FROM compta WHERE Type='Depense' AND YEAR(`Date`)=$Annee");
        $TotalAnnuelRecetteTab=$TotalAnnuelRecetteReq->fetch();
        $TotalAnnuelDepenseTab=$TotalAnnuelDepenseReq->fetch();
        $TotalAnnuelRecette=$TotalAnnuelRecetteTab['AnnuelRecette'];
        $TotalAnnuelDepense=$TotalAnnuelDepenseTab['AnnuelDepense'];
        $TotalAnnuel = $TotalAnnuelRecette - $TotalAnnuelDepense;
        echo "<td class='Total'> $TotalAnnuel </td>";

           ?>

        </tr>
      </tfoot>

      <tbody>
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
          $j=1;
          echo"<tr><td colspan=2>Total Mensuel $TypeCourrant </td>";

          while ($j <= 12) {
            $MargeMoisReq=$bdd->query("SELECT SUM(`Montant`) AS SommeMontant FROM compta WHERE Type='$TypeCourrant' AND MONTH(`Date`)=$j AND YEAR(`Date`)=$Annee");
            $j++;
            $MargeMoisTab=$MargeMoisReq->fetch();
            $MargeMois= ($MargeMoisTab['SommeMontant']==NULL) ? 0 : $MargeMoisTab['SommeMontant'];
            echo "<td class='Total'>$MargeMois</td>";
          }

          $MargeTypeReq=$bdd->query("SELECT SUM(`Montant`) AS SommeMontant FROM compta WHERE Type='$TypeCourrant' AND YEAR(`Date`)=$Annee");
          $j++;
          $MargeTypeTab=$MargeTypeReq->fetch();
          $MargeType= ($MargeTypeTab['SommeMontant']==NULL) ? 0 : $MargeTypeTab['SommeMontant'];
          echo "<td class='Total'>$MargeType</td>";
          echo "</tr>";
          $MargeMoisReq->closeCursor();
          $CategorieReq->closeCursor();
          $MargeTypeReq->closeCursor();
        }
        $TypeCourrantReq->closeCursor();
        ?>
      </tbody>
    </table>
  </body>
  </html>

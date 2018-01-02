<?php
include('include/Head.php');
include('include/Menu.php');
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', ''); ?>
<div>Vous êtes ici : <a href='index.php'>Accueil</a> - <a href='GestionAdh.php'>Gestion Adhérent</a> - Mise à Jour 3</div>
<section>
  <h2>Comptabilité</h2>
  <h3>Mes tableaux comptables</h3>



  <form action="ComptaListesBDD.php" method="POST">
    <p>Choississez le filtre à appliquer à votre comptabilité : </p>

<!--PAR CATEGORIE :-->
    <input type="checkbox" name="CategorieTri" value="Categorie" id="Categorie"><label for="Categorie">Categorie :</label>
    <select name="Categorie">
      <?php
      $CategorieReq=$bdd->query("SELECT `Categorie` FROM `compta` GROUP BY `Categorie`");
      while($listCategorieReq=$CategorieReq->fetch()){ ?>
        <option value="<?php echo $listCategorieReq['Categorie'];?>"> <?php echo $listCategorieReq['Categorie'];?> </option>
      <?php } $CategorieReq->closeCursor(); ?>
    </select><br><br>

<!--PAR DATE :
J'aimerai pouvoir choisir un intervalle (année, mois, trimestre) et apres choisir lequel exemple : MOIS - Janvier ou AN - 2017 ou PERIODE - 12-07 au 15-07...
-->
    <input type="checkbox" name="DateTri" value="Date" id="Date"><label for="Date">Date :</label>
    <select name="Date">
      <?php
      $DateReq=$bdd->query("SELECT `Date` FROM `compta` GROUP BY `Date`");
      while($listDateReq=$DateReq->fetch()){ ?>
        <option value="<?php echo $listDateReq['Date'];?>"> <?php echo $listDateReq['Date'];?> </option>
      <?php } $DateReq->closeCursor(); ?>
    </select><br><br>

<!--PAR FREQUENCE :-->
    <input type="checkbox" name="FrequenceTri" value="Frequence" id="Freq"><label for="Freq">Frequence :</label>
    <select name="Frequence">
      <?php
      $DateReq=$bdd->query("SELECT `Frequence` FROM `compta` GROUP BY `Date`");
      while($listDateReq=$DateReq->fetch()){ ?>
        <option value="<?php echo $listDateReq['Frequence'];?>"> <?php echo $listDateReq['Frequence'];?> </option>
      <?php } $DateReq->closeCursor(); ?>
    </select><br><br>


<!--PAR TYPE :-->
    <input type="checkbox" name="TypeTri" value="Type" id="Type"><label for="Type">Type :</label>
    <select name="Type">
      <?php
      $TypeReq=$bdd->query("SELECT `Type` FROM `compta` GROUP BY `Type`");
      while($listTypeReq=$TypeReq->fetch()){ ?>
        <option value="<?php echo $listTypeReq['Type'];?>"> <?php echo $listTypeReq['Type'];?> </option>
      <?php } $TypeReq->closeCursor(); ?>
    </select><br><br>

    <input type="submit" name="Envoyer !"/>
  </form>



</section>
<?php include("include/Footer.php"); ?>
</body>
</html>

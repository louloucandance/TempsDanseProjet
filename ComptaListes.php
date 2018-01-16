<?php
include('include/Head.php');
include('include/Menu.php');
  ?>
<div>Vous êtes ici : <a href='index.php'>Accueil</a> - <a href='GestionAdh.php'>Gestion Adhérent</a> - Mise à Jour 3</div>
<section>
  <h2>Comptabilité</h2>
  <h3>Mes tableaux comptables</h3>


  <form action="ComptaListesBDD.php" method="POST">
    <p>Choississez le filtre à appliquer à votre comptabilité : </p>
    <p>Pour ce faire, sélectionner votre filtre avec les boîtes à cocher, puis choississez la valeur de celui ci dans les listes déroulantes.
    <p> Si vous ne cochez pas la case, la valeur dans la liste déroulante ne sera pas prise en compte !</p>
    <p>Vous pouvez utiliser autant de filtre que vous le voulez.</p>

<!--PAR CATEGORIE :-->
    <input type="checkbox" name="CategorieTri" value="Categorie" id="Categorie"><label for="Categorie">Categorie :</label>
    <select name="Categorie">
      <?php
      $CategorieReq=$bdd->query("SELECT `Categorie` FROM `compta` GROUP BY `Categorie`");
      while($listCategorieReq=$CategorieReq->fetch()){ ?>
        <option value="<?php echo $listCategorieReq['Categorie'];?>"> <?php echo $listCategorieReq['Categorie'];?> </option>
      <?php } $CategorieReq->closeCursor(); ?>
    </select><br><br>

<!--PAR DATE :-->
    <input type="checkbox" name="DateTri" value="Date" id="Date"><label for="Date">Date :</label>
    <select name="Date">
      <option value="1M"> Depuis un mois </option>
      <option value="2M"> Depuis deux mois </option>
      <option value="1T"> Depuis un trimestre </option>
      <option value="1S"> Depuis un semestre </option>
      <option value="1A"> Depuis un an </option>

    </select><br><br>

<!--PAR FREQUENCE :-->
    <input type="checkbox" name="FrequenceTri" value="Frequence" id="Freq"><label for="Freq">Frequence :</label>
    <select name="Frequence">
      <?php
      $DateReq=$bdd->query("SELECT `Frequence` FROM `compta` GROUP BY `Frequence`");
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

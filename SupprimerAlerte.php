<?php
include('include/Head.php');
include('include/Menu.php');
$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
$Id=$_GET['Id'];
$Action=$_GET['A'];
echo $Id $Action ?>
<div>Vous êtes ici : <a href='index.php'>Accueil</a> - <a href='GestionAdh.php'>Gestion Adhérent</a> - Mise à Jour 3</div>
<section>
	<h2>Supprimer Alerte</h2>
	<h3><?php echo $Alerte;?></h3>
  <p>Supprimer cette alerte ? </p>
  <form action="SupprimerAlerte.php" method="post">
    <input type="checkbox" name="OUI" value="OUI">OUI
    <input type="checkbox" name="NON" value="NON">NON
    <input type="submit">
  </form>
	<?php
  if($A='compta')
  {
    if (isset($_POST['OUI'])) {
      $EffAdh=$bdd->query("DELETE FROM alertecompta WHERE `IdAlerte`=$Id");
      $EffAdh->closeCursor();
      echo "<p>Alerte supprimée</p>";
    }
    else {
      echo "<p>Alerte non supprimée</p>";
    }
  }

		if($A='adh')
		{
      if (isset($_POST['OUI'])) {
        $EffAdh=$bdd->query("DELETE FROM alerteadh WHERE `IdAlerte`=$Id");
  			$EffAdh->closeCursor();
  			echo "<p>Alerte supprimée</p>";
      }
      else {
        echo "<p>Alerte non supprimée</p>";
      }
		}
	?>

</section>
<?php include("include/Footer.php"); ?>
</body>
</html>
